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
    <th>Nama kategori galeri</th>
    <th>Slug</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori_galeri as $kategori_galeri) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $kategori_galeri->nama_kategori_galeri ?></td>
    <td><?php echo $kategori_galeri->slug_kategori_galeri ?></td>
    <td><?php echo $kategori_galeri->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/kategori_galeri/edit/'.$kategori_galeri->id_kategori_galeri) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>