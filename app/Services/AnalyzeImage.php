<?php

namespace App\Services;

use Google\Cloud\Vision\V1\AnnotateImageResponse;
use Google\Cloud\Vision\V1\EntityAnnotation;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\LocationInfo;
use stdClass;

class AnalyzeImage
{
    /**
     * @param string $path
     * @return \StdClass
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getLandmark($path)
    {
        $image = $this->getImagePath($path);

        $imageAnnotator = new ImageAnnotatorClient();
        /** @var AnnotateImageResponse $response */
        $response = $imageAnnotator->landmarkDetection($image);
        /** @var EntityAnnotation $landmarkObj */
        $landmarkObj = $response->getLandmarkAnnotations()[0];
        $imageAnnotator->close();

        $landmark = new StdClass();
        $landmark->img = $path;
        $landmark->description = $landmarkObj->getDescription();
        $landmark->location = $this->getLocation($landmarkObj);
        $landmark->score = round($landmarkObj->getScore() * 100, 2);

        return $landmark;
    }

    public function getLocation(EntityAnnotation $landmarkObj)
    {
        /** @var LocationInfo $locations */
        $locations = $landmarkObj->getLocations()[0];

        $latLong = new \StdClass();
        $latLong->lat = $locations->getLatLng()->getLatitude();
        $latLong->lng = $locations->getLatLng()->getLongitude();

        return $latLong;
    }

    /**
     * @param string $path
     * @return bool|resource
     */
    public function getImagePath($path)
    {
        return fopen(public_path() . '/' . $path, 'r');
    }
}