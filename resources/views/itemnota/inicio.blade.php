@extends('base')

@section('content')
		<ol class="breadcrumb">
		  <li><a href="{{url('/')}}">Início</a></li>
		  <li><a href="{{url('nota/')}}">Nota</a></li>
		  <li class="active">Item Nota Fiscal</li>
		</ol>
		@if (count($errors) > 0)
		      <div class="alert alert-danger">
		          <ul>
		              @foreach ($errors->all() as $error)
		                  <li>{{ $error }}</li>
		              @endforeach
		          </ul>
		      </div>
		@endif
		{!! Form::open(array('url' => 'item/create')) !!}
			<input type="hidden" value="{{ $nota }}" name="nota_id">
		    <div class="form-group">
		    {!! Form::label('produto', 'Produto') !!}
		    {!! Form::select('produto_id', $produtos, null,['class' => 'form-control']) !!}
		    </div>
		    <div class="form-group">
		    {!! Form::label('preco', 'Valor') !!}
		    {!! Form::text('preco', null, ['class' => 'form-control', 'placeholder' => 'Informe a Valor do Produto', 'id'=>'valor']) !!}
		    </div>
		    <div class="form-group">
		    {!! Form::label('quantidade', 'Quantidade') !!}
		    {!! Form::text('quantidade', null,['class' => 'form-control', 'placeholder' => 'Informe a Quantidade do Produto']) !!}
		    </div>
		    {!! Form::submit('Cadastrar',['class' => 'btn btn-default btn-add']) !!}
		{!! Form::close() !!}
		<table class="table table-striped">
		<thead>
		    <tr>
		      <th>#</th>
		      <th>Produto</th>
		      <th>Preço</th>
		      <th>Editar</th>
		      <th>Excluir</th>
		    </tr>
		</thead>
		<tbody>
	@foreach($itens as $item)
	<tr>
			<td>{{$item->id}}</td>
			<td>{{$item->produtos->nome}}</td>
			<td>R$ {{ number_format($item->preco,2,',','.') }}</td>
			<td><a href="{{url('item/'.$item->id.'/edit')}}" class='btn btn-default'>Editar</a></td>
			<td><a href="{{url('item/destroy/'.$item->id)}}" class='btn btn-default'>Excluir</a>
			</td>
			</tr>
	@endforeach
	</tbody>
	</table>
@endsection
