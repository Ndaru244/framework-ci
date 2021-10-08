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
                    <?= form_open(base_url('kategori')) ?>
                    <div class="card card-outline card-success collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah <?= $nama_page ?></h3>

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
                                <input type="text" class="form-control" name="kat_nama" value="<?= set_value('kat_nama'); ?>" id="nama" placeholder="Nama Kategori">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6"><a href="<?= base_url('kategori') ?>" class="btn btn-block btn-danger">Batal</a></div>
                                <div class="col-6"><button type="submit" class="btn btn-block btn-primary">kirim</button></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                    <?= form_close() ?>
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data <?= $nama_page ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if ($this->session->flashdata('sukses')) { ?>
                                <div class="alert text-light alert-success alert-dismissible">
                                    <button type="button" class="text-white close" data-dismiss="alert" aria-hidden="true">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <h5><i class="icon text-light fas fa-exclamation-triangle"></i> Sukses!</h5>
                                    <?= $this->session->flashdata('sukses');
                                    $this->session->unset_userdata('sukses'); ?>
                                </div>
                            <?php } ?>
                            <table id="tabel1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama kategori</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach($kategori as $data): ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$data->kat_nama?></td>
                                        <td>
                                            <a href="<?=base_url('kategori/edit/'.$data->kat_id)?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="<?=base_url('kategori/hapus/'.$data->kat_id)?>" class="btn btn-sm btn-danger ml-2">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama kategori</th>
                                        <th>Tools</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->