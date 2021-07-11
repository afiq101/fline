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
        $medias = Media::join('user_likes', 'user_likes.media_id','=','medias.id')->where('user_likes.user_id', Auth::id())->get();
        return view('profile', compact('medias'));
    }
}
