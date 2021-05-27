@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crea nuova categoria{{--{{ __('Inserimento nuovo post') }}--}}</div>

                    <div class="card-body">
                        <form action="{{route('admin.categories.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="title">Nome categoria</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}">
                            @error('name')
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
