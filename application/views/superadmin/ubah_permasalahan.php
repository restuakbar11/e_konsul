<div class="container">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <hr/>
    <div class="col-lg-12">
        <form method="post" action="<?= base_url('superadmin/edit_permasalahan'); ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
                    <div class="form-group">
                        <label for="nama">Nama Permasalahan</label>
                        <input type="text" name="permasalahan" id="permasalahan" class="form-control" placeholder="Isi nama permasalahan disini...." value="<?= $m_permasalahan['permasalahan_name']; ?>">
                        <input type="hidden" name="id" id="id" class="form-control" placeholder="Isi nama permasalahan disini...." value="<?= $m_permasalahan['permasalahan_id']; ?>">
                        <?= form_error('permasalahan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Edit
                    </button>
                    <a href="<?= base_url('superadmin/data_permasalahan'); ?>" type="button" class="btn btn-warning">Cancel</a>
                </div>
            </div>
        </div>
    </form>
    </div>

</div>