<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?=$nama_page?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?=$nama_page?></li>
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
                <div class="col-12">
                    <a href="<?=base_url('barang/tambah')?>" class="btn btn-info mb-3">Tambah <?= $nama_page ?></a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?=$nama_page?></h3>
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
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Stok</th>
                                        <th>harga</th>
                                        <th>Total</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach($barang as $data) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><img src="<?=base_url('assets/uploads/thumbs/'.$data->gambar_brg)?>" style="width: 5rem;" class="card-img img-responsive"></td>
                                        <td><?= $data->nama_brg ?></td>
                                        <td><?= $data->stok_brg ?></td>
                                        <td>Rp. <?= number_format($data->harga_brg,0,',','.') ?></td>
                                        <td>Rp. <?= number_format($data->total_brg,0,',','.') ?></td>
                                        <td>
                                            <a href="<?=base_url('barang/edit/'.$data->id_brg)?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="<?=base_url('barang/hapus/'.$data->id_brg)?>" class="btn btn-sm btn-danger" onclick="return confirm('Ingin menghapus data')">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Total</th>
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