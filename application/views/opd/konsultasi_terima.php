        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
          <hr/>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-right">
                    <a href="<?= base_url('admin/print_data_petugas'); ?>" class="btn btn-sm btn-secondary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Print</a>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <?= $this->session->flashdata('message'); ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>No Register</th>
                      <th>Nama</th>
                      <th>Nip</th>
                      <th>Instansi</th>
                      <th>Permasalahan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($konsul_terima as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['konsul_nomor']; ?></td>
                        <td><?= $row['konsul_name']; ?></td>
                        <td><?= $row['konsul_nip']; ?></td>
                        <td><?= $row['Instansi_name']; ?></td>
                        <td><?= $row['permasalahan_name']; ?></td>
                        <td align="center">
                            <a href="<?= base_url('opd/lihat_jawaban/' . $row["konsul_id"]); ?>">DETAIL</a>
                        </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>