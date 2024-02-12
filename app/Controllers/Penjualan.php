<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PenjualanModel;

class Penjualan extends BaseController
{
    public function index()
    {
        return view('penjualan/index');
    }
    
}
