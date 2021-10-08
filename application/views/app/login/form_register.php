<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>Register</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Daftarkan keanggotaan baru</p>
                <?= $this->session->flashdata('pesan') ?>
                <?= form_open('register') ?>
                    <?php echo form_error('nama','
                    <div class="text-warning ml-2 small"><strong>','</strong></div>') ?>
                    <div class="input-group mb-3">
                        <input type="text" name="nama" class="form-control" value="" placeholder="Nama Lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('email','
                    <div class="text-warning ml-2 small"><strong>','</strong></div>') ?>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" value="" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('telepon','
                    <div class="text-warning ml-2 small"><strong>','</strong></div>') ?>
                    <div class="input-group mb-3">
                        <input type="text" name="telepon" class="form-control" value="" placeholder="Telepon">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone-alt"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('alamat','
                    <div class="text-warning ml-2 small"><strong>','</strong></div>') ?>
                    <div class="input-group mb-3">
                    <textarea name="alamat" class="form-control" placeholder="Alamat" rows="2"></textarea>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-map-marker-alt"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('password','
                    <div class="text-warning ml-2 small"><strong>','</strong></div>') ?>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-6">
                            <a href="login" class="btn btn-primary btn-block">Masuk</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-success btn-block">Daftar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                <?=form_close()?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/templates/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/templates/dist/js/adminlte.min.js"></script>
</body>

</html>