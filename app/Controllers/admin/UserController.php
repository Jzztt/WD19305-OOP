<?php

namespace App\Controllers\admin;

use App\Controller;
use App\Models\User;
use Rakit\Validation\Validator;

class UserController extends Controller
{
    private User $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->findAll();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $title = 'Create User';
        return view('admin.users.create', compact('title'));
    }

    public function store()
    {
        $data = $_POST + $_FILES;
        $validator = new Validator();

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'address' => 'required',
            'avatar' => 'required|uploaded_file:0,500K,png,jpeg,jpg',
            'type' => [
                'required',
                $validator('in', ["admin", "client"]),
            ],
        ];
        $errors = $this->validate($validator, $data, $rules);

        if (!empty($errors)) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = "Thêm Thất bại";
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $_POST;
            redirect('/admin/users/create');
        } else {
            $_SESSION['data'] = null;
        }

        if (is_upload('avatar')) {
            $data['avatar'] = $this->uploadFile($_FILES['avatar'], 'users');
        } else {
            $data['avatar'] = null;
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->user->insert($data);

        redirect('/admin/users');
        $_SESSION['status'] = true;
        $_SESSION['msg'] = "Thêm Thành Công";
    }

    public function show() {}
    public function edit() {}
    public function delete() {}
}