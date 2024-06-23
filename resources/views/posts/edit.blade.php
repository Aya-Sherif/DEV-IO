@extends('layouts.nav')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">

                <h1 class="p-3 text-center my-3">Edit Post Info</h1>
            </div>
        </div>
    </div>
    <div class="col-8 mx-auto">


        <form method="Post" action="{{ url('posts/'.$post->id.'/update') }}" class="form border p-3 ">
            @method('PUT')
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger p-1">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="mb-3">
                <label for="title" class="form-label">Post title</label>
                <input type="text" class="form-control" value= "{{$post->title}}" name="title" placeholder="Post Title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Post Content </label>
                <textarea class="form-control" id="description"name='description' rows="3">{{$post->description}}</textarea>
            </div>
            <div class="mb-3">

                <select class="form-select form-select-sm" name="user" aria-label="Writer">

                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control bg-success" value="save" />
            </div>
        </form>

    </div>
@endsection
