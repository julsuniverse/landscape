<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('photo');
        $path = $file->store('images');
        return $path;
    }
}