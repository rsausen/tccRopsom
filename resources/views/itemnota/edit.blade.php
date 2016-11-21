@extends('base')

@section('content')
    <ol class="breadcrumb">
      <li><a href="{{url('/')}}">Início</a></li>
      <li><a href="{{url('/item/'.$item->nota_id)}}">Item Nota Fiscal</a></li>
      <li class="active">Editar Item</li>
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
    {!! Form::open(array('url' => 'item/update')) !!}
    	<input type="hidden" value="{{ $item->nota_id }}" name="nota_id">
        <input type="hidden" value="{{ $item->id }}" name="id">
        <div class="form-group">
        {!! Form::label('produto', 'Produto') !!}
        {!! Form::select('produto_id', $produtos, $item->produto_id,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('preco', 'Valor') !!}
        {!! Form::text('preco', $item->preco, ['class' => 'form-control', 'placeholder' => 'Informe a Valor do Produto', 'id'=>'valor']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('quantidade', 'Quantidade') !!}
        {!! Form::text('quantidade', $item->quantidade,['class' => 'form-control', 'placeholder' => 'Informe a Quantidade do Produto']) !!}
        </div>
        <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-4 col-xs-offset-2">
        {!! Form::submit('Editar',['class' => 'btn btn-primary btn-block btn-add']) !!}
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
        <a href="{{URL::previous()}}" class="btn btn-danger btn-block">Cancelar</a> 
        </div>
    {!! Form::close() !!}
@endsection