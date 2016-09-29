@extends('base')

@section('titulo', 'Editar Pagamento')

@section('content')
<ol class="breadcrumb">
	  <li><a href="{{url('/')}}">Início</a></li>
	  <li><a href="{{url('/pagamento')}}">Pagamento</a></li>
	  <li class="active">Editar Registro</li>
</ol>
{!! Form::open(array('url' => 'pagamento/'.$pagamento->id,'method'=>'put', 'onsubmit' => 'return ConfirmEdit()')) !!}
    <div class="form-group">
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', $pagamento->nome, ['class' => 'form-control', 'placeholder' => 'Informe o Nome do Pagamento']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('vencimento', 'Data de Vencimento') !!}
    {!! Form::date('vencimento', date('Y-m-d', strtotime($pagamento->vencimento)), ['class' => 'form-control', 'id' => 'null']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('valor', 'Valor') !!}
    {!! Form::text('valor', $pagamento->valor, ['class' => 'form-control', 'placeholder' => 'Informe o Valor', 'id' => 'valor']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('pago', 'Pago') !!}
    {!! Form::checkbox('pago', 1,$pagamento->pago) !!}
    </div>
    {!! Form::submit('Editar',['class' => 'btn btn-default btn-add']) !!}
{!! Form::close() !!}
@endsection
