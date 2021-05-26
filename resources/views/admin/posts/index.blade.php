@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($posts as $post)
                <div class="card">
                    <div class="card-header">{{$post->title}} <span><a href="{{route('admin.posts.edit', ['post' => $post->id])}}"><i class="far fa-edit"></i></a></span></div>

                    <div class="card-body">
                        <div class="contenuto">{{$post->content}}</div>
                        <div class="autore">{{$post->author}}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
