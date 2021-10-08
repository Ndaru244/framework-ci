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
                    <!-- Timelime example  -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <div class="timeline">
                                <?php $no =1; foreach($pesanan as $data) : 
                                if($data->id_pelanggan === $this->session->userdata('id_user')){
                                ?>
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-shopping-cart bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><td>Kode Pesanan : </td> <a href="#">#<?= $data->kode_pesan ?></a></h3>

                                        <div class="timeline-body">
                                            <table class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal Pesan</th>
                                                        <th>Nama Barang</th>
                                                        <th>Total Item</th>
                                                        <th>Total Bayar</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $psn = $this->App_model->tampil('pesan');
                                                    foreach($psn as $psn) :
                                                        if($psn->kode_pesan === $data->kode_pesan) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $psn->tgl_pesan ?></td>
                                                        <td><?= $psn->nama_brg ?></td>
                                                        <td><span><?= $psn->jumlah ?></td>
                                                        <td><span><?= $psn->total ?></span></td>
                                                        <td><?= $data->status ?></td>
                                                    </tr>
                                                    <?php } endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="timeline-footer">
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <?php } endforeach; ?>
                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->