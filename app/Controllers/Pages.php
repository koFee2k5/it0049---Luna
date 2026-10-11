<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function home(): string
    {
        $today = date('Y-m-d');
        $tasks = (new TaskModel())->where('task_date', $today)->orderBy('status', 'ASC')->findAll();

        return view('pages/home', ['title' => 'Today', 'tasks' => $tasks, 'today' => $today]);
    }

    public function about(): string
    {
        return view('pages/about', ['title' => 'About']);
    }

    public function profile(): string
    {
        $user = (new UserModel())->orderBy('id', 'ASC')->first();

        return view('pages/profile', ['title' => 'Profile', 'user' => $user]);
    }
}
