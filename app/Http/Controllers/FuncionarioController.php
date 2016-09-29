<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\FuncionarioRequest;

use App\Funcionario;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::orderBy("created_at","desc")->get();
        return view('funcionario/inicio',compact("funcionarios"));
    }

    public function create()
    {
        return view('funcionario/create');
    }


    public function store(FuncionarioRequest $request)
    {
        $funcionario = array(
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'nome_responsavel' => $request->nome_responsavel,
            'telefone_responsavel' => $request->telefone_responsavel,
            'endereco' => $request->endereco,
        );
        Funcionario::create($funcionario);
        return redirect("funcionario");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $funcionario = Funcionario::find($id);
        return view("funcionario/edit",compact("funcionario"));
    }

    public function update(FuncionarioRequest $request, $id)
    {
        $funcionario = array(
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'nome_responsavel' => $request->nome_responsavel,
            'telefone_responsavel' => $request->telefone_responsavel,
            'endereco' => $request->endereco,
        );
        Funcionario::find($id)->update($funcionario);
        return redirect("funcionario");
    }

    public function destroy($id)
    {
        Funcionario::find($id)->delete();
        return redirect('funcionario');
    }
}
