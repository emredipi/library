<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('pages.author.index', [
            'authors' => Author::paginate(10)
        ]);
    }

    public function create()
    {
        return view('pages.author.edit');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $author = Author::create($request->only('name', 'surname'));
        return redirect()
            ->route('author.edit', $author->id)
            ->with('success', 'Yazar eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    public function edit(Author $author)
    {
        return view('pages.author.edit', [
            'author' => $author
        ]);
    }

    public function update(Request $request, Author $author)
    {
        $author->update($request->only('name', 'surname'));
        return back()->with('success', 'Yazar güncellendi.');
    }

    public function destroy(Author $author): \Illuminate\Http\RedirectResponse
    {
        $author->delete();
        return redirect()
            ->route('author.index')
            ->with('success', 'Yazar silindi.');
    }
}
