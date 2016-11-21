<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pagamento;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class PagamentoController extends Controller
{
    public function index()
    {
        $hoje = Carbon::now();
        $hoje = $hoje->format('Y-m-d');
        $pagamentosAtrasado = Pagamento::where('vencimento', "<", $hoje)->where("pago", "0")->get();
        $pagamentosHoje = Pagamento::where('vencimento', "=", $hoje)->get();
        $pagamentosPassado = Pagamento::where('vencimento', "!=", $hoje)->where("pago", "1")->orderBy('vencimento', 'asc')->get();
        $pagamentosPendente = Pagamento::where('vencimento', ">", $hoje)->where("pago", "0")->get();

        $aux = $pagamentosAtrasado->merge($pagamentosHoje);
        $aux = $aux->merge($pagamentosPendente);
        $pagamentos = $aux->merge($pagamentosPassado);

        $perPage = 6;
        $currentPage = Input::get('page') ?: 1;
        $slice_init = ($currentPage == 1) ? 0 : (($currentPage*$perPage)-$perPage);
        $pagedData = $pagamentos->slice($slice_init, $perPage)->all();
        $pagamentos = new LengthAwarePaginator($pagedData, count($pagamentos), $perPage, $currentPage);
        $pagamentos ->setPath('pagamento');
     
        //$pagamentos = Pagamento::orderBy("vencimento","asc")->paginate(6);
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
        return redirect("pagamento")->with('status', 'Pagamento cadastrado com sucesso!');
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
        return redirect("pagamento")->with('status', 'Pagamento alterado com sucesso!');;
    }

    public function destroy($id)
    {
        Pagamento::find($id)->delete();
        return back()->with('status', 'Pagamento excluído com sucesso!');
    }
}
