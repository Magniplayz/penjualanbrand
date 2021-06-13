<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Produk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Master Produk</h3>
                            <a href="<?= base_url('Produk/add') ?>" class="btn btn-primary btn-flat float-right"><i class="fas fa-plus"></i></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA PRODUK</th>
                                        <th>UKURAN</th>
                                        <th>HARGA</th>
                                        <th>FOTO</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($produk as $data) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['nama_produk'] ?></td>
                                            <td><?= $data['ukuran_produk'] ?></td>
                                            <td><?= "Rp. " . number_format($data['harga_produk'], 0, ',', '.'); ?></td>
                                            <td><img width="100" src="<?= base_url('upload/produk/') . $data['foto_produk'] ?>"></td>
                                            <td>
                                                <a href="<?= base_url('Produk/edit/') . $data['id_produk'] ?>" class="btn btn-success btn-flat"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('Produk/delete/') . $data['id_produk'] ?>" class="btn btn-danger btn-flat"><i class="fas fa-trash" onclick="return confirm('Yakin akan menghapus produk?')"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->