<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
     protected $pelanggan;

    function __construct()
    {
        $this->pelanggan = new PelangganModel();
    }
    public function index() 
    {
        return view ('v_pelanggan');
    }
    public function ambilSemua()
    {
        $data = $this->pelanggan->findAll();

        return json_encode($data); //data dirubah menjadi json
    }

    public function simpan(){
        $this->pelanggan->insert([
            'nama_pelanggan'=> $this->request->getVar('namaPelanggan'),
            'alamat'=> $this->request->getVar('alamat'),
            'nomor_telepon'=> $this->request->getVar('telp'),
        ]);

        return 'sukses';
    }
    public function edit() 
    {
        $id = $this->request->getVar('id');
        $data = $this->pelanggan->find($id);

        return json_encode($data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');

        $this->pelanggan->update($id,[
            'nama_pelanggan' => $this->request->getVar('namaPelanggan'),
            'alamat' => $this->request->getVar('alamat'),
            'nomor_telepon' => $this->request->getVar('telp'),
        ]);
    }
    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->pelanggan->delete($id);
    }
}