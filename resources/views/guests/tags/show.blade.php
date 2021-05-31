@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{route('index')}}"> <i class="fas fa-angle-left"></i> Torna alla lista</a>
                    <div class="card">
                        <div class="card-header">{{$tags->name}} </div>

                    </div>

            </div>
        </div>
    </div>
@endsection
