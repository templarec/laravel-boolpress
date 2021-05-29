@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @foreach($posts as $post)
                    <div class="card">
                        <div class="card-header"><a href="{{route('posts.show', ['slug' => $post->slug])}}"> {{$post->title}} </a> </div>

                        <div class="card-body">
                            @if($post->img_path != NULL)
                                <img class="img-thumbnail float-right" src="{{ asset('storage/' . $post->img_path) }}" alt="{{$post->title}} image">
                            @endif
                            <div class="contenuto">{{$post->content}}</div>
                            <div class="autore">{{$post->author}}</div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
