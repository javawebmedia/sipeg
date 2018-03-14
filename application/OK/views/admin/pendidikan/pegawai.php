<p>
  <?php include('add.php'); ?>
</p>


<table class="table table-striped table-bordered table-hover" id="example1">
<thead>
<tr>
    <th>#</th>
    <th>File</th>
    <th>Nama</th>
    <th>Type</th>
    <th>Jenis</th>
    <th>Jenjang</th>
    <th>Institusi</th>
    <th>Tahun Lulus</th>
    <th width="15%">Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($pendidikan as $pendidikan) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
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
    <td><?php echo $pendidikan->nama_pendidikan ?></td>
    <td><?php echo $pendidikan->jenis_pendidikan ?></td>
    <td><?php echo $pendidikan->nama_jenis_pendidikan ?></td>
    <td><?php echo $pendidikan->nama_jenjang ?></td>
    <td><?php echo $pendidikan->nama_institusi ?></td>
    <td><?php echo $pendidikan->tahun ?></td>
    <td>
      <a href="<?php echo base_url('admin/pendidikan/read/'.$pendidikan->id_pendidikan) ?>" 
      class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

       <a href="<?php echo base_url('admin/pendidikan/cetak/'.$pendidikan->id_pendidikan) ?>" 
      class="btn btn-info btn-xs" target="_blank"><i class="fa fa-print"></i></a>

      <a href="<?php echo base_url('admin/pendidikan/edit/'.$pendidikan->id_pendidikan) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>