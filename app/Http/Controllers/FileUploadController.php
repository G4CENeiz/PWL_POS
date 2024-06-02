<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload() {
        return view('file-upload');
    }

    public function doFileUpload(Request $request) {
        // return 'Hello World';
        // dump($request->document);
        $request->validate([
            'document' => 'required|file|image|max:5000',
        ]);
        $fileExt = $request->document->getClientOriginalExtension();
        $fileName = $request->documentName . '.' . $fileExt;

        $path = $request->document->move('image', $fileName);
        $path = str_replace("\\", "//", $path);

        $newPath = asset('image/' . $fileName);
        echo 'Tampilkan link:<a href="' . $newPath . '">' . $fileName . '</a><br>';
        echo '<img style="width: 100%" src="' . $newPath . '" alt="' . $fileName .'">';
    }
}
