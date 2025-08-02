<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    public function create()
    {
        $authors = Author::all();
        $books = Book::all();

        return view('ratings.form', compact('authors', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'author_id' => 'required|exists:authors,id',
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:10',
        ]);

        $book = Book::where('id', $request->book_id)
                    ->where('author_id', $request->author_id)
                    ->first();

        if (!$book) {
            return back()->withErrors(['book_id' => 'Book does not belong to this author.'])->withInput();
        }

        Rating::create($request->only('rating', 'author_id', 'book_id'));

        return redirect('/books')->with('success', 'Rating submitted successfully!');
    }
}