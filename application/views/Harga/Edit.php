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
                        <li class="breadcrumb-item"><a href="<?= base_url('Harga') ?>">Harga</a></li>
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
                            <form method="post" action="<?= base_url('Harga/edit/') . $harga['id_harga'] ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Ukuran</label>
                                        <input name="ukuran" type="text" class="form-control" placeholder="Masukkan Ukuran" value="<?= $harga['ukuran_produk'] ?>">
                                        <p class="text-danger"><?= form_error('ukuran') ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input name="harga" type="number" class="form-control" placeholder="Masukkan Harga" value="<?= $harga['harga_produk'] ?>">
                                        <p class="text-danger"><?= form_error('harga') ?></p>
                                    </div>
                                    <!-- <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                </div> -->
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