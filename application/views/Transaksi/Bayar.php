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
                        <li class="breadcrumb-item"><a href="<?= base_url('Transaksi') ?>">Transaksi</a></li>
                        <li class="breadcrumb-item active">Bayar</li>
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
                    <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Isi Form Di Bawah - Pembayaran No Antrian <?= $transaksi['no_antrean'] ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="<?= base_url('Transaksi/add_pembayaran/') . $transaksi['no_antrean'] ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">No Antrian</label>
                                        <input name="no_antrean" type="text" class="form-control" disabled value="<?= $transaksi['no_antrean'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Total Harga</label>
                                        <input type="text" class="form-control" disabled value="<?= "Rp. " . number_format($transaksi['harga'], 0, ',', '.'); ?>">
                                        <input type="hidden" name="harga" value="<?= $transaksi['harga'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jumlah Bayar</label>
                                        <input name="bayar" type="number" class="form-control" placeholder="Masukkan Jumlah Bayar">
                                        <p class="text-danger"><?= form_error('bayar') ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Bayar</label>
                                        <input name="tgl_bayar" type="date" class="form-control" placeholder="Masukkan Jumlah Bayar">
                                        <p class="text-danger"><?= form_error('tgl') ?></p>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->