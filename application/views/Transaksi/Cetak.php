<?php
$id_pembeli = 0;
foreach ($transaksi as $data) {
    $id_pembeli = $data['id_pembeli'];
}
$pembeli = $this->db->get_where('pembeli', ['id_pembeli' => $id_pembeli])->row_array();
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 align="center">INVOICE ORDER</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label>Nama: <?= $pembeli['nama_pembeli'] ?></label>
            <br>
            <label>Alamat: <?= $pembeli['alamat_pembeli'] ?></label>
            <br>
            <label>No HP: <?= $pembeli['nohp_pembeli'] ?></label>
            <br>
            <label>Email: <?= $pembeli['email_pembeli'] ?></label>
            <br>
        </div>
        <div class="col-6">
            <label>No Antrean: <?= $antrean ?></label>
            <br>
            <?php if ($bayar != null) { ?>
                <label>Status Pembayaran: LUNAS</label>
            <?php } ?>
            <?php if ($bayar == null) { ?>
                <label>Status Pembayaran: MENUNGGU PEMBAYARAN</label>
            <?php } ?>
            <br>
            <?php if ($status != null) { ?>
                <label>Status: <?= $status['status'] ?></label>
            <?php } ?>
            <?php if ($status == null) { ?>
                <label>Status: Menuggu Konfimasi Pembayaran</label>
            <?php } ?>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Produk</td>
                        <td>Ukuran</td>
                        <td>Jumlah</td>
                        <td>Harga / Pcs</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php $total = 0; ?>
                    <?php foreach ($transaksi as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama_produk'] ?></td>
                            <td><?= $data['ukuran_produk'] ?></td>
                            <td><?= $data['jumlah'] ?></td>
                            <td><?= "Rp. " . number_format($data['harga_produk'], 0, ',', '.'); ?></td>
                            <td><?= "Rp. " . number_format($data['harga_produk'] * $data['jumlah'], 0, ',', '.'); ?></td>
                        </tr>
                        <?php $total = $total + ($data['harga_produk'] * $data['jumlah']); ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">Total</td>
                        <td><?= "Rp. " . number_format($total, 0, ',', '.'); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label>Pembayaran Bisa Dilakukan via Transfer Bank</label>
            <br>
            <label>Rekening:</label>
            <br>
            <label>BCA: 0123456789 a/n TRAVERN</label>
            <br>
            <label>BRI: 0123456789 a/n TRAVERN</label>
            <br>
            <label>Mandiri: 0123456789 a/n TRAVERN</label>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        window.print();
    }
</script>