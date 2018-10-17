<?php

namespace App\Services;

use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class AnalyzeImage
{
    /**
     * @param string $path
     * @return array
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getLandscape($path)
    {
        $image = $this->getImagePath($path);

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->landmarkDetection($image);
        $landmarks = $response->getLandmarkAnnotations();

        //printf('%d landmark found:' . PHP_EOL, count($landmarks));

        //dd($landmarks);
        $description = $this->getDescription($landmarks);
        //dd($description);

        $imageAnnotator->close();

        return $description;
    }

    /**
     * @param $landmarks
     * @return array
     */
    public function getDescription($landmarks)
    {
        $description = [];
        foreach ($landmarks as $landmark) {
            $description[] = $landmark->getDescription();
        }

        return $description;
    }

    /**
     * @param string $path
     * @return bool|resource
     */
    public function getImagePath($path)
    {
        return fopen('../storage/app/' . $path, 'r');
    }
}