@extends('base')

@section('titulo', 'Novo Pagamento')

@section('content')
<ol class="breadcrumb">
	  <li><a href="{{url('/')}}">Início</a></li>
	  <li><a href="{{url('/pagamento')}}">Pagamento</a></li>
	  <li class="active">Novo Registro</li>
	</ol>
{!! Form::open(array('url' => 'pagamento', 'onsubmit' => 'return ConfirmCreate()')) !!}
	<div class="form-group">
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Informe o Nome do Pagamento']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('vencimento', 'Data de Vencimento') !!}
    {!! Form::date('vencimento', null, ['class' => 'form-control', 'placeholder' => 'Informe a Data de Vencimento', 'id'=>'datepicker']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('valor', 'Valor') !!}
    {!! Form::text('valor', null, ['class' => 'form-control', 'placeholder' => 'Informe o Valor', 'id'=>'valor']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('pago', 'Pago') !!}
    {!! Form::checkbox('pago', 1,null) !!}
    </div>
    {!! Form::submit('Cadastrar',['class' => 'btn btn-default btn-add']) !!}
{!! Form::close() !!}
@endsection
