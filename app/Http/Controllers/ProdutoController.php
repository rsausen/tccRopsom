<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProdutoRequest;

use App\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::orderBy("created_at","desc")->get();
        return view('produto/inicio',compact("produtos"));
    }

    public function create()
    {
        return view('produto/create');
    }


    public function store(ProdutoRequest $request)
    {
        Produto::create($request->all());
        return redirect("produto");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $produto = Produto::find($id);
        return view("produto/edit",compact("produto"));
    }

    public function update(ProdutoRequest $request, $id)
    {
        Produto::find($id)->update($request->all());
        return redirect("produto");
    }

    public function destroy($id)
    {
        Produto::find($id)->delete();
        return redirect('produto');
    }
}
