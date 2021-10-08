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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                    <?= form_open(base_url('kategori/edit/'.$kategori->kat_id)) ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $nama_page ?> <b><?= $kategori->kat_nama ?></b></h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama Kategori</label>
                                <input type="text" class="form-control" name="kat_nama" value="<?= $kategori->kat_nama ?>" id="nama" placeholder="Nama Kategori">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6"><a href="<?= base_url('kategori') ?>" class="btn btn-block btn-danger">Batal</a></div>
                                <div class="col-6"><button type="submit" class="btn btn-block btn-primary">Kirim</button></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                    <?= form_close() ?>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->