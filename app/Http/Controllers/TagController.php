<?php

namespace App\Http\Controllers;



use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $slug)
    {
        // voglio stampare tutti i post di una data categoria
        $tag = Tag::with('posts')->where('slug', '=', $slug)->first();

        return view('guests.posts.index')->with('posts', $tag->posts);
    }
}
