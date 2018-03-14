
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="col-md-12">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-user"></i> <?php echo $pegawai->nama_lengkap ?> - <?php echo $pegawai->nrk ?>
          <small class="pull-right">Tanggal: <?php echo date('d/m/Y H:i:s') ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    

    <!-- Table row -->
    <div class="row">
      <div class="col-md-12">
       
       <h4 class="alert alert-info">DETAIL PEGAWAI</h4>

<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th width="25%">NRK - Nama Pegawai</th>
      <th width="1%">:</th>
      <th><?php echo $pegawai->nrk ?> - <?php echo $pegawai->nama_lengkap ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Tempat, tanggal lahir</td>
      <td>:</td>
      <td><?php echo $pegawai->tempat_lahir ?>, <?php echo date('d-m-Y',strtotime($pegawai->tanggal_lahir)) ?></td>
    </tr>
    <tr>
      <td>Status Pegawai</td>
      <td>:</td>
      <td><?php echo $pegawai->nama_jenis_pegawai ?></td>
    </tr>
    <tr>
      <td>Nama Jabatan</td>
      <td>:</td>
      <td><?php echo $pegawai->nama_jabatan ?></td>
    </tr>
    <tr>
      <td>Satker - Bagian</td>
      <td>:</td>
      <td><?php echo $pegawai->nama_satker.' - '.$pegawai->nama_bagian ?></td>
    </tr>
    <tr>
      <td>Golongan - Pangkat</td>
      <td>:</td>
      <td><?php echo $pegawai->golongan.'/'.$pegawai->ruang ?> - <?php echo $pegawai->nama_pangkat ?></td>
    </tr>
    <tr>
      <td>Pendidikan</td>
      <td>:</td>
      <td><?php echo $pegawai->nama_pendidikan ?></td>
    </tr>
  </tbody>
</table>

<h4 class="alert alert-info">RIWAYAT JABATAN STRUKTURAL</h4>

<?php include('jabatan.php') ?>

<h4 class="alert alert-info">RIWAYAT JABATAN FUNGSIONAL</h4>

<?php include('jabatan_fungsional.php') ?>


<h4 class="alert alert-info">RIWAYAT PENDIDIKAN FORMAL DAN INFORMAL</h4>

<?php include('pendidikan.php') ?>

<h4 class="alert alert-info">ANGGOTA KELUARGA</h4>

<?php include('keluarga.php') ?>

<p class="text-center">Jakarta, <?php echo date('d-m-Y') ?></p>
<br>
<br>
<br>
<br>
<p class="text-center"><strong><?php echo $this->session->userdata('nama_lengkap'); ?></strong></p>

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
