<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{

    public function index()
    {
        return view('pages.block.index', [
            'blocks' => Block::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function show(Block $block)
    {
        //
    }

    public function edit(Block $block)
    {
        return view('pages.block.edit', [
            'block' => $block
        ]);
    }

    public function update(Request $request, Block $block): \Illuminate\Http\RedirectResponse
    {
        $block->update($request->only('code'));
        return back()->with('success', 'Block kaydedildi.');
    }

    public function destroy(Block $block): \Illuminate\Http\RedirectResponse
    {
        $block->delete();
        return redirect()
            ->route('block.index')
            ->with('success', 'Block silindi.');
    }
}
