<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $title; ?></title>
  <link href="<?php echo base_url("assets/admin/") ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?php echo base_url("assets/admin/") ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url("dashboard/") ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        MENU UTAMA
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("dashboard/") ?>">
          <i class="fas fa-fw fa-list"></i>
          <span>List Buku</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("dashboard/tambah_buku/") ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Tambah Buku</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("dashboard/riwayat_pinjam/") ?>">
          <i class="fas fa-fw fa-history"></i>
          <span>Riwayat Peminjaman</span></a>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Sekolah
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("dashboard/data_sekolah/"); ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Data Sekolah</span></a>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Admin
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("dashboard/list_admin/"); ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>User Admin</span></a>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Siswa
      </div>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("dashboard/user_siswa/"); ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>User Siswa</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("dashboard/kelas_siswa/"); ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Daftar Kelas</span></a>
      </li>

      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>

              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span>
                <img class="img-profile rounded-circle" src="<?php echo base_url("./assets/admin.png") ?>">
              </a>

            </li>

          </ul>

        </nav>

        <div class="container-fluid">
