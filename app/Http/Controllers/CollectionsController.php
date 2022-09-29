<?php

namespace App\Http\Controllers;

use App\Helpers\Constant;
use App\Models\Collection;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CollectionsController extends Controller
{

    protected array $response = [];

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
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'description' => $request->input('short_description')
        ]);

        if (!$collection) {
            $this->response = [
                'success' => false,
                'status' => 'error',
                'status_code' => ResponseAlias::HTTP_INTERNAL_SERVER_ERROR,
                'type' => 'try_catch exception',
                'message' => 'Something went wrong!',
                'data' => []
            ];
            return \response()->json($this->response);
        }

        $this->response = [
            'success' => true,
            'status' => 'success',
            'status_code' => ResponseAlias::HTTP_CREATED,
            'message' => 'Action succeed!',
            'data' => []
        ];

        return \response()->json($this->response);
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


    public function uniqueSlug(Request $request)
    {
        return SlugService::createSlug(Collection::class, 'slug', $request->input('title'), ['unique' => true]);
    }
}
