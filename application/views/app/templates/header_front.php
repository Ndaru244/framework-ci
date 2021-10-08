<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/dist/css/adminlte.min.css">
</head>

<body class="dark layout-top-nav dark-mode layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark navbar-dark">
            <div class="container">
                <a href="<?= base_url() ?>assets/templates/index3.html" class="navbar-brand">
                    <img src="<?= base_url() ?>assets/templates/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light"><?= $nama_app ?></span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?=base_url()?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('user/lihat_pesanan')?>" class="nav-link">Pesanan</a>
                        </li>
                    </ul>


                    <!-- Right navbar links -->
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <!-- Notifications Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="fas fa-shopping-cart"></i>
                                <?php
                                $keranjang = $this->cart->contents();
                                ?>
                                <span class="badge badge-danger text-sm navbar-badge"><b> <?= count($keranjang) ?> </b></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-header"><b class="text-white">Total : Rp.<?= number_format($this->cart->total(), 0, ',', '.'); ?></b></span>
                                <div class="dropdown-divider"></div>
                                <?php if (empty($keranjang)) { ?>
                                    <a href="#" class="dropdown-item">
                                        <i class="far fa-times-circle mr-2"></i> Keranjang Kosong
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <?php } else {
                                    foreach ($keranjang as $cart) : $img = $this->App_model->tampil_byid(array('id_brg' => $cart['id']), 'barang'); ?>
                                        <div class="dropdown-item">
                                            <div class="media">
                                                <img src="<?= base_url('assets/uploads/thumbs/' . $img->gambar_brg) ?>" class="img-size-50 mr-3 img-rounded">
                                                <div class="media-body">
                                                    <h3 class="dropdown-item-title">
                                                        <?= $cart['name'] ?>
                                                    </h3>
                                                    <p class="text-sm"><?= $cart['qty'] ?> x Rp.<?= number_format($cart['price'], 0, ',', '.') ?></p>
                                                    <p class="text-sm">Total : Rp.<?= number_format($cart['subtotal'], 0, ',', '.') ?></p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                <?php endforeach;
                                } ?>

                                <a href="<?= base_url('lihat_keranjang') ?>" class="dropdown-item bg-warning dropdown-footer">Lihat Keranjang</a>
                            </div>
                        </li>
                        <!-- Notifications Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="fas fa-user-tie"></i>
                            </a>
                            <?php if ($this->session->userdata('email')) {  ?>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                    <!-- <span class="dropdown-item dropdown-header">15 Notifications</span> -->
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-user mr-2"></i> <?= $this->session->userdata('email') ?>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-id-card mr-2"></i> Profil
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="<?= base_url('logout') ?>" class="dropdown-item bg-danger dropdown-footer">Keluar</a>
                                </div>
                            <?php } else { ?>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                    <!-- <span class="dropdown-item dropdown-header">15 Notifications</span> -->
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-id-card mr-2"></i> Profil
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="<?= base_url('login') ?>" class="dropdown-item bg-primary dropdown-footer">Masuk</a>
                                </div>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
        </nav>
        <!-- /.navbar -->