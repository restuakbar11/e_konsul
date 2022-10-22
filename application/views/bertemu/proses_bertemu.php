<div class="container">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <hr/>
    <div class="col-lg-12">
        <form method="post" action="<?= base_url('admin/jawab_bertemu'); ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-3">
                    <div class="form-group">
                        <label for="nama">No Pertemuan</label>
                        <input type="text" name="no_urut" id="no_urut" class="form-control" readonly value="<?= $proses_bertemu['no_urut']; ?>">  
                    </div>
                    <div class="form-group">
                        <label for="nip">No Register</label>
                        <input type="text" class="form-control" id="bertemu_nomor" name="bertemu_nomor" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $proses_bertemu['bertemu_name']; ?>" disabled>
                        <input type="hidden" name="id_bertemu" id="id_bertemu" class="form-control" value="<?= $proses_bertemu['bertemu_id']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nip">Nip</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= $proses_bertemu['bertemu_nip']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="instansi">Instansi</label>
                        <input type="text" class="form-control" id="instansi" name="instansi" value="<?= $proses_bertemu['Instansi_name']; ?>" disabled>
                    </div>
                <br>
            </div>

            <!-- slide 2 -->
            <div class="col-lg-6">
                <div class="form-group">
                        <label for="permasalahan">Permasalahan</label>
                        <input type="text" class="form-control" id="permasalahan" name="permasalahan" value="<?= $proses_bertemu['permasalahan_name']; ?>" disabled>
                </div>
                <div class="form-group">
                        <label for="irban">Irban yang dituju</label>
                        <input type="text" class="form-control" id="irban" name="irban" value="<?= $proses_bertemu['irban_name']; ?>" disabled>
                    </div>
                <div class="form-group">
                        <label for="uraian">Uraian Permasalahan</label>
                        <textarea class="form-control" id="uraian_masalah" name="uraian_masalah" placeholder="Uraikan permasalahan disini...." required></textarea>
                    </div>
               <div class="form-group">
                        <label for="uraian">Solusi Permasalahan</label>
                        <textarea class="form-control" id="jawaban" name="jawaban" placeholder="Solusi jawaban disini...." required></textarea>
                    </div> 
               
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                        <label for="instansi">Anggota Inspektorat yang hadir</label>
                        <select class="form-control" id="anggota1" name="anggota1" required>
                            <option value="">Pilih Anggota ...</option>
                            <?php foreach ($pegawai as $row) : ?>
                                <option value="<?= $row['pegawai_id']; ?>"><?= $row['pegawai_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <div class="form-group">
                        <select class="form-control" id="anggota2" name="anggota2" >
                            <option value="">Pilih Anggota ...</option>
                            <?php foreach ($pegawai as $row) : ?>
                                <option value="<?= $row['pegawai_id']; ?>"><?= $row['pegawai_name']; ?></option>
                            <?php endforeach; ?>
                            <?= form_error('opd1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </select>
                </div>
                <div class="form-group">
                        <select class="form-control" id="anggota3" name="anggota3" >
                            <option value="">Pilih Anggota ...</option>
                            <?php foreach ($pegawai as $row) : ?>
                                <option value="<?= $row['pegawai_id']; ?>"><?= $row['pegawai_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
            <hr/>
            <div class="form-group">
                        <label for="uraian">OPD yang hadir</label>
                        <input type="text" class="form-control" id="opd1" name="opd1"  >
                    </br>
                        <input type="text" class="form-control" id="opd2" name="opd2"  >
                    </br>
                        <input type="text" class="form-control" id="opd3" name="opd3"  >
            </div>
            <hr/>
            <div class="form-group">
                        <label for="instansi">Otorisasi TTD Irban Wilayah</label>
                        <select class="form-control" id="ttd_irban" name="ttd_irban" required >
                            <option value="">Pilih TTD ...</option>
                            <?php foreach ($pegawai as $row) : ?>
                                <option value="<?= $row['pegawai_id']; ?>"><?= $row['pegawai_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
            </div>
            <div class="form-group">
                <label for="instansi">Otorisasi TTD OPD</label>
                <input type="text" class="form-control" id="ttd_opd" name="ttd_opd"  >
            </div>
            
             <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        JAWAB
                    </button>
                </div>
                
            </div>
        </div>
        <?= $this->session->flashdata('message'); ?>
    </form>
    <hr/>
        <!--  -->
    </div>

</div>