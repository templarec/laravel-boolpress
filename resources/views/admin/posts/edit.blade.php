
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Modifica post</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ old('title', $post->title) }}">
                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id"></label>
                        <select name="category_id" id="category_id">
                            @foreach($categories as $categoria)
                                <option value="{{$categoria->id}}" {{ $post->category_id == $categoria->id ? 'selected' : '' }}>{{$categoria->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"> {{ old('content', $post->content) }}</textarea>
                        @error('content')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        @if($post->img_path != NULL)
                            <img class="img-thumbnail float-right" src="{{ asset('storage/' . $post->img_path) }}" alt="{{$post->title}} image">
                        @endif
                        <label for="image">Media</label>
                        <input class="form-control @error('image') is-invalid @enderror" id="image" type="file" name="image" value="{{ old('image', $post->img_path) }}">
                        @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tag">Tags</label>
                        <select class="form-control @error('tag_id') is-invalid @enderror" id="tag" name="tag_id[]" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}" {{ $post->tags->contains($tag) ? 'selected' : '' }}>{{$tag->name}}</option>
                            @endforeach
                        </select>
                        @error('tag_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection
