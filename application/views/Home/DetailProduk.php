<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $produk['nama_produk'] ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none"><?= $produk['nama_produk'] . " - " . $produk['ukuran_produk'] ?></h3>
                        <div class="col-12">
                            <img src="<?= base_url('upload/produk/') . $produk['foto_produk'] ?>" class="product-image" alt="Product Image">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3"><?= $produk['nama_produk'] . " - " . $produk['ukuran_produk'] ?></h3>
                        <hr>
                        <h4 class="mt-3">Stok: <?= $produk_masuk['jumlah'] - $produk_keluar['jumlah'] ?></h4>
                        <!-- <h4 class="mt-3">Ukuran <small>Please select one</small></h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                <span class="text-xl">S</span>
                                <br>
                                Small
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                <span class="text-xl">M</span>
                                <br>
                                Medium
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                <span class="text-xl">L</span>
                                <br>
                                Large
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                <span class="text-xl">XL</span>
                                <br>
                                Xtra-Large
                            </label>
                        </div> -->

                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                <?= "Rp. " . number_format($produk['harga_produk'], 0, ',', '.'); ?>
                            </h2>
                        </div>

                        <div class="mt-4">
                            <?php if ($produk_masuk['jumlah'] - $produk_keluar['jumlah'] > 0) :  ?>
                                <form action="<?= base_url('Home/addKeranjang/') . $produk['id_produk'] ?>" method="post">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Masukkan Jumlah:</label>
                                            <input type="number" class="form-control" name="jumlah" value="1">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-shopping-cart"></i> Tambah ke Keranjang</button>
                                        </div>
                                    </div>
                                </form>
                            <?php endif; ?>
                            <?php if ($produk_masuk['jumlah'] - $produk_keluar['jumlah'] <= 0) :  ?>
                                <div class="btn btn-danger btn-lg btn-flat">
                                    <i class="fas fa-exclamation-triangle fa-lg mr-2"></i>
                                    Habis
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                            <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                        <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->