<p>
  <?php include('tambah.php') ?>
</p>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Nama jenjang pendidikan</th>
    <th>Slug</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($jenis_pendidikan as $jenis_pendidikan) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $jenis_pendidikan->nama_jenis_pendidikan ?></td>
    <td><?php echo $jenis_pendidikan->slug_jenis_pendidikan ?></td>
    <td><?php echo $jenis_pendidikan->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/jenis_pendidikan/edit/'.$jenis_pendidikan->id_jenis_pendidikan) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>