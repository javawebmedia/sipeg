<script>
  $('#Tambah').on('show', function () {
    $.fn.modal.Constructor.prototype.enforceFocus = function () { };
});

</script>
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah Anggota Keluarga Baru
</button>

<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">

<?php 
echo form_open_multipart(base_url('admin/keluarga/pegawai/'.$pegawai->id_pegawai)); 
?>

<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Tambah data?</h4>
</div>
<div class="modal-body">


<div class="col-md-6">

	<div class="form-group">
		<label>Nama lengkap</label>
		<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap" value="<?php echo set_value('nama_lengkap') ?>" required>
	</div>

	<div class="form-group">
		<label>Hubungan Keluarga</label>
		<select name="id_hubkel" class="form-control">

			<?php foreach($hubkel as $hubkel) { ?>
			<option value="<?php echo $hubkel->id_hubkel ?>">
				<?php echo $hubkel->nama_hubkel ?>
			</option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Jenis Kelamin</label>
		<select name="jenis_kelamin" class="form-control">
			<option value="P">Perempuan</option>
			<option value="L">Laki-laki</option>
		</select>
	</div>

	<div class="form-group">
		<label>Tempat lahir</label>
		<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir" value="<?php echo set_value('tempat_lahir') ?>">
	</div>

	<div class="form-group">
		<label>Tanggal lahir</label>
		<input type="text" name="tanggal_lahir" class="form-control datepicker" placeholder="Tanggal lahir" value="<?php echo set_value('tanggal_lahir') ?>">
	</div>

</div>

<div class="col-md-6">

	<div class="form-group">
		<label>Pendidikan</label>
		<select name="id_jenjang" class="form-control">

			<option value="">Pendidikan</option>
			<?php foreach($jenjang as $jenjang) { ?>
			<option value="<?php echo $jenjang->id_jenjang ?>">
				<?php echo $jenjang->nama_jenjang ?>
			</option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Agama</label>
		<select name="id_agama" class="form-control">

			<option value="">Agama</option>
			<?php foreach($agama as $agama) { ?>
			<option value="<?php echo $agama->id_agama ?>">
				<?php echo $agama->nama_agama ?>
			</option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="keterangan" placeholder="Keterangan" class="form-control"><?php echo set_value('keterangan') ?></textarea>
	</div>

	<div class="form-group">
		<label>Upload Foto/File</label>
		<input type="file" name="gambar" class="form-control" placeholder="Gambar/Foto">
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
