<?php

namespace App\Http\Controllers;

use Google\Cloud\Vision\VisionClient;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class VisionController extends Controller
{
    public function index()
    {
        $path = asset('images/maidan.jpg');

        $imageAnnotator = new ImageAnnotatorClient();
        # annotate the image
        $image = file_get_contents($path);
        $response = $imageAnnotator->landmarkDetection($image);
        $landmarks = $response->getLandmarkAnnotations();
        printf('%d landmark found:' . PHP_EOL, count($landmarks));
        dd($landmarks);
        foreach ($landmarks as $landmark) {
            print($landmark->getDescription() . PHP_EOL);
        }
        $imageAnnotator->close();

    }
}
