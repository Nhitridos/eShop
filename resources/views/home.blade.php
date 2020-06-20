@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in! :-)
                    <hr><h3>Your blog posts:</h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Post's title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}} <br><small>Created at {{$post->created_at}}.</small></td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-secondary">Edit</a></td>
                                    <td>
                                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'style' => "float:right"]) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no posts yet :-(</p>
                    @endif
                    <hr><a href="posts/create" class="btn btn-outline-secondary">Create Post</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
