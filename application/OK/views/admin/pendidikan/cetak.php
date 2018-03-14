
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
      <td>Nama Pendidikan</td>
      <td>:</td>
      <td><?php echo $pendidikan->nama_pendidikan ?></td>
    </tr>
    <tr>
      <td>Jenis pendidikan</td>
      <td>:</td>
      <td><?php echo $pendidikan->nama_jenis_pendidikan ?></td>
    </tr>
    <tr>
      <td>Tanggal Ijazah/Sertifikat</td>
      <td>:</td>
      <td><?php echo $pendidikan->tanggal_ijazah ?></td>
    </tr>
    <tr>
      <td>Nomor Ijazah</td>
      <td>:</td>
      <td><?php echo $pendidikan->nomor_ijazah ?></td>
    </tr>
    <tr>
      <td>Tahun Lulus</td>
      <td>:</td>
      <td><?php echo $pendidikan->tahun ?></td>
    </tr>
    <tr>
      <td>Nama Institusi/Penyelenggaran</td>
      <td>:</td>
      <td><?php echo $pendidikan->nama_institusi ?></td>
    </tr>
    <tr>
      <td>File Ijazah/Sertifikat</td>
      <td>:</td>
      <td>
        <?php if($pendidikan->gambar=="") { ?>

        <span class="btn btn-danger btn-xs">
          <i class="fa fa-times"></i> Tidak ada
        </span>

      <?php }else{ ?>

        <a href="<?php echo base_url('assets/upload/file/'.$pendidikan->gambar) ?>" target="_blank" class="btn btn-success btn-xs">
          <i class="fa fa-download"></i> Lihat/Unduh
        </a>
        
      <?php } ?>
      </td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td>:</td>
      <td><?php echo $pendidikan->keterangan ?></td>
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
