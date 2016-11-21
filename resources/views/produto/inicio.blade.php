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
		      <th class='t-center'>Ações</th>
		    </tr>
		</thead>
		<tbody>
	@foreach($produtos as $prod)
	<tr>
			<td>{{$prod->id}}</td>
			<td>{{$prod->nome}}</td>
			<td class="t-center">
				<a href="{{url('produto/'.$prod->id.'/edit')}}" class='btn btn-primary btn-sm'><i class="fa fa-pencil"></i> Editar</a>
				<a href="{{url('produto/'.$prod->id.'/destroy')}}" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Excluir</a>
			</td>
	</tr>
	@endforeach
	</tbody>
	</table>
@endsection
