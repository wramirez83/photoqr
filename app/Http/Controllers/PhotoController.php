<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class PhotoController extends Controller
{
    public function upload(Request $res){
        return view('upload-photo');
    }
    public function goingUp(Request $res){
        $validator = Validator::make($res->all(), [
            'photo' => 'required',
            'author' => 'required'
        ]);
        if($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        //Upload file
       $extension = $res->file('photo')->extension();
       $markTime = '_' . date('H') . '_' . date('m') . '_' . date('s') . '_' . date('u');
       $urlImage = $res->file('photo')->getClientOriginalName() . "$markTime." . $extension;
       $res->photo->storeAs('/public/img', $urlImage);

       $savePhoto = new Photo();
       $savePhoto->url = $urlImage;
       $savePhoto->author = $res->author;
       $savePhoto->description = $res->description;
       $savePhoto->save();

       return redirect()->route('uploaded', ['id' => $savePhoto->id]);
    }
    public function uploaded(Request $res){
        $photo = Photo::find($res->id);
        $path = Storage::get('public/logo_sena.png');

        $vt = url("/vt/$photo->id");
        //generate
        $qr = QrCode::format('png')->size(100)->mergeString($path, .3)->generate($vt);
        
        return view('uploaded', compact('photo', 'path', 'vt', 'qr'));
    }

    public function delete(Request $res){
        Photo::find($res->id)->update(['status' =>'Inactivo']);
        return redirect()->back();

    }
}
