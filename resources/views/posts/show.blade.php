@extends('layouts.nav')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">

                <h1 class="p-3 border text-center my-3">{{$post->title}}</h1>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">{{ $post->user->name."-".$post->created_at->format('Y-m-d') }}</h5>
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{$post->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
