@extends('base')
@section('titulo', 'Agenda')
@section('content')

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}">Início</a></li>
			<li class="active">Agenda</li>
		</ol>
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
				<a  data-href="{{url('agenda/'.$age->id.'/destroy')}}" data-toggle="modal" data-target="#confirm-delete"class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a> </div>
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
				<div class="panel-footer t-center">  <a data-toggle="modal" data-target="#agenda{{$age->id}}" class='btn btn-default btn-sm'><i class="fa fa-eye"></i> Mais</a>	<a href="{{url('agenda/'.$age->id.'/edit')}}" class='btn btn-default btn-sm'><i class="fa fa-pencil"></i> Editar</a>
					<a  data-href="{{url('agenda/'.$age->id.'/destroy')}}" data-toggle="modal" data-target="#confirm-delete" class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a> </div>
				</div>
			</div>
			@include('agenda.modal')	
		@endif
		@endforeach
		@foreach($agendas as $age)
		@if (strtotime($age->data) < strtotime(date('Y-m-d')))
		<div class='col-md-4'>
		<div class="panel panel-default">
				<div class="panel-heading t-center"><span class="label label-default">Antiga</span> {{$age->nome}}</div>
				<div class="panel-body agenda">
					{{substr($age->descricao, 0, 85)}}...
				</div>
				<div class="panel-data"><i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($age->data))}}  <i class="fa fa-clock-o"></i> {{$age->hora}} </div>
				<div class="panel-footer t-center">  <a data-toggle="modal" data-target="#agenda{{$age->id}}" class='btn btn-default btn-sm'><i class="fa fa-eye"></i> Mais</a>	<a href="{{url('agenda/'.$age->id.'/edit')}}" class='btn btn-default btn-sm'><i class="fa fa-pencil"></i> Editar</a>
					<a  data-href="{{url('agenda/'.$age->id.'/destroy')}}" data-toggle="modal" data-target="#confirm-delete"class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a> </div>
				</div>
			</div>	
			@include('agenda.modal')
		@endif
		@endforeach
		<div class="row">
			<div class="col-xs-12 t-center">
				{{ $agendas->render() }}
			</div>
		</div>
	@else 
		<div class="alert alert-danger t-center">
			Não há agendas cadastradas. <br> <strong><a href="{{url('agenda/create')}}" class="btn btn-default">Adicionar</a></strong>
		</div>
	@endif


	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Excluir Agenda</h3>
            </div>
            <div class="modal-body">
                <h4>Você tem certeza que deseja excluir esta agenda? </h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok">Excluir</a>
            </div>
        </div>
    </div>
</div>
@endsection
