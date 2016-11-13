<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AgendaRequest;

use App\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::orderBy("data","asc")->paginate(6);
        return view('agenda/inicio',compact("agendas"));
    }

    public function create()
    {
        return view('agenda/create');
    }


    public function store(AgendaRequest $request)
    {
        $data = implode('-', array_reverse(explode('/', $request->data)));
        $agenda = array(
            'data'=>$data,
            'nome'=>$request->nome,
            'descricao'=>$request->descricao,
            'hora'=>$request->hora
            );
        Agenda::create($agenda);
        return redirect("agenda")->with('status', 'Cadastrado com sucesso!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $agenda = Agenda::find($id);

        return view("agenda/edit",compact("agenda"));
    }

    public function update(AgendaRequest $request, $id)
    {
        $data = implode('-', array_reverse(explode('/', $request->data)));
        $agenda = array(
            'data'=>$data,
            'nome'=>$request->nome,
            'descricao'=>$request->descricao,
            'hora'=>$request->hora
            );
        Agenda::find($id)->update($agenda);
        return redirect("agenda")->with('status', 'Editado com sucesso!');
    }

    public function destroy($id)
    {
        Agenda::find($id)->delete();
        return redirect('agenda')->with('status', 'Agenda excluída com sucesso!');
    }
}
