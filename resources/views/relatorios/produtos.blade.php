@extends('base')

@section('titulo', 'Relatório do total adquirido para um produto')

@section('content')
		<ol class="breadcrumb">
		  <li><a href="{{url('/')}}">Início</a></li>
		  <li class="active">Relatórios</li>
		</ol>
		<div class='col-sm-12 col-lg-12'>
		</div>

		{!! Form::open(array('url' => 'totalProdutos')) !!}
		    <div class="form-group">
		    {!! Form::label('dt1', 'Data Inicial') !!}
		    {!! Form::date('dtInicio', null, ['class' => 'form-control','id'=> 'datepicker']) !!}
		    </div>
		    <div class="form-group">
		    {!! Form::label('dt2', 'Data Final') !!}
		    {!! Form::date('dtFinal', null, ['class' => 'form-control','id'=> 'datepicker2']) !!}
		    </div>
		    <div class="form-group">
		    {!! Form::label('produto', 'Produto') !!}
		    {!! Form::select('produto', $selectProdutos, null, ['class' => 'form-control','id'=>'produto', "placeholder"=>"Selecione o Produto"]) !!}
		    </div>	    
    		{!! Form::submit('Buscar',['class' => 'btn btn-default btn-add']) !!}
		{!! Form::close() !!}

		@foreach($produtos as $key => $pd)
		@if ($total)
		<h3>Período: {{$pd->dtInicio}} a {{$pd->dtFinal}}</h3>
			<hr>
			<div class="group"><h4>Produto: {{$pd->nome}}</h4></div>
			<div class="group"><h4>Total: R$ {{ number_format($total,2,',','.') }}</h4></div>
			<div class="group"><h4>Quantidade: {{$quantidade}}</h4></div>
			<hr>
		@endif
		@endforeach
		
@endsection
