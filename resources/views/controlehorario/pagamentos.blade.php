@extends('base')

@section('content')
	@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
 	</div>
 	@endif
 	
	{!! Form::open(array('url' => 'calcularHoras')) !!}
    <div class="form-group">
    {!! Form::label('valor', 'Valor a ser pago por hora') !!}
    {!! Form::text('valor',null, ['class' => 'form-control']) !!}
    </div>
    <input type='hidden' value='{{$funcID}}' name='funcID'>
    {!! Form::submit('Calcular',['class' => 'btn btn-default btn-add']) !!}
    {!! Form::close() !!}
@endsection