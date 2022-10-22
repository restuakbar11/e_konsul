<div class="container">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <hr/>
    <div class="col-lg-12">
        <form method="post" action="<?= base_url('superadmin/edit_user'); ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
                    <div class="form-group">
                        <input type="text" name="nip" id="nip" class="form-control" value="<?= $m_opd['nip']; ?>" readonly>
                        <input type="hidden" name="id" id="id" class="form-control" value="<?= $m_login['id_login']; ?>" >
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="telp" id="telp" class="form-control" value="<?= $m_opd['telp']; ?>">
                        <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="pegawai" id="pegawai" class="form-control" value="<?= $m_opd['nama']; ?>">
                        <?= form_error('pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control" value="<?= $m_login['email']; ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group ">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Isi password anda disini....">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>');
                        ?>
                    </div>
                    
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Edit
                    </button>
                    <a href="<?= base_url('superadmin/data_user'); ?>" type="button" class="btn btn-warning">Cancel</a>
                </div>
            </div>
        </div>
    </form>
    </div>

</div>