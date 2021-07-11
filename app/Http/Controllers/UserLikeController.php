<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

    }

    public function store(Request $request)
    {
        $validated = (object) Validator::make($request->all(), [
            'media_id' => 'required|exists:medias,id'
        ])->validate();

        $user = Auth::user();

        $hasLiked = $user->userLike()->where('media_id', $validated->media_id)->first();

        if (isset($hasLiked)) {
            return $this->destroy($hasLiked->id);
        }

        $user->userLike()->create([
            'media_id' => $validated->media_id
        ]);

        return response(['status' => 1, 'media_id' => $validated->media_id]);
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $media = $user->userLike()->find($id);
        $media->delete();

        return response(['status' => 0, 'media_id' =>  $media->media_id]);
    }
}
