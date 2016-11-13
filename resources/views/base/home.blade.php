@extends('base')
@section('titulo', 'Bem vindo(a)!')
@section('content')

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif

	{{--AGENDAS --}}
	<a href="{{url('agenda')}}">
		<button class="btn btn-default" type="button">
		  	Agendas 
		  	<span class="badge">
				@if($qntAgenda == 1)
					<b>1</b>
				@elseif ($qntAgenda > 1) 
					<b>{{$qntAgenda}}</b>
				@else
					<b>0</b> 
				@endif
		  	</span>
		</button>
	</a>
	<div class="well">
		@if (count($agendas) > 0)
			@foreach($agendas as $age)
				@if (strtotime($age->data) == strtotime(date('Y-m-d')))
					<div class='col-md-4'>
						<div class="panel panel-primary">
							<div class="panel-heading t-center"><span class="label label-success">Hoje</span> {{$age->nome}}</div>
							<div class="panel-body agenda">
								{{substr($age->descricao, 0, 85)}}...
							</div>
							<div class="panel-data"><i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($age->data))}}  <i class="fa fa-clock-o"></i> {{$age->hora}} </div>
							<div class="panel-footer t-center">  <a data-toggle="modal" data-target="#agenda{{$age->id}}" class='btn btn-default btn-sm'><i class="fa fa-eye"></i> Mais</a>	<a href="{{url('agenda/'.$age->id.'/edit')}}" class='btn btn-default btn-sm'><i class="fa fa-pencil"></i> Editar</a>
						<a href="{{url('agenda/'.$age->id.'/destroy')}}" class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a> </div>
						</div>
					</div>
					@include('agenda.modal')
				@endif
			@endforeach

			@foreach($agendas as $age)
				@if (strtotime($age->data) > strtotime(date('Y-m-d')))
					<div class='col-md-4'>
						<div class="panel panel-info">
							<div class="panel-heading t-center"><span class="label label-info">Pendente</span> {{$age->nome}}</div>
							<div class="panel-body agenda">
									{{substr($age->descricao, 0, 85)}}...
							</div>
							<div class="panel-data"><i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($age->data))}}  <i class="fa fa-clock-o"></i> {{$age->hora}} </div>
							<div class="panel-footer t-center">
								<a data-toggle="modal" data-target="#agenda{{$age->id}}" class='btn btn-default btn-sm'><i class="fa fa-eye"></i> Mais</a>
								<a href="{{url('agenda/'.$age->id.'/edit')}}" class='btn btn-default btn-sm'><i class="fa fa-pencil"></i> Editar</a>
								<a href="{{url('agenda/'.$age->id.'/destroy')}}" class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a>
							</div>
						</div>
					</div>
					@include('agenda.modal')	
				@endif
			@endforeach

			@foreach($agendas as $age)
				@if (strtotime($age->data) < strtotime(date('Y-m-d')))
					<div class='col-md-4'>
						<div class="panel panel-default">
								<div class="panel-heading t-center"><span class="label label-default">Antiga</span> {{$age->nome}}
								</div>
								<div class="panel-body agenda">
									{{substr($age->descricao, 0, 85)}}...
								</div>
								<div class="panel-data">
									<i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($age->data))}}
									<i class="fa fa-clock-o"></i> {{$age->hora}} 
								</div>
								<div class="panel-footer t-center">
									<a data-toggle="modal" data-target="#agenda{{$age->id}}" class='btn btn-default btn-sm'><i class="fa fa-eye"></i> Mais</a>
									<a href="{{url('agenda/'.$age->id.'/edit')}}" class='btn btn-default btn-sm'><i class="fa fa-pencil"></i> Editar</a>
									<a href="{{url('agenda/'.$age->id.'/destroy')}}" class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a>
								</div>
						</div>
					</div>	
					@include('agenda.modal')
				@endif
			@endforeach

		@else 
			<div class="alert alert-danger t-center">
				Você não tem nenhuma agenda para hoje. <br> <strong><a href="{{url('agenda/create')}}" class="btn btn-default">Adicionar</a></strong>
			</div>
		@endif
	</div>

	<div class="row">
		<div class="col-xs-12 t-center">
			{{ $agendas->links() }}
		</div>
	</div>
 	
 	{{--PAGAMENTOS--}}
 		<a href="{{url('pagamento')}}">
	 		<button class="btn btn-default" type="button">
		  		Pagamentos 
		  		<span class="badge">
					@if($qntPagamento == 1)
						<b>1</b>
					@elseif ($qntPagamento > 1) 
						<b>{{$qntPagamento}}</b>
					@else
						<b>0</b>
					@endif
		  		</span>
			</button>
		</a>
		<div class="well">
		@if (count($pagamentos) > 0)
			@foreach($pagamentos as $pag)
				@if (strtotime($pag->vencimento) == strtotime(date('Y-m-d')))
					<div class='col-md-4'>
						<div class="panel panel-primary">
							<div class="panel-heading t-center"><span class="label label-success">Hoje</span> {{$pag->nome}}</div>
							<div class="panel-body pagamento">
								<i class="fa fa-credit-card"></i> {{$pag->valor}}</div>
							<div class="panel-data"><i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($pag->vencimento))}} </div>
							<div class="panel-footer t-center">
								<a href="{{url('pagamento/'.$pag->id.'/edit')}}" class='btn btn-default btn-sm'><i class="fa fa-pencil"></i> Editar</a>
								<a href="{{url('pagamento/'.$pag->id.'/destroy')}}" class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a> </div>
						</div>
					</div>
					@include('pagamento.modal')
				@endif
			@endforeach

			@foreach($pagamentos as $pag)
				@if (strtotime($pag->vencimento) > strtotime(date('Y-m-d')))
					<div class='col-md-4'>
						<div class="panel panel-info">
							<div class="panel-heading t-center"><span class="label label-info">Pendente</span> {{$pag->nome}}</div>
							<div class="panel-body pagamentos">
								<i class="fa fa-credit-card"></i> {{$pag->valor}}</div>
							<div class="panel-data"><i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($pag->vencimento))}} </div>
							<div class="panel-footer t-center">
								<a href="{{url('pagamento/'.$pag->id.'/edit')}}" class='btn btn-default btn-sm'><i class="fa fa-pencil"></i> Editar</a>
								<a href="{{url('pagamento/'.$pag->id.'/destroy')}}" class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a> </div>
						</div>
					</div>
					@include('pagamento.modal')	
				@endif
			@endforeach

			@foreach($pagamentos as $pag)
				@if (strtotime($pag->vencimento) < strtotime(date('Y-m-d')))
					<div class='col-md-4'>
						<div class="panel panel-default">
							<div class="panel-heading t-center"><span class="label label-default">Antiga</span> {{$pag->nome}}
							</div>
							<div class="panel-body pagamentos">
								<i class="fa fa-credit-card"></i> {{$pag->valor}}
							</div>
							<div class="panel-data"><i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($pag->vencimento))}} 
							</div>
							<div class="panel-footer t-center">
								<a href="{{url('pagamento/'.$pag->id.'/edit')}}" class='btn btn-default btn-sm'><i class="fa fa-pencil"></i> Editar</a>
								<a href="{{url('pagamento/'.$pag->id.'/destroy')}}" class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a>
							</div>
						</div>
					</div>	
					@include('pagamento.modal')
				@endif
			@endforeach

			<div class="row">
				<div class="col-xs-12 t-center">
					{{ $pagamentos->links() }}
				</div>
			</div>

		@else 
			<div class="alert alert-danger t-center">
				Você não tem pagamentos para hoje. <br> <strong><a href="{{url('pagamento/create')}}" class="btn btn-default">Adicionar</a></strong>
			</div>
		@endif
	</div>
@endsection
	
{{-- <h3>Agenda</h3>
@foreach($agenda as $ag)
	{{$ag->nome}} - {{$ag->descricao}}
@endforeach

<h3>Pagamento</h3>
@foreach($pagamento as $pg)
	{{$pg->nome}} - R$ {{ number_format($pg->valor,2,',','.') }}
@endforeach --}}

{{-- <ol class="breadcrumb">
<li><a href="{{url('/')}}">Início</a></li>
<li class="active">Agenda</li>
</ol> --}}
