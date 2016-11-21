@extends('base')

@section('titulo','Funcionários')

@section('content')
<ol class="breadcrumb">
		  <li><a href="{{url('/')}}">Início</a></li>
		  <li class="active">Funcionário</li>
		</ol>
		<div class='col-sm-12 col-lg-12'>
			<a href="{{url('funcionario/create')}}" type="button" class='btn btn-default adicionar pull-right'>Adicionar</a>
		</div>
		<table class="table table-striped">
		<thead>
		    <tr>
		      <th>#</th>
		      <th>Nome</th>
		      <th>Telefone</th>
		      <th>Ações</th>
		    </tr>
		</thead>
		<tbody>
	@foreach($funcionarios as $func)		
		<tr>
			<td>{{$func->id}}</td>
			<td>{{$func->nome}}</td>
			<td>{{$func->telefone}}</td>
			<td><a href="{{url('funcionario/'.$func->id.'/edit')}}" class='btn btn-primary btn-sm'><i class="fa fa-pencil"></i> Editar</a>
				<a class='btn btn-danger btn-sm' data-href="{{url('funcionario/'.$func->id.'/destroy')}}" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i> Excluir</a>
				</td>
			</tr>
	@endforeach
	</tbody>
	</table>


	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Excluir Funcionário</h3>
            </div>
            <div class="modal-body">
                <h4>Você tem certeza que deseja excluir este funcionário?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok">Excluir</a>
            </div>
        </div>
    </div>
</div>
@endsection
