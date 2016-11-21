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
		      <th>Entrada</th>
		      <th>Saída</th>
		      <th>Ações</th>

		    </tr>
		</thead>
		<tbody>
	@foreach($horarios as $hor)
	@if($hor->ativo != '1')
		<tr>
			<td>{{$hor->id}}</td>
			<td>{{$hor->funcionario->nome}}</td>
			<td>{{$hor->entrada}}</td>
			<td>
				@if($hor->saida != '00:00:00')
						{{$hor->saida}}
				@else
				<a href="{{url('horario/arquivar/'.$hor->id)}}" class='btn btn-sm btn-warning'><i class="fa fa-power-off" aria-hidden="true"></i> Encerrar</a>
				@endif
			</td>
			<td><a href="{{url('pagar/'.$hor->funcionario_id)}}" class='btn btn-success btn-sm'><i class="fa fa-dollar"></i> Pagar</a>
			<a href="{{url('horario/'.$hor->id.'/edit')}}" class='btn btn-primary btn-sm' ><i class="fa fa-pencil"></i> Editar</a></td>
		</tr>
	@endif
	@endforeach
	</tbody>
	</table>
@endsection