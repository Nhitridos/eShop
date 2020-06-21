@extends('layouts.app')

@section('content')
    <h1>{{$post->title}}</h1>
    <div>
        {!! $post->body !!}
    </div>
    <hr><a href="/posts" class="btn btn-outline-secondary">Back</a>
    {{-- <a href="/posts/answer" class="btn btn-outline-secondary" style = float:right>Answer</a> --}}
    {{-- <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-secondary">Edit</a> --}}
    <hr><small>Written on {{$post->created_at}} by {{$post->user->name}}. Last update on {{$post->updated_at}} by {{$post->user->name}}.</small>

    {{-- Delete Post --}}
    {{-- <hr>{!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'style' => "float:right"]) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!! Form::close() !!} --}}
@endsection