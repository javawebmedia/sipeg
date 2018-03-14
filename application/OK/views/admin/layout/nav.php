<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <!-- DATA PEGAWAI -->
        <li>
          <a href="<?php echo base_url('admin/dasbor') ?>">
            <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
        </a></li>

        <!-- DATA PEGAWAI -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>DATA PEGAWAI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/pegawai') ?>"><i class="fa fa-table"></i> Data Pegawai</a></li>
            <li><a href="<?php echo base_url('admin/pegawai/tambah') ?>"><i class="fa fa-plus"></i> Tambah Pegawai</a></li>

            <li><a href="<?php echo base_url('admin/keluarga') ?>"><i class="fa fa-sitemap"></i> Data Keluarga Pegawai</a></li>

            <li><a href="<?php echo base_url('admin/pendidikan') ?>"><i class="fa fa-graduation-cap"></i> Data Pendidikan Pegawai</a></li>

            <li><a href="<?php echo base_url('admin/jabatan') ?>"><i class="fa fa-line-chart"></i> Data Jabatan Pegawai</a></li>


          </ul>
        </li>

        <!-- DATA JABATAN -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>DATA JABATAN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/jabatan') ?>"><i class="fa fa-bar-chart"></i> Data Jabatan Struktural</a></li>
            <li><a href="<?php echo base_url('admin/jabatanf') ?>"><i class="fa fa-pie-chart"></i> Data Jabatan Fungsional</a></li>
            <li><a href="<?php echo base_url('admin/pangkat') ?>"><i class="fa fa-sort-numeric-asc"></i> Data Kepangkatan/Golongan</a></li>
            <li><a href="<?php echo base_url('admin/satker') ?>"><i class="fa fa-home"></i> Data Satuan Kerja</a></li>
          </ul>
        </li>

        <!-- DATA BERITA -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>DATA BERITA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/berita') ?>"><i class="fa fa-table"></i> Data Berita</a></li>
            <li><a href="<?php echo base_url('admin/berita/tambah') ?>"><i class="fa fa-plus"></i> Tambah Berita</a></li>
            <li><a href="<?php echo base_url('admin/kategori') ?>"><i class="fa fa-tags"></i> Kategori Berita</a></li>
          </ul>
        </li>

       <!-- DATA GALERI -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-image"></i> <span>DATA GALERI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/galeri') ?>"><i class="fa fa-table"></i> Data Galeri</a></li>
            <li><a href="<?php echo base_url('admin/galeri/tambah') ?>"><i class="fa fa-plus"></i> Tambah Galeri</a></li>
            <li><a href="<?php echo base_url('admin/kategori') ?>"><i class="fa fa-tags"></i> Kategori Berita</a></li>
          </ul>
        </li>

        <!-- DATA BERITA -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-download"></i> <span>DATA DOWNLOAD</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/download') ?>"><i class="fa fa-table"></i> Data Download</a></li>
            <li><a href="<?php echo base_url('admin/download/tambah') ?>"><i class="fa fa-plus"></i> Tambah Download</a></li>
            <li><a href="<?php echo base_url('admin/kategori_download') ?>"><i class="fa fa-tags"></i> Kategori Download</a></li>
          </ul>
        </li>

        <!-- DATA REFERENSI -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>REFERENSI DATA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/referensi/agama') ?>"><i class="fa fa-circle-o"></i> Data Agama</a></li>
            <li><a href="<?php echo base_url('admin/referensi/provinsi') ?>"><i class="fa fa-circle-o"></i> Data Provinsi</a></li>
            <li><a href="<?php echo base_url('admin/referensi/kabupaten') ?>"><i class="fa fa-circle-o"></i> Data Kabupaten/Kota</a></li>
            <li><a href="<?php echo base_url('admin/referensi/kecamatan') ?>"><i class="fa fa-circle-o"></i> Data Kecamatan</a></li>
            <li><a href="<?php echo base_url('admin/referensi/jenis') ?>"><i class="fa fa-circle-o"></i> Data Jenis Pegawai</a></li>

            <li><a href="<?php echo base_url('admin/hubkel') ?>"><i class="fa fa-circle-o"></i> Data Hubungan Keluarga</a></li>
            <li><a href="<?php echo base_url('admin/jenjang') ?>"><i class="fa fa-circle-o"></i> Data Jenjang Pendidikan</a></li>
             <li><a href="<?php echo base_url('admin/jenis_pendidikan') ?>"><i class="fa fa-circle-o"></i> Data Jenis Pendidikan</a></li>

          </ul>
        </li>

        <!-- DATA KONFIGURASI -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>KONFIGURASI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?php echo base_url('admin/dasbor/konfigurasi') ?>"><i class="fa fa-plus"></i> Konfigurasi Umum</a></li>
             <li><a href="<?php echo base_url('admin/dasbor/icon') ?>"><i class="fa fa-home"></i> Ganti Icon</a></li>
             <li><a href="<?php echo base_url('admin/dasbor/logo') ?>"><i class="fa fa-image"></i> Ganti Logo</a></li>
             <li><a href="<?php echo base_url('admin/dasbor/banner') ?>"><i class="fa fa-book"></i> Ganti Banner</a></li>
          </ul>
        </li>

        <!-- DATA PANDUAN 
        <li>
          <a href="<?php echo base_url('admin/panduan') ?>">
            <i class="fa fa-question"></i> <span>BUKU PANDUAN</span>
        </a></li>
        -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard"></i> Dasbor</a></li>
        <li><a href="<?php echo base_url('admin/'.$this->uri->segment(2)) ?>"> <?php echo ucfirst(str_replace('_', ' ', $this->uri->segment(2))) ?></a></li>
        <li class="active"><?php echo $title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
          <div class="box-body" style="min-height: 500px;">

<?php 
// Form validation errors
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ','</div>');

// Upload file error
if(isset($error)) {
  echo '<div class="alert alert-warning"><i class="fa fa-warning"></i> ';
  echo $error;
  echo '</div>';
}

// Notifikasi
if($this->session->userdata('sukses')) {
  echo '<div class="alert alert-success"><i class="fa fa-check"></i> ';
  echo $this->session->userdata('sukses');
  echo '</div>';
}
?>
