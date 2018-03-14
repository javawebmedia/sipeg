

<?php 
include('tambah.php');
?>

<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
  <th>No</th>
  <th>Nama Kategori</th>
  <th>Slug</th>
  <th>Urutan</th>
  <th>Action</th>
</tr>
</thead>
<tbody>

<?php $no=1; foreach($kategori as $kategori) { ?>

<tr>
  <td><?php echo $no; ?></td>
  <td><?php echo $kategori->nama_kategori ?></td>
  <td><?php echo $kategori->slug_kategori ?></td>
  <td><?php echo $kategori->urutan ?></td>
  <td>
  	
	<a href="<?php echo base_url('admin/kategori/edit/'.$kategori->id_kategori) ?>" class="btn btn-warning btn-xs">
		<i class="fa fa-edit"></i> Edit
	</a>

  <a href="<?php echo base_url('admin/kategori/delete/'.$kategori->id_kategori) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')">
    <i class="fa fa-trash-o"></i> Delete
  </a>

  </td>
</tr>

<?php $no++; } ?>

</tbody>
</table>