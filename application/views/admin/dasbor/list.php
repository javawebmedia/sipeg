<div class="row">
<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-aqua"><i class="fa fa-group"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Pegawai</span>
      <span class="info-box-number"><?php echo number_format(count($pegawai)) ?> Pegawai</span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-red"><i class="fa fa-calendar"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Akan Pensiun</span>
      <span class="info-box-number"><?php echo count($pensiun) ?> <small>Pegawai</small></span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix visible-sm-block"></div>

<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-green"><i class="fa fa-bar-chart"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Usulan Jabatan</span>
      <span class="info-box-number"><?php  echo count($struktural) ?> <small>Pegawai</small></span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-yellow"><i class="fa fa-pie-chart"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Usulan Jab. Fung</span>
      <span class="info-box-number"><?php echo count($fungsional) ?> Pegawai</span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->
</div>

<?php include('grafik.php') ?>

<?php if($this->session->userdata('akses_level')=="Pegawai") {}else{ ?>

<div class="clearfix"></div>

<hr>
<br>
<br>
<p>
  <a href="<?php echo base_url('admin/pegawai/tambah') ?>" title="Tambah Pegawai" class="btn btn-success btn-lg">
    <i class="fa fa-plus"></i> Tambah Baru
  </a>

  <a href="<?php echo base_url('admin/dasbor/excel') ?>" title="Export Excel" class="btn btn-warning btn-lg" target="_blank">
    <i class="fa fa-file-excel-o"></i> Download Rekap Per Satker (Excel)
  </a>

  <a href="<?php echo base_url('admin/dasbor/pegawai') ?>" title="Export Excel" class="btn btn-danger btn-lg" target="_blank">
    <i class="fa fa-file-excel-o"></i> Download Data Pegawai (Excel)
  </a>
</p>

<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
  <th width="2%">NO</th>
  <th>NAMA</th>
  <th>PENDIDIKAN</th>
  <th>JABATAN</th>
  <th>TTL</th>
  <th>L/P</th>
  <th width="30%">ACTION</th>
</tr>
</thead>
<tbody>

<?php $no = 1; foreach($pegawai as $pegawai){ ?>

<tr>
  <td><?php echo $no ?></td>
  <td>
    <a href="<?php echo base_url('admin/pegawai/detail/'.$pegawai->id_pegawai) ?>" target="_blank">
      <?php echo $pegawai->nama_lengkap ?>
    </a>
    <br><small>
      NIP: <?php echo $pegawai->nip ?>
      <br>NRK: <?php echo $pegawai->nrk ?>
    </small>
  </td>
  <td><?php echo $pegawai->nama_pendidikan ?></td>
  <td><?php echo $pegawai->nama_jabatan ?></td>
  <td><?php echo $pegawai->tempat_lahir ?>, <?php echo date('d-m-Y',strtotime($pegawai->tanggal_lahir)) ?></td>
  <td><?php echo $pegawai->jenis_kelamin ?></td>
  <td>

    <?php 
    include('update.php');
    include('akses.php'); 
    ?>

    <a href="<?php echo base_url('admin/pegawai/cetak/'.$pegawai->id_pegawai) ?>" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-print"></i> Cetak</a>

    <a href="<?php echo base_url('admin/pegawai/edit/'.$pegawai->id_pegawai) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

    <?php include('delete.php') ?>

  </td>
</tr>

<?php $no++; } ?>

</tbody>
</table>

<?php } ?>


