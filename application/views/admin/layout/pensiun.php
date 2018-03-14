<?php
$pensiun = $this->dasbor_model->pensiun_58();
?>
<!-- Messages: style can be found in dropdown.less-->
<li class="dropdown messages-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-users"></i> Akan pensiun
    <span class="label label-warning"><?php echo count($pensiun) ?></span>
  </a>
  <ul class="dropdown-menu">
    <li class="header">Ada <?php echo count($pensiun) ?> pegawai yang akan pensiun</li>
    <li>
      <!-- inner menu: contains the actual data -->
      <ul class="menu">

        <?php 
        foreach($pensiun as $pensiun) { 
        $maksimal         = date('Y',strtotime($pensiun->tanggal_lahir))+58;
        $tanggal_pensiun  =$maksimal.'-'.date('m-d',strtotime($pensiun->tanggal_lahir));
        $ts1              = date_create(date('Y-m-d'));
        $ts2              = date_create($tanggal_pensiun);
        $diff             = date_diff($ts1,$ts2);
        ?>

        <li><!-- start message -->
          <a href="<?php echo base_url('admin/pegawai/detail/'.$pensiun->id_pegawai) ?>" target="_blank">
            <div class="pull-left">
              <img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <h4>
              <?php echo $pensiun->gelar_depan.' '.$pensiun->nama_lengkap.' '.$pensiun->gelar_belakang ?>
              <small><i class="fa fa-clock-o"></i> <?php echo $diff->format("%R%a") ?> hari</small>
            </h4>
            <p>Tanggal lahir: <?php echo date('d-m-Y',strtotime($pensiun->tanggal_lahir)) ?></p>
          </a>
        </li>
        <!-- end message -->
        
        <?php } ?>

      </ul>
    </li>
    <li class="footer"><a href="<?php echo base_url('admin/pegawai/pensiun') ?>">Lihat Data Pegawai yang Akan Pensiun</a></li>
  </ul>
</li>