@extends('base')

@section('titulo', 'Fornecedores')

@section('content')
<ol class="breadcrumb">
		  <li><a href="{{url('/')}}">Início</a></li>
		  <li class="active">Fornecedor</li>
		</ol>
	@if (count($fornecedores) > 0)
		<table class="table table-responsive table-striped">
		<thead>
		    <tr>
		      <th>#</th>
		      <th>Nome</th>
			  <th class='t-center'>Ações</th>
		    </tr>
		</thead>
		<tbody>
	@foreach($fornecedores as $forn)
	<tr>
			<td>{{$forn->id}}</td>
			<td>{{$forn->nome}}</td>
			<td class="t-center">
				<a href="{{url('fornecedor/'.$forn->id.'/edit')}}" class='btn btn-primary btn-sm'><i class="fa fa-pencil"></i> Editar</a>
				<a href="{{url('fornecedor/'.$forn->id.'/destroy')}}" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Excluir</a>
			</td>
			</tr>
	@endforeach
	</tbody>
	</table>
	@else 
		<div class="alert alert-danger" style="text-align: center;">
			Não há fornecedores cadastrados. <br> <strong><a href="{{url('fornecedor/create')}}" class="btn btn-default">Adicionar</a></strong>
		</div>
	@endif
@endsection
