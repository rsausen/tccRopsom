@extends('base')

@section('titulo', 'Novo Funcionário')

@section('content')
  <ol class="breadcrumb">
      <li><a href="{{url('/')}}">Início</a></li>
      <li><a href="{{url('/funcionario')}}">Funcionário</a></li>
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
  {!! Form::open(array('url' => 'funcionario')) !!}
  	  <div class="form-group">
      {!! Form::label('nome', 'Nome') !!}
      {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Informe o Nome']) !!}
      </div>
      <div class="form-group">
      {!! Form::label('telefone', 'Telefone') !!}
      {!! Form::text('telefone', null, ['class' => 'form-control', 'placeholder' => 'Informe o Telefone']) !!}
      </div>
      <div class="form-group">
      {!! Form::label('nome_responsavel', 'Nome do Responsável') !!}
      {!! Form::text('nome_responsavel', null, ['class' => 'form-control', 'placeholder' => 'Informe o Nome do Responsável']) !!}
      </div>
      <div class="form-group">
      {!! Form::label('telefone_responsavel', 'Telefone do Responsável') !!}
      {!! Form::text('telefone_responsavel', null, ['class' => 'form-control', 'placeholder' => 'Informe o Telefone do Responsável']) !!}
      </div>
      <div class="form-group">
      {!! Form::label('endereco', 'Endereço') !!}
      {!! Form::text('endereco', null, ['class' => 'form-control', 'placeholder' => 'Informe o Endereço']) !!}
      </div>
      {!! Form::submit('Cadastrar',['class' => 'btn btn-default btn-add']) !!}
  {!! Form::close() !!}
@endsection
