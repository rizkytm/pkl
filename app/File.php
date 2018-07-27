<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['post_id', 'filename'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
