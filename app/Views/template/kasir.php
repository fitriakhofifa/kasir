<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<div class="col-12 mt-3">
    <div class="row">
        <!-- Bagian Kiri (Daftar Menu) -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Menu List</h3>
                </div>
                <div class="card-body">
                    <!-- Kategori Menu -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-info">All</button>
                        <button type="button" class="btn btn-info">Food</button>
                        <button type="button" class="btn btn-info">Drink</button>
                    </div>
                    <div class="custom-scroll" style="max-height: 420px; overflow-y: auto;">
                    <!-- Daftar Card Menu -->
                    <div class="row mt-3">
                    
                        <!-- Card 1 -->
                        <div class="col-md-6">
                            <div class="card">
                                <img src="<?= base_url('/foto/makanan.jpg') ?>" class="card-img-top" alt="Food Image" style="width: 100%; height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">Spaghetti</h5>
                                    <p class="card-text">Rp. 25.000</p>
                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 (Tambahkan card lainnya sesuai kebutuhan) -->
                        <div class="col-md-6">
                            <div class="card">
                                <img src="<?= base_url('/foto/minuman.jpg') ?>" class="card-img-top" alt="Drink Image" style="width: 100%; height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">Milkshake Choco</h5>
                                    <p class="card-text">Rp. 15.000</p>
                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <img src="<?= base_url('/foto/makanan.jpg') ?>" class="card-img-top" alt="Food Image" style="width: 100%; height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">Spaghetti</h5>
                                    <p class="card-text">Rp. 25.000</p>
                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 (Tambahkan card lainnya sesuai kebutuhan) -->
                        <div class="col-md-6">
                            <div class="card">
                                <img src="<?= base_url('/foto/minuman.jpg') ?>" class="card-img-top" alt="Drink Image" style="width: 100%; height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">Milkshake Choco</h5>
                                    <p class="card-text">Rp. 15.000</p>
                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <img src="<?= base_url('/foto/makanan.jpg') ?>" class="card-img-top" alt="Food Image" style="width: 100%; height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">Spaghetti</h5>
                                    <p class="card-text">Rp. 25.000</p>
                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 (Tambahkan card lainnya sesuai kebutuhan) -->
                        <div class="col-md-6">
                            <div class="card">
                                <img src="<?= base_url('/foto/minuman.jpg') ?>" class="card-img-top" alt="Drink Image" style="width: 100%; height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">Milkshake Choco</h5>
                                    <p class="card-text">Rp. 15.000</p>
                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian Kanan (Transaksi Kasir) -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Transaction</h3>
                </div>
                <div class="card-body">
                    <!-- Tabel Transaksi -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Isi Tabel Transaksi -->
                            <tr>
                                <td>Spaghetti</td>
                                <td>Rp. 25.000</td>
                                <td>1</td>
                                <td>Rp. 25.000</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm">+</button>
                                    <button type="button" class="btn btn-primary btn-sm">-</button>
                                    <button type="button" class="btn btn-danger btn-sm">Remove</button>
                                </td>
                            </tr>
                            <!-- Tambahkan baris lainnya sesuai dengan transaksi -->
                        </tbody>
                    </table>

                    <!-- Total Pembayaran -->
                    <div class="text-right">
                        <h6>Total: Rp. 25.000</h6>
                        <h6>Uang: Rp. 50.000</h6>
                        <h6>Kembalian: Rp. 25.000</h6>
                    </div>

                    <!-- Tombol Checkout -->
                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-success">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>