<p>
  <?php include('tambah.php') ?>
</p>


<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Nama pekerjaan</th>
    <th>Slug</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($pekerjaan as $pekerjaan) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $pekerjaan->nama_pekerjaan ?></td>
    <td><?php echo $pekerjaan->slug_pekerjaan ?></td>
    <td><?php echo $pekerjaan->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/pekerjaan/edit/'.$pekerjaan->id_pekerjaan) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>