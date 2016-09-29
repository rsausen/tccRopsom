@extends('base')

@section('titulo', 'Produtos')

@section('content')
<ol class="breadcrumb">
		  <li><a href="{{url('/')}}">Início</a></li>
		  <li class="active">Produto</li>
		</ol>
		<div class='col-sm-12 col-lg-12'>
			<a href="{{url('produto/create')}}" type="button" class='btn btn-default adicionar pull-right'>Adicionar</a>
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
	@foreach($produtos as $prod)
	<tr>
			<td>{{$prod->id}}</td>
			<td>{{$prod->nome}}</td>
			<td><a href="{{url('produto/'.$prod->id.'/edit')}}" class='btn btn-default'>Editar</a></td>
			<td>
				{!! Form::open(['route'=>['produto.destroy',$prod->id], 'method'=>'delete'])!!}
				{!! Form::submit('Excluir',['class' => 'btn btn-default']) !!}
				{!! Form::close() !!}
			</td>
			</tr>
	@endforeach
	</tbody>
	</table>
@endsection
