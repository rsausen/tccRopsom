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
</a>

<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading home">Agendas <a href="{{url('agenda')}}" class="btn btn-link">Ver todas >></a></div>

		<div class="panel-body">

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
						<a data-href="{{url('agenda/'.$age->id.'/destroy')}}" data-toggle="modal" data-target="#confirm-delete" class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a> </div>
					</div>
				</div>
				@include('agenda.modal')
				@endif

				@if (strtotime($age->data) > strtotime(date('Y-m-d')))
				<div class='col-md-4'>
					<div class="panel panel-info">
						<div class="panel-heading t-center"><span class="label label-info">Pendente</span> {{$age->nome}}</div>
						<div class="panel-body agenda">
							{{substr($age->descricao, 0, 85)}}...
						</div>
						<div class="panel-data"><i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($age->data))}}  <i class="fa fa-clock-o"></i> {{$age->hora}} </div>
						<div class="panel-footer t-center">  <a data-toggle="modal" data-target="#agenda{{$age->id}}" class='btn btn-default btn-sm'><i class="fa fa-eye"></i> Mais</a>	<a href="{{url('agenda/'.$age->id.'/edit')}}" class='btn btn-default btn-sm'><i class="fa fa-pencil"></i> Editar</a>
							<a data-href="{{url('agenda/'.$age->id.'/destroy')}}" data-toggle="modal" data-target="#confirm-delete" class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a> </div>
						</div>
					</div>
					@include('agenda.modal')	
					@endif

					@endforeach
					@if (count($agendas) < 3)
					@if (count($agendas) == 2)
					<div class='col-md-4'>
						<div class="panel panel-warning">
							<div class="panel-heading t-center"><span class="label label-warning">Adicionar</span></div>
							<div class="panel-body agenda">
								<p align="center">Não há mais agendas futuras. Você pode adicionar uma agora mesmo. </p>
							</div>
							<div class="panel-data"> <br> </div>
							<div class="panel-footer t-center"> <a href="{{url('agenda/create')}}" class="btn btn-sm btn-block btn-default">Nova Agenda</a> </div>
						</div>
					</div>
					@else
					<div class='col-md-4'>
						<div class="panel panel-warning">
							<div class="panel-heading t-center"><span class="label label-warning">Adicionar</span></div>
							<div class="panel-body agenda">
								<p align="center">Não há mais agendas futuras. Você pode adicionar uma agora mesmo. </p>
							</div>
							<div class="panel-data"> <br> </div>
							<div class="panel-footer t-center"> <a href="{{url('agenda/create')}}" class="btn btn-sm btn-block btn-default">Nova Agenda</a> </div>
						</div>
					</div>
					<div class='col-md-4'>
						<div class="panel panel-warning">
							<div class="panel-heading t-center"><span class="label label-warning">Adicionar</span></div>
							<div class="panel-body agenda">
								<p align="center">Não há mais agendas futuras. Você pode adicionar uma agora mesmo. </p>
							</div>
							<div class="panel-data"> <br> </div>
							<div class="panel-footer t-center"> <a href="{{url('agenda/create')}}" class="btn btn-sm btn-block btn-default">Nova Agenda</a> </div>
						</div>
					</div>
					@endif
					@endif
					@else 
					<div class="col-md-12">
						<div class="alert alert-danger t-center">
							Você não tem nenhuma agenda para hoje. <br> <strong><a href="{{url('agenda/create')}}" class="btn btn-default">Adicionar</a></strong>
						</div>				
					</div>
					@endif
				</div>

					@if ($qntAgenda > 0)
						<div class="panel-data">E mais {{$qntAgenda}} agendas hoje! <a class="btn bnt-link btn-sm">Ver mais</a></div>
					@endif
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 t-center">

			</div>
		</div>

		{{--PAGAMENTOS--}}

		<div class="row">
		<div class="panel panel-default">
		<div class="panel-heading home">Pagamentos <a href="{{url('pagamento')}}" class="btn btn-link">Ver todos >></a></div>

		<div class="panel-body">
			@if (count($pagamentos) > 0)
			@foreach($pagamentos as $pag)

			@if (strtotime($pag->vencimento) == strtotime(date('Y-m-d')))
			<div class='col-md-4'>
				<div class="panel panel-primary">
					<div class="panel-heading t-center"><span class="label label-success">Hoje</span> {{$pag->nome}}</div>
					<div class="panel-body pagamento">
						<i class="fa fa-credit-card"></i> {{$pag->valor}}
					</div>
					<div class="panel-data"><i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($pag->vencimento))}} </div>
					<div class="panel-footer t-center"><a href="{{url('pagamento/'.$pag->id.'/edit')}}" class='btn btn-default btn-sm'><i class="fa fa-pencil"></i> Editar</a>
						<a  data-href="{{url('pagamento/'.$pag->id.'/destroy')}}" data-toggle="modal" data-target="#confirm-delete" class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a> </div>
					</div>
				</div>
				@include('pagamento.modal')
				@endif
				@if (strtotime($pag->vencimento) > strtotime(date('Y-m-d')))
				<div class='col-md-4'>
					<div class="panel panel-info">
						<div class="panel-heading t-center"><span class="label label-info">Pendente</span> {{$pag->nome}}</div>
						<div class="panel-body pagamentos">
							<i class="fa fa-credit-card"></i> {{$pag->valor}}
						</div>
						<div class="panel-data"><i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($pag->vencimento))}} </div>
						<div class="panel-footer t-center"><a href="{{url('pagamento/'.$pag->id.'/edit')}}" class='btn btn-default btn-sm'><i class="fa fa-pencil"></i> Editar</a>
							<a  data-href="{{url('pagamento/'.$pag->id.'/destroy')}}" data-toggle="modal" data-target="#confirm-delete" class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a> </div>
						</div>
					</div>
					@include('pagamento.modal')	
					@endif
					@endforeach

					@if (count($pagamentos) < 3)
					@if (count($pagamentos) == 2)
					<div class='col-md-4'>
						<div class="panel panel-warning">
							<div class="panel-heading t-center"><span class="label label-warning">Adicionar</span></div>
							<div class="panel-body pagamentos">
								<p align="center">Não há mais pagamentos futuros. Você pode adicionar um agora mesmo. </p>
							</div>
				
							<div class="panel-footer t-center"> <a href="{{url('pagamento/create')}}" class="btn btn-sm btn-block btn-default">Novo Pagamento</a> </div>
						</div>
					</div>
					@else
					<div class='col-md-4'>
						<div class="panel panel-warning">
							<div class="panel-heading t-center"><span class="label label-warning">Adicionar</span></div>
							<div class="panel-body pagamentos">
								<p align="center">Não há mais pagamentos futuros. Você pode adicionar um agora mesmo. </p>
							</div>
							<div class="panel-footer t-center"> <a href="{{url('pagamento/create')}}" class="btn btn-sm btn-block btn-default">Novo Pagamento</a> </div>
						</div>
					</div>
					<div class='col-md-4'>
						<div class="panel panel-warning">
							<div class="panel-heading t-center"><span class="label label-warning">Adicionar</span></div>
							<div class="panel-body pagamentos">
								<p align="center">Não há mais pagamentos futuros. Você pode adicionar um agora mesmo. </p>
							</div>
							<div class="panel-footer t-center"> <a href="{{url('pagamento/create')}}" class="btn btn-sm btn-block btn-default">Novo Pagamento</a> </div>
						</div>
					</div>
					@endif
					@endif
					@else 
					<div class="alert alert-danger t-center">
						Você não tem pagamentos para hoje. <br> <strong><a href="{{url('pagamento/create')}}" class="btn btn-default">Adicionar</a></strong>
					</div>
					@endif
				</div>
					@if ($qntPagamentos > 0)
						<div class="panel-data">E mais {{$qntPagamentos}} pagamentos hoje! <a class="btn bnt-link btn-sm">Ver mais</a></div>
					@endif
				</div>
				</div>



	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Excluir</h3>
            </div>
            <div class="modal-body">
                <h4>Você tem certeza que deseja excluir?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok">Excluir</a>
            </div>
        </div>
    </div>
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
