  <?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/pekerjaan/edit/'.$pekerjaan->id_pekerjaan));
?>

<div class="form-group">
<input type="text" name="nama_pekerjaan" class="form-control" placeholder="Nama pekerjaan" value="<?php echo $pekerjaan->nama_pekerjaan ?>" required>
</div>

<div class="form-group">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $pekerjaan->urutan ?>" required>
</div>

<div class="form-group text-center">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

