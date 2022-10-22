        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
          <hr/>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <input style="background-color:#7FFF00;width:20px;border:solid 1px #000000;" disabled/>
                <b>#Belom direspon</b>&nbsp;
                <input style="background-color:#00FFFF;width:20px;border:solid 1px #000000;" disabled/>
                <b>#Pertemuan diterima</b>&nbsp;
                <input style="background-color:#A9A9A9;width:20px;border:solid 1px #000000;" disabled/>
                <b>#Pertemuan ditolak</b>&nbsp;
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <?= $this->session->flashdata('message'); ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Nip</th>
                      <th>Instansi</th>
                      <th>Permasalahan</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($bertemu_semua as $row) : 
                    if ($row['status'] == '1') {
                          $warna = 'style="background-color: #7FFF00"';
                          $ket = 'Pertemuan belom direspon';
                        }elseif($row['status'] == '2'){
                          $warna = 'style="background-color: #00FFFF"';
                          $ket = 'Pertemuan diterima';
                        }else{
                          $warna = 'style="background-color: #A9A9A9"';
                          $ket = 'Pertemuan ditolak';
                        }
                  ?>
                    <tr>
                        <td <?php echo "$warna"; ?>><?= $no++; ?></td>
                        <td <?php echo "$warna"; ?>><?= $row['bertemu_name']; ?></td>
                        <td <?php echo "$warna"; ?>><?= $row['bertemu_nip']; ?></td>
                        <td <?php echo "$warna"; ?>><?= $row['Instansi_name']; ?></td>
                        <td <?php echo "$warna"; ?>><?= $row['permasalahan_name']; ?></td>
                        <td align="center" <?php echo "$warna"; ?>>
                            <?php echo $ket; ?>
                        </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>