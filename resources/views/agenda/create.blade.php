@extends('base')
@section('titulo', 'Adicionar Agenda')
@section('content')
<ol class="breadcrumb">
	<li><a href="{{url('/')}}">Início</a></li>
	<li><a href="{{url('/agenda')}}">Agenda</a></li>
	<li class="active">Novo Registro</li>
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
{!! Form::open(array('url' => 'agenda')) !!}
<div class="form-group col-md-12">
	{!! Form::label('nome', 'Título') !!}
	{!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Informe o Título do Lembrete']) !!}
</div>
<div class="form-group col-md-12">
	{!! Form::label('descricao', 'Descrição') !!}
	{!! Form::textarea('descricao', null,['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
</div>
<div class="form-group col-md-6 col-xs-12">
	{!! Form::label('data', 'Data') !!}
	{!! Form::date('data', null,['class' => 'form-control', 'placeholder' => 'Informe a Data','id'=>'datepicker']) !!}
</div>
<div class="form-group col-md-6 col-xs-12">
	{!! Form::label('hora', 'Hora') !!}
	{!! Form::text('hora', null,['class' => 'form-control', 'placeholder' => 'Informe a Hora', 'id'=>'hora']) !!}
</div>
<div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-4 col-xs-offset-2">
	{!! Form::submit('Cadastrar',['class' => 'btn btn-primary btn-block btn-add']) !!}
</div>
<div class="col-md-4 col-sm-4 col-xs-4">
	<a href="{{URL::previous()}}" class="btn btn-danger btn-block">Cancelar</a> 
</div>
{!! Form::close() !!}
@endsection
