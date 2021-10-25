<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VoteController extends Controller
{
    public function index(Request $res){
        $votes = Vote::all();
        return view('vote', compact('votes'));
    }
    public function saveVote(Request $res){
        $validate = Validator::make($res->all(),[
            'competence' => 'required',
        ]);
        if($validate->fails()) return redirect()->back()->withErrors($validate->errors());

        //First change status of the competence
        Vote::whereStatus('Activo')->update(['status' => 'Inactivo']);
        Vote::create([
            'competence' => $res->competence
        ]);
        return redirect()->back();
    }
    public function changeStatus(Request $res){
        $validate = Validator::make($res->all(),[
            'id' => 'required',
        ]);
        if($validate->fails()) return redirect()->back()->withErrors($validate->errors());

        Vote::find($res->id)->update(['status' => 'Inactivo']);
        return redirect()->back();
    }
}
