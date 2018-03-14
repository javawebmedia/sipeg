<?php 
// validasi
echo validation_errors('<div class="alert alert-warning">','</div>');

// Buka form
echo form_open('admin/kategori/edit/'.$kategori->id_kategori);
?>

<div class="col-md-6">

	<div class="form-group">
		<label>Nama kategori</label>
		<input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori" value="<?php echo $kategori->nama_kategori ?>" required>
	</div>

	<div class="form-group">
		<label>Urutan tampil</label>
		<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo  $kategori->urutan ?>" required>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
	</div>


</div>


<?php 
// form close
echo form_close();
 ?>