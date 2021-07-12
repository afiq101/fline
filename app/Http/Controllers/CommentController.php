<?php

namespace App\Http\Controllers;

use App\Media;
use App\UserComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function displayComment($mid)
    {
        $comments = UserComment::where('media_id', $mid)->join('users', 'users.id', '=', 'user_comments.user_id')
            ->select('users.*','user_comments.*','user_comments.created_at as commented_at')
            ->orderBy('user_comments.created_at', 'desc')
            ->get();

        $owner = Media::where('medias.id',$mid)->join('users', 'users.id', '=', 'medias.userid')
        ->select('users.*', 'medias.*', 'medias.created_at as uploaded_at')->get();

        return view('comment.comment', compact('comments', 'owner', 'mid'));
    }

    public function addComment(Request $request, $mid) {
        $comment = new UserComment([
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'media_id' => $mid
        ]);
        $comment->save();

        return response()->json([
            'success' => true
        ]);
    }
}
