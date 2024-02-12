<?= $this->extend ('/template/layout'); ?>
<?= $this->section ('content'); ?>

<body class = "d-flex flex-column h-100">
    <!-- Begin Page Content-->
    <main class ="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">Register Form</h1>
            Silahkan Daftarkan Identitas Anda 
            <hr/>
            <?php if(!empty(session()->getFlashdata('error'))):?>
            <div class="alert alert warning alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('error');?>
            </div>
            <?php endif; ?>
            <form method="post" action="<?=base_url();?>register/process">
                <?=csrf_field();?>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="password_conf" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_conf" name="password_conf">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
            </hr>
        </div>
    </main>
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <a href="/login" class="text-info stretched-link">Login Sekarang</a>
        </div>
    </footer>
</body>
<?= $this->endSection ('content'); ?>