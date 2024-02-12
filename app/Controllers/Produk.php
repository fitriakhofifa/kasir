<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;

class Produk extends BaseController
{
    protected $produkM;

    function __construct()
    
    {
        $this->produkM = new ModelProduk();
    }

    public function index()
    {
        return view ('v_produk');
    }

    public function ambilSemua()
    {
        $data = $this->produkM->findAll();

        return json_encode($data); //data dirubah menjadi json
    }

    public function simpan(){
        $this->produkM->insert([
            'nama_produk'=> $this->request->getVar('namaProduk'),
            'harga'=> $this->request->getVar('harga'),
            'stok'=> $this->request->getVar('stok'),
        ]);

        return 'sukses';
    }
    public function edit() 
    {
        $id = $this->request->getVar('id');
        $data = $this->produkM->find($id);

        return json_encode($data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');

        $this->produkM->update($id,[
            'nama_produk' => $this->request->getVar('namaProduk'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
        ]);
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->produkM->delete($id);

    }
}
