<p>
  <?php include('add.php'); ?>
</p>


<table class="table table-striped table-bordered table-hover" id="example1">
<thead>
<tr>
    <th>#</th>
    <th>File</th>
    <th>Nama</th>
    <th>Jabatan fungsional</th>
    <th>Satker</th>
    <th>Pangkat</th>
    <th>Pendidikan</th>
    <th>TMT</th>
    <th width="15%">Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($jabatan_fungsional as $jabatan_fungsional) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
      <?php if($jabatan_fungsional->gambar=="") { ?>

        <span class="btn btn-danger btn-xs">
          <i class="fa fa-times"></i> Tidak ada
        </span>

      <?php }else{ ?>

        <a href="<?php echo base_url('assets/upload/file/'.$jabatan_fungsional->gambar) ?>" target="_blank" class="btn btn-success btn-xs">
          <i class="fa fa-download"></i> Lihat/Unduh
        </a>
        
      <?php } ?>
    </td>
    <td><?php echo $jabatan_fungsional->nama_lengkap ?></td>
    <td><?php echo $jabatan_fungsional->nama_jabatan_fungsional ?>
      <br><small>Status: <?php echo $jabatan_fungsional->status_jabatan ?></small></td>
    <td><?php echo $jabatan_fungsional->nama_satker ?>
      <br><small><?php echo $jabatan_fungsional->nama_bagian ?></small>
    </td>
    <td><?php echo $jabatan_fungsional->nama_pangkat ?>
      <br>Gol: <?php echo $jabatan_fungsional->golongan ?>/<?php echo $jabatan_fungsional->ruang ?>
    </td>
    <td><?php echo $jabatan_fungsional->nama_pendidikan ?></td>
    <td><?php echo $jabatan_fungsional->tmt ?></td>
    <td>
      <a href="<?php echo base_url('admin/jabatan_fungsional/read/'.$jabatan_fungsional->id_jabatan_fungsional) ?>" 
      class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

       <a href="<?php echo base_url('admin/jabatan_fungsional/cetak/'.$jabatan_fungsional->id_jabatan_fungsional) ?>" 
      class="btn btn-info btn-xs" target="_blank"><i class="fa fa-print"></i></a>

      <a href="<?php echo base_url('admin/jabatan_fungsional/edit/'.$jabatan_fungsional->id_jabatan_fungsional) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>