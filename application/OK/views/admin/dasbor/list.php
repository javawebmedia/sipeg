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
    <span class="info-box-icon bg-red"><i class="fa fa-hospital-o"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Puskesmas</span>
      <span class="info-box-number"><?php //echo $puskesmas->total ?> <small>Puskesmas</small></span>
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
    <span class="info-box-icon bg-green"><i class="fa fa-graduation-cap"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Universitas</span>
      <span class="info-box-number"><?php  //echo count($kampus) ?> <small>kampus</small></span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-yellow"><i class="fa fa-calendar"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Periode</span>
      <span class="info-box-number"><?php //echo count($gelombang) ?> Gelombang</span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->
</div>

<hr>
<?php //$this->load->view('admin/pendaftaran/list'); ?>


