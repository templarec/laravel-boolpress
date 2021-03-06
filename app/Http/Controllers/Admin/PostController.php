<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Mail\SendNewMail;
use App\Post;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Psr\Log\NullLogger;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'))->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'exists:categories,id|nullable',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'img_path' => 'image|max:2048|nullable',
            'tag_id.*' => 'exists:tags,id' //asterisco se inserisco più di un tag nel form
        ]);
        $currentUser = Auth::user();
        $data = $request->all();

        $img_path = NULL;
        if(array_key_exists('img_path', $data)) {
            $img_path = Storage::put('uploads', $data['image']);
        }
        $post = new Post();
        $post->fill($data);
        $post->slug = $this->generaSlug($post->title);
        $post->author = $currentUser->email;

        $post->img_path = $img_path;

        $post->save();
        if(array_key_exists('tags_id', $data)) {
            $post->tags()->attach($data['tags_id']);
        }

        Mail::to($currentUser->email)->send(new SendNewMail());
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'exists:categories,id|nullable',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'img_path' => 'image|max:2048|nullable',
            'tag_id.*' => 'exists:tags,id'
        ]);
        $data = $request->all();
        $data['slug']= $this->generaSlug($data['title'], $post->title != $data['title']);

        if (array_key_exists('img_path', $data)) {
            $img_path = Storage::put('uploads', $data['image']);
            $data['img_path'] = $img_path;
        }


        $post->update($data);

        if (array_key_exists('tag_id', $data)) {
            $post->tags()->sync($data['tag_id']);
        } else {
            $post->tags()->detach();
        }
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
    private function generaSlug(string $title, bool $change = true) {
        $slug = Str::slug($title, '-');

        if (!$change) {
            return $slug;
        }

        $slugBase = $slug;
        $cont = 1;

        $post_with_slug = Post::where('slug', '=', $slug)->first();
        while ($post_with_slug) {
            $slug = $slugBase . '-' . $cont;
            $cont++;

            $post_with_slug = Post::where('slug', '=', $slug)->first();
        }
        return $slug;
    }
}
