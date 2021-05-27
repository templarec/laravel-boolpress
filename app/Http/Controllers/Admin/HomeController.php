<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

   public function index() {
       $posts = Post::all();
       return view('admin.posts.index', compact('posts'));
   }
    public function dashboard() {

        return view('admin.dashboard');
    }
}
