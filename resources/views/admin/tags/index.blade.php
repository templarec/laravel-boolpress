@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{route('admin.tags.create')}}">Crea tag</a>
                @foreach($tags as $tag)
                <div class="card">
                    <div class="card-header"><a href="{{route('tags.show', ['slug' => $tag->slug])}}"> {{$tag->name}} </a><span><a href="{{route('admin.tags.edit', ['tag' => $tag->id])}}"><i class="far fa-edit"></i></a></span></div>

                    <div class="card-body">

                        <a class="btn" onclick="event.preventDefault();
                                  this.nextElementSibling.submit();">Cancella</a>
                        <form action="{{route('admin.tags.destroy', ['tag' => $tag->id])}}" method="POST" style="display: none;">
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
