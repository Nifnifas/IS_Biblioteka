@extends('template')
@section('title', 'Knygos peržiūra: '.$book->pavadinimas)

@section('content')

<h1>{{ $book->pavadinimas }}</h1>
{{ $book->autorius }}. {{ $book->isleidimo_metai }}<br/>
{{ $book->tipas }}<br/>
<br/>
{{ $book->aprasymas }}
<br/><br/>

@if(true)
	Tik klientams:<br/>
	<a href="" class="btn-sm btn-dark">Vertinti</a><br/><br/>
@endif

@if(true)
	Tik darbuotojams:<br/>
	@if (session('danger'))
		<div class="alert alert-danger">
			{{ session('danger') }}
		</div>
	@endif
	<a href="{{ route('book.edit', $book->id) }}" class="btn-sm btn-dark">Redaguoti knygą</a>
	<a href="{{ route('book.delete', $book->id) }}" class="btn-sm btn-danger">Šalinti knygą</a>
	<div class="container">
		<div class="row my-2">
			<span>Egzemplioriai:</span>
		</div>
		<div class="row">
			<form method="post" action="{{ route('bookcopy.create') }}" style="width: 100%;">
				<div class="input-group mb-2">
					<input type="text" name="kodas" class="form-control"/>
					<input type="hidden" name="id" value="{{ $book->id }}" />
					{{ csrf_field() }}
					<div class="input-group-append">
						<button class="btn btn-success" type="submit">Pridėti</button>
					</div>
				</div>
			</form>
		</div>
		@foreach(\App\BookCopy::all()->where('fk_kurinysID', $book['id']) as $bookCopy)
			<div class="row">
				<form method="post" action="{{ route('bookcopy.delete') }}" style="width: 100%;">
					<div class="input-group mb-2">
						<input type="text" class="form-control" value="{{ $bookCopy->kodas }}" disabled />
						<input type="hidden" name="id" value="{{ $bookCopy->id }}" />
						{{ csrf_field() }}
						<div class="input-group-append">
							<input class="btn btn-danger" type="submit" value="Šalinti" />
						</div>
					</div>
				</form>
			</div>
		@endforeach
	</div>
@endif

@endsection