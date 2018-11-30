@extends('template')

@if(isset($book['id']))
	@section('title', 'Knygos redagavimas')
@else
	@section('title', 'Nauja knyga')
@endif

@section('content')

@if (session('danger'))
	<div class="alert alert-danger">
		{{ session('danger') }}
	</div>
@endif

@if(isset($book['id']))
<form action="{{ route('book.edit-data', $book['id']) }}" method="post">
@else
<form action="{{ route('book.create-data') }}" method="post">
@endif
	@if(false)
		<input type="hidden" name="id" value="edit-id"/>
	@endif
	<div class="form-group">
		<label for="pav">Pavadinimas</label>
		<input type="text" class="form-control" id="pav" placeholder="Pavadinimas" name="pavadinimas" value="{{ $book['pavadinimas'] }}"/>
	</div>
	<div class="form-group">
		<label for="aut">Autorius</label>
		<input type="text" class="form-control" id="aut" placeholder="Autorius" name="autorius" value="{{ $book['autorius'] }}"/>
	</div>
	<div class="form-group">
		<label for="isl">Išleidimo metai</label>
		<input type="number" class="form-control" id="isl" name="metai" value="{{ $book['isleidimo_metai'] }}"/>
	</div>
	<div class="form-group">
		<label for="apr">Aprašymas</label>
		<textarea class="form-control" id="apr" placeholder="Aprašymas" name="aprasymas">{{ $book['aprasymas'] }}</textarea>
	</div>
	{{ csrf_field() }}
	<button type="submit" class="btn btn-primary">Pateikti</button>
</form>
[{{ $book['id'] }}]
@endsection