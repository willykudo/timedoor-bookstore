<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function top()
    {
        $authors = Author::withCount([
            'ratings as total_voter' => function ($query) {
                $query->where('rating', '>', 5);
            }
        ])
        ->orderByDesc('total_voter')
        ->take(10)
        ->get();

        return view('authors.top', compact('authors'));
    }
}
