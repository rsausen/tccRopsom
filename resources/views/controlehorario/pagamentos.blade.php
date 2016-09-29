@extends('base')

@section('content')

	{!! Form::open(array('url' => 'calcularHoras')) !!}
    <div class="form-group">
    {!! Form::label('valor', 'Valor por hora') !!}
    {!! Form::text('valor',null, ['class' => 'form-control']) !!}
    </div>
    <input type='hidden' value='{{$funcID}}' name='funcID'>
    {!! Form::submit('Calcular',['class' => 'btn btn-default btn-add']) !!}
    {!! Form::close() !!}
@endsection