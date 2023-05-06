<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASE_URL. 'Home' ?>">
            <div class="sidebar-brand-icon">
                <i class="fa fa-adjust"></i>
            </div>
            <div class="sidebar-brand-text mx-3"><?= $data['role'][0]['namaAkses']; ?></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php if ($data['title'] == 'Home') : echo 'active'; endif; ?>">
            <a class="nav-link" href="<?= BASE_URL. 'Home' ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Sales
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item <?php if ($data['title'] == 'Penjualan') : echo 'active'; endif; ?>">
            <a class="nav-link" href="<?= BASE_URL. 'Penjualan' ?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Penjualan</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item <?php if ($data['title'] == 'Pembelian') : echo 'active'; endif; ?>">
            <a class="nav-link" href="<?= BASE_URL. 'Pembelian' ?>">
                <i class="fas fa-fw fa-shopping-basket"></i>
                <span>Pembelian</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item <?php if ($data['title'] == 'Barang') : echo 'active'; endif; ?>">
            <a class="nav-link" href="<?= BASE_URL. 'Barang' ?>">
                <i class="fas fa-fw fa-archive"></i>
                <span>Barang</span></a>
        </li>

        <?php if (in_array($data['role'][0]['namaAkses'], ['Administrator','Manajer','Gudang','Keuangan','HRD','Supervisor','Purchasing'])): ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Master Data
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item <?php if ($data['title'] == 'Pelanggan') : echo 'active'; endif; ?>">
            <a class="nav-link" href="<?= BASE_URL. 'Pelanggan' ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Pelanggan</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item <?php if ($data['title'] == 'Supplier') : echo 'active'; endif; ?>">
            <a class="nav-link" href="<?= BASE_URL. 'Supplier' ?>">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Supplier</span></a>
        </li>

        <?php if (in_array($data['role'][0]['namaAkses'], ['Administrator'])): ?>

        <!-- Nav Item - Charts -->
        <li class="nav-item <?php if ($data['title'] == 'Pengguna') : echo 'active'; endif; ?>">
            <a class="nav-link" href="<?= BASE_URL. 'Pengguna' ?>">
                <i class="fas fa-fw fa-user-circle"></i>
                <span>Pengguna</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item <?php if ($data['title'] == 'Hak Akses') : echo 'active'; endif; ?>">
            <a class="nav-link" href="<?= BASE_URL. 'HakAkses' ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Hak Akses</span></a>
        </li>

        <?php endif; ?>

        <?php endif; ?>

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