        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <br>
            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <?php foreach ($barang as $data) : ?>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="<?= base_url('assets/uploads/' . $data->gambar_brg) ?>" style="height: 12rem;" class="card-img-top card-img img-responsive">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $data->nama_brg ?></h5>
                                        <p class="card-text"></p>
                                        <div class="float-left">Stok : <div class="btn btn-sm btn-outline-info"><?= $data->stok_brg ?></div>
                                        </div>
                                        <div class="float-right">Harga : <div class="btn btn-sm bg-olive"><b>Rp.<?= number_format($data->harga_brg, 0, ',', '.') ?></b></div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">

                                        <a href="" class="btn btn-block mb-3 btn-success"><i class="fas fa-eye"></i> Lihat</a>
                                        <?php
                                        echo form_open(base_url('Main/tambah'));
                                        echo form_hidden('id', $data->id_brg);
                                        echo form_hidden('qty', 1);
                                        echo form_hidden('price', $data->harga_brg);
                                        echo form_hidden('name', $data->nama_brg);
                                        if ($data->stok_brg >= 0) { ?>
                                            <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-cart-plus"></i>Tambah</button>
                                        <?php } else { ?>
                                            <button class="btn btn-block btn-default"><i class="fas fa-cart-plus"></i> Kosong</button>
                                        <?php }
                                        echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <?= $links ?>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->