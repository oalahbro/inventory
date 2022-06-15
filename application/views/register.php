<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Welly - Hospital Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/admin/images/favicon.png">
    <link href="<?= base_url() ?>assets/admin/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">

                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="<?= base_url() ?>assets/admin/images/logo-full.png" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4 text-white">Sign up your account</h4>
                                    <form action="<?= base_url() ?>login/signup" method="POST">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Nama Lengkap</strong></label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                                            <div class="text-danger">
                                                <?= form_error('nama') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" placeholder="hello@example.com">
                                            <div class="text-danger">
                                                <?= form_error('email') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Alamat</strong></label>
                                            <input type="text" name="alamat" class="form-control" placeholder="alamat">
                                            <div class="text-danger">
                                                <?= form_error('alamat') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Telp</strong></label>
                                            <input type="number" name="telp" class="form-control" placeholder="+62">
                                            <div class="text-danger">
                                                <?= form_error('telp') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>No identitias</strong></label>
                                            <input type="number" name="no_identitas" class="form-control" placeholder="ktp/sim/etc">
                                            <div class="text-danger">
                                                <?= form_error('no_identitas') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                            <div class="text-danger">
                                                <?= form_error('password') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Konfirmasi Password</strong></label>
                                            <input type="password" name="konfpassword" class="form-control" placeholder="Konfirmasi Password">
                                            <div class="text-danger">
                                                <?= form_error('cpassword') ?>
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Already have an account? <a class="text-white" href="<?= base_url() ?>login">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
	Scripts
***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url() ?>assets/admin/vendor/global/global.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/custom.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/deznav-init.js"></script>

</body>

</html>