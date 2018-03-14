  <?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/jenjang/edit/'.$jenjang->id_jenjang));
?>

<div class="form-group">
<input type="text" name="nama_jenjang" class="form-control" placeholder="Nama jenjang jenjang" value="<?php echo $jenjang->nama_jenjang ?>" required>
</div>

<div class="form-group">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $jenjang->urutan ?>" required>
</div>

<div class="form-group text-center">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

