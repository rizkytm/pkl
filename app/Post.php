<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'lembaga', 'penulis1', 'penulis2', 'topic', 'category_id', 'condition'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function file()
    {
        return $this->hasMany(File::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
