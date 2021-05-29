@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{route('admin.categories.create')}}">Crea categoria</a>
                @foreach($categories as $category)
                <div class="card">
                    <div class="card-header"><a href="{{route('category.index', ['slug' => $category->slug])}}"> {{$category->name}} </a><span><a href="{{route('admin.categories.edit', ['category' => $category->id])}}"><i class="far fa-edit"></i></a></span></div>

                    <div class="card-body">
                        <a href="{{route('admin.categories.show', ['category' => $category->id])}}">Mostra</a>
                        <a class="btn" onclick="event.preventDefault();
                                  this.nextElementSibling.submit();">Cancella</a>
                        <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="POST" style="display: none;">
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
