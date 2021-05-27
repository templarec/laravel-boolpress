<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'author'
    ];
    public function categories() {
        return $this->belongsTo('App\Category');
}
}
