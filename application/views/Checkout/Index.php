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
                        <li class="breadcrumb-item active">Checkout</li>
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
                            <h3 class="card-title">Halaman Checkout / Order</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NO ANTRIAN</th>
                                        <th>JUMLAH ITEM</th>
                                        <th>HARGA</th>
                                        <th>PEMBAYARAN</th>
                                        <th>STATUS</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($checkout as $data) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['no_antrean'] ?></td>
                                            <td><?= $data['jumlah'] ?></td>
                                            <td><?= "Rp. " . number_format($data['harga'], 0, ',', '.'); ?></td>
                                            <td>
                                                <?php
                                                if ($data['id_bayar'] == null) {
                                                    echo "Menunggu Pembayaran";
                                                } else {
                                                    echo "Pembayaran Sudah Dikonfirmasi";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($data['id_status'] == null) {
                                                    echo "Menunggu Konfirmasi Pembayaran";
                                                } else {
                                                    echo $data['status'];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a title="Cetak Invoice" target="__blank" href="<?= base_url('Checkout/cetak/') . $data['no_antrean'] ?>" class="btn btn-success btn-flat"><i class="fas fa-print"></i></a>
                                                <?php if ($data['status'] == 'Sedang Dikirim') : ?>
                                                    <a title="Pesanan Telah Sampai" href="<?= base_url('Checkout/selesai/') . $data['no_antrean'] ?>" class="btn btn-primary btn-flat"><i class="fas fa-check"></i></a>
                                                <?php endif; ?>
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