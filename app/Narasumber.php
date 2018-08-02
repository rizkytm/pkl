<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Narasumber extends Model
{
	protected $fillable = ['post_id', 'nama', 'kontak'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
