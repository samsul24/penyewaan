<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background:#1f2833;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/home') ?>">
        <div class="sidebar-brand-icon">
            <div class="sidebar-brand-text mx-3">Gor Tombro</div>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Beranda
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('home') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/home') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('user') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/home/user') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span></a>
    </li>
    <li class="nav-item <?= activate_menu('profile') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/home/profile') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profilku</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Data
    </div>

    <li class="nav-item  ">
        <a class="nav-link  pb-0" href="<?php echo base_url('admin/lapangan') ?>">
            <i class="fas fa-fw fa-funnel-dollar"></i>
            <span>Lapangan</span></a>

    </li>
    <li class="nav-item  ">
        <a class="nav-link  pb-0" href="<?php echo base_url('admin/sewa/sewa1') ?>">
            <i class="fas fa-fw fa-funnel-dollar"></i>
            <span>Penyewaan Lapangan 1</span></a>

    </li>
    <li class="nav-item  ">
        <a class="nav-link  pb-0" href="<?php echo base_url('admin/sewa/sewa2') ?>">
            <i class="fas fa-fw fa-funnel-dollar"></i>
            <span>Penyewaan Lapangan 2</span></a>

    </li>








    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
    <!-- Heading -->
    <div class="sidebar-heading">
        Logout
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link pb-1" href="<?= base_url('login/out_process') ?>" data-toggle="modal" data-target="#logoutModal">
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