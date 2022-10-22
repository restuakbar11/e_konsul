        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
          <hr/>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-right">
                    <a href="<?= base_url('superadmin/form_permasalahan'); ?>" class="btn btn-sm btn-secondary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <?= $this->session->flashdata('message'); ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Permasalahan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($m_permasalahan as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['permasalahan_name']; ?></td>
                        <td align="center">
                            <a href="<?= base_url('superadmin/edit_permasalahan/' . $row["permasalahan_id"]); ?>">Edit</a> ||
                            <a href="<?= base_url('superadmin/hapus_permasalahan/' . $row["permasalahan_id"]); ?>">Hapus</a>
                        </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>