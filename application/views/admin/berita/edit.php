
<?php 

// Error upload file
if(isset($error)) {
  echo '<div class="alert alert-warning">';
  echo $error;
  echo '</div>';
}

// validasi
echo validation_errors('<div class="alert alert-warning">','</div>');

// Buka form
echo form_open_multipart('admin/berita/edit/'.$berita->id_berita);
?>

<div class="col-md-8">

	<div class="form-group form-group-lg">
		<label>Judul Berita</label>
		<input type="text" name="judul_berita" class="form-control" placeholder="Judul berita" value="<?php echo $berita->judul_berita ?>" required>
	</div>

</div>

<div class="col-md-4">

  <div class="form-group form-group-lg">
    <label>Status Berita</label>
    <select name="status_berita" class="form-control">
      <option value="Publish">Publikasikan</option>
      <option value="Draft" <?php if($berita->status_berita=="Draft") { echo "selected"; } ?>>Simpan Sebagai Draft</option>
    </select>
  </div>

</div>

<div class="col-md-4">

  <div class="form-group">
    <label>Jenis Berita</label>
    <select name="jenis_berita" class="form-control">
      <option value="Berita">Berita</option>
      <option value="Profil" <?php if($berita->jenis_berita=="Profil") { echo "selected"; } ?>>Profil</option>
    </select>
  </div>

</div>

<div class="col-md-4">

  <div class="form-group">
    <label>Kategori Berita</label>
    <select name="id_kategori" class="form-control">

      <?php foreach($kategori as $kategori) { ?>
        <option value="<?php echo $kategori->id_kategori ?>" 
          <?php if($berita->id_kategori==$kategori->id_kategori) { echo "selected"; } ?>
          >
          <?php echo $kategori->nama_kategori ?>
        </option>
      <?php } ?>

    </select>
  </div>

</div>

<div class="col-md-4">
  <div class="form-group">
    <label>Upload gambar</label>
    <input type="file" name="gambar" class="form-control">
  </div>
</div>

<div class="col-md-12">

  <div class="form-group">
    <label>Isi Berita</label>
    <textarea name="isi_berita" class="form-control" id="editorku"><?php echo $berita->isi_berita ?></textarea>
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
