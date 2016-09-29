@extends('base')

@section('content')
	@foreach($funcionario as $func)
		<h3>{{$func->nome}}</h3>
		<h4>{{$func->totalHoras}}</h4>
		{!!Form::open(array('url' => 'honorario/pago/'.$func->id))!!}
			<div class="form-group">
				{!!Form::submit('Pago',['class' => 'btn btn-default btn-add'])!!}
			</div>
		{!! Form::close() !!}
		<br>
	@endforeach
@endsection