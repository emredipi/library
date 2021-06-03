<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Block;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {

        return view('pages.book.index', [
            'books' => Book::with('author', 'publisher', 'block')
                ->paginate(10)
        ]);
    }

    public function create()
    {
        return view('pages.book.edit', [
            'authors' => Author::all()->pluck('name', 'id'),
            'publishers' => Publisher::all()->pluck('name', 'id'),
            'blocks' => Block::all()->pluck('code', 'id'),
        ]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $book = Book::create($request->only([
            'name',
            'isbn',
            'edition', 'author_id',
            'publisher_id',
            'block_id'
        ]));
        return redirect()
            ->route('book.edit', $book->id)
            ->with('success', 'Kitap eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    public function edit(Book $book)
    {
        return view('pages.book.edit', [
            'book' => $book,
            'authors' => Author::all()->pluck('name', 'id'),
            'publishers' => Publisher::all()->pluck('name', 'id'),
            'blocks' => Block::all()->pluck('code', 'id'),
        ]);
    }

    public function update(Request $request, Book $book): \Illuminate\Http\RedirectResponse
    {
        $book->update($request->only([
            'name',
            'isbn',
            'edition', 'author_id',
            'publisher_id',
            'block_id'
        ]));
        return back()->with('success', 'Kitap kaydedildi');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()
            ->route('book.index')
            ->with('success', 'Kitap silindi.');
    }
}
