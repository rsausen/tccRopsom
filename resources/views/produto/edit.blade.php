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
	    {!! Form::text('nome', $produto->nome) !!}
	    </div>
	    {!! Form::submit('Editar',['class' => 'btn btn-default btn-add']) !!}
	{!! Form::close() !!}
@endsection
