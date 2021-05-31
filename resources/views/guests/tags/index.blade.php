@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{dd($posts)}}
               {{-- @if(count($posts) < 1)
                    <div class="card-header">Nessun post per il tag selezionato</div>
                @endif--}}
                @foreach ($posts as $post)

                    <div class="col-md-3">
                        <div class="card">

                            <div class="card-header">{{$post->title}}</div>

                            <div class="card-body">
                                {{$post->content}}
                                <br>
                                <a href="{{ route('posts.show', ['slug' => $post->slug]) }}">Leggi...</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
