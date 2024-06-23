@extends('layouts.nav')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">

                <h1 class="p-3 border text-center my-3">All Posts</h1>
            </div>
        </div>
    </div>
    @foreach ($posts as $post)
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">{{ $post->created_at->format('Y-m-d') }}</h5>
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ \Str::limit($post->description, 50) }}</p>
                            <a href="{{url('posts/show/'.$post->id)}}" class="btn btn-primary">Show Post</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
