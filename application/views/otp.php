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
                                    <!-- <form action="<?= base_url() ?>login/send" method="post">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Masukkan Nomor Telepon</strong></label>
                                            <input name="telp" type="number" class="form-control" placeholder="contoh (628123123000)">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">kirim</button>
                                        </div>
                                </div>

                                </form> -->

                                    <div class="text-center">
                                        <label class="mb-1 text-white"><strong>Code Otp telah terkirim ke nomor Whatsapp<br><?= $telp ?></strong></label>
                                    </div>
                                    <form method="POST" action="<?= base_url() ?>login/konf">
                                        <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2 mb-2">
                                            <input type="text" name="email" value="<?= $email ?>" hidden>
                                            <input class="m-2 text-center form-control rounded" type="text" name="first" id="first" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded" type="text" name="second" id="second" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded" type="text" name="third" id="third" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded" type="text" name="fourth" id="fourth" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded" type="text" name="fifth" id="fifth" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded" type="text" name="sixth" id="sixth" maxlength="1" />
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">kirim</button>
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
<script>
    document.addEventListener("DOMContentLoaded", function(event) {

        function OTPInput() {
            const inputs = document.querySelectorAll('#otp > *[id]');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener('keydown', function(event) {
                    if (event.key === "Backspace") {
                        inputs[i].value = '';
                        if (i !== 0) inputs[i - 1].focus();
                    } else {
                        if (i === inputs.length - 1 && inputs[i].value !== '') {
                            return true;
                        } else if (event.keyCode > 47 && event.keyCode < 58) {
                            inputs[i].value = event.key;
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                            event.preventDefault();
                        } else if (event.keyCode > 64 && event.keyCode < 91) {
                            inputs[i].value = String.fromCharCode(event.keyCode);
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                            event.preventDefault();
                        }
                    }
                });
            }
        }
        OTPInput();


    });
</script>

</html>