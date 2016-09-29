@extends('base')

@section('content')
	@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
 	</div>
	@endif
		<ol class="breadcrumb">
		  <li><a href="{{url('/')}}">Início</a></li>
		  <li class="active">Controle de Horário</li>
		</ol>

  			<div class="form-group form-inline">
				{!! Form::open(array('url' => 'horario/')) !!}
				    {!! Form::label('funcionario_id', 'Funcionário') !!}
				    {!! Form::select('funcionario_id', $funcionarios, null, ['class' => 'form-control']) !!}
					{!! Form::submit('Começar',['class' => 'btn btn-default btn-add']) !!}
				{!! Form::close() !!}
			</div>

		<table class="table table-striped">
		<thead>
		    <tr>
		      <th>#</th>
		      <th>Nome</th>
		      <th>Saída</th>
		      <th>Pagamento</th>
		    </tr>
		</thead>
		<tbody>
	@foreach($horarios as $hor)
	@if($hor->ativo != '1')
		<tr>
			<td>{{$hor->id}}</td>
			<td>{{$hor->funcionario->nome}}</td>
			<td>
				@if($hor->saida != '00:00:00')
						<button type="button" class="btn btn-default" disabled="disabled">Encerrado</button>
				@else
				<a href="{{url('horario/arquivar/'.$hor->id)}}" class='btn btn-default'>Encerrar</a>
				@endif
			</td>
			<td><a href="{{url('pagar/'.$hor->funcionario_id)}}" class='btn btn-default'>Pagar</a></td>
			<td><a href="{{url('horario/'.$hor->id.'/edit')}}" class='btn btn-default'>Editar</a></td>
		</tr>
	@endif
	@endforeach
	</tbody>
	</table>
@endsection