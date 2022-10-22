<div class="container">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <hr/>
    <div class="col-lg-12">
        <form method="post" action="<?= base_url('superadmin/form_tambah_user'); ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
                    <div class="form-group">
                        <input type="text" name="nip" id="nip" class="form-control" placeholder="Isi nip anda disini....">
                        <?= form_error('pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="telp" id="telp" class="form-control" placeholder="Isi No. Handphone anda disini....">
                        <?= form_error('pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="pegawai" id="pegawai" class="form-control" placeholder="Isi nama anda disini....">
                        <?= form_error('pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Isi email anda disini....">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group ">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Isi password anda disini....">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>');
                        ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="irban" name="irban">
                            <option>Pilih Irban ...</option>
                            <?php foreach ($irban as $row) : ?>
                                <option value="<?= $row['irban_id']; ?>"><?= $row['irban_name']; ?></option>
                            <?php endforeach; ?>
                            <?= form_error('irban', '<small class="text-danger pl-3">', '</small>'); ?>
                        </select>
                    </div>
                    
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                    <a href="<?= base_url('superadmin/data_user'); ?>" type="button" class="btn btn-warning">Cancel</a>
                </div>
            </div>
        </div>
    </form>
    </div>

</div>