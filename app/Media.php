<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';

    protected $fillable = [
        'path', 'extension', 'title', 'description', 'dateuploaded', 'size', 'userid'
    ];

    protected $appends = [
        'full_path'
    ];

    public function getFullPathAttribute()
    {
        return '/assets/images/media/' . $this->path;
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'mediaid');
    }
}
