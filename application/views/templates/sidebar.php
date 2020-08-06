<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark font-weight-bold accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" onclick="navlink();" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/changepassword'); ?>">
            <i class="fas fa-fw fa-key"></i>
            <span>Change Password</span></a>
    </li>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        User
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user" aria-expanded="true" aria-controls="user">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span>
        </a>
        <div id="user" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('admin/mahasiswa') ?>">Mahasiswa</a>
                <a class="collapse-item" href="<?= base_url('admin/dosen') ?>">Dosen</a>
                <a class="collapse-item" href="<?= base_url('admin/pimpinan') ?>">Pimpinan</a>
                <a class="collapse-item" href="<?= base_url('admin/ukm') ?>">UKM</a>
            </div>
        </div>

    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Dosen
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/dataDosen'); ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Dosen</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('admin/dataKriteria') ?>">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Kriteria Dosen</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('admin/normalisasi') ?>" data-toggle="collapse" data-target="#normalisasi" aria-expanded="true" aria-controls="normalisasi">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Normalisasi</span>
        </a>
        <div id="normalisasi" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('admin/normalisasi') ?>">Normalisasi WP</a>
                <a class="collapse-item" href="<?= base_url('admin/normalisasiSAW') ?>">Normalisasi SAW</a>
            </div>
        </div>

    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Tendik
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('admin/dataTendik'); ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Tendik</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('admin/dataKriteria_tendik') ?>">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Kriteria Tendik</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('admin/normalisasi_tnedik_WP') ?>" data-toggle="collapse" data-target="#normalisasiTendik" aria-expanded="true" aria-controls="normalisasiTendik">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Normalisasi</span>
        </a>
        <div id="normalisasiTendik" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('admin/normalisasi_tendik_WP') ?>">Normalisasi WP</a>
                <a class="collapse-item" href="<?= base_url('admin/normalisasi_tendik_SAW') ?>">Normalisasi SAW</a>
            </div>
        </div>

    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->