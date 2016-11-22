@extends('base')
 
@section('titulo')
Adicionando itens à Nota
@endsection

@section('content')
		<ol class="breadcrumb">
		  <li><a href="{{url('/')}}">Início</a></li>
		  <li><a href="{{url('nota/')}}">Nota</a></li>
		  <li class="active">Novo Item</li>
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
	        <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-4 col-xs-offset-2">
	        {!! Form::submit('Cadastrar',['class' => 'btn btn-primary btn-block btn-add']) !!}
	        </div>
	        <div class="col-md-4 col-sm-4 col-xs-4">
	        <a href="{{URL::previous()}}" class="btn btn-danger btn-block">Cancelar</a> 
	        </div>
		{!! Form::close() !!}
		<table class="table table-striped">
		<thead>
		    <tr>
		      <th>#</th>
		      <th>Produto</th>
		      <th>Preço</th>
		      <th>Quantidade</th>
		      <th>Ações</th>
		    </tr>
		</thead>
		<tbody>
	@foreach($itens as $item)
	<tr>
			<td>{{$item->id}}</td>
			<td>{{$item->produtos->nome}}</td>
			<td>R$ {{ number_format($item->preco,2,',','.') }}</td>
			<td>{{$item->quantidade}}</td>
			<td><a href="{{url('item/'.$item->id.'/edit')}}" class='btn btn-sm btn-primary'><i class="fa fa-pencil"></i>  Editar</a>
			<a data-href="{{url('item/destroy/'.$item->id)}}" data-toggle="modal" data-target="#confirm-delete" class='btn btn-sm btn-danger'><i class="fa fa-trash"></i>  Excluir</a> 
			</td>
			</tr>
	@endforeach
	</tbody>
	</table>


	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Excluir Item Nota</h3>
            </div>
            <div class="modal-body">
                <h4>Você tem certeza que deseja excluir este item da nota? </h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok">Excluir</a>
            </div>
        </div>
    </div>
</div>
@endsection
