<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class HomePhotoController extends Controller
{
    public function index(Request $request){
        $photos = Photo::whereStatus('Activo')->get();
        $init = 0;
        return view('welcome', compact('photos', 'init'));
    }
}
