<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Nota;
use App\Pagamento;
use App\Fornecedor;
use App\Produto;
use App\Item_Nota;

class RelatoriosController extends Controller
{
	function nota(Request $request){
    	$notas = Nota::with('itens')->get();
    	$total = $notas->sum('total');
        $produtos = Produto::orderBy("nome","asc")->lists("nome","id");
        $fornecedores = Fornecedor::orderBy("nome","asc")->lists("nome","id");

    	return view('relatorios/relatorios',compact('notas','total','fornecedores','produtos'));
    }

    function totalNota(Request $request){
        $results = Nota::orderBy('id','desc');
        if ($request->dtInicio){
            $dt1 = implode('-', array_reverse(explode('/', $request->dtInicio)));
            $results->where('data','>=',$dt1);
        }
        if ($request->dtFinal){
            $dt2 = implode('-', array_reverse(explode('/', $request->dtFinal)));
           $results->where('data','<=',$dt2);
        }
        if ($request->fornecedor){
            $results->where('fornecedor_id',$request->fornecedor);
        }
        if ($request->produto){
            $aux = Item_Nota::where('produto_id',$request->produto)->select(['nota_id'])->distinct()->get();
            $string = array();
            foreach ($aux as $a){
                $string[] = (string)$a->nota_id;
            }
            $results->whereIn('id',$aux);
        }
        $total = $results->sum('total');
        $notas = $results->get();
        
        $produtos = Produto::orderBy("nome","asc")->lists("nome","id");
        $fornecedores = Fornecedor::orderBy("nome","asc")->lists("nome","id");
    	
    	return view('relatorios/relatorios',compact('notas','total','fornecedores','produtos'));
    }

    function pagamentos(Request $request){
    	$pagamentos = Pagamento::orderBy('vencimento','desc')->get();
    	$total = $pagamentos->sum('valor');

    	return view('relatorios/pagamentos',compact('pagamentos','total'));
    }

    function totalPagamentos(Request $request){
    	//dd($request->all());
    	$dt1 = implode('-', array_reverse(explode('/', $request->dtInicio)));
    	$dt2 = implode('-', array_reverse(explode('/', $request->dtFinal)));
    	$pagamentos = Pagamento::where('vencimento','>=',$dt1)->where('vencimento','<=',$dt2)->orderBy('created_at','desc')->get();
    	$total = $pagamentos->sum('valor');
    	
    	return view('relatorios/pagamentos',compact('pagamentos','total'));
    }

    function produtos(Request $request){
        $produtos = Produto::where('id','<','0')->get();
        $selectProdutos = Produto::lists('nome','id');
        $total = null;
        $quantidade = 0;

        return view('relatorios/produtos',compact('produtos','total','selectProdutos','quantidade'));
    }

    function totalProdutos(Request $request){
       
       $results = Nota::orderBy('id','asc');

        if ($request->dtInicio){
            $dt1 = implode('-', array_reverse(explode('/', $request->dtInicio)));
            $results->where('data','>=',$dt1);
        }
        if ($request->dtFinal){
            $dt2 = implode('-', array_reverse(explode('/', $request->dtFinal)));
           $results->where('data','<=',$dt2);
        }
        if ($request->produto){
            $aux = Item_Nota::where('produto_id',$request->produto)->get();
            $string = array();
            foreach ($aux as $a){
                $string[] = (string)$a->nota_id;
            }
            $notas = $results->whereIn('id',$string)->get();
            $prods = array();
            foreach ($notas as $a){
                $prods[] = (string)$a->id;
            }

            $itens = Item_Nota::whereIn('nota_id',$prods)->where('produto_id',$request->produto)->get();
        }
        $quantidade = $itens->sum('quantidade');
        $total = 0;
        foreach($itens as $it){
            $aux = $it->quantidade * $it->preco;
            $total += $aux;
        }
        $notas = $results->get();
        $selectProdutos = Produto::lists('nome','id');
        $produtos = Produto::where('id',$request->produto)->get();
        
        return view('relatorios/produtos',compact('notas','total','produtos','selectProdutos','quantidade'));
    }

}
