  <?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/satker/edit_bagian/'.$bagian->id_bagian));
?>

<div class="form-group">
<input type="text" name="nama_bagian" class="form-control" placeholder="Nama bagian bagian" value="<?php echo $bagian->nama_bagian ?>" required>
</div>

<div class="form-group">
<textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $bagian->keterangan; ?></textarea>
</div>

<div class="form-group">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $bagian->urutan ?>" required>
</div>

<div class="form-group text-center">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

