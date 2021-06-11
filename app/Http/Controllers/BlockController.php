<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BlockController extends Controller
{

    public function index()
    {
        return view('pages.block.index', [
            'blocks' => Block::query()
                ->when(
                    \request()->has('search'),
                    fn(Builder $q) => $q->where('code', 'like', '%'.\request()->search.'%')
                )
                ->paginate(10)
                ->withQueryString()
        ]);
    }

    public function create()
    {
        return view('pages.block.edit');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $block = Block::create($request->only('code'));
        return redirect()
            ->route('block.edit', $block->id)
            ->with('success', 'Blok eklendi.');
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
