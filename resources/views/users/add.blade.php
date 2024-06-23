@extends('layouts.nav')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">

                <h1 class="p-3 text-center my-3">Add user</h1>
            </div>
        </div>
    </div>
    <div class="col-8 mx-auto">


        <form method="user" action="{{ url('users/store') }}" class="form border p-3 ">
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
            @if(session()->get('success')!=null)
            <div class="alert alert-success p-1">
                <ul>

                    {{session()->get('success')}}
                </ul>
            </div>
            @endif
            <div class="mb-3">
                <label for="title" class="form-label">user title</label>
                <input type="text" class="form-control" name="title"id="title" value="{{old('title')}}" placeholder="user Title">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">user Content </label>
                <textarea class="form-control" id="content" name="description"   rows="3"> {{old('description')}}</textarea>
            </div>
            <div class="mb-3">

                <select class="form-select form-select-sm" value="{{old('user')}}" name="user"aria-label="Writer">

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
