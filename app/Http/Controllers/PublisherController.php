<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        return view('pages.publisher.index', [
            'publishers' => Publisher::paginate(10)
        ]);
    }

    public function create()
    {
        return view('pages.publisher.edit');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $publisher = Publisher::create($request->only('name'));
        return redirect()
            ->route('publisher.edit', $publisher->id)
            ->with('success', 'Yayınevi kaydedildi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        //
    }

    public function edit(Publisher $publisher)
    {
        return view('pages.publisher.edit', [
            'publisher' => $publisher
        ]);
    }

    public function update(Request $request, Publisher $publisher)
    {
        $publisher->update($request->only('name'));
        return back()->with('success', 'Yayınevi kaydedildi.');
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()
            ->route('publisher.index')
            ->with('success', 'Yayınevi silindi.');
    }
}
