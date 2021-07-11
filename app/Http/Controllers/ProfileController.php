<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use App\UserLike;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $medias = UserLike::where('user_id', Auth::id())->join('medias','medias.id','=','user_likes.media_id')
        ->get();
        return view('profile', compact('medias'));
    }
}
