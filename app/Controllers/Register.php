<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        return view('v_register');
    }
    public function process()
    {
        if(!$this->validate([
            'username'=>[
                'rules'=>
                'required|min_length[4]|max_length[20]|is_unique[tb_user.username]',
                'errors'=> [
                    'required'=> '{field} Harus diisi',
                    'min_length'=> '{field} Minimal 4 Karakter',
                    'max_length'=> '{field} Maksimal 20 Karakter',
                    'is_unique'=> 'Username sudah digunakan sebelumnya'
                ]
                ],
            'password'=>[
                'rules'=>
                'required|min_length[4]|max_length[50]',
                'errors'=>[
                    'required'=>'{field} Harus diisi',
                    'min_length'=> '{field} Minimal 4 Karakter',
                    'max_length'=> '{field} Maksimal 20 Karakter',
                ]
            ],
            'password_conf'=>[
                'rules'=> 'matches[password]',
                'errors'=>[
                'matches'=> 'Konfirmasi Password tidak sesuai',
                ]
            ],
            'nama'=>[
                'rules'=>
                'required|min_length[4]|max_length[100]',
                'errors'=>[
                    'required'=>'{field} Harus diisi',
                    'min_length'=> '{field} Minimal 4 Karakter',
                    'max_length'=> '{field} Maksimal 100 Karakter',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $tb_user = new UserModel();
        $tb_user->insert([
            'username'=>$this->request->getVar('username'),
            'password'=> password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'nama'=>$this->request->getVar('nama')
        ]);
        return redirect()->to('/login');
    }
}