<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['post_id', 'question_id', 'answer'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
