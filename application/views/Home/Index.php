<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <?php foreach ($produk as $data) : ?>
                    <div class="col-sm-3 col-md-3 col-lg-3 shadow bg-white">
                        <a href="<?= base_url('Home/detail_produk/') . $data['id_produk'] ?>" class="bg-dark">
                            <div class="position-relative">
                                <img src="<?= base_url('upload/produk/') . $data['foto_produk'] ?>" class="img-fluid">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-success text-lg">
                                        <?= $data['ukuran_produk'] ?>
                                    </div>
                                </div>
                                <br>
                                <div class="position-relative p-1">
                                    <h4 class="text"><?= $data['nama_produk'] ?></h4>
                                    <h5 class="text-danger"><?= "Rp. " . number_format($data['harga_produk'], 0, ',', '.'); ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->