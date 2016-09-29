<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pagamento;

class PagamentoController extends Controller
{
    public function index()
    {
        $pagamentos = Pagamento::orderBy("created_at","desc")->get();
        return view('pagamento/inicio',compact("pagamentos"));
    }

    public function create()
    {
        return view('pagamento/create');
    }


    public function store(Request $request)
    {
        //dd($request->all());
        $preco = str_replace('.','',$request->valor);
        $preco = str_replace(',','.',$preco);
        $data = implode('-', array_reverse(explode('/', $request->vencimento)));
        if(!$request->pago){
            $pago = 0;
        }else{
            $pago = 1;
        }
        $pagamento = array(
            'vencimento'=>$data,
            'nome'=>$request->nome,
            'valor'=>$preco,
            'pago'=>$pago
        );
        //dd($pagamento);
        Pagamento::create($pagamento);
        return redirect("pagamento");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $pagamento = Pagamento::find($id);
        $pagamento->valor = str_replace('.',',',$pagamento->valor);
        return view("pagamento/edit",compact("pagamento"));
    }

    public function update(Request $request, $id)
    {
        $data = implode('-', array_reverse(explode('/', $request->vencimento)));
        if(!$request->pago){
            $pago = 0;
        }else{
            $pago = 1;
        }
        $preco = str_replace('.','',$request->valor);
        $preco = str_replace(',','.',$preco);
        $pagamento = array(
            'vencimento'=>$data,
            'nome'=>$request->nome,
            'valor'=>$preco,
            'pago'=>$pago
        );
        Pagamento::find($id)->update($pagamento);
        return redirect("pagamento");
    }

    public function destroy($id)
    {
        Pagamento::find($id)->delete();
        return redirect('pagamento');
    }
}
