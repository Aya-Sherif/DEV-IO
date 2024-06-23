@extends('layouts.nav')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                <a href="{{ url('users/create') }}" class='btn btn-primary my-3'> Add New user</a>
                <h1 class="p-3 border text-center my-3">All users</h1>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }} </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }} </td>
                                <td> <a href="{{ url('users/'.$user->id.'/edit') }}" class='btn btn-primary my-3'> Edit</a></td>
                                <form action="{{ url('users/' . $user->id) }}" method="user">
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
 