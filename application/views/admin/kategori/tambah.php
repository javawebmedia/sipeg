<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
	<i class="fa fa-plus"></i> Tambah Baru
</button>

<br><br>
<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">

<?php 
// validasi
echo validation_errors('<div class="alert alert-warning">','</div>');

// Buka form
echo form_open('admin/kategori');
?>

<div class="col-md-12">

	<div class="form-group">
		<label>Nama kategori</label>
		<input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori" value="<?php echo set_value('nama_kategori') ?>" required>
	</div>

	<div class="form-group">
		<label>Urutan</label>
		<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo set_value('urutan') ?>">
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

  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->