<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPhotoRequest;
use Illuminate\Http\Request;
use Photo;
use Flyer;

class PhotoController extends Controller
{
    /**
     * Store a new foto.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($zip, $street, AddPhotoRequest $request)
    {
        $flyer = Flyer::locatedAt($zip,$street);
        $photo = $request->file('photo');

        //$photo = Photo::fromFile($request->file('file'))->upload();
        $flyer->photos()->create(['path' => "/flyers/photos/{$name}"]);
    }
}
