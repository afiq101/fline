<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Media extends Model
{
    protected $table = 'medias';

    protected $fillable = [
        'path', 'extension', 'title', 'description', 'dateuploaded', 'size', 'userid'
    ];

    protected $appends = [
        'full_path', 'like_count', 'user_star', 'user_like'
    ];

    public function getFullPathAttribute()
    {
        return '/assets/images/media/' . $this->path;
    }

    public function getLikeCountAttribute()
    {
        return $this->userLike()->count();
    }

    public function getUserStarAttribute()
    {
        if (Auth::user()) {
            if ($this->userStar()->where('user_id', Auth::user()->id)->count() > 0) {
                return true;
            }
        }
        return false;
    }

    public function getUserLikeAttribute()
    {
        if (Auth::user()) {
            if ($this->userLike()->where('user_id', Auth::user()->id)->count() > 0) {
                return true;
            }
        }
        return false;
    }

    public function userLike()
    {
        return $this->hasMany(UserLike::class, 'media_id');
    }

    public function userStar()
    {
        return $this->hasMany(UserStar::class, 'media_id');
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'mediaid');
    }
}
