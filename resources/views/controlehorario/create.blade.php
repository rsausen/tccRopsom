@extends('base')

@section('content')
    @if (session('status'))
    <div class="alert alert-success">
    {{ session('status') }}
    </div>
    @endif
<ol class="breadcrumb">
      <li><a href="{{url('/')}}">Início</a></li>
      <li><a href="{{url('/horario')}}">Horário</a></li>
      <li class="active">Novo Horário</li>
    </ol>
{!! Form::open(array('url' => 'horario')) !!}
    <div class="form-group">
    {!! Form::label('funcionario_id', 'Funcionário') !!}
    {!! Form::select('funcionario_id', $funcionarios,null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('dataEntrada', 'Data de Entrada') !!}
    {!! Form::date('dataEntrada', null, ['class' => 'form-control', 'placeholder' => 'Informe a data de entrada', 'id'=>'dataEntrada']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('entrada', 'Hora de Entrada') !!}
    {!! Form::text('entrada', null, ['class' => 'form-control', 'placeholder' => 'Informe a hora de entrada', 'id'=>'entrada']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('dataSaida', 'Data de Saída') !!}
    {!! Form::date('dataSaida', null, ['class' => 'form-control', 'placeholder' => 'Informe a data de saída', 'id'=>'dataSaida']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('saida', 'Hora de Saída') !!}
    {!! Form::text('saida', null, ['class' => 'form-control', 'placeholder' => 'Informe a hora de saída', 'id'=>'saida']) !!}
    </div>
    <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-4 col-xs-offset-2">
    {!! Form::submit('Cadastrar',['class' => 'btn btn-primary btn-block btn-add']) !!}
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4">
    <a href="{{URL::previous()}}" class="btn btn-danger btn-block">Cancelar</a> 
    </div>
{!! Form::close() !!}
@endsection
