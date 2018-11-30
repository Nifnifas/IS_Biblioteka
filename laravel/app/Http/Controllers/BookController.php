<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\BookCopy;

class BookController extends Controller
{
	// IS-NAUDOTOJAS
	
    public function listBooks(){ // ???
		return view('book-list')->with('books', Book::all());
	}
	
    public function viewBook($id){
		$book = Book::find($id);
		if ($book != null){
			return view('book-view')->with('book', $book);
			return $id;
		}else{
			return redirect('/book-list');
		}
	}
	
	// KLIENTAS
		// patikrinti ar klientas
	
    public function listMarkedBooks(){ // ??? // pazymetu kuriniu saraso langas
		// patikrinti ar klientas
		//return listView();
		return redirect('/book-list');
	}
	
    public function markBook(Request $request){ // ???
		$id = $request->input('id');
		$book = Book::find($id);
		if ($book == null){
			return redirect('/book-list');
		}
		
		$marker = BookMarker::all()->where('fk_klientasID', $id)->where('fk_kurinysID', $id);
		if ($marker->count() > 0){
			
		}else{
			$marker = BookMarker::make();
			$marker->fk_klientasID = $clientID; // ?????
			$marker->fk_kurinysID = $id;
			$marker->save();
		}
		return redirect()->route('book.view', $book->id);
	}
	
    public function rateBook(Request $request){ // ???
		// patikrinti ar klientas
		//return listView();
		
		$rating = $request->input('rating');
		if ($rating == null){
			
		}
		return redirect()->route('book.view', $book->id);
	}
	
	// DARBUOTOJAS
		// patikrinti ar darbuotojas
	
    public function createBook(){
		return view('/book-form')->with('book', Book::make());
	}
	
    public function createBookData(Request $request){
		$book = Book::make();
		
		$book->pavadinimas = $request->input('pavadinimas');
		$book->autorius = $request->input('autorius');
		$book->isleidimo_metai = $request->input('metai');
		$book->aprasymas = $request->input('aprasymas');
		
		if (false){ // cia daryti validavima
			$request->session()->flash('danger', 'Neteisingi duomenys');
			return view('book-form')->with('book', $book);
		}
		
		$book->save();
		return redirect('/book-list');
	}
	
    public function editBook($id){
		$book = Book::find($id);
		if ($book == null){
			return redirect('/book-list');
		}
		
		return view('book-form')->with('book', $book);
	}
	
    public function editBookData(Request $request, $id){
		$book = Book::find($id);
		if ($book == null){
			return redirect('/book-list');
		}
		
		$book->pavadinimas = $request->input('pavadinimas');
		$book->autorius = $request->input('autorius');
		$book->isleidimo_metai = $request->input('metai');
		$book->aprasymas = $request->input('aprasymas');
		
		if (false){ // cia daryti validavima
			$request->session()->flash('danger', 'Neteisingi duomenys');
			return view('book-form')->with('book', $book);
		}
		
		$book->save();
		return redirect()->route('book.view', $book->id);
	}
	
    public function deleteBook(Request $request, $id){
		$book = Book::find($id);
		if ($book != null){
			$bookCopies = BookCopy::all()->where('fk_kurinysID', $id);
			if ($bookCopies->count() > 0){
				$request->session()->flash('danger', 'Negalima šalinti, kol yra egzempliorių'); // papildomas pranesimas per session
				return redirect()->route('book.view', $book->id);
			}
			$book->delete();
		}
		
		return redirect('/book-list');
	}
	
    public function createCopy(Request $request){
		$id = $request->input('id');
		$book = Book::find($id);
		if ($book == null){
			return redirect('/book-list');
		}
		
		$bookCopy = BookCopy::make();
		$bookCopy->kodas = $request->input('kodas');
		$bookCopy->fk_kurinysID = $id;
		$bookCopy->ivedimo_data = date("Y-m-d");
		$bookCopy->save();
		
		return redirect()->route('book.view', $book->id);
	}
	
    public function deleteCopy(Request $request){
		$id = $request->input('id');
		$bookCopy = BookCopy::find($id);
		$book = Book::where('id', $bookCopy->fk_kurinysID)->first();
		
		if ($bookCopy != null){
			//$contracts = \App\Contract::all()->where('fk_egzemplioriusID', $id);
			//if ($contracts->count() > 0){
			//	$request->session()->flash('danger', 'Egzempliorius yra priskirtas sutartyje'); // papildomas pranesimas per session
			//	return redirect()->route('book.view', $book->id);
			//}
			
			$bookCopy->delete();
		}
		
		return redirect()->route('book.view', $book->id);
	}
}
