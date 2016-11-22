 @extends('base')

@section('content')
<div class="alert alert-info" role="alert" style="text-align: center;">
 	<h3 style="margin-top: 0px">Pronto!</h3>
 	O valor total do pagamento para {{$funcionario->nome}} é de <strong>{{number_format($valorTotal, 2, ',', '.')}}</strong>, referente à {{$totalHoras}} horas trabalhadas.
 	<br>
 	<a href="{{url('/horario')}}" class="btn btn-info">Voltar</a>
</div>
@endsection