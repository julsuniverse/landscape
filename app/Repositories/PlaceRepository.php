<?php

namespace App\Repositories;

use App\Models\Place;
use App\Models\User;

class PlaceRepository
{
    /**
     * @param \StdClass $landmark
     * @param User $user
     * @param string $img
     */
    public function create(\StdClass $landmark, User $user, string $img)
    {
        $place = new Place();
        $place->name = $landmark->description;
        $place->lat = $landmark->location->lat;
        $place->lng = $landmark->location->lng;
        $place->photo = $img;
        $place->user_id = $user->id;
        try {
            $place->save();
        } catch (\Exception $e) {
            throw new \DomainException($e->getMessage());
        }
    }
}