@extends('base')
@section('titulo', 'Pagamentos')
@section('content')

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}">Início</a></li>
			<li class="active">Pagamentos</li>
		</ol>
	@if (count($pagamentos) > 0)
			@foreach($pagamentos as $pag)
		@if ((strtotime($pag->vencimento) < strtotime(date('Y-m-d'))) and ($pag->pago == '0'))
			<div class='col-md-4'>
				<div class="panel panel-danger">
					<div class="panel-heading t-center"><span class="label label-danger">Atrasado</span> {{$pag->nome}}</div>
					<div class="panel-body pagamento">
						<i class="fa fa-credit-card"></i> {{$pag->valor}}
					</div>
					<div class="panel-data"><i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($pag->vencimento))}} </div>
					<div class="panel-footer t-center"><a href="{{url('pagamento/'.$pag->id.'/edit')}}" class='btn btn-default btn-sm'><i class="fa fa-pencil"></i> Editar</a>
				<a href="{{url('pagamento/'.$pag->id.'/destroy')}}" class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a> </div>
				</div>
			</div>
			@include('pagamento.modal')
		@endif
		@endforeach
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
					<i class="fa fa-credit-card"></i> {{$pag->valor}}
				</div>
				<div class="panel-data"><i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($pag->vencimento))}} </div>
				<div class="panel-footer t-center"><a href="{{url('pagamento/'.$pag->id.'/edit')}}" class='btn btn-default btn-sm'><i class="fa fa-pencil"></i> Editar</a>
					<a href="{{url('pagamento/'.$pag->id.'/destroy')}}" class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a> </div>
				</div>
			</div>
			@include('pagamento.modal')	
		@endif
		@endforeach
		@foreach($pagamentos as $pag)
		@if ((strtotime($pag->vencimento) < strtotime(date('Y-m-d'))) and ($pag->pago == '1'))
		<div class='col-md-4'>
		<div class="panel panel-default">
				<div class="panel-heading t-center"><span class="label label-default">Antiga</span> {{$pag->nome}}</div>
				<div class="panel-body pagamentos">
					<i class="fa fa-credit-card"></i> {{$pag->valor}}
				</div>
				<div class="panel-data"><i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($pag->vencimento))}} </div>
				<div class="panel-footer t-center"><a href="{{url('pagamento/'.$pag->id.'/edit')}}" class='btn btn-default btn-sm'><i class="fa fa-pencil"></i> Editar</a>
					<a href="{{url('pagamento/'.$pag->id.'/destroy')}}" class='btn btn-default btn-sm'><i class="fa fa-trash"></i> Excluir</a> </div>
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
			Não há pagamentos cadastradas. <br> <strong><a href="{{url('pagamento/create')}}" class="btn btn-default">Adicionar</a></strong>
		</div>
	@endif
@endsection
