@extends('base')

@section('titulo', 'Adicionar Produto')

@section('content')
	<ol class="breadcrumb">
      <li><a href="{{url('/')}}">Início</a></li>
      <li><a href="{{url('/produto')}}">Produto</a></li>
      <li class="active">Novo Produto</li>
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
	{!! Form::open(array('url' => 'produto')) !!}
	    <div class="form-group">
	    {!! Form::label('nome', 'Nome') !!}
	    {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Informe o Nome do Produto']) !!}
	    </div>
	    {!! Form::submit('Cadastrar',['class' => 'btn btn-default btn-add']) !!}
	{!! Form::close() !!}
@endsection
