<p><a href="<?php echo base_url('admin/keluarga/tambah') ?>" class="btn btn-primary">
<i class="fa fa-plus"></i> Kelola dan Tambah Data Keluarga</a></p>


<table class="table table-striped table-bordered table-hover" id="example1">
<thead>
<tr>
    <th>#</th>
    <th>Nama Pegawai</th>
    <th>Nama Keluarga</th>
    <th>Status</th>
    <th>L/P</th>
    <th>TTL</th>
    <th>Pendidikan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($keluarga as $keluarga) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
      <a href="<?php echo base_url('admin/keluarga/pegawai/'.$keluarga->id_pegawai) ?>">
      <?php echo $keluarga->nama_pegawai ?>
      </a>  
    </td>
    <td><?php echo $keluarga->nama_lengkap ?></td>
    <td><?php echo $keluarga->nama_hubkel ?></td>
    <td><?php echo $keluarga->jenis_kelamin ?></td>
    <td><?php echo $keluarga->tempat_lahir ?>, <?php echo date('d-m-Y',strtotime($keluarga->tanggal_lahir)) ?></td>
    <td><?php echo $keluarga->nama_jenjang ?></td>
    <td>
      <a href="<?php echo base_url('admin/keluarga/read/'.$keluarga->id_keluarga) ?>" 
      class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

      <a href="<?php echo base_url('admin/keluarga/cetak/'.$keluarga->id_keluarga) ?>" 
      class="btn btn-info btn-xs" target="_blank"><i class="fa fa-print"></i></a>

      <a href="<?php echo base_url('admin/keluarga/edit/'.$keluarga->id_keluarga) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>