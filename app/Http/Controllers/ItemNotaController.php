<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ItemNotaRequest;
use App\Produto;
use App\Item_Nota;
use App\Nota;

class ItemNotaController extends Controller
{
   public function index($nota)
    {
        $itens = Item_Nota::where('nota_id',$nota)->orderBy("created_at","desc")->get();
        $produtos = Produto::lists('nome','id');
        return view('itemnota/inicio',compact("itens","nota","produtos"));
    }


    public function store(ItemNotaRequest $request)
    {
        $preco = str_replace('.','',$request->preco);
        $preco = str_replace(',','.',$preco);
        $item = array(
            'produto_id' => $request->produto_id,
            'preco' => $preco,
            'nota_id' => $request->nota_id,
            'quantidade' => $request->quantidade
        );
        $aux_id = Item_Nota::create($item);

        $itens = Item_Nota::where('nota_id',$request->nota_id)->get();

        //total da nota
        $total = 0;
        foreach($itens as $it){
            $aux = $it->quantidade * $it->preco;
            $total += $aux;
        }
        $nota = array(
            'total' => $total
        );
        Nota::find($request->nota_id)->update($nota);
        return redirect("item/".$request->nota_id);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = Item_Nota::find($id);
        $item->preco = str_replace('.',',',$item->preco);
        $produtos = Produto::lists('nome','id');
        return view("itemnota/edit",compact("item","produtos"));
    }

    public function update(ItemNotaRequest $request)
    {
        $nt = Item_Nota::find($request->id);
        $preco = str_replace('.','',$request->preco);
        $preco = str_replace(',','.',$preco);
        $item = array(
            'produto_id' => $request->produto_id,
            'preco' => $preco,
            'nota_id' => $request->nota_id,
            'quantidade' => $request->quantidade
        );
        Item_Nota::find($request->id)->update($item);

        $itens = Item_Nota::where('nota_id',$request->nota_id)->get();

        //total da nota
        $total = 0;
        foreach($itens as $it){
            $aux = $it->quantidade * $it->preco;
            $total += $aux;
        }
        $nota = array(
            'total' => $total
        );
        Nota::find($request->nota_id)->update($nota);
        return redirect("item/".$nt->nota_id);
    }

    public function destroy($id)
    {
        $nt = Item_Nota::find($id);
        Item_Nota::find($id)->delete();

        $itens = Item_Nota::where('nota_id',$nt->nota_id)->get();
        $total = 0;
        foreach($itens as $it){
            $aux = $it->quantidade * $it->preco;
            $total += $aux;
        }
        $nota = array(
            'total' => $total
        );
        Nota::find($nt->nota_id)->update($nota);
        return redirect("item/".$nt->nota_id);
    }
}
