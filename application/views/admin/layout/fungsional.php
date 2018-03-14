<?php
$fungsional = $this->dasbor_model->fungsional();
?>
<!-- Messages: style can be found in dropdown.less-->
<li class="dropdown messages-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-pie-chart"></i> Usulan JabFung
    <span class="label label-success"><?php echo count($fungsional) ?></span>
  </a>
  <ul class="dropdown-menu">
    <li class="header">Ada <?php echo count($fungsional) ?> yang diusulkan naik jabatan</li>
    <li>
      <!-- inner menu: contains the actual data -->
      <ul class="menu">

        <?php 
        foreach($fungsional as $fungsional) { 
        $maksimal             = date('Y',strtotime($fungsional->tmt))+2;
        $tanggal_fungsional   = $maksimal.'-'.date('m-d',strtotime($fungsional->tmt));
        $ts1                  = date_create(date('Y-m-d'));
        $ts2                  = date_create($tanggal_fungsional);
        $diff                 = date_diff($ts1,$ts2);
        ?>

        <li><!-- start message -->
          <a href="<?php echo base_url('admin/pegawai/detail/'.$fungsional->id_pegawai) ?>" target="_blank">
            <div class="pull-left">
              <img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <h4>
              <?php echo $fungsional->gelar_depan.' '.$fungsional->nama_lengkap.' '.$fungsional->gelar_belakang ?>
              <small><i class="fa fa-clock-o"></i> <?php echo $diff->format("%R%a") ?> hari</small>
            </h4>
            <p>TMT Terakhir   : <?php echo date('d-m-Y',strtotime($fungsional->tmt)) ?></p>
            <p>TMT Seharusnya : <?php echo date('d-m-Y',strtotime($tanggal_fungsional)) ?></p>
          </a>
        </li>
        <!-- end message -->
        
        <?php } ?>

      </ul>
    </li>
    <li class="footer"><a href="<?php echo base_url('admin/pegawai/fungsional') ?>">Lihat Data Usulan Jabatan Fungsional</a></li>
  </ul>
</li>