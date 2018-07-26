<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'narasumber', 'topic', 'category_id', 'question_id', 'answer', 'file'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function question()
    {
    	return $this->belongsTo(Questions::class);
    }
}

