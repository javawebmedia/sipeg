  <?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/pangkat/edit/'.$pangkat->id_pangkat));
?>

<div class="form-group">
<label>Nama Pangkat</label>
<input type="text" name="nama_pangkat" class="form-control" placeholder="Nama pangkat" value="<?php echo $pangkat->nama_pangkat ?>" required>
</div>

<div class="form-group">
<label>Golongan</label>
<input type="text" name="golongan" class="form-control" placeholder="Golongan" value="<?php echo $pangkat->golongan ?>" required>
</div>

<div class="form-group">
<label>Ruang</label>
<input type="text" name="ruang" class="form-control" placeholder="Ruang" value="<?php echo $pangkat->ruang ?>" required>
</div>


<div class="form-group">
<label>Urutan</label>
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $pangkat->urutan ?>" required>
</div>

<div class="form-group text-center">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

