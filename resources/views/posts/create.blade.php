@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Title" value="{{ old('title') }}" name="title">
                </div>
                <div class="form-group">
                    <label>Body</label>
                    <textarea class="form-control" placeholder="Body" rows="5" name="body">
                        {{ old('body') }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ url('/posts') }}" class="btn btn-primary ml-3">Posts</a>
            </form>
        </div>
    </div>
</div>
@endsection
