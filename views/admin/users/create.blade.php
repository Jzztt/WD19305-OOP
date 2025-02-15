@extends('admin.layouts.index')



@section('content')
    @include('admin.components.display-msg-fail')
    @include('admin.components.display-msg-success')

    <div class="row">
        <div class="col-12 mb-4 mb-lg-0">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <form action="/admin/users/store" method="POST" enctype="multipart/form-data">
                            <div class="mb-3 row">
                                <label for="name" class="col-4 col-form-label">Name</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" name="name" id="name"
                                        />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-4 col-form-label">Email</label>
                                <div class="col-8">
                                    <input type="email" class="form-control" name="email" id="email"
                                         />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-4 col-form-label">Password</label>
                                <div class="col-8">
                                    <input type="password" class="form-control" name="password" id="password" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="confirm_password" class="col-4 col-form-label">Confirm Password</label>
                                <div class="col-8">
                                    <input type="password" class="form-control" name="confirm_password"
                                        id="confirm_password" />
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
