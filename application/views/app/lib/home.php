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
                        <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
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
            <div class="callout callout-info">
              <h5><i class="fas fa-grin"></i> Welcome!</h5>
              Selamat datang, <?= $this->session->userdata('nama_user') ?>
            </div>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$barang?></h3>

                <p>Barang</p>
              </div>
              <div class="icon">
                <i class="fas fa-fas fa-boxes"></i>
              </div>
              <a href="<?=base_url('barang')?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $barang_masuk ?></h3>

                <p>Barang Masuk</p>
              </div>
              <div class="icon">
                <i class="fas fa-warehouse"></i>
              </div>
              <a href="<?=base_url('barang_masuk')?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 class="text-white"><?=$barang_keluar?></h3>

                <p class="text-white">Barang Keluar</p>
              </div>
              <div class="icon">
                <i class="fas fa-truck-loading"></i>
              </div>
              
              <a href="<?=base_url('barang_keluar')?>" class="small-box-footer"><div class="text-white">Lihat <i class="fas fa-arrow-circle-right"></i></div></a>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$pesanan?></h3>

                <p>Pesanan</p>
              </div>
              <div class="icon">
                <i class="fas fa-people-carry"></i>
              </div>
              <a href="<?=base_url('pesanan')?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->