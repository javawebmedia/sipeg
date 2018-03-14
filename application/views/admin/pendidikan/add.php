<script>
  $('#Tambah').on('show', function () {
    $.fn.modal.Constructor.prototype.enforceFocus = function () { };
});

</script>
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah Riwayat Pendidikan
</button>

<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">

<?php 
echo form_open_multipart(base_url('admin/pendidikan/pegawai/'.$pegawai->id_pegawai)); 
?>

<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Tambah data?</h4>
</div>
<div class="modal-body">


<div class="col-md-6">

	<div class="form-group">
		<label>Nama Pendidikan/Pelatihan</label>
		<input type="text" name="nama_pendidikan" class="form-control" placeholder="Nama Pendidikan/Pelatihan" value="<?php echo set_value('nama_pendidikan') ?>" required>
	</div>

	<div class="form-group">
		<label>Nama Institusi Pendidikan/Penyelenggara</label>
		<input type="text" name="nama_institusi" class="form-control" placeholder="Nama Institusi Pendidikan/Penyelenggara" value="<?php echo set_value('nama_institusi') ?>">
	</div>

	<div class="form-group">
		<label>Type Pendidikan</label>
		<select name="jenis_pendidikan" class="form-control">
			<option value="Formal">Pendidikan Formal</option>
			<option value="Informal">Pendidikan Informal</option>
		</select>
	</div>

	<div class="form-group">
		<label>Jenis Pendidikan</label>
		<select name="id_jenis_pendidikan" class="form-control">

			<?php foreach($jenis_pendidikan as $jenis_pendidikan) { ?>
			<option value="<?php echo $jenis_pendidikan->id_jenis_pendidikan ?>">
				<?php echo $jenis_pendidikan->nama_jenis_pendidikan ?>
			</option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Jenjang Pendidikan</label>
		<select name="id_jenjang" class="form-control">

			<option value="">Jenjang Pendidikan</option>
			<?php foreach($jenjang as $jenjang) { ?>
			<option value="<?php echo $jenjang->id_jenjang ?>">
				<?php echo $jenjang->nama_jenjang ?>
			</option>
			<?php } ?>
		</select>
	</div>

	
	

</div>

<div class="col-md-6">

	
	<div class="row">

		<div class="col-md-6">
			<div class="form-group">
				<label>Tahun Lulus</label>
				<input type="number" name="tahun" class="form-control" placeholder="Tahun Lulus" value="<?php echo set_value('tahun') ?>" required>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label>Tanggal Ijazah/Sertifikat</label>
				<input type="text" name="tanggal_ijazah" class="form-control datepicker" placeholder="Tanggal Ijazah/Sertifikat" value="<?php echo set_value('tanggal_ijazah') ?>">
			</div>

		</div>

	</div>

	

	<div class="form-group">
		<label>Nomor Ijazah/Sertifikat</label>
		<input type="text" name="nomor_ijazah" class="form-control" placeholder="Nomor Ijazah/Sertifikat" value="<?php echo set_value('nomor_ijazah') ?>">
	</div>

	

	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="keterangan" placeholder="Keterangan" class="form-control"><?php echo set_value('keterangan') ?></textarea>
	</div>

	<div class="form-group">
		<label>Upload File Ijazah/Sertifikat</label>
		<input type="file" name="gambar" class="form-control" placeholder="Upload File Ijazah/Sertifikat">
		<small class="text-danger">Extensi: doc, docx, pdf, zip, jpg, png, gif, jpeg</small>
	</div>

</div>

<div class="clearfix"></div>

</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success btn-lg">
    	<i class="fa fa-save"></i> Simpan Data
    </button>
    
    <button type="reset" class="btn btn-warning btn-lg">
    	<i class="fa fa-backward"></i> Reset
    </button>

    <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">
    	<i class="fa fa-times"></i> Batal
    </button>

</div>
</div>

<?php echo form_close(); ?>

</div>
</div>
