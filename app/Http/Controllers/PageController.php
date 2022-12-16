<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $books = Book::paginate(8);
        return view('welcome', compact('books'));
    }

    public function search(Request $request)
    {
        $books = Book::where('name', 'LIKE', '%' . $request->search . '%')->paginate(8);
        return view('book', compact('books'));
    }
}
