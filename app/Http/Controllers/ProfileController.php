<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use App\User;
use App\UserLike;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $data = Auth::user()->userLike()->get();
        $medias = $data->map(function ($item, $key) {
            return $item->media;
        });

        // $medias = Media::join('user_likes', 'user_likes.media_id','=','medias.id')->where('user_likes.user_id', Auth::id())->get();

        $totalPost = Media::where('userid', Auth::id())->count();
        return view('profile', compact('medias', 'totalPost'));
    }

    public function updateprofile(Request $request) 
    {
        $user = User::find(Auth::id());
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->hasfile('userimage')) {
            $file = $request->file('userimage');
            $extension = $file->getClientOriginalExtension(); //getting image extension
            $filename = time() . '.' . $extension;
            $file->move('assets/images/profile/', $filename);
            $user->userimage = $filename;
        }

        $user->save();

        return redirect('/profile');
    }
}
