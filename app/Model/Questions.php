<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $fillable = ['nomor', 'category_id', 'question'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
