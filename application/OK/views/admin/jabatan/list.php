<p><a href="<?php echo base_url('admin/jabatan/tambah') ?>" class="btn btn-primary">
<i class="fa fa-plus"></i> Kelola dan Tambah Data Jabatan</a></p>


<table class="table table-striped table-bordered table-hover" id="example1">
<thead>
<tr>
    <th>#</th>
    <th>File</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Satker</th>
    <th>Pangkat</th>
    <th>Pendidikan</th>
    <th>TMT</th>
    <th width="15%">Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($jabatan as $jabatan) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
      <?php if($jabatan->gambar=="") { ?>

        <span class="btn btn-danger btn-xs">
          <i class="fa fa-times"></i> Tidak ada
        </span>

      <?php }else{ ?>

        <a href="<?php echo base_url('assets/upload/file/'.$jabatan->gambar) ?>" target="_blank" class="btn btn-success btn-xs">
          <i class="fa fa-download"></i> Lihat/Unduh
        </a>
        
      <?php } ?>
    </td>
    <td><?php echo $jabatan->nama_lengkap ?></td>
    <td><?php echo $jabatan->nama_jabatan ?></td>
    <td><?php echo $jabatan->nama_satker ?>
      <br><small><?php echo $jabatan->nama_bagian ?></small>
    </td>
    <td><?php echo $jabatan->nama_pangkat ?>
      <br>Gol: <?php echo $jabatan->golongan ?>/<?php echo $jabatan->ruang ?>
    </td>
    <td><?php echo $jabatan->nama_pendidikan ?></td>
    <td><?php echo $jabatan->tmt ?></td>
    <td>
      <a href="<?php echo base_url('admin/jabatan/read/'.$jabatan->id_jabatan) ?>" 
      class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

       <a href="<?php echo base_url('admin/jabatan/cetak/'.$jabatan->id_jabatan) ?>" 
      class="btn btn-info btn-xs" target="_blank"><i class="fa fa-print"></i></a>

      <a href="<?php echo base_url('admin/jabatan/edit/'.$jabatan->id_jabatan) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>