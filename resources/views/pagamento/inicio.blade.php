@extends('base')

@section('titulo', 'Pagamentos')

@section('content')
<ol class="breadcrumb">
		  <li><a href="{{url('/')}}">Início</a></li>
		  <li class="active">Pagamento</li>
		</ol>
		<div class='col-sm-12 col-lg-12'>
			<a href="{{url('pagamento/create')}}" type="button" class='btn btn-default adicionar pull-right'>Adicionar</a>
		</div>
		<table class="table table-striped">
		<thead>
		    <tr>
		      <th>#</th>
		      <th>Nome</th>
		      <th>Editar</th>
		      <th>Excluir</th>
		    </tr>
		</thead>
		<tbody>
		@foreach($pagamentos as $pag)
			<tr>
			<td>{{$pag->id}}</td>
			<td>{{$pag->nome}}</td>
			<td><a href="{{url('pagamento/'.$pag->id.'/edit')}}" class='btn btn-default'>Editar</a></td>
			<td>
				{!! Form::open(['route'=>['pagamento.destroy',$pag->id], 'method'=>'delete', 'onsubmit' => 'return ConfirmDelete()'])!!}
				{!! Form::submit('Excluir',['class' => 'btn btn-default']) !!}
				{!! Form::close() !!}
			</td>
			</tr>
		@endforeach
	</tbody>
	</table>
@endsection
