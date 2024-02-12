<?= $this->extend ('/template/layout'); ?>
<?= $this->section ('content'); ?>

<body class = "text-center">
    <!-- Begin Page Content-->
        <div class="container py-5">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <main class="form-signin">
                        <?php if(!empty(session()->getFlashdata('error'))): ?>
                        <div class ="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                        <?php endif; ?>
                        <form method="post" action="<?=base_url();?>login/process">
                            <?=csrf_field();?>
                            <h1 class="h3 mb-3 fw-normal">Login</h1>
                            <input type="text" name="username" id="username" placeholder="Username" class="form-control mb-3 required autofocus">
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control mb-3 required">
                            <button type="submit" class="w-100 btn btn-lg btn-primary">Login</button>
                            <p class ="mt-5 mb-3">
                            <a href="/register" class="text-info stretched-link">Belum punya akun?</a>
                            </p>
                            <p class ="mt-5 mb-3 text-muted">&copy;Login Ci-4</p>
                        </form>
                    </main>
                </div>
            </div>
        </div>
</body>
<?= $this->endSection ('content'); ?>