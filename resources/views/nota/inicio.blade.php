@extends('base')

@section('titulo', 'Notas')

@section('content')
<ol class="breadcrumb">
		  <li><a href="{{url('/')}}">Início</a></li>
		  <li class="active">Nota Fiscal</li>
		</ol>
		<div class='col-sm-12 col-lg-12'>
			<a href="{{url('nota/create')}}" type="button" class='btn btn-default adicionar pull-right'>Adicionar</a>
		</div>
		<table class="table table-striped">
		<thead>
		    <tr>
		      <th>#</th>
		      <th>Preço</th>
		      <th>Data</th>
		      <th>Itens</th>
		      <th>Editar</th>
		      <th>Excluir</th>
		    </tr>
		</thead>
		<tbody>
	@foreach($notas as $not)
	<tr>
			<td>{{$not->id}}</td>
			<td>R$ {{ number_format($not->total,2,',','.') }}</td>
			<td>{{$not->data}}</td>
			<td><a href="{{url('item/'.$not->id)}}" class='btn btn-default'>Adicionar</a></td>
			<td><a href="{{url('nota/'.$not->id.'/edit')}}" class='btn btn-default'>Editar</a></td>
			<td>
				{!! Form::open(['route'=>['nota.destroy',$not->id], 'method'=>'delete'])!!}
				{!! Form::submit('Excluir',['class' => 'btn btn-default']) !!}
				{!! Form::close() !!}
			</td>
			</tr>
	@endforeach
	</tbody>
	</table>
@endsection
