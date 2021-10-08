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
                <div class="col-lg-12">
                    <div class="callout bg-gray callout-warning">
                        <h5><i class="fas fa-info"></i> Catatan:</h5>
                        Pastikan Alamat dan Nomor Telepon Anda Benar.
                    </div>
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> <?= $title ?>
                                    <small class="float-right">Tanggal : <?= str_replace('-', '/', date('Y-m-d')) ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <?php $kode_pesanan = date('mY') . strtoupper(random_string('alpha', 3)) ?>
                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($keranjang as $cart) :
                                            $produk = $this->App_model->tampil_byid(array('id_brg'=>$cart['id']),'barang');
                                            $nama_brg
                                        ?>
                                            <tr>
                                                <td><img src="<?= base_url('assets/uploads/thumbs/' . $produk->gambar_brg) ?>" class="img-size-50 img-fluid img-rounded"></td>
                                                <td><?= $cart['name'] ?></td>
                                                <td>Rp.<?= number_format($cart['price'], 0, ',', '.') ?></td>
                                                <td><?= $cart['qty'] ?></td>
                                                <td>Rp.<?= number_format($cart['subtotal'], 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <?php $cek = $this->cart->contents();
                        if (!empty($cek)) {
                            $total = $this->cart->total();
                            $produk = $this->App_model->tampil_byid(array('id_brg'=>$cart['id']),'barang');
                        ?>
                            <div class="row">
                                <!-- accepted payments column -->

                                <div class="col-6">
                                    <p class="lead">Cek alamat dan nomor telpon:</p>
                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        <?= form_open('checkout') ?>
                                    <div class="form-group">
                                        <input type="hidden" name="kode_pesan" value="<?= $kode_pesanan ?>">
                                        <input type="hidden" name="id_pelanggan" value="<?= $pelanggan->id_user ?>">
                                        <input type="hidden" name="nama_pelanggan" value="<?= $pelanggan->nama_user ?>">
                                        <input type="hidden" name="tgl_pesan" value="<?= date('Y-m-d') ?>">
                                        
                                        <label>Alamat </label>
                                        <textarea name="alamat" class="form-control" rows="3" required><?= $pelanggan->alamat_user ?></textarea>

                                        <label>No Telepon </label>
                                        <input name="telepon" type="text" class="form-control" value="<?= $pelanggan->telp_user ?>" required>
                                    </div>

                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead">Total Bayar</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>Rp.<?= number_format($this->cart->total(), 0, ',', '.') ?></td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>Rp.<?= number_format($total, 0, ',', '.') ?></td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <button type="sumbit" class="btn btn-success float-right"><i class="fas fa-paper-plane"></i> kirim
                                    </button>
                                </div>
                                <? form_close() ?>
                            </div>
                        <?php } else {
                        } ?>
                    </div>
                    <!-- /.invoice -->

                </div>
            </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->