<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Super Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/sma.png">
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
                                    <h4 class="text-center mb-4 text-white">Lupa Password?</h4>
                                    <form action="<?= base_url() ?>login/ganti" method="post">
                                        <div class="form-group">
                                            <input name="email" type="text" hidden value="<?= $email ?>" placeholder="Masukkan Password">
                                            <label class="mb-1 text-white"><strong>Masukkan Password Baru</strong></label>
                                            <input name="password" type="password" class="form-control" placeholder="Masukkan Password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">kirim</button>
                                        </div>
                                </div>

                                </form>
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