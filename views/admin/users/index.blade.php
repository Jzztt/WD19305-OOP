@extends('admin.layouts.index')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </nav>
    <h2>List Users</h2>

    <div class="col-12 mb-4">
        <a href="/admin/users/create" class="btn btn-primary">Create</a>
        <div class="card mt-4">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user['id'] }}</th>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['address'] }}</td>
                                <td>{{ $user['type'] }}</td>
                                <td>
                                    <a href="/admin/users/show/{{ $user['id'] }}" class="btn btn-info">Show</a>
                                    <a href="/admin/users/edit/{{ $user['id'] }}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure?')" href="/admin/users/delete/{{ $user['id'] }}" class="btn btn-danger">DELETE</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
