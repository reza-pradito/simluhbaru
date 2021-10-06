<?php

namespace App\Controllers\profil;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        helper('autentikasi');
    }

    public function index()
    {
        if (session()->get('username') == "") {
            return redirect()->to('login');
        }
        $AdminModel = new AdminModel();
        $dtAdmin = $AdminModel->getProfil(session()->get('status_user'));

        $data = [
            'title' => 'Profil Admin',
            'dt' => $dtAdmin
        ];

        return view('admin/profiladmin', $data);
        //}
    }
}
