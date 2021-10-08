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
                <?= validation_errors('
                <div class="alert text-light alert-danger alert-dismissible">
                <button type="button" class="text-white close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                <h5><i class="icon text-light fas fa-exclamation-triangle"></i> Peringatan!</h5>', '</div>') ?>
                <div class="col-md-12">
                    <?= form_open('barang/edit/'.$barang->id_brg) ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"> Data Barang, <b><?=$barang->nama_brg?></b></div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" name="nama_brg" class="form-control" value="<?=$barang->nama_brg?>" placeholder="Nama Barang" required>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan Barang</label>
                                <textarea name="ket_brg" class="form-control" rows="10" id="summernote"><?=$barang->ket_brg?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="kat_id" class="form-control select2" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach($kategori as $data):?>
                                    <option value="<?= $data->kat_id ?>" <?if($barang->kat_id == $data->kat_id){echo "selected"; }?>>
                                        <?= $data->kat_nama ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Harga Barang</label>
                                <input type="number" name="harga_brg" class="form-control" value="<?=$barang->harga_brg?>" placeholder="Harga Barang" min=1 required>
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