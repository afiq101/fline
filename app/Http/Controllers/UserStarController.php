<?php

namespace App\Http\Controllers;

use App\UserStar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserStarController extends Controller
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

        $hasStar = $user->userStar()->where('media_id', $validated->media_id)->first();

        if (isset($hasStar)) {
            return $this->destroy($hasStar->id);
        }

        $user->userStar()->create([
            'media_id' => $validated->media_id
        ]);

        return response(['status' => 1, 'media_id' => $validated->media_id]);
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $media = $user->userStar()->find($id);
        $media->delete();

        return response(['status' => 0, 'media_id' => $media->media_id]);
    }
}
