<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Cidade;
use App\Agenda;
use App\Pagamento;
use App\Controle_Horario;
use App\Funcionario;


use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function index()
    {
        $hoje = Carbon::now();
        $hoje = $hoje->format('Y-m-d');

        $agendas = Agenda::where('data', $hoje)->limit(3)->get();
        $qntAgenda = Agenda::where('data', $hoje)->count();
        $qntAgenda = $qntAgenda - count($agendas);

        if (count($agendas)<3) {
            $proximasAgendas = Agenda::where('data', '>', $hoje)->limit(3-count($agendas))->get();
            $agendas = $agendas->merge($proximasAgendas);
        }

        $pagamentos = Pagamento::where('vencimento', $hoje)->get();
        $qntPagamentos = Pagamento::where('vencimento', $hoje)->count();
        $qntPagamentos = $qntPagamentos - count($pagamentos);
        if (count($pagamentos)<3) {
            $proximosPagamentos = Pagamento::where('vencimento', '>', $hoje)->limit(3-count($pagamentos))->get();
            $pagamentos = $pagamentos->merge($proximosPagamentos);
        }
        
        return view('base/home',compact('agenda','pagamento','agendas','pagamentos','qntAgenda','qntPagamentos'));
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
