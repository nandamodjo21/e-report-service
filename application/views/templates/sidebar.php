<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pelanggaran Siswa</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- QUERY MENU -->


    <!-- LOOPING MENU -->
    <div class="sidebar-heading">
        admin </div>

    <!-- SIAPKAN SUB-MENU SESUAI MENU -->


    <li class="nav-item active">
        <a class="nav-link pb-0" href="<?= base_url('admin');?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>

    </li>

    <?php switch ($user_role) {

    case 1:
        ?>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/role');?>">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Role</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/dataSiswa');?>">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Data Siswa</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/dataGuru');?>">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Data Guru</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/dataLaporan');?>">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Data Laporan</span></a>
    </li>
    <?php
        break;
        
        default:
        ?>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/dataLaporan');?>">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Data Laporan</span></a>
    </li>

    <?php 
        break;

    }
    ?>




    <hr class="sidebar-divider mt-3">

    <div class="sidebar-heading">
        user </div>

    <!-- SIAPKAN SUB-MENU SESUAI MENU -->

    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('user');?>">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('user/menuutama');?>">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Menu utama</span></a>
    </li>




    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout');?>">
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