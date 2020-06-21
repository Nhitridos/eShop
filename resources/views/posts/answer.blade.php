@extends('layouts.app')

@section('content')
    <h1>Answer</h1>
    {!! Form::open(['action' => ['PostsController@answer', $post->id], 'method' => 'POST']) !!}
        <fieldset disabled="disabled">
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('topic', 'Topic')}}
                <select id = "myList" name="topic">
                    <option value = "1" selected>Bylinky</option>
                    <option value = "2">Tilda</option>
                    <option value = "3">Ostatne</option>
                </select>
            </div>
        </fieldset>
        {{-- <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', , ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Text'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}} --}}
    {!! Form::close() !!}
@endsection