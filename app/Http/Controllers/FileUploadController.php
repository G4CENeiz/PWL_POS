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
        $fileExt = $request->document->getClientOriginalName();
        $fileName = 'web-' . time() . '.' . $fileExt;
        $path = $request->document->storeAs('uploads', $fileName);
        echo 'upload process successful, file is located at: ' . $path;
    }
}
