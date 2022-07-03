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
                                    <!-- <div class="text-center mb-3">
                                        <a href="index.html"><img src="<?= base_url() ?>assets/admin/images/logo-full.png" alt=""></a>
                                    </div> -->
                                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                    <form action="<?= base_url() ?>login/auth" method="post">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email or Username</strong></label>
                                            <input name="username" type="text" class="form-control" placeholder="Email or Username">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input name="password" type="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox ml-1 text-white">
                                                    <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                                    <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a class="text-white" href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                                        </div>
                                        <h4 class="text-center mb-4 mt-4 text-white">atau</h4>
                                    </form>
                                    <div class="panel panel-default">
                                        <?php
                                        if (!isset($login_button)) {

                                            $user_data = $this->session->userdata('user_data');
                                            echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                                            echo '<img src="' . $user_data['profile_picture'] . '" class="img-responsive img-circle img-thumbnail" />';
                                            echo '<h3><b>Name : </b>' . $user_data["first_name"] . ' ' . $user_data['last_name'] . '</h3>';
                                            echo '<h3><b>Email :</b> ' . $user_data['email_address'] . '</h3>';
                                            echo '<h3><a href="http://localhost/login_google/google/logout">Logout</h3></div>';
                                        } else {
                                            echo '<div align="center">' . $login_button . '</div>';
                                        }
                                        ?>
                                    </div>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Don't have an account? <a class="text-white" href="<?= base_url() ?>login/register">Sign up</a></p>
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