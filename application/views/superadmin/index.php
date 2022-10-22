<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">KONSULTASI</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <a href="<?= base_url('superadmin/konsultasi') ?>"><div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Konsultasi yang belum direspon</div></a>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $proses; ?></div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <a href="<?= base_url('superadmin/konsultasi_tolak') ?>"><div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Konsultasi yang ditolak</div></a>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tolak; ?></div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <a href="<?= base_url('superadmin/konsultasi_terima') ?>"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Konsultasi yang sudah diterima</div></a>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $terima; ?></div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <a href="<?= base_url('superadmin/konsultasi_semua') ?>"><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Semua konsultasi</div></a>
            </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $semua; ?></div>
            </div>

          </div>
        </div>
      </div>
    </div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">BERTEMU</h1>
  </div>
      <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <a href="<?= base_url('superadmin/bertemu') ?>">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pertemuan yang belum direspon</div>
              </a>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $proses_bertemu; ?></div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <a href="<?= base_url('superadmin/bertemu_tolak') ?>">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pertemuan yang ditolak</div>
              </a>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tolak_bertemu; ?></div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <a href="<?= base_url('superadmin/bertemu_terima') ?>">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pertemuan yang diterima</div>
              </a>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $terima_bertemu; ?></div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <a href="<?= base_url('superadmin/bertemu_semua') ?>"><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Semua pertemuan</div></a>
            </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $semua_bertemu; ?></div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
  </div>

</div>

