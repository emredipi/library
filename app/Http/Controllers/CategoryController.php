<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('pages.category.index', [
            'categories' => Category::paginate(10)
        ]);
    }

    public function create()
    {
        return view('pages.category.edit');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $category = Category::create($request->only('name'));
        return redirect()
            ->route('category.edit', $category->id)
            ->with('success', 'Kategori eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('pages.category.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category): \Illuminate\Http\RedirectResponse
    {
        $category->update($request->only('name'));
        return back()->with('success', 'Kategori Kaydedildi');
    }

    public function destroy(Category $category): \Illuminate\Http\RedirectResponse
    {
        $category->delete();
        return redirect()
            ->route('category.index')
            ->with('success', 'Kategori Silindi');
    }
}
