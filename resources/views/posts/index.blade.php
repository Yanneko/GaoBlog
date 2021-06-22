@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">
                    Posts
                </div>
                @foreach ($posts as $post)
                <div class="card-body">
                    <h5 class="card-title">Title: {{ $post->title }}</h5>
                    <p class="card-text">Body: {{ $post->body }}</p>
                    <p class="card-text">Author: {{ $post->user->name }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Details</a>
                </div>
                <div class="card-footer text-muted">
                    Posted at: {{ $post->created_at }}
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
        </div>
    </div>
</div>
@endsection
