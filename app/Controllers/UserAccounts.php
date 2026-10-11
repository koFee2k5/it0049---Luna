<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserAccounts extends BaseController
{
    public function index(): string
    {
        $users = (new UserModel())->orderBy('id', 'ASC')->findAll();

        return view('accounts/users', ['title' => 'User Accounts', 'users' => $users]);
    }
}
