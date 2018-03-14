
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
  <section class="invoice">
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
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th width="25%">NRK - Nama Pegawai</th>
      <th width="1%">:</th>
      <th><?php echo $pegawai->nrk ?> - <?php echo $pegawai->nama_lengkap ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Nama anggota Keluarga</td>
      <td>:</td>
      <td><?php echo $keluarga->nama_lengkap ?></td>
    </tr>
    <tr>
      <td>Hubungan keluarga</td>
      <td>:</td>
      <td><?php echo $keluarga->nama_hubkel ?></td>
    </tr>
    <tr>
      <td>Tempat lahir</td>
      <td>:</td>
      <td><?php echo $keluarga->tempat_lahir ?></td>
    </tr>
    <tr>
      <td>Tanggal lahir</td>
      <td>:</td>
      <td><?php echo $keluarga->tanggal_lahir ?></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td>:</td>
      <td><?php echo $keluarga->jenis_kelamin ?></td>
    </tr>
    <tr>
      <td>Agama</td>
      <td>:</td>
      <td><?php echo $keluarga->nama_agama ?></td>
    </tr>
    <tr>
      <td>Pendidikan</td>
      <td>:</td>
      <td><?php echo $keluarga->nama_jenjang ?></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td>:</td>
      <td><?php echo $keluarga->keterangan ?></td>
    </tr>
  </tbody>
</table>

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
