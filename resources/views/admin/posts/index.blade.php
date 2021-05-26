@extends('layouts.app')

@foreach($posts as $post)
    <p>{{$post->title}}</p>
    <p>{{$post->content}}</p>
    <p>{{$post->author}}</p>
@endforeach
