<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Penjualan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NO ANTRIAN</th>
                                    <th>PEMBELI</th>
                                    <th>JUMLAH ITEM</th>
                                    <th>HARGA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                <?php $no = 1; ?>
                                <?php foreach ($transaksi as $data) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['no_antrean'] ?></td>
                                        <td><?= $data['nama_pembeli'] ?></td>
                                        <td><?= $data['jumlah'] ?></td>
                                        <td><?= "Rp. " . number_format($data['harga'], 0, ',', '.'); ?></td>
                                    </tr>
                                    <?php $total = $total + $data['harga'] ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">Total</td>
                                    <td><?= "Rp. " . number_format($total, 0, ',', '.'); ?></td>
                                </tr>
                            </tfoot>
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

<script>
    window.onload = function() {
        window.print();
    }
</script>