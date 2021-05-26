@extends('layouts.app')

@foreach($posts as $post)
    <p>{{$post->title}}</p>
@endforeach
