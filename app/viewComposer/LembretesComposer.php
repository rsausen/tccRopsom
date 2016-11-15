<?php
// app/viewComposers/CategoryComposer.php
use App\Agenda;
use App\Pagamento;
class CategoryComposer {
 
    public function compose($view)
    {
    
 		$data = Date('Y-m-d');
    	$qntAgenda = Agenda::where('data',$data)->count();
    	$qntPagamento = Pagamento::where('vencimento', '<', $data)->where('pago','0')->count();
        $view->with(compact('qntPagamento', 'qntAgenda'));
    }
 
}