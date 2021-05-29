@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($posts as $post)
                <div class="card">
                    <div class="card-header"><a href="{{route('posts.show', ['slug' => $post->slug])}}"> {{$post->title}} </a> <span class="float-right p-1"><a href="{{route('admin.posts.edit', ['post' => $post->id])}}"><i class="far fa-edit"></i></a></span> <a class="p-1 float-right" onclick="event.preventDefault();
                                  document.getElementById('{{$post->slug}}').submit();"><i class="far fa-trash-alt"></i></a> </div>

                    <div class="card-body">
                        @if($post->img_path != NULL)
                            <img class="img-thumbnail float-right" src="{{ asset('storage/' . $post->img_path) }}" alt="{{$post->title}} image">
                        @endif
                        <div class="contenuto">{{$post->content}}</div>
                        <div class="autore">{{$post->author}}</div>

                        <form  id="{{$post->slug}}" action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
