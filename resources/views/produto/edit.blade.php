@extends('base')

@section('titulo', 'Editar Produto')

@section('content')
	<ol class="breadcrumb">
      <li><a href="{{url('/')}}">Início</a></li>
      <li><a href="{{url('/produto')}}">Produto</a></li>
      <li class="active">Editar Produto</li>
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
	{!! Form::open(array('url' => 'produto/'.$produto->id,'method'=>'put')) !!}
		<div class="form-group">
	    {!! Form::label('nome', 'Nome') !!}
	    {!! Form::text('nome', $produto->nome, ['class' => 'form-control', 'placeholder' => 'Informe o Nome']) !!}
	  </div>
      <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-4 col-xs-offset-2">
      {!! Form::submit('Editar',['class' => 'btn btn-primary btn-block btn-add']) !!}
      </div>
      <div class="col-md-4 col-sm-4 col-xs-4">
      <a href="{{URL::previous()}}" class="btn btn-danger btn-block">Cancelar</a> 
      </div>
	{!! Form::close() !!}
@endsection
