<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    //
    protected $fillable = [
        'comment', 'user_id', 'media_id', 'isAnonymous'
    ];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
