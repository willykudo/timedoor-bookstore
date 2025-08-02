<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('list', 10);
        $search = $request->input('search');  

        $books = Book::with(['author', 'category'])
            ->leftJoin('ratings', 'books.id', '=', 'ratings.book_id')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->select(
                'books.id',
                'books.title',
                'books.category_id',
                'books.author_id',
                DB::raw('AVG(ratings.rating) as average_rating'),
                DB::raw('COUNT(ratings.id) as voter_count')
            )
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('books.title', 'like', "%{$search}%")
                      ->orWhere('authors.name', 'like', "%{$search}%");
                });
            })
            ->groupBy('books.id', 'books.title', 'books.category_id', 'books.author_id')
            ->orderByDesc('average_rating')
            ->paginate($perPage);

        return view('books.index', compact('books'));
    }
}
