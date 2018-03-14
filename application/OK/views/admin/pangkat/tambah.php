<button class="btn btn-primary" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah
</button>
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Tambah data?</h4>
</div>
<div class="modal-body">
    
<?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/pangkat'));
?>

<div class="form-group">
<label>Nama Pangkat</label>
<input type="text" name="nama_pangkat" class="form-control" placeholder="Nama Pangkat" value="<?php echo set_value('nama_pangkat') ?>" required>
</div>

<div class="form-group">
<label>Golongan</label>
<input type="text" name="golongan" class="form-control" placeholder="Golongan" value="<?php echo set_value('golongan') ?>" required>
</div>

<div class="form-group">
<label>Ruang</label>
<input type="text" name="ruang" class="form-control" placeholder="Ruang" value="<?php echo set_value('ruang') ?>" required>
</div>

<div class="form-group">
<label>Urutan</label>
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo set_value('urutan') ?>" required>
</div>


<div class="form-group text-center">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    
    

</div>
</div>
</div>
</div>
