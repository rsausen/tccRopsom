<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AgendaRequest;

use App\Agenda;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class AgendaController extends Controller
{
    public function index()
    {
        //$agendas = Agenda::orderBy("data","asc")->paginate(6);
        $hoje = Carbon::now();
        $hoje = $hoje->format('Y-m-d');
        $agendasHoje = Agenda::where('data', "=", $hoje)->get();
        $agendasPassado = Agenda::where('data', "<", $hoje)->get();
        $agendasFuturo = Agenda::where('data', ">", $hoje)->get();

        $aux = $agendasHoje->merge($agendasFuturo);
        $agendas = $aux->merge($agendasPassado);


        $perPage = 6;
        $currentPage = Input::get('page') ?: 1;
        $slice_init = ($currentPage == 1) ? 0 : (($currentPage*$perPage)-$perPage);
        $pagedData = $agendas->slice($slice_init, $perPage)->all();
        $agendas = new LengthAwarePaginator($pagedData, count($agendas), $perPage, $currentPage);
        $agendas ->setPath('agenda');

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
        return back()->with('status', 'Agenda excluída com sucesso!');
    }
}
