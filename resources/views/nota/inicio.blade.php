@extends('base')

@section('titulo', 'Notas')

@section('content')

@if (session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif

<ol class="breadcrumb">
	<li><a href="{{url('/')}}">Início</a></li>
	<li class="active">Nota Fiscal</li>
</ol>
<div class='col-sm-12 col-lg-12'>
	<a href="{{url('nota/create')}}" type="button" class='btn btn-default adicionar pull-right'>Adicionar</a>
</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Preço</th>
			<th>Data</th>
			<th>Fornecedor</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@foreach($notas as $not)
		<tr>
			<td>{{$not->id}}</td>
			<td>R$ {{ number_format($not->total,2,',','.') }}</td>
			<td>{{$not->data}}</td>
			<td>{{$not->fornecedor->nome}}</td>
			<td>
				<a href="{{url('item/'.$not->id)}}" class='btn btn-success btn-sm'><i class="fa fa-plus"></i>Adicionar</a>
				<a href="{{url('nota/'.$not->id.'/edit')}}" class='btn btn-primary btn-sm'><i class="fa fa-pencil"></i> Editar</a>
				<a data-href="{{url('nota/'.$not->id.'/destroy')}}" data-toggle="modal" data-target="#confirm-delete" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Excluir</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>



	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Excluir Nota</h3>
            </div>
            <div class="modal-body">
                <h4>Você tem certeza que deseja excluir esta nota?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok">Excluir</a>
            </div>
        </div>
    </div>
</div>
@endsection
