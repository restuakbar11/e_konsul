<style type="text/css">
    .satu:focus{background: red; color: blue; font-weight: bold;}
</style>
<div class="container">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <hr/>
    <div class="col-lg-12">
    	<form method="post" action="<?= base_url('admin/proses_konsultasi'); ?>" >
        <div class="row">
        	<div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $proses_konsul['konsul_name']; ?>" disabled>
                        <input type="hidden" name="id_konsul" id="id_konsul" class="form-control" value="<?= $proses_konsul['konsul_id']; ?>">
                        <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                       
                    </div>
                    <div class="form-group">
                        <label for="nip">Nip</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= $proses_konsul['konsul_nip']; ?>" disabled>
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="instansi">Instansi</label>
                        <input type="text" class="form-control" id="instansi" name="instansi" value="<?= $proses_konsul['Instansi_name']; ?>" disabled>
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="irban">Irban yang dituju</label>
                        <input type="text" class="form-control" id="irban" name="irban" value="<?= $proses_konsul['irban_name']; ?>" disabled>
                        <?= form_error('irban', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="uraian">Jawaban Permasalahan</label>
                        <textarea style="background-color: aqua; font-weight: bold; " class="form-control" id="jawaban" name="jawaban" disabled><?= $proses_konsul['konsul_jawaban']; ?></textarea>
                        <?= form_error('jawaban', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            	<br>
            </div>
            <!-- slide 2 -->
            <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?= $proses_konsul['konsul_email']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nohp">No HP (WhatsApp)</label>
                        <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $proses_konsul['konsul_hp']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="permasalahan">Permasalahan</label>
                        <input type="text" class="form-control" id="permasalahan" name="permasalahan" value="<?= $proses_konsul['permasalahan_name']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="uraian">Uraian Permasalahan</label>
                        <textarea class="form-control" id="uraian" name="uraian" placeholder="Isi uraian anda disini...." disabled><?= $proses_konsul['konsul_uraian']; ?></textarea>
                    </div>
            	<br>
            </div>
        </div>
    </form>
    <hr/>
    </div>

</div>