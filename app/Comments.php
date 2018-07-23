<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['id', 'User_id', 'post_id', 'comment'];
}
