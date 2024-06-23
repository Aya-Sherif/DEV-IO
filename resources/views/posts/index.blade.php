@extends('layouts.nav')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                <a href="{{ url('posts/create') }}" class='btn btn-primary my-3'> Add New Post</a>
                <h1 class="p-3 border text-center my-3">All Posts</h1>
                @if(session()->get('success')!=null)
                <div class="alert alert-success p-1">
                    <ul>

                        {{session()->get('success')}}
                    </ul>
                </div>
                @endif

            </div>
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-12">

                <table class="table table-bordered">

                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>User</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }} </td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->user->name }} </td>
                                <td> <a href="{{ url('posts/'.$post->id.'/edit') }}" class='btn btn-primary my-3'> Edit</a></td>
                                <form action="{{ url('posts/' . $post->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <td><input type="submit" value="Delete" class='btn btn-danger my-3'> </input></td>
                                </form>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
