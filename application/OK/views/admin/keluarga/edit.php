<script>
  $('#Tambah').on('show', function () {
    $.fn.modal.Constructor.prototype.enforceFocus = function () { };
});

</script>


<?php 
echo form_open_multipart(base_url('admin/keluarga/edit/'.$keluarga->id_keluarga)); 
?>


<div class="col-md-6">

	<div class="form-group">
		<label>Nama lengkap</label>
		<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap" value="<?php echo $keluarga->nama_lengkap ?>" required>
	</div>

	<div class="form-group">
		<label>Hubungan Keluarga</label>
		<select name="id_hubkel" class="form-control">

			<?php foreach($hubkel as $hubkel) { ?>
			<option value="<?php echo $hubkel->id_hubkel ?>" 
			<?php if($hubkel->id_hubkel==$keluarga->id_hubkel) { echo "selected"; } ?>
				>
				<?php echo $hubkel->nama_hubkel ?>
			</option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Jenis Kelamin</label>
		<select name="jenis_kelamin" class="form-control">
			<option value="P">Perempuan</option>
			<option value="L" <?php if($keluarga->jenis_kelamin=="L") { echo "selected"; } ?>>Laki-laki</option>
		</select>
	</div>

	<div class="form-group">
		<label>Tempat lahir</label>
		<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir" value="<?php echo $keluarga->tempat_lahir ?>">
	</div>

	<div class="form-group">
		<label>Tanggal lahir</label>
		<input type="text" name="tanggal_lahir" class="form-control datepicker" placeholder="Tanggal lahir" value="<?php echo $keluarga->tanggal_lahir ?>">
	</div>

</div>

<div class="col-md-6">

	<div class="form-group">
		<label>Pendidikan</label>
		<select name="id_jenjang" class="form-control">

			<option value="">Pendidikan</option>
			<?php foreach($jenjang as $jenjang) { ?>
			<option value="<?php echo $jenjang->id_jenjang ?>" 
			<?php if($jenjang->id_jenjang==$keluarga->id_jenjang) { echo "selected"; } ?>
				>
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
			<option value="<?php echo $agama->id_agama ?>" 
			<?php if($agama->id_agama==$keluarga->id_agama) { echo "selected"; } ?>
				>
				<?php echo $agama->nama_agama ?>
			</option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="keterangan" placeholder="Keterangan" class="form-control"><?php echo $keluarga->keterangan ?></textarea>
	</div>

	<div class="form-group">
		<label>Upload Foto/File</label>
		<input type="file" name="gambar" class="form-control" placeholder="Gambar/Foto">
	</div>


<div class="form-group">
    <button type="submit" class="btn btn-success btn-lg">
    	<i class="fa fa-save"></i> Simpan Data
    </button>
    
    <button type="reset" class="btn btn-warning btn-lg">
    	<i class="fa fa-backward"></i> Reset
    </button>

    

</div>
</div>

<?php echo form_close(); ?>


