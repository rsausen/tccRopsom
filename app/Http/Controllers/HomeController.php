<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Cidade;
use App\Agenda;
use App\Pagamento;
use App\Controle_Horario;
use App\Funcionario;

class HomeController extends Controller
{
    public function index()
    {
    	$data = Date('Y-m-d');
    	$agendas = Agenda::where('data',$data)->orderBy('hora','asc')->paginate(6);
    	$pagamentos = Pagamento::where('vencimento',$data)->where('pago','0')->paginate(6);
        $qntAgenda = Agenda::where('data',$data)->count();
        $qntPagamento = Pagamento::where('vencimento',$data)->where('pago','0')->count();
        return view('base/home',compact('agenda','pagamento','agendas','pagamentos','qntAgenda','qntPagamento'));
    }

    public function getCidades($id)
    {
        $cidades = Cidade::where('id_estado',$id)->get(['nome','id']);
        return $cidades;
    }

    public function pagar($id){
        $controle = Controle_Horario::where('funcionario_id',$id)->get();
        return redirect('honorario')->with('status', 'Honorários quitados!');
    }

    public function honorarios(){
        $funcionario = Funcionario::all();
        $hn = Controle_Horario::where('ativo','0')->groupby('funcionario_id')->get();
        
        foreach($funcionario as $func){
            foreach($hn as $h){
                if($func->id == $h->funcionario_id){
                    $output = 0;
                    $output = $this->calcHora($h->entrada,$h->saida);
                    //dd($output);
                    $func->totalHoras += $output; 
                }
            }
        }
        return view('honorario',compact('funcionario'));
        //dd($funcionario);
    }

    function calcHora($hora1,$hora2){
        $horaInicial = strtotime($hora1);
        $horaFinal   = strtotime($hora2);

        $total = ($horaFinal - $horaInicial)/3600;
        return $total;
    }
 
}
