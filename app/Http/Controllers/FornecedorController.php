<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\FornecedorRequest;

use App\Fornecedor;

use App\Cidade;

use App\Estado;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::orderBy("created_at","desc")->get();
        return view('fornecedor/inicio',compact("fornecedores"));
    }

    public function create()
    {
        $cidades = Cidade::where('id_estado','21')->lists('nome','id');
        $estados = Estado::lists('nome','id');
        return view('fornecedor/create',compact('cidades','estados'));
    }


    public function store(FornecedorRequest $request)
    {
        Fornecedor::create($request->all());
        return redirect("fornecedor");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $cidades = Cidade::lists('nome','id');
        $estados = Estado::lists('nome','id');
        $fornecedor = Fornecedor::find($id);
        return view("fornecedor/edit",compact("fornecedor","cidades","estados"));
    }

    public function update(FornecedorRequest $request, $id)
    {
        Fornecedor::find($id)->update($request->all());
        return redirect("fornecedor");
    }

    public function destroy($id)
    {
        Fornecedor::find($id)->delete();
        return redirect('fornecedor');
    }
}
