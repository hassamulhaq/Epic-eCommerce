<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{

    public function __invoke(Request $request)
    {
        $response = [];

        $path = storage_path('tmp/uploads');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $files = $request->file('files');
        foreach($files as $index => $file) {
            $name = uniqid() . '_' . trim($file->getClientOriginalName());
            $file->move($path, $name);


            $response[$index]['name'] = $name;
            $response[$index]['original_name'] = $file->getClientOriginalName();

        }

        return response()->json($response);
    }
}
