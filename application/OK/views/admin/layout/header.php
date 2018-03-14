<?php 
// Ambil data id_pegawai dari SESSION
$id_pegawai     = $this->session->userdata('id_pegawai');
$pegawai_login  = $this->pegawai_model->detail($id_pegawai);
?>

<?php 
$site_head = $this->konfigurasi_model->home();
?>

<header class="main-header">

<!-- Logo -->
<a href="<?php echo base_url('admin/dasbor') ?>" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini">

    <img src="<?php echo base_url('assets/upload/image/'.$site_head->icon) ?>" width="30">

  </span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg">

    <?php echo $site_head->namaweb ?>
    
  </span>
</a>

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
          <span class="hidden-xs"><?php echo $pegawai_login->nama_lengkap ?> 
            (NRK: <?php echo $pegawai_login->nrk ?>)</span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

            <p>
              <?php echo $pegawai_login->nama_lengkap ?> - <?php echo $pegawai_login->akses_level ?>
            </p>
          </li>
          
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="<?php echo base_url('admin/profil') ?>" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i> Profil</a>

              <a href="<?php echo base_url('admin/profil/password') ?>" class="btn btn-warning btn-flat"><i class="fa fa-lock"></i> Password</a>
            </div>
            <div class="pull-right">
              <a href="<?php echo base_url('login/logout') ?>" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
          </li>
        </ul>
      </li>
     
    </ul>
  </div>

</nav>
</header>