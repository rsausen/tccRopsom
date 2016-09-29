@extends('base')

@section('titulo', 'Editar Nota')

@section('content')
  <ol class="breadcrumb">
    <li><a href="{{url('/')}}">Início</a></li>
    <li><a href="{{url('/nota')}}">Nota Fiscal</a></li>
    <li class="active">Editar Nota</li>
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
  {!! Form::open(array('url' => 'nota/'.$nota->id,'method'=>'put')) !!}
     	<div class="form-group">
      {!! Form::label('data', 'Data da Nota') !!}
      {!! Form::date('data', date('Y-m-d', strtotime($nota->data)), ['class' => 'form-control', 'id' => 'null']) !!}
      </div>
      <div class="form-group">
      {!! Form::label('fornecedor', 'Fornecedor') !!}
      {!! Form::select('fornecedor_id', $fornecedores, $nota->fornecedor_id,['class' => 'form-control']) !!}
      </div>
      {!! Form::submit('Editar',['class' => 'btn btn-default btn-add']) !!}
  {!! Form::close() !!}
@endsection