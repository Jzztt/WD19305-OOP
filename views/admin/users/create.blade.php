@extends('admin.layouts.index')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>
    <h2>{{ $title }}</h2>
    @include('admin.components.display-msg-fail')
    @include('admin.components.display-msg-success')
    @include('admin.components.display-errors')

    <div class="row">
        <div class="col-12 mb-4 mb-lg-0">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <form action="/admin/users/store" method="POST" enctype="multipart/form-data">
                            <div class="mb-3 row">
                                <label for="name" class="col-4 col-form-label">Name</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" name="name" id="name" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-4 col-form-label">Email</label>
                                <div class="col-8">
                                    <input type="email" class="form-control" name="email" id="email" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-4 col-form-label">Password</label>
                                <div class="col-8">
                                    <input type="password" class="form-control" name="password" id="password" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-4 col-form-label">Address</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" name="address"
                                        id="address" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="avatar" class="col-4 col-form-label">Avatar</label>
                                <div class="col-8">
                                    <input type="file" class="form-control" name="avatar" id="avatar" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="type" class="col-4 col-form-label">Type</label>
                                <div class="col-8">
                                    <select class="form-select" name="type" id="type">
                                        <option value="admin">Admin</option>
                                        <option value="client">Client</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="type" class="col-4 col-form-label">Role</label>
                                <div class="col-8">
                                    <select class="form-select" name="role_id">
                                        @foreach ($roles as $role)
                                         <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="offset-sm-4 col-sm-8">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>

                                    <a href="/admin/users" class="btn btn-warning">
                                        Back to list
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
