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
    
    body{
        background-image: url(../assets/images/bg.jpg);
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
                                    <h2 class="h4 text-gray-900 mb-4 font-family"><img src="../assets/images/register.png" width="70px">&nbsp;&nbsp;&nbsp;&nbsp;REGISTER FORM</h2>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form method="post" action="<?= base_url('auth/daftar'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nip" name="nip" placeholder="Nomor Induk Pegawai" >
                                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="telp" name="telp" placeholder="No Telp." value="<?= set_value('telp'); ?>">
                                        <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group ">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>');
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Daftar
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <span><a class="small float-left" href="<?= base_url('auth'); ?>"> Sudah punya akun ? </a></span>
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