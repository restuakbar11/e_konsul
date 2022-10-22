<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/') ?>">
        <div class="sidebar-brand-text mx-3">E - SULTAN Kabupaten Demak</div>
    </a>

    <hr class="sidebar-divider my-0">
    <?php
    $level = $this->session->userdata('level');
     if ($level == "admin") { ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin') ?>">
                <i class="fas fa-fw fa-home"></i>
                <b><span>Beranda</span></b></a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Konsultasi</span>
            </a>
            <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('admin/konsultasi_semua') ?>">Data Konsultasi</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Bertemu</span>
            </a>
            <div id="collapseData" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('admin/bertemu_semua') ?>">Data Pertemuan</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Pengaturan</span>
            </a>
            <div id="collapsePengaturan" class="collapse" aria-labelledby="HeadingPengaturan" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('auth/ubah_password'); ?>">Ubah Password</a>
                    <a class="collapse-item" href="<?= base_url('auth/logout'); ?>">Keluar</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('webcam') ?>">
                <i class="fas fa-fw fa-home"></i>
                <b><span>Webcam</span></b></a>
        </li>
    <?php } elseif ($level == "superadmin") { ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('superadmin') ?>">
                <i class="fas fa-fw fa-home"></i>
                <b><span>Beranda</span></b></a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Konsultasi</span>
            </a>
            <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('superadmin/konsultasi_semua') ?>">Data Konsultasi</a>
                </div>
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('superadmin/form_konsultasi') ?>">Form Konsultasi</a>
                </div>
                
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Bertemu</span>
            </a>
            <div id="collapseData" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('superadmin/bertemu_semua') ?>">Data Pertemuan</a>
                </div>
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('superadmin/form_pertemuan') ?>">Form Pertemuan</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Master</span>
            </a>
            <div id="collapsePengaturan" class="collapse" aria-labelledby="HeadingPengaturan" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('superadmin/data_permasalahan'); ?>">permasalahan</a>
                    <a class="collapse-item" href="<?= base_url('superadmin/data_user'); ?>">User</a>
                </div>
            </div>
        </li>
        
    <?php } else { ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('opd/beranda') ?>">
                <i class="fas fa-fw fa-home"></i>
                <b><span>Beranda</span></b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('opd'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Form Konsultasi</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('opd/pertemuan'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Form Pertemuan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Pengaturan</span>
            </a>
            <div id="collapsePengaturan" class="collapse" aria-labelledby="HeadingPengaturan" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('auth/ubah_password'); ?>">Ubah Password</a>
                    <a class="collapse-item" href="<?= base_url('auth/logout'); ?>">Keluar</a>
                </div>
            </div>
        </li>
    <?php } ?>

</ul>
<!-- End of Sidebar -->