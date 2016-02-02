<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPhotoRequest;
use Illuminate\Http\Request;
use Response;
use App\Flyer;
use App\Photo;

class PhotosController extends Controller
{
    /**
     * Store a new foto.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($zip, $street, Request $request)
    {
        $flyer = Flyer::locatedAt($zip,$street);
        return Response::json($request->file(),200);
        $photo = $request->file('file');
        $name = $photo->fileName();

        //$photo = Photo::fromFile($request->file('file'))->upload();
        $flyer->photos()->create(['path' => "/flyers/photos/{$name}"]);
    }
}
