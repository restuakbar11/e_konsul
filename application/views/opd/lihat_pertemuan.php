<div class="container">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <hr/>
    <div class="col-lg-12">
        <form method="post" action="<?= base_url('opd/bertemu'); ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-3">
                <?= $this->session->flashdata('message'); ?>
                    <div class="form-group">
                        <label for="nama">Nomor Register</label>
                        <input type="text" name="bertemu_nomor" id="bertemu_nomor" class="form-control" value="<?= $proses_bertemu['no_urut']; ?>/<?= $proses_bertemu['bertemu_nomor']; ?>" readonly>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $proses_bertemu['bertemu_name']; ?>" readonly>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nip">Nip</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= $proses_bertemu['bertemu_nip']; ?>" readonly>
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="instansi">Instansi</label>
                        <input type="text" class="form-control" id="instansi" name="instansi" value="<?= $proses_bertemu['Instansi_name']; ?>" readonly>
                    </div>
                    
                <br>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                        <label for="permasalahan">Permasalahan</label>
                        <input type="text" class="form-control" id="permasalahan" name="permasalahan" value="<?= $proses_bertemu['permasalahan_name']; ?>" readonly>
                </div>
                <div class="form-group">
                        <label for="irban">Irban yang dituju</label>
                        <input type="text" class="form-control" id="irban" name="irban" value="<?= $proses_bertemu['irban_name']; ?>" readonly>
                    </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $proses_bertemu['bertemu_tanggal']; ?>" readonly>
                        <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>');
                        ?>
                </div>
                <div class="form-group">
                        <label for="uraian">Uraian Permasalahan</label>
                        <textarea style="background-color: aqua; font-weight: bold; " class="form-control" id="jawaban" name="jawaban" disabled><?= $proses_bertemu['bertemu_uraian']; ?></textarea>
                        <?= form_error('jawaban', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                        <label for="uraian">Solusi Permasalahan</label>
                        <textarea style="background-color: aqua; font-weight: bold; " class="form-control" id="jawaban" name="jawaban" disabled><?= $proses_bertemu['bertemu_jawaban']; ?></textarea>
                        <?= form_error('jawaban', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <!-- slide 2 -->
            <div class="col-lg-3">
                <div class="form-group">
                   <label for="permasalahan">Anggota Inspektorat yang hadir</label>
                   <input type="text" class="form-control" value="<?= $anggota1['pegawai_name']; ?>" readonly>
                </div>
                <div class="form-group">
                   <input type="text" class="form-control" value="<?= $anggota2['pegawai_name']; ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="<?= $anggota3['pegawai_name']; ?>" readonly>
                </div>
                <div class="form-group">
                        <label for="permasalahan">Anggota Opd yang hadir</label>
                    <input type="text" class="form-control" value="<?= $proses_bertemu['opd1']; ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="<?= $proses_bertemu['opd2']; ?>" readonly>
                    </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="<?= $proses_bertemu['opd3']; ?>" readonly>
                </div>
            </div>
        </div>
    </form>
    </div>

</div>