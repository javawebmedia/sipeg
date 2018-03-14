  <?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/pendidikan/edit/'.$pendidikan->id_pendidikan));
?>

<div class="form-group">
<input type="text" name="nama_pendidikan" class="form-control" placeholder="Nama jenjang pendidikan" value="<?php echo $pendidikan->nama_pendidikan ?>" required>
</div>

<div class="form-group">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $pendidikan->urutan ?>" required>
</div>

<div class="form-group text-center">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

