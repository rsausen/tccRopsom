@extends('base')

@section('titulo', 'Adicionar Nota')

@section('content')
  <ol class="breadcrumb">
      <li><a href="{{url('/')}}">Início</a></li>
      <li><a href="{{url('/nota')}}">Nota Fiscal</a></li>
      <li class="active">Nova Nota</li>
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
  {!! Form::open(array('url' => 'nota','files'=> true)) !!}
      <div class="form-group">
      {!! Form::label('data', 'Data da Nota') !!}
      {!! Form::date('data', null, ['class' => 'form-control', 'placeholder' => 'Informe a Data da Nota', 'id'=>'datepicker']) !!}
      </div>
      <div class="form-group">
      {!! Form::label('fornecedor', 'Fornecedor') !!}
      {!! Form::select('fornecedor_id', $fornecedores, null,['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
      {!! Form::label('pdfnota', 'Anexar nota') !!}
      {!! Form::file('pdfnota', ['class' => 'form-control']) !!}
      </div>
      <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-4 col-xs-offset-2">
      {!! Form::submit('Cadastrar',['class' => 'btn btn-primary btn-block btn-add']) !!}
      </div>
      <div class="col-md-4 col-sm-4 col-xs-4">
      <a href="{{URL::previous()}}" class="btn btn-danger btn-block">Cancelar</a> 
      </div>
  {!! Form::close() !!}
@endsection
