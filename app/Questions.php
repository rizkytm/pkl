<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $fillable = ['id', 'post_id', 'question', 'answer'];
}
