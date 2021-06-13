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
                        <li class="breadcrumb-item"><a href="<?= base_url('Karyawan') ?>">Karyawan</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                            <form method="post" action="<?= base_url('Karyawan/edit/') . $data_karyawan['id_karyawan'] ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nama Karyawan</label>
                                        <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama" value="<?= $data_karyawan['nama_karyawan'] ?>">
                                        <p class="text-danger"><?= form_error('nama') ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email Karyawan</label>
                                        <input name="email" type="email" class="form-control" placeholder="Masukkan Email" value="<?= $data_karyawan['email_karyawan'] ?>">
                                        <p class="text-danger"><?= form_error('email') ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">No HP Karyawan</label>
                                        <input name="no_hp" type="number" class="form-control" placeholder="Masukkan No HP" value="<?= $data_karyawan['nohp_karyawan'] ?>">
                                        <p class="text-danger"><?= form_error('no_hp') ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password Karyawan</label>
                                        <input name="pass" type="password" class="form-control" placeholder="Masukkan Password" value="<?= $data_karyawan['pass_karyawan'] ?>">
                                        <p class="text-danger"><?= form_error('pass') ?></p>
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