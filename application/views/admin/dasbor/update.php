<div class="btn-group">
  <button type="button" class="btn btn-primary btn-xs">Riwayat</button>
  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu">

    <li><a href="<?php echo base_url('admin/jabatan/pegawai/'.$pegawai->id_pegawai) ?>"><i class="fa fa-line-chart"></i> Jabatan Struktural</a></li>

     <li><a href="<?php echo base_url('admin/jabatan_fungsional/pegawai/'.$pegawai->id_pegawai) ?>"><i class="fa fa-pie-chart"></i> Jabatan Fungsional</a></li>

    <li><a href="<?php echo base_url('admin/keluarga/pegawai/'.$pegawai->id_pegawai) ?>"><i class="fa fa-group"></i> Keluarga</a></li>

    <li><a href="<?php echo base_url('admin/pendidikan/pegawai/'.$pegawai->id_pegawai) ?>"><i class="fa fa-graduation-cap"></i> Pendidikan</a></li>

    <li><a href="<?php echo base_url('admin/cuti/pegawai/'.$pegawai->id_pegawai) ?>"><i class="fa fa-car"></i> Cuti Pegawai</a></li>

    <li class="divider"></li>

    <li><a href="<?php echo base_url('admin/pegawai/cetak/'.$pegawai->id_pegawai) ?>"><i class="fa fa-print"></i> Cetak</a></li>

  </ul>
</div>