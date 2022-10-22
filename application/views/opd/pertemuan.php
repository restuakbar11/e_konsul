<div class="container">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <hr/>
    <div class="col-lg-12">
        <form method="post" action="<?= base_url('opd/aksi_bertemu'); ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
                    <div class="form-group">
                        <label for="nama">No Pertemuan</label>
                        <input type="text" name="no_urut" id="no_urut" class="form-control" readonly value="<?= $nomor_pertemuan['u']; ?>">  
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Isi nama anda disini...." required>
                    </div>
                    <div class="form-group">
                        <label for="nip">Nip</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Isi NIP anda disini...." required>
                    </div>
                    <div class="form-group">
                            <label for="instansi">Instansi</label>
                            <select class="form-control" id="instansi" name="instansi" required>
                                <option>Pilih Instansi ...</option>
                                <?php foreach ($instansi as $row) : ?>
                                    <option value="<?= $row['Instansi_id']; ?>"><?= $row['Instansi_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    
                <br>
            </div>
            <!-- slide 2 -->
            <div class="col-lg-6">
                <div class="form-group">
                        <label for="permasalahan">Permasalahan</label>
                        <select class="form-control" id="permasalahan" name="permasalahan">
                            <option>Pilih Permasalahan ...</option>
                            <?php foreach ($permasalahan as $row) : ?>
                                <option value="<?= $row['permasalahan_id']; ?>"><?= $row['permasalahan_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <div class="form-group">
                        <label for="irban">Irban yang dituju</label>
                        <select class="form-control" id="irban" name="irban" required>
                            <option>Pilih Irban ...</option>
                            <?php foreach ($irban as $row) : ?>
                                <option value="<?= $row['irban_id']; ?>"><?= $row['irban_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
               
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Kirim
                    </button>
                </div>
            </div>
        </div>
    </form>
    </div>

</div>