<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(30);
        return view('commerce.categories.index', compact(['categories']));
    }

    public function store(Request $request)
    {
        $category = Category::updateOrCreate([
            'id' => $request->input('id')
        ], [
            'name' => $request->input('name'),
            'slug' => is_null($request->input('slug')) ? \Str::slug($request->input('name')) : \Str::slug($request->input('slug')),
            'description' => $request->input('short_description')
        ]);

        if (!$category) return redirect()->back()->with(['error' => 'Something went wrong']);

        return redirect()->back()->with(['success' => 'Action succeed!']);
    }

    public function edit(Category $category)
    {
    }

    public function update(Request $request, Category $category)
    {
    }

    public function destroy(Category $category)
    {
    }
}
