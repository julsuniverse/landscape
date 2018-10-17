<?php

namespace App\Http\Controllers;

use App\Services\AnalyzeImage;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $analyzeImageService;
    public function __construct(AnalyzeImage $analyzeImageService)
    {
        $this->analyzeImageService = $analyzeImageService;
    }

    public function index()
    {
        return view('search.index');
    }

    public function upload(Request $request)
    {
        $file = $request->file('photo');
        $path = $file->store('images');

        $result = $this->analyzeImageService->getLandscape($path);

        return route('show', ['result' => $result]);
    }

    public function show(Request $request)
    {
        $result = $request->result;
        return view('search.show', compact('result'));
    }
}