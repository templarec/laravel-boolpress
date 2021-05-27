@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Inserimento nuovo post') }}</div>

                    <div class="card-body">
                        <form action="{{route('admin.posts.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="title">Titolo</label>
                            <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ old('title') }}">
                            @error('title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id"></label>
                            <select name="category_id" id="category_id">
                                <option value="">Seleziona categoria...</option>
                                @foreach($categories as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Contenuto</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"> {{ old('content') }}</textarea>
                            @error('content')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Salva</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
