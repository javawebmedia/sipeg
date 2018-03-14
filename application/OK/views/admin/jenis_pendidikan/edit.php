  <?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/jenis_pendidikan/edit/'.$jenis_pendidikan->id_jenis_pendidikan));
?>

<div class="form-group">
<input type="text" name="nama_jenis_pendidikan" class="form-control" placeholder="Nama Jenis Pendidikan" value="<?php echo $jenis_pendidikan->nama_jenis_pendidikan ?>" required>
</div>

<div class="form-group">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $jenis_pendidikan->urutan ?>" required>
</div>

<div class="form-group text-center">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

