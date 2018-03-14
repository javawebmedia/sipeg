  <?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/hubkel/edit/'.$hubkel->id_hubkel));
?>

<div class="form-group">
<label>Nama Hubungan Keluarga</label>
<input type="text" name="nama_hubkel" class="form-control" placeholder="Nama Hubungan Keluarga" value="<?php echo $hubkel->nama_hubkel ?>" required>
</div>

<div class="form-group">
<label>Urutan</label>
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $hubkel->urutan ?>" required>
</div>

<div class="form-group">
<label>Aktif/Non Aktif</label>
<select name="aktif" class="form-control">
	<option value="1">Aktif</option>
	<option value="2" <?php if($hubkel->aktif==0) { echo "selected"; } ?>>Non Aktif</option>
</select>
</div>

<div class="form-group text-center">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

