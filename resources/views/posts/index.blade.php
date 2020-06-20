@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-outline-secondary">Vsetky</a>
    <a href="/posts" class="btn btn-outline-secondary">Bylinky</a>
    <a href="/posts" class="btn btn-outline-secondary">Tilda</a>
    <a href="/posts" class="btn btn-outline-secondary">Ostatne</a>
    <a href="/posts/create" class="btn btn-outline-secondary" style="float:right">Create Post</a>
    <hr><h1>Blog</h1>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card" style="padding: 8px">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Written on {{$post->created_at}} by {{$post->user->name}}. Last update on {{$post->updated_at}} by {{$post->user->name}}.</small>
            </div>
        @endforeach
        {{-- {!! $posts->links() !!} -> pozriet pagination neskor--}}
    @else
        <p>No posts</p>
    @endif
@endsection