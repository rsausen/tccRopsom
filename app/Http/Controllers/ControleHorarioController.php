<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Controle_Horario;

use App\Funcionario;

use Illuminate\Support\Facades\Redirect;

class ControleHorarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::lists('nome','id');
        $horarios = Controle_Horario::orderBy("created_at","desc")->get();
        return view('controlehorario/inicio',compact("horarios","funcionarios"));
    }

    public function create()
    {
        $funcionarios = Funcionario::lists('nome','id');
        return view('controlehorario/create', compact('funcionarios'));
    }


    public function store(Request $request)
    {
        $funcionario = Controle_Horario::where('funcionario_id',$request->funcionario_id)->where('ativo','0')->get();
            foreach($funcionario as $f){
                if($f->saida == "00:00:00"){
                    return Redirect::back()->with('status', 'O funcionário já está trabalhando!');
                }
            }
        $dataLocal = date("Y-m-d");
        $horaLocal = date("H:i");
        $controle = array(
            'funcionario_id'=>$request->funcionario_id,
            'ativo'=>'1',
            'entrada'=>$horaLocal,
            'dataEntrada'=>$dataLocal
        );
        Controle_Horario::create($controle);
        return redirect("horario")->with('status', 'Contagem de horas iniciada!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $funcionarios = Funcionario::lists('nome','id');
        $horario = Controle_Horario::find($id);
        return view("controlehorario/edit",compact("horario","funcionarios"));
    }

    public function update(Request $request, $id)
    {
        Controle_Horario::find($id)->update($request->all());
        return redirect("horario")->with('status', 'Editado com sucesso!');
    }

    public function arquivar($id)
    {
        $dataLocal = date("Y-m-d");
        $horaLocal = date("H:i");
        $controle = array(
            'ativo'=>'0',
            'saida'=>$horaLocal,
            'dataSaida'=>$dataLocal
        );
        Controle_Horario::find($id)->update($controle);
        return redirect("horario")->with('status', 'Contagem de horas encerrada!');
    }

    function time_to_sec($time) {
        $hours = substr($time, 0, -6);
        $minutes = substr($time, -5, 2);
        $seconds = substr($time, -2);

        return $hours * 3600 + $minutes * 60 + $seconds;
    }

    function sec_to_time($seconds) {
        $hours = floor($seconds / 3600);
        $minutes = floor($seconds % 3600 / 60);
        $seconds = $seconds % 60;

        return sprintf("%d:%02d:%02d", $hours, $minutes, $seconds);
    }
    public function horas($funcID){
        $funcionario = Controle_Horario::where('funcionario_id',$funcID)->where('ativo','0')->get();
            foreach($funcionario as $f){
                if($f->saida == "00:00:00"){
                    return Redirect::back()->with('status', 'O funcionário ainda está trabalhando!');
                }
            }
        return view("controlehorario/pagamentos",compact("funcID"));
    }

    public function valorHora(Request $request){
        $func = Controle_Horario::where('funcionario_id',$request->funcID)->where('ativo','0')->get();
        $funcionario = Funcionario::find($request->funcID);
        $totalHrs = 0;
        $preco = str_replace('.','',$request->valor);
        $preco = str_replace(',','.',$preco);

        foreach($func as $f){
            if($f->dataSaida > $f->dataEntrada){
                $totalHrs += 86400 - ($this->time_to_sec($f->entrada));
                $totalHrs += $this->time_to_sec($f->saida);
                $f->horas = $this->time_to_sec($f->entrada);
            }else{                
                $totalHrs += ($this->time_to_sec($f->saida)) - ($this->time_to_sec($f->entrada));
                $f->horas = $this->time_to_sec($f->entrada);
            }
            $controle = array(
                'ativo'=>'1',
                'valor' => $preco,
            );
            Controle_Horario::where('funcionario_id',$request->funcID)->update($controle);
        }
        $totalHoras = $this->sec_to_time($totalHrs);
        
        $valorTotal = ($totalHrs / 3600) * $preco;

        return view("controlehorario/valores",compact("totalHoras","func", 'funcionario', 'valorTotal'));
    }

    public function destroy($id)
    {
        Controle_Horario::find($id)->delete();
        return redirect('horario');
    }
}
