<style type="text/css">
    .logo {
        background-color: white;
        text-align: center;
        vertical-align: middle;
        color: #9400D3;
        border-radius: 10px;
        border: 1px solid black;
        opacity: 0.85;
        filter: alpha(opacity=60); /* For IE8 and earlier */
        margin-top: 20%;
        font-family: verdana;
    }

    .copyright {
        text-align: center;
        vertical-align: middle;
        color: #F5F5F5;
        border-radius: 10px;
        opacity: 0.50;
        filter: alpha(opacity=60); /* For IE8 and earlier */
        font-family: verdana;
    }
</style>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">
        <div class="logo">
            <h1><b>E-SULTAN</b></h1>
            <h4>Elektronik Konsultasi Pengawasan</h4>
        </div>
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4 font-family"><img src="assets/images/login_user.png" width="100px">&nbsp;&nbsp;&nbsp;&nbsp;LOGIN FORM</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group ">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>');
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Masuk
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <span><a class="small float-left" href="<?= base_url('auth/daftar'); ?>"> Belum punya akun ? </a></span>
                                    </div>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        </div>

    </div>
</div>