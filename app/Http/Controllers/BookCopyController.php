<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCopy;
use Illuminate\Http\Request;

class BookCopyController extends Controller
{
    public function create(Book $book)
    {
        return view('pages.book.copy.edit', [
            'book' => $book
        ]);
    }

    public function store(Request $request, Book $book): \Illuminate\Http\RedirectResponse
    {
        $book
            ->copies()
            ->createMany(array_fill(0, $request->count, [
                'edition' => $request->edition
            ]));
        return redirect()
            ->route('book.edit', $book->id)
            ->with('success', 'Kopya kitap eklendi.');
    }

    public function edit(Book $book, BookCopy $bookCopy)
    {
        $book->load('author', 'publisher', 'block', 'categories');
        return view('pages.book.copy.edit', [
            'copy' => $bookCopy,
            'book' => $book,
        ]);
    }

    public function update(Request $request, Book $book, BookCopy $bookCopy): \Illuminate\Http\RedirectResponse
    {
        $bookCopy->update($request->only('edition'));
        return back()->with('success', 'Kopya kitap güncellendi');
    }

    public function destroy(Book $book, BookCopy $bookCopy): \Illuminate\Http\RedirectResponse
    {
        $bookCopy->delete();
        return redirect()
            ->route('book.edit', $book->id)
            ->with('success', 'Kopya kitap silindi.');
    }
}
