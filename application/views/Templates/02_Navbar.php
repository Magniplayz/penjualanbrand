<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?= base_url() ?>" class="navbar-brand">
                    <!-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                    <span class="brand-text font-weight-light">TRAVERN</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                    </ul>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-user"></i>
                            <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header"><?= $pembeli['nama_pembeli'] ?></span>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-box mr-2"></i>Order
                                <span class="float-right text-muted text-sm">0</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <!-- <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a> -->
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('Auth/logout') ?>" class="dropdown-item dropdown-footer">Logout</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Keranjang</h5>
                <?php foreach ($keranjang as $data) : ?>
                    <div class="row mt-3 shadow p-2">
                        <div class="col-sm-3">
                            <img src="<?= base_url('upload/produk/') . $data['foto_produk'] ?>" width="50">
                        </div>
                        <div class="col-sm-8">
                            <h5><?= $data['nama_produk'] . " - " . $data['ukuran_produk'] . "(" . $data['jumlah'] . ")" ?></h5>
                            <p><?= "Rp. " . number_format($data['harga_produk'] * $data['jumlah'], 0, ',', '.'); ?></p>
                        </div>
                        <div class="col-sm-1">
                            <a href="<?= base_url('Home/delKrjg/') . $data['id_keranjang'] ?>"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="row mt-3">
                    <div class="col-sm-12 mx-auto">
                        <a href="#" class="btn btn-success btn-flat">Checkout</a>
                    </div>
                </div>
            </div>
        </aside>
        <!-- /.control-sidebar -->