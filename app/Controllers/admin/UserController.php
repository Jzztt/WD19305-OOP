<?php

namespace App\Controllers\admin;

use App\Controller;
use App\Models\Role;
use App\Models\User;
use Rakit\Validation\Validator;

class UserController extends Controller
{
    private User $user;

    private Role $role;

    public function __construct()
    {
        $this->user = new User();
        $this->role = new Role();
    }

    public function index()
    {
        $users = $this->user->getAll();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $title = 'Create User';
        $roles = $this->role->findAll();
        return view('admin.users.create', compact('title', 'roles'));
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
            'avatar' => 'required',
            'role_id' => 'required',
            'type' => [
                'required',
                $validator('in', ["admin", "client"]),
            ],
        ];
        $errors = $this->validate($validator, $data, $rules);

        if (!empty($errors)) {
            $_SESSION['status']     = false;
            $_SESSION['msg']        = 'Thêm Thất bại!';
            $_SESSION['data']       = $_POST;
            $_SESSION['errors']     = $errors;


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

        $_SESSION['status'] = true;
        $_SESSION['msg'] = "Thêm Thành Công";
        redirect('/admin/users');
    }

    public function show() {}
    public function edit($id)
    {
        $title = 'Edit User';
        $user = $this->user->find($id);
        $roles = $this->role->findAll();
        return view('admin.users.edit', compact('title', 'user', 'roles'));
    }

    public function update($id)
    {
        $user = $this->user->find($id);

        $data = $_POST + $_FILES;
        $validator = new Validator();

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'avatar' => 'nullable',
            'role_id' => 'required',
            'type' => [
                'required',
                $validator('in', ["admin", "client"]),
            ],
        ];
        $errors = $this->validate($validator, $data, $rules);

        if (!empty($errors)) {
            $_SESSION['status']     = false;
            $_SESSION['msg']        = 'Sửa Thất bại!';
            $_SESSION['data']       = $_POST;
            $_SESSION['errors']     = $errors;

            redirect('/admin/users/edit/' . $id);
        } else {
            $_SESSION['data'] = null;
        }

        if (is_upload('avatar')) {
            $data['avatar'] = $this->uploadFile($_FILES['avatar'], 'users');
        } else {
            $data['avatar'] = $user['avatar'];
        }

        $data['updated_at'] = date('Y-m-d H:i:s');

        $this->user->update($id, $data);

        $_SESSION['status'] = true;
        $_SESSION['msg'] = "Sua Thanh Cong";
        redirect('/admin/users');
    }
    public function delete($id)
    {
        $user = $this->user->find($id);

        if (empty($user)) {
            redirect404();
            return;
        }
        $id = $this->user->delete($id);
        if (empty($id)) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = "Xoa That Bai";
            return;
        }

        $_SESSION['status'] = true;
        $_SESSION['msg'] = "Xoa Thanh Cong";
        redirect('/admin/users');
    }
}