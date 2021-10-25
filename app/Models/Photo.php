<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Photo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getUrl(){
        return Storage::url($this->url);
    }

    public function getSvg(){
        $path = Storage::get('public/logo_sena.png');
        $vt = url("/vt/$this->id");
        $qr = QrCode::format('png')->size(100)->mergeString($path, .3)->generate($vt);
        return $qr;
    }

    public function getTotal($vt){
        $v = VotePhoto::where('vote_id', $vt)->where('photo_id', $this->id)->get();
        return $v->count();
    }
}
