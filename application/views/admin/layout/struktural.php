<?php
$struktural = $this->dasbor_model->struktural();
?>
<!-- Messages: style can be found in dropdown.less-->
<li class="dropdown messages-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-bar-chart"></i> Usulan JabStruk
    <span class="label label-danger"><?php echo count($struktural) ?></span>
  </a>
  <ul class="dropdown-menu">
    <li class="header">Ada <?php echo count($struktural) ?> yang diusulkan naik jabatan</li>
    <li>
      <!-- inner menu: contains the actual data -->
      <ul class="menu">

        <?php 
        foreach($struktural as $struktural) { 
        $maksimal             = date('Y',strtotime($struktural->tmt))+4;
        $tanggal_struktural   = $maksimal.'-'.date('m-d',strtotime($struktural->tmt));
        $ts1                  = date_create(date('Y-m-d'));
        $ts2                  = date_create($tanggal_struktural);
        $diff                 = date_diff($ts1,$ts2);
        ?>

        <li><!-- start message -->
          <a href="<?php echo base_url('admin/pegawai/detail/'.$struktural->id_pegawai) ?>" target="_blank">
            <div class="pull-left">
              <img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <h4>
              <?php echo $struktural->gelar_depan.' '.$struktural->nama_lengkap.' '.$struktural->gelar_belakang ?>
              <small><i class="fa fa-clock-o"></i> <?php echo $diff->format("%R%a") ?> hari</small>
            </h4>
            <p>TMT Terakhir   : <?php echo date('d-m-Y',strtotime($struktural->tmt)) ?></p>
            <p>TMT Seharusnya : <?php echo date('d-m-Y',strtotime($tanggal_struktural)) ?></p>
          </a>
        </li>
        <!-- end message -->
        
        <?php } ?>

      </ul>
    </li>
    <li class="footer"><a href="<?php echo base_url('admin/pegawai/struktural') ?>">Lihat Data Usulan Jabatan Struktural</a></li>
  </ul>
</li>