<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\History;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = 'book-' . time() . '-' . $request->image->getClientOriginalName();
        $request->image->move(public_path('uploads'), $image);

        $book = Book::create([
            'name' => $request->name,
            'image' => $image,
            'description' => $request->description
        ]);

        return redirect()->route('admin.book.show', $book->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $histories = History::where('book_id', $book->id)
            ->orderBy('loan_due', 'desc')
            ->get();
        return view('admin.book.show', compact('book', 'histories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        if ($request->image) {
            $image = 'book-' . time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $image);
        } else {
            $image = $book->image;
        }

        $book->update([
            'name' => $request->name,
            'image' => $image,
            'description' => $request->description
        ]);

        return redirect()->route('admin.book.show', $book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
