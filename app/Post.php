<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'author',
        'category_id'
    ];
    public function categories() {
        return $this->belongsTo('App\Category');
    }
    public function tags() {
        return $this->belongsTo('App\Tag');
    }
}
