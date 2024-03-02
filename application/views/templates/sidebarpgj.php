

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <i class="fas fa-2x fa-house-user"></i>
            <div class="sidebar-brand-text mx-3">WEB-APP</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?= $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pengajar/dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            DATA APLIKASI
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item
            <?= $this->uri->segment(2) == 'siswa' ? 'active' : '' ?>
            <?= $this->uri->segment(2) == 'nilai' ? 'active' : '' ?>
            <?= $this->uri->segment(2) == 'prestasi' ? 'active' : '' ?>
            <?= $this->uri->segment(2) == 'hukuman' ? 'active' : '' ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesType"
                aria-expanded="true" aria-controls="collapsePagesType">
                <i class="fas fa-fw fa-handshake"></i>
                <span>Kesiswaan</span>
            </a>
            <div id="collapsePagesType" class="collapse
                <?= $this->uri->segment(2) == 'siswa' ? 'show' : '' ?>
                <?= $this->uri->segment(2) == 'nilai' ? 'show' : '' ?>
                <?= $this->uri->segment(2) == 'prestasi' ? 'show' : '' ?>
                <?= $this->uri->segment(2) == 'hukuman' ? 'show' : '' ?>"
                aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?= $this->uri->segment(2) == 'siswa' ? 'active' : '' ?>" href="<?= base_url('pengajar/siswa') ?>">Master Siswa</a>
                    <a class="collapse-item <?= $this->uri->segment(2) == 'nilai' ? 'active' : '' ?>" href="<?= base_url('pengajar/nilai') ?>">Nilai Siswa</a>
                    <a class="collapse-item <?= $this->uri->segment(2) == 'prestasi' ? 'active' : '' ?>" href="<?= base_url('pengajar/prestasi') ?>">Prestasi Siswa</a>
                    <a class="collapse-item <?= $this->uri->segment(2) == 'hukuman' ? 'active' : '' ?>" href="<?= base_url('pengajar/hukuman') ?>">Hukuman Siswa</a>
                </div>
            </div>
        </li>

        <li class="nav-item <?= $this->uri->segment(2) == 'jadwal' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pengajar/jadwal'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Jadwal Kelas</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Heading -->
        <div class="sidebar-heading">
            DATA SISTEM
        </div>

        <!-- Nav Item - User -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small mb-3"> &nbsp; <h4><?= $username; ?></h4></span>
                            &nbsp;&nbsp;&nbsp;&nbsp; <img class="img-profile rounded-circle"
                                src="<?= base_url() ?>assets/img/undraw_profile.svg">
                        </a>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->