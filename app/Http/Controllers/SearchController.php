<?php

namespace App\Http\Controllers;

use App\Repositories\PlaceRepository;
use App\Services\AnalyzeImage;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /** @var AnalyzeImage $analyzeImageService */
    private $analyzeImageService;
    /** @var PlaceRepository $placeRepository */
    private $placeRepository;

    public function __construct(
        AnalyzeImage $analyzeImageService,
        PlaceRepository $placeRepository
    )
    {
        $this->analyzeImageService = $analyzeImageService;
        $this->placeRepository = $placeRepository;
    }

    public function index()
    {
        return view('search.index');
    }

    public function upload(Request $request)
    {
        $file = $request->file('photo');
        $path = $file->store('images');

        return route('show', ['path' => $path]);
    }

    public function show(Request $request)
    {
        try {
            $landmark = $this->analyzeImageService->getLandmark($request->path);
        } catch (\Exception $e) {
            return redirect('/')->withErrors([$e->getMessage()]);
        }
        if ($user = \Auth::user()) {
            $this->placeRepository->create($landmark, $user, $request->path);
        }
        return view('search.show', compact('landmark'));
    }
}