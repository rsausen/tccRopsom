@extends('base')

@section('titulo', 'Relatório Pagamentos')

@section('content')
		<ol class="breadcrumb">
		  <li><a href="{{url('/')}}">Início</a></li>
		  <li class="active">Pagamentos</li>
		</ol>
		<div class='col-sm-12 col-lg-12'>
		</div>

		{!! Form::open(array('url' => 'totalPagamentos')) !!}
		    <div class="form-group">
		    {!! Form::label('dt1', 'Início') !!}
		    {!! Form::date('dtInicio', null, ['class' => 'form-control','id'=> 'datepicker']) !!}
		    </div>
		    <div class="form-group">
		    {!! Form::label('dt2', 'Final') !!}
		    {!! Form::date('dtFinal', null, ['class' => 'form-control','id'=> 'datepicker2']) !!}
		    </div>		    
    		{!! Form::submit('Buscar',['class' => 'btn btn-default btn-add']) !!}
		{!! Form::close() !!}

		<h3>Total dos Pagamentos: R$ {{ number_format($total,2,',','.') }}</h3>
		<hr>
		@foreach($pagamentos as $key => $pg)
			<div class="group"><h4>Data do Pagamento: {{ implode('/', array_reverse(explode('-', $pg->vencimento))) }}</h4></div>
			<div class="group"><h4>Valor: R$ {{ number_format($pg->valor,2,',','.') }}</h4></div>
			<div class="group"><h4>Pago: {{ $pg->pago ? 'Sim' : 'Não' }}</h4></div>
			<hr>
		@endforeach
		
@endsection