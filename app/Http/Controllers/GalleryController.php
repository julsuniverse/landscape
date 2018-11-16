<?php

namespace App\Http\Controllers;

use App\Models\Place;

class GalleryController extends Controller
{
    public function index()
    {
        $places = Place::where('user_id', \Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('gallery.index', compact('places'));
    }
}