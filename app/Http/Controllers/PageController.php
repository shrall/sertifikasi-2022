<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $books = Book::paginate(4);
        return view('welcome', compact('books'));
    }
}
