<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>TRAVERN</b>Shop</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Register</p>

                <form action="<?= base_url("Auth/register") ?>" method="post">
                    <label class="text-danger"><?= form_error('nama') ?></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama" name="nama">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <label class="text-danger"><?= form_error('email') ?></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <label class="text-danger"><?= form_error('alamat') ?></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-map"></span>
                            </div>
                        </div>
                    </div>
                    <label class="text-danger"><?= form_error('no_hp') ?></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="No HP" name="no_hp">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <label class="text-danger"><?= form_error('pass') ?></label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="pass">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>
                <br>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Login jika belum memiliki akun</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->