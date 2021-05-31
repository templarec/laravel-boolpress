@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <a href="{{route('index')}}"> <i class="fas fa-angle-left"></i> Torna alla lista</a>
                    <div class="card">
                        <div class="card-header">{{$post->title}} </div>

                        <div class="card-body">
                            <h5>Categoria:
                                @if ($post->category)
                                    <a href="{{ route('category.index', ['slug' => $post->category->slug])}}">{{$post->category->name}}</a>
                                @endif
                            </h5>
                            <small>Tags:
                                @foreach($post->tags as $tag)
                                    <a href="{{ route('tags.show', ['slug' => $tag->slug]) }}">{{$tag->name}}</a>
                                @endforeach
                            </small>
                            <div class="contenuto">{{$post->content}}</div>

                            @if($post->img_path != NULL)
                                <img class="img-fluid" src="{{ asset('storage/' . $post->img_path) }}" alt="{{$post->title}} image">
                            @endif
                            <div class="autore">{{$post->author}}</div>

                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
