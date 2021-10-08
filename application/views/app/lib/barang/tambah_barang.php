<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $nama_page ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('barang') ?>">Barang</a></li>
                        <li class="breadcrumb-item active"><?= $nama_page ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Stok Barang</h3>
                        </div>
                        <?= form_open(base_url('barang/tambah_stok')) ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Tambah Stok Yang Sudah Ada</label>
                                <div class="row">
                                    <div class="col-6">
                                        <select name="id_brg" class="form-control select2" required>
                                            <option value="">Pilih Barang</option>
                                            <?php foreach($barang as $data):?>
                                            <option value="<?= $data->id_brg ?>"><?= $data->nama_brg ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <input type="number" name="stok_brg" class="form-control" placeholder="Stok" min="1" required>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block"> Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
                <?php if (isset($error)) {
                echo '
                <div class="alert text-light alert-danger alert-dismissible">
                <button type="button" class="text-white close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                <h5><i class="icon text-light fas fa-exclamation-triangle"></i> Peringatan!</h5>';
                echo $error;
                echo "</div>";
                } ?>
                <?= validation_errors('
                <div class="alert text-light alert-danger alert-dismissible">
                <button type="button" class="text-white close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                <h5><i class="icon text-light fas fa-exclamation-triangle"></i> Peringatan!</h5>', '</div>') ?>
                <div class="col-md-12">
                    <?= form_open_multipart('barang/tambah') ?>
                    <div class="card card-outline card-success collapsed-card">
                        <div class="card-header">
                            <div class="card-title">Tambah Barang Baru</div>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" name="nama_brg" class="form-control" placeholder="Nama Barang" required>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan Barang</label>
                                <textarea name="ket_brg" class="form-control" rows="10" id="summernote"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="kat_id" class="form-control select2" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach($kategori as $data):?>
                                    <option value="<?= $data->kat_id ?>"><?= $data->kat_nama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Stok Barang</label>
                                <input type="number" name="stok_brg" class="form-control" placeholder="Stok Barang" min=1 required>
                            </div>
                            <div class="form-group">
                                <label for="">Harga Barang</label>
                                <input type="number" name="harga_brg" class="form-control" placeholder="Harga Barang" min=1 required>
                            </div>
                            <div class="form-group">
                                <label for="">Gambar Barang</label>
                                <div class="custom-file">
                                    <input type="file" name="gambar_brg" class="form-control custom-file-input" placeholder="Nama Barang" id="customFile">
                                    <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <button type="reset" class="btn btn-block btn-danger">Batal</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-block btn-primary">Kirim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->