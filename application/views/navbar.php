<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/admin/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?=base_url('assets')?>/login/images/logo_admin_morena.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Morena
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="<?=base_url()?>assets/libraries/fontawesome/css/all.css"/>
  <!-- CSS Files -->
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="<?=base_url()?>assets/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/admin/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?=base_url()?>assets/admin/demo/demo.css" rel="stylesheet" />

  <link href="<?php echo base_url('assets/crud/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

  <link rel="stylesheet" href="<?=base_url()?>assets/datatable/buttons.dataTables.min.css">
  <style>
  input[type="file"] {
    display: none;
  }
  .custom-file-upload {
      border: 1px solid #ccc;
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;
  }
  hr.solid {
    border-top: 3px solid #bbb;
  }
  /* Style the sidenav links and the dropdown button */

.dropdown-container {
  margin-left: 5px;
  margin-top: -15px;
  padding:0px 0px;
}

  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a class="simple-text logo-mini">
          <img src="<?=base_url('assets')?>/login/images/logo_admin_morena.png"></img>
        </a>
        <h5 class="simple-text logo-normal">
          Morena
        </h5>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <?php if($this->session->userdata('jabatan') == 'DUKTEK') { ?>
        <li class="active ">
            <a href="<?=base_url('index.php/Dashboard')?>">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/Caplan')?>">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Caplan</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/Cv')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>CV</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/ImportKandidat')?>">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Import Kandidat</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/kandidat')?>">
              <i class="now-ui-icons education_atom"></i>
              <p>Kandidat</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/FormInterviewHr')?>">
              <i class="now-ui-icons location_map-big"></i>
              <p>Form Interview HR</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/FormInterviewUser')?>">
              <i class="now-ui-icons location_map-big"></i>
              <p>Form Interview User</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/Batch')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Batch</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/BatchTrainer')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Batch Kandidat Training</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/NilaiTrainer')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Penilaian Trainer</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/karyawan_onboard')?>">
              <i class="now-ui-icons location_map-big"></i>
              <p>Bank</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/bpjs')?>">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>BPJS</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/Kontrak')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Kontrak</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/Resign')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Resign</p>
            </a>
          </li>
          <li>
            <a class="dropdown-btn">Report
              <i class="fa fa-caret-down"></i>
            </a>
            <div class="dropdown-container" style="display: none;">
              <ul class="nav">
              <li>
                <a href="<?=base_url('index.php/InterviewHr')?>">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Report Interview HR</p>
                </a>
              </li>
              <li>
                <a href="<?=base_url('index.php/InterviewUser')?>">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Report Interview User</p>
                </a>
              </li>
              <!-- <li>
                <a href="<?=base_url('index.php/Trainer')?>">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Report Interview User terima</p>
                </a>
              </li> -->
              <li>
                <a href="<?=base_url('index.php/ReportTrainer')?>">
                  <i class="now-ui-icons design_bullet-list-67"></i>
                  <p>Report Training</p>
                </a>
              </li>
              <li>
                <a href="<?=base_url('index.php/ReportKaryawan')?>">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>Report Karyawan</p>
                </a>
              </li>
              <li>
                <a href="<?=base_url('index.php/ReportKaryawanResign')?>">
                  <i class="now-ui-icons text_caps-small"></i>
                  <p>Report Karyawan Resign</p>
                </a>
              </li>
              </ul>
            </div>
          </li>
          <!-- <li class="active-pro"> -->
          <li>
            <a href="<?=site_url().'login/logout'?>">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Logout</p>
            </a>
          </li>
          <?php 
            }
            else if($this->session->userdata('jabatan') == 'HRD') { 
          ?>
          <li class="active ">
            <a href="<?=base_url('index.php/Dashboard')?>">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/Caplan')?>">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Caplan</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/Cv')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>CV</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/ImportKandidat')?>">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Import Kandidat</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/kandidat')?>">
              <i class="now-ui-icons education_atom"></i>
              <p>Kandidat</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/FormInterviewHr')?>">
              <i class="now-ui-icons location_map-big"></i>
              <p>Form Interview HR</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/FormInterviewUser')?>">
              <i class="now-ui-icons location_map-big"></i>
              <p>Form Interview User</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/Batch')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Batch</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/BatchTrainer')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Batch Kandidat Training</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/NilaiTrainer')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Penilaian Trainer</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/karyawan_onboard')?>">
              <i class="now-ui-icons location_map-big"></i>
              <p>Bank</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/bpjs')?>">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>BPJS</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/Kontrak')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Kontrak</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/Resign')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Resign</p>
            </a>
          </li>
          <li>
            <a class="dropdown-btn">Report
              <i class="fa fa-caret-down"></i>
            </a>
            <div class="dropdown-container" style="display: none;">
              <ul class="nav">
              <li>
                <a href="<?=base_url('index.php/InterviewHr')?>">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Report Interview HR</p>
                </a>
              </li>
              <li>
                <a href="<?=base_url('index.php/InterviewUser')?>">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Report Interview User</p>
                </a>
              </li>
              <!-- <li>
                <a href="<?=base_url('index.php/Trainer')?>">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Report Interview User terima</p>
                </a>
              </li> -->
              <li>
                <a href="<?=base_url('index.php/ReportTrainer')?>">
                  <i class="now-ui-icons design_bullet-list-67"></i>
                  <p>Report Training</p>
                </a>
              </li>
              <li>
                <a href="<?=base_url('index.php/ReportKaryawan')?>">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>Report Karyawan</p>
                </a>
              </li>
              <li>
                <a href="<?=base_url('index.php/ReportKaryawanResign')?>">
                  <i class="now-ui-icons text_caps-small"></i>
                  <p>Report Karyawan Resign</p>
                </a>
              </li>
              </ul>
            </div>
          </li>
          <!-- <li class="active-pro"> -->
          <li>
            <a href="<?=site_url().'login/logout'?>">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Logout</p>
            </a>
          </li>
          <?php 
            }
            else if($this->session->userdata('jabatan') == 'TRAINER') { 
          ?>
          <li class="active ">
            <a href="<?=base_url('index.php/Dashboard')?>">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/Batch')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Batch</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/BatchTrainer')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Batch Kandidat Training</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url('index.php/NilaiTrainer')?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Penilaian Trainer</p>
            </a>
          </li>
          <li>
            <a class="dropdown-btn">Report
              <i class="fa fa-caret-down"></i>
            </a>
            <div class="dropdown-container" style="display: none;">
              <ul class="nav">
              <!-- <li>
                <a href="<?=base_url('index.php/Trainer')?>">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Report Interview User Diterima</p>
                </a>
              </li> -->
              <li>
                <a href="<?=base_url('index.php/ReportTrainer')?>">
                  <i class="now-ui-icons design_bullet-list-67"></i>
                  <p>Report Training</p>
                </a>
              </li>
              <li>
                <a href="<?=base_url('index.php/ReportKaryawan')?>">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>Report Karyawan</p>
                </a>
              </li>
              </ul>
            </div>
          </li>
          
          <!-- <li class="active-pro"> -->
          <li>
            <a href="<?=site_url().'login/logout'?>">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Logout</p>
            </a>
          </li>
          <?php
            } else if($this->session->userdata('jabatan') == 'TEAM LEADER') { 
              ?>
              <li class="active ">
                <a href="<?=base_url('index.php/Dashboard')?>">
                  <i class="now-ui-icons design_app"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li>
                <a href="<?=base_url('index.php/FormInterviewUser')?>">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Form Interview User</p>
                </a>
              </li>
              <li>
            <a class="dropdown-btn">Report
              <i class="fa fa-caret-down"></i>
            </a>
            <div class="dropdown-container" style="display: none;">
              <ul class="nav">
              <li>
                <a href="<?=base_url('index.php/InterviewHr')?>">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Report Interview HR</p>
                </a>
              </li>
              <li>
                <a href="<?=base_url('index.php/InterviewUser')?>">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Report Interview User</p>
                </a>
              </li>
              </ul>
            </div>
          </li>
              <!-- <li class="active-pro"> -->
              <li>
                <a href="<?=site_url().'login/logout'?>">
                  <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                  <p>Logout</p>
                </a>
              </li>
              <?php 
              } else if($this->session->userdata('jabatan') == 'KOORDINATOR' AND $this->session->userdata('jabatan') == 'SPV' AND $this->session->userdata('jabatan') == 'ADMIN') { 
                ?>
                <li class="active ">
                  <a href="<?=base_url('index.php/Dashboard')?>">
                    <i class="now-ui-icons design_app"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                <li>
            <a class="dropdown-btn">Report
              <i class="fa fa-caret-down"></i>
            </a>
            <div class="dropdown-container" style="display: none;">
              <ul class="nav">
              <li>
                <a href="<?=base_url('index.php/InterviewHr')?>">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Report Interview HR</p>
                </a>
              </li>
              <li>
                <a href="<?=base_url('index.php/InterviewUser')?>">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Report Interview User</p>
                </a>
              </li>
              <!-- <li>
                <a href="<?=base_url('index.php/Trainer')?>">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Report Interview User terima</p>
                </a>
              </li> -->
              <li>
                <a href="<?=base_url('index.php/ReportTrainer')?>">
                  <i class="now-ui-icons design_bullet-list-67"></i>
                  <p>Report Training</p>
                </a>
              </li>
              <li>
                <a href="<?=base_url('index.php/ReportKaryawan')?>">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>Report Karyawan</p>
                </a>
              </li>
              <li>
                <a href="<?=base_url('index.php/ReportKaryawanResign')?>">
                  <i class="now-ui-icons text_caps-small"></i>
                  <p>Report Karyawan Resign</p>
                </a>
              </li>
              </ul>
            </div>
          </li>
                <!-- <li class="active-pro"> -->
                <li>
                  <a href="<?=site_url().'login/logout'?>">
                    <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                    <p>Logout</p>
                  </a>
                </li>
                <?php 
                  }
              ?>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>Layanan
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">CT NOL</a>
                  <a class="dropdown-item" href="#">CTB</a>
                  <a class="dropdown-item" href="#">FBCC</a>
                  <a class="dropdown-item" href="#">TAM CRL</a>
                  <a class="dropdown-item" href="#">WIFI ID</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>Area
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Bandung</a>
                  <a class="dropdown-item" href="#">BSD Tangerang</a>
                  <a class="dropdown-item" href="#">Balikpapan</a>
                  <a class="dropdown-item" href="#">Jakarta</a>
                  <a class="dropdown-item" href="#">Malang</a>
                  <a class="dropdown-item" href="#">Makassar</a>
                  <a class="dropdown-item" href="#">Medan</a>
                  <a class="dropdown-item" href="#">Semarang</a>
                  <a class="dropdown-item" href="#">Surabaya</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <?=$this->session->userdata('nama')?> | <?=$this->session->userdata('jabatan')?> |  <?=$this->session->userdata('area')?> |  <?=$this->session->userdata('layanan')?>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <script>
          var dropdown = document.getElementsByClassName("dropdown-btn");
          var i;
            
          for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
            } else {
            dropdownContent.style.display = "block";
            }
            });
          }
      </script>