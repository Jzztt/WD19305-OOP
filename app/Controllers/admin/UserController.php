<?php

namespace App\Controllers\admin;

use App\Models\User;

class UserController
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

    public function store()
    {

        $newUser = [
            'name' => "Nguyen Van A",
            'email' => "z0aU0@example.com",
            'password' => password_hash("123456", PASSWORD_DEFAULT),
            'address' => "Hanoi",
            'type' => 'client',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $id = $this->user->insert($newUser);
        print_r($id);
    }
}
