@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{route('index')}}"> <i class="fas fa-angle-left"></i> Torna alla lista</a>
                    <div class="card">
                        <div class="card-header">{{$post->title}} </div>

                        <div class="card-body">
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
