<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//tabel produk
$routes->get('/produk','Produk::index');
$routes->get('/produk/tampil','Produk::ambilSemua');
$routes->post('/produk/simpan','Produk::simpan');
$routes->get('/produk/edit', 'Produk::edit');
$routes->post('/produk/update', 'Produk::update');
$routes->post('/produk/delete', 'Produk::delete');

//tabel pelanggan
$routes->get('/pelanggan','Pelanggan::index');
$routes->get('/pelanggan/tampil','Pelanggan::ambilSemua');
$routes->post('/pelanggan/simpan','Pelanggan::simpan');
$routes->get('/pelanggan/edit', 'Pelanggan::edit');
$routes->post('/pelanggan/update', 'Pelanggan::update');
$routes->post('/pelanggan/delete', 'Pelanggan::delete');

//kasir
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::admin');
$routes->get('/kasir', 'Home::kasir');

//user
$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');

//registrasi
$routes->get('/register', 'Register::index');
$routes->post('/register/process', 'Register::process');

//penjualan
$routes->get('/penjualan', 'PenjualanController::index');
$routes->get('/penjualan/getPenjualan', 'PenjualanController::getPenjualan');
$routes->post('/penjualan/addToCart', 'PenjualanController::addToCart');