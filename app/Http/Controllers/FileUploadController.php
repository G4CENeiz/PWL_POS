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
            'document' => 'required|file|image|max:500',
        ]);
        if ($request->hasFile('document')) {
            echo 'path(): ' . $request->document->path();
            echo '<br>';
            echo 'extension(): ' . $request->document->extension();
            echo '<br>';
            echo 'getClientOriginalExtension(): ' . $request->document->getClientOriginalExtension();
            echo '<br>';
            echo 'getMimeType(): ' . $request->document->getMimeType();
            echo '<br>';
            echo 'getClientOriginalName(): ' . $request->document->getClientOriginalName();
            echo '<br>';
            echo 'getSize(): ' . $request->document->getSize();
            echo '<br>';
        } else {
            echo 'no document has been uploaded';
        }
    }
}
