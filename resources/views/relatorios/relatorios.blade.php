@extends('base')

@section('titulo', 'Relatório Notas')

@section('content')
		<ol class="breadcrumb">
		  <li><a href="{{url('/')}}">Início</a></li>
		  <li class="active">Relatórios</li>
		</ol>
		<div class='col-sm-12 col-lg-12'>
		</div>

		{!! Form::open(array('url' => 'total')) !!}
		    <div class="form-group">
		    {!! Form::label('dt1', 'Início') !!}
		    {!! Form::date('dtInicio', null, ['class' => 'form-control','id'=> 'datepicker']) !!}
		    </div>
		    <div class="form-group">
		    {!! Form::label('dt2', 'Final') !!}
		    {!! Form::date('dtFinal', null, ['class' => 'form-control','id'=> 'datepicker2']) !!}
		    </div>
		    <div class="form-group">
		    {!! Form::label('fornecedor', 'Fornecedor') !!}
		    {!! Form::select('fornecedor', $fornecedores, null, ['class' => 'form-control','id'=> 'fornecedor', "placeholder"=>"Selecione o Fornecedor"]) !!}
		    </div>
		    <div class="form-group">
		    {!! Form::label('produto', 'Produto') !!}
		    {!! Form::select('produto', $produtos, null, ['class' => 'form-control','id'=> 'produto', "placeholder"=>"Selecione o Produto"]) !!}
		    </div>		    
    		{!! Form::submit('Buscar',['class' => 'btn btn-default btn-add']) !!}
		{!! Form::close() !!}

		<h3>Total das Notas: R$ {{ number_format($total,2,',','.') }}</h3>
		<hr>
		@foreach($notas as $key => $nt)
			<div class="group"><h4>Data da Nota: {{ implode('/', array_reverse(explode('-', $nt->data))) }}</h4></div>
			<div class="group"><h4>Total da Nota: R$ {{ number_format($nt->total,2,',','.') }}</h4></div>
			<div class="group"><h4>Fornecedor: {{$nt->fornecedor->nome}}</h4></div>
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample{{$key}}" aria-expanded="false" aria-controls="collapseExample">
				<i class="fa fa-plus" aria-hidden="true"></i> Detalhes
			</button>
			<div class="collapse" id="collapseExample{{$key}}">
				<table class="table table-striped">
				<thead>
				    <tr>
				      <th>Produto</th>
				      <th>Preço</th>
				      <th>Quantidade</th>
				      <th>Total</th>
				    </tr>
				</thead>
				<tbody>
				@foreach($nt->itens as $item)
					<tr>
						<td>{{$item->produtos->nome}}</td>
						<td>R$ {{ number_format($item->preco,2,',','.') }}</td>
						<td>{{ $item->quantidade }}</td>
						<td>R$ {{ number_format($item->quantidade*$item->preco,2,',','.') }}</td>
				  	</tr>
				@endforeach
				</tbody>
				</table>
			</div>
			<hr>
		@endforeach
		
@endsection
