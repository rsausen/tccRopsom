@extends('base')
@section('titulo', 'Editar Agenda')
@section('content')

	<ol class="breadcrumb">
	  <li><a href="{{url('/')}}">Início</a></li>
	  <li><a href="{{url('/agenda')}}">Agenda</a></li>
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

	{!! Form::open(array('url' => 'agenda/'.$agenda->id,'method'=>'put')) !!}
	    <div class="form-group">
		    {!! Form::label('nome', 'Título') !!}
		    {!! Form::text('nome', $agenda->nome, ['class' => 'form-control', 'placeholder' => 'Informe o Título do Lembrete']) !!}
	    </div>
	    <div class="form-group">
		    {!! Form::label('descricao', 'Descrição') !!}
		    {!! Form::textarea('descricao', $agenda->descricao,['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
	    </div>
	    <div class="form-group">
		    {!! Form::label('data', 'Data') !!}
		    {!! Form::date('data', date('Y-m-d', strtotime($agenda->data)), ['class' => 'form-control', 'id' => 'null']) !!}
		</div>
		<div class="form-group">
		    {!! Form::label('hora', 'Hora') !!}
		    {!! Form::time('hora', $agenda->hora,['class' => 'form-control', 'placeholder' => 'Informe a Hora']) !!}
		</div>
	    {!! Form::submit('Editar',['class' => 'btn btn-default btn-add']) !!}
	{!! Form::close() !!}

@endsection
