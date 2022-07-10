<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <h4>Profile</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"><img src="https://picsum.photos/1500/1000" style="width:1458px; height:250px; object-fit: cover;"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img style="height: 100px; width: 112px;" src="<?= base_url() ?>assets/upload/<?= $profil[0]['image'] ?>" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0"><?= $profil[0]['nama'] ?></h4>

                                    <p><?php
                                        if ($profil[0]['level'] == 1) {
                                            echo 'Superadmin';
                                        } else {
                                            echo 'Admin';
                                        } ?></p>
                                </div>
                                <div class="dropdown ml-auto">
                                    <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                            </g>
                                        </svg></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
                                        <li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
                                        <li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
                                        <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link active show">Setting</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="profile-settings" class="tab-pane fade active show">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <h4 class="text-primary">Account Setting</h4>
                                            <form method="post" action="<?= base_url() ?>admin/editProfil" enctype="multipart/form-data" accept-charset="utf-8">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <input type="text" name="img" class="form-control" value="<?= $profil[0]['image'] ?>" hidden>

                                                        <label>Nama</label>
                                                        <input type="text" name="nama" class="form-control" value="<?= $profil[0]['nama'] ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Username</label>
                                                        <input type="text" name="username" class="form-control" value="<?= $profil[0]['username'] ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input id="img" name="image" type="text">
                                                            <input name="image" type="file" class="custom-file-input">
                                                            <label class="custom-file-label" style="height: 42px !important; "><?= $profil[0]['image'] ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Password</label>
                                                        <input id="password" name="password" type="password" class="form-control" onkeyup='check();' />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Konfirmasi Password</label><span class="float-right" id='message' value=""></span>
                                                        <input id="cpassword" type="password" class="form-control" onkeyup='check();' />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Level</label>
                                                    <?php
                                                    if ($profil[0]['level'] == 1) {
                                                        echo '<input type="text" class="form-control" disabled value="Superadmin">';
                                                    } else {
                                                        echo '<input type="text" class="form-control" disabled value="Admin">';
                                                    } ?>

                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <?php
                                                    if ($profil[0]['status'] == 1) {
                                                        echo '<input type="text" class="form-control text-success" disabled value="Aktif">';
                                                    } else {
                                                        echo '<input type="text" class="form-control text-danger" disabled value="Nonaktif">';
                                                    } ?>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="replyModal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Post Reply</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <textarea class="form-control" rows="4">Message</textarea>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    var check = function() {

        if (document.getElementById('password').value ==
            document.getElementById('cpassword').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = ' matching';
            document.querySelector('.button').disabled = false;

        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = ' not matching';
            document.querySelector('.button').disabled = true;
        }
    }
</script>