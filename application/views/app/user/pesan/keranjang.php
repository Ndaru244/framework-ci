        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $nama_page ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                                <li class="breadcrumb-item active">Top Navigation</li>
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
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($keranjang as $cart) :
                                        $barang = $this->App_model->tampil_byid(array('id_brg' => $cart['id']),'barang')
                                    ?>
                                        <tr>
                                            <td><img src="<?= base_url('assets/uploads/thumbs/' . $barang->gambar_brg) ?>" class="img-size-50 img-fluid img-rounded"></td>
                                            <td><?= $cart['name'] ?></td>
                                            <td>Rp.<?= number_format($cart['price'], 0, ',', '.') ?></td>
                                            <td>
                                                <?= form_open(base_url('lihat_keranjang/update/' . $cart['rowid'])) ?>
                                                <div class="input-group input-group-sm">
                                                    <input type="number" value="<?= $cart['qty'] ?>" name="qty" min="1" max="<?= $barang->stok_brg ?>" class="form-control" style="width: 15px;" maxlength='3'>
                                                    <span class="input-group-append">
                                                        <button type="submit" class="btn btn-info btn-flat">Ubah</button>
                                                    </span>
                                                </div>
                                                <?= form_close(); ?>
                                            </td>
                                            <td>Rp.<?= number_format($cart['subtotal'], 0, ',', '.') ?></td>
                                            <td><a href="<?= base_url() . 'lihat_keranjang/delete/' . $cart['rowid'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a></td>
                                        </tr>
                                    <?php endforeach;
                                    $cek = $this->cart->contents(); ?>
                                    <?php if (!empty($cek)) { ?>
                                        <tr>
                                            <td colspan="6"><a href="<?= base_url() . 'lihat_keranjang/delete_all' ?>" class="btn btn-danger float-right"><i class="fas fa-trash-alt"></i> Hapus Semua</a></td>
                                        </tr>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="6" class="bg-danger"><i class="fas fa-window-close"></i> Keranjang Kosong</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                        <?php $cek = $this->cart->contents();
                        if(!empty($cek)) {
                            if ($this->session->userdata('email')) {
                        ?>
                        <a href="<?=base_url('checkout')?>" class="btn btn-lg btn-success float-right"><i class="far fa-credit-card"></i> Pesan Sekarang</a>
                            <?php } else { ?>
                                <a href="<?=base_url('login')?>" class="btn btn-lg btn-primary float-right"><i class="fas fa-sign-in-alt"></i> Login Untuk Memesan</a>
                            <?php } ?>
                        <?php } else { ?>
                        <a href="<?=base_url()?>" class="btn btn-lg btn-primary float-right"><i class="fas fa-cart-arrow-down"></i> Pilih Barang</a>
                        <?php } ?>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->