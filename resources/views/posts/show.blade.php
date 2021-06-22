@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h5>Title: {{ $post->title }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">Body: {{ $post->body }}</p>
                <p>Posted at: {{ $post->created_at }}</p>
                <p>Author: {{ $post->user->name }}</p>
                <img src="{{ $post->image_path }}" alt="{{ isset($post->image_path) ? "image" : "" }}" class="mb-4">
                @if (isset($post->image_path))
                    <br>
                @endif
                
                <div class="row justify-content-around">
                    <a href="{{ url('/posts') }}" class="btn btn-primary">Posts</a>
                    @if ($post->user_id == Auth::id())
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                    <div class="col-2 p-0">
                        <form action='{{ route('posts.destroy', $post->id) }}' method='post'>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type='submit' value='Delete' class="btn btn-danger" onclick='return confirm("Are you sure you want to delete this post?");'>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('comments.store') }}" method="POST">
            {{csrf_field()}}
        <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    <label>Leave a Comment</label>
                    <textarea class="form-control" 
                     placeholder="Comment" rows="5" name="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($post->comments->sortByDesc('created_at') as $comment)
            <div class="card mt-3">
                <h5 class="card-header">Author: {{ $comment->user->name }}</h5>
                <div class="card-body">
                    <h5 class="card-title">Commented at: {{ $comment->created_at }}</h5>
                    <p class="card-text">Comment: {{ $comment->body }}</p>
                </div>
                @if ($comment->user_id == Auth::id())
                    <div class="d-flex justify-content-end">
                        <form action='{{ route('comments.destroy', $comment->id) }}' method='post' class="d-flex justify-content-end">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type='submit' value='Delete' class="btn btn-danger" onclick='return confirm("Are you sure you want to delete this comment?");'>
                        </form>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
