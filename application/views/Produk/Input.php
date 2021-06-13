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
                        <li class="breadcrumb-item"><a href="<?= base_url('Produk') ?>">Produk</a></li>
                        <li class="breadcrumb-item active">Add</li>
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
                                <h3 class="card-title">Isi Form Di Bawah</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="<?= base_url('Produk/add') ?>" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nama Produk</label>
                                        <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama Produk">
                                        <p class="text-danger"><?= form_error('nama') ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ukuran</label>
                                        <select name="id_harga" class="form-control">
                                            <?php foreach ($harga as $data) : ?>
                                                <option value="<?= $data['id_harga'] ?>"><?= $data['ukuran_produk'] . " - " . "Rp. " . number_format($data['harga_produk'], 0, ',', '.') ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Foto</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                                            </div>
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
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