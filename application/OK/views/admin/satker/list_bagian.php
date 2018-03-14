<p>
  <?php include('tambah_bagian.php') ?>
</p>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Nama Bagian</th>
    <th>Keterangan</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($bagian as $bagian) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $bagian->nama_bagian ?></td>
    <td><?php echo $bagian->keterangan ?></td>
    <td><?php echo $bagian->urutan ?></td>
    <td>

      <a href="<?php echo base_url('admin/satker/edit_bagian/'.$bagian->id_bagian) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete_bagian.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>