       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
          <hr/>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
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
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($bertemu_proses as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['bertemu_nomor']; ?></td>
                        <td><?= $row['bertemu_name']; ?></td>
                        <td><?= $row['bertemu_nip']; ?></td>
                        <td><?= $row['Instansi_name']; ?></td>
                        <td><?= $row['permasalahan_name']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>