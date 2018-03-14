<p>
  <a href="<?php echo base_url('admin/berita/tambah') ?>" class="btn btn-success">
    <i class="fa fa-plus"></i> Tambah Baru
  </a>
</p>


<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
  <th>No</th>
  <th>Gambar</th>
  <th>Judul Berita</th>
  <th>Kategori</th>
  <th>Jenis - Status</th>
  <th>Action</th>
</tr>
</thead>
<tbody>

<?php $no=1; foreach($berita as $berita) { ?>

<tr>
  <td><?php echo $no; ?></td>
  <td>
    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
  </td>
  <td><?php echo $berita->judul_berita ?></td>
  <td><?php echo $berita->nama_kategori ?></td>
  <td><?php echo $berita->jenis_berita ?> - <?php echo $berita->status_berita ?></td>
  <td>
  	
	<a href="<?php echo base_url('admin/berita/edit/'.$berita->id_berita) ?>" class="btn btn-warning btn-xs">
		<i class="fa fa-edit"></i> Edit
	</a>

  <a href="<?php echo base_url('admin/berita/delete/'.$berita->id_berita) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')">
    <i class="fa fa-trash-o"></i> Delete
  </a>

  </td>
</tr>

<?php $no++; } ?>

</tbody>
</table>