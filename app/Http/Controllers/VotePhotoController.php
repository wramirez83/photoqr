<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Vote;
use App\Models\VotePhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VotePhotoController extends Controller
{
    public function vt(Request $res){
        $validation = Validator::make($res->all(), [
            'id' => 'required',
        ]);
        if(!$validation->fails()) 
        return redirect()->route('home')->withErrors($validation->errors());
        $vtActive = Vote::whereStatus('Activo')->first();
        if(!$vtActive){
            return redirect()->route('inactive');
        }
        $photo = Photo::find($res->id);
        return view('prevote', compact('photo'));
    }
    public function vtSave(Request $res){
        $validation = Validator::make($res->all(), [
            'id' => 'required',
        ]);
        if($validation->fails()) return response()->route('home')->withErrors($validation->errors());

        $vtActive = Vote::whereStatus('Activo')->first();
        VotePhoto::create([
            'photo_id' => $res->id,
            'vote_id' => $vtActive->id,
            'mac' => $_SERVER["HTTP_CLIENT_IP"] ?? '0.0.0.0'

        ]);
        return redirect()->route('tk');
    }

    public function tk(Request $request){
        return view('tk');
    }

    public function result(Request $res){
        $votes = Vote::all();
        if(isset($res->vote_id)){
            $vt = Vote::find($res->vote_id);
            $photos = Photo::whereStatus('Activo')->get();
            return view('result', compact('votes', 'vt', 'photos'));
        }
        return view('result', compact('votes'));
    }
}
