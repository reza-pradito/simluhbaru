<?php

namespace App\Controllers\manage;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $model;

    public function __construct()
    {

        $this->model = new UserModel();
    }
    public function index()
    {

        $query = $this->model->findAll();
        $data = [
            'title' => 'Manajemen User',
            'dt' => $query
        ];

        return view('manage/user', $data);
    }
}
