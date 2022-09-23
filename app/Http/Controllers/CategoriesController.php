<?php

namespace App\Http\Controllers;

use App\Helpers\Constant;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(30);
        return view('commerce.categories.index', compact(['categories']));
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::updateOrCreate([
            'id' => $request->input('id')
        ], [
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
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

    public function destroy(Request $request)
    {
        $request->validate(['id' => 'exists:categories,id']);


        if ($request->input('id') == Constant::UNCATEGORIZED_CATEGORY_ID) {
            $response = ['error' => 'You cannot delete this record'];
        } else {
            Category::where('id', '=', $request->input('id'))->delete();
            $response = ['success' => 'Record Deleted'];
        }

        return redirect()->route('admin.categories.index')->with($response);
    }


    public function uniqueSlug(Request $request)
    {
        return SlugService::createSlug(Category::class, 'slug', $request->input('title'), ['unique' => true]);
    }
}
