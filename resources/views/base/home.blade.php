@extends('base')

@section('titulo', 'Bem vindo')

@section('content')
	
	<h3>Agenda</h3>
	@foreach($agenda as $ag)
		{{$ag->nome}} - {{$ag->descricao}}
	@endforeach

	<h3>Pagamento</h3>
	@foreach($pagamento as $pg)
		{{$pg->nome}} - R$ {{ number_format($pg->valor,2,',','.') }}
	@endforeach

@endsection
