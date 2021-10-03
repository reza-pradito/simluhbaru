<?php

namespace App\Controllers\master;

use App\Controllers\BaseController;
use App\Models\MasterModel;


class Jabatan extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->session = service('session');
        $this->config = config('Auth');
        $this->auth = service('authentication');

        $this->model = new MasterModel();
    }

    public function index()
    {
        if (session()->get('username') == "") {
            return redirect()->to('login');
        }
        //$penyuluhModel = new MasterModel();
        $jabatan = $this->model->findAll();

        //dd($jabatan);

        $data = [
            'title' => 'Jabatan',
            'dt' => $jabatan
        ];

        return view('master/jabatan', $data);
    }

    public function save()
    {
        $this->model->save([
            'nama_jab' => $this->request->getVar('jabatan'),
        ]);

        return redirect()->to('master/jabatan');
    }

    public function edit($id)
    {
        $jabatan = $this->model->getDataById($id);
        echo $jabatan;
    }

    public function delete($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('master/jabatan');
    }
}
