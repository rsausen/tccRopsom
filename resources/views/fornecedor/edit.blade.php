@extends('base')

@section('titulo', 'Editar Fornecedor')

@section('content')
    <ol class="breadcrumb">
      <li><a href="{{url('/')}}">Início</a></li>
      <li><a href="{{url('/fornecedor')}}">Fornecedor</a></li>
      <li class="active">Editar Registro</li>
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
{!! Form::open(array('url' => 'fornecedor/'.$fornecedor->id,'method'=>'put')) !!}


 <div class="form-group col-md-12">
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', $fornecedor->nome, ['class' => 'form-control', 'placeholder' => 'Informe o Nome do Fornecedor']) !!}
    </div>
    <div class="form-group col-md-12">
    {!! Form::label('cnpj', 'CNPJ') !!}
    {!! Form::text('cnpj', $fornecedor->cnpj, ['class' => 'form-control', 'placeholder' => 'Informe o CNPJ', 'id'=>'cnpj']) !!}
    </div>
    <div class="form-group col-md-6 col-xs-12">
    {!! Form::label('telefone', 'Telefone') !!}
    {!! Form::text('telefone', $fornecedor->telefone, ['class' => 'form-control', 'placeholder' => 'Informe o Telefone', 'id'=>'telefone']) !!}
    </div>
    <div class="form-group col-md-6 col-xs-12">
    {!! Form::label('email', 'E-Mail') !!}
    {!! Form::text('email', $fornecedor->email, ['class' => 'form-control', 'placeholder' => 'Informe o E-mail']) !!}
    </div>
    <div class="form-group col-md-12">
    {!! Form::label('site', 'Site') !!}
    {!! Form::text('site', $fornecedor->site, ['class' => 'form-control', 'placeholder' => 'Informe o Site']) !!}
    </div>
    <div class="form-group col-md-12">
    {!! Form::label('endereco', 'Endereço') !!}
    {!! Form::text('endereco', $fornecedor->endereco, ['class' => 'form-control', 'placeholder' => 'Informe o Endereço']) !!}
    </div>
    <div class="form-group col-md-6 col-xs-12">
    {!! Form::label('estado_id', 'Estado') !!}
    {!! Form::select('estado_id', $estados, $fornecedor->cidade->estado->id,['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-6 col-xs-12">
    {!! Form::label('cidade_id', 'Cidade') !!}
    {!! Form::select('cidade_id', $cidades, $fornecedor->cidade->id,['class' => 'form-control']) !!}
    </div>
    <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-4 col-xs-offset-2">
    {!! Form::submit('Editar',['class' => 'btn btn-primary btn-block btn-add']) !!}
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4">
        <a href="{{URL::previous()}}" class="btn btn-danger btn-block">Cancelar</a> 
    </div>
{!! Form::close() !!}
@endsection
