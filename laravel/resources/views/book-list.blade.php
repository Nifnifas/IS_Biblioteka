@extends('template')
@section('title', 'Knygų sąrašas')

@section('content')

@if ($books->count() > 0)
	<table class="table table-striped">
	@foreach($books as $book)
		<tr><td>
			<a href="{{ route('book.view', $book['id']) }}">{{ $book['pavadinimas'] }}</a>
			{{ $book['autorius'] }}
		</td></tr>
	@endforeach
	</table>
@endif

@endsection