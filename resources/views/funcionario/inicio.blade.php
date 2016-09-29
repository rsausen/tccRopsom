@extends('base')

@section('titulo','Funcionários')

@section('content')
<ol class="breadcrumb">
		  <li><a href="{{url('/')}}">Início</a></li>
		  <li class="active">Funcionário</li>
		</ol>
		<div class='col-sm-12 col-lg-12'>
			<a href="{{url('funcionario/create')}}" type="button" class='btn btn-default adicionar pull-right'>Adicionar</a>
		</div>
		<table class="table table-striped">
		<thead>
		    <tr>
		      <th>#</th>
		      <th>Nome</th>
		      <th>Telefone</th>
		      <th>Editar</th>
		      <th>Excluir</th>
		    </tr>
		</thead>
		<tbody>
	@foreach($funcionarios as $func)		
		<tr>
			<td>{{$func->id}}</td>
			<td>{{$func->nome}}</td>
			<td>{{$func->telefone}}</td>
			<td><a href="{{url('funcionario/'.$func->id.'/edit')}}" class='btn btn-default'>Editar</a></td>
			<td>
				{!! Form::open(['route'=>['funcionario.destroy',$func->id], 'method'=>'delete'])!!}
				{!! Form::submit('Excluir',['class' => 'btn btn-default']) !!}
				{!! Form::close() !!}
			</td>
			</tr>
	@endforeach
	</tbody>
	</table>
@endsection
