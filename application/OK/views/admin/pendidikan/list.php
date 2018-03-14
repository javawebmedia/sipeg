<p>
  <?php include('tambah.php') ?>
</p>

<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<table class="table table-striped table-bordered table-hover" id="searchable">
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

<?php $i=1; foreach($pendidikan as $pendidikan) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $pendidikan->nama_pendidikan ?></td>
    <td><?php echo $pendidikan->slug_pendidikan ?></td>
    <td><?php echo $pendidikan->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/pendidikan/edit/'.$pendidikan->id_pendidikan) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>