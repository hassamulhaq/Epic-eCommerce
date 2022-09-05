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
        if (is_array($files)) {
            foreach($files as $index => $file) {
                $name = uniqid() . '_' . trim($file->getClientOriginalName());
                $file->move($path, $name);


                $response[$index]['name'] = $name;
                $response[$index]['original_name'] = $file->getClientOriginalName();
            }
        } elseif (is_object($files)) {
            $name = uniqid() . '_' . trim($files->getClientOriginalName());
            $files->move($path, $name);

            $response[0]['name'] = $name;
            $response[0]['original_name'] = $files->getClientOriginalName();
        }

        return response()->json($response);
    }
}
