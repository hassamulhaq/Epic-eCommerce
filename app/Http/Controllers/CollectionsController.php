<?php

namespace App\Http\Controllers;

use App\Helpers\Constant;
use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    public function index()
    {
        $collections = Collection::paginate(30);
        return view('commerce.collections.index', compact(['collections']));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $collection = Collection::updateOrCreate([
            'id' => $request->input('id')
        ], [
            'name' => $request->input('name'),
            'slug' => is_null($request->input('slug')) ? \Str::slug($request->input('name')) : \Str::slug($request->input('slug')),
            'description' => $request->input('short_description')
        ]);

        if (!$collection) return redirect()->back()->with(['error' => 'Something went wrong']);

        return redirect()->back()->with(['success' => 'Action succeed!']);
    }

    public function show(Collection $collection)
    {
    }

    public function edit(Collection $collection)
    {
    }

    public function update(Request $request, Collection $collection)
    {
    }

    public function destroy(Collection $collection, Request $request)
    {
        $request->validate(['id' => 'exists:collections,id']);

        if ($request->input('id') == Constant::UNCATEGORIZED_COLLECTION_ID) {
            $response = ['error' => 'You cannot delete this record'];
        } else {
            Collection::where('id', '=', $request->input('id'))->delete();
            $response = ['success' => 'Record Deleted'];
        }

        return redirect()->route('admin.collections.index')->with($response);
    }
}
