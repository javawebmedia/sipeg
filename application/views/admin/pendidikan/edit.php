<script>
  $('#Tambah').on('show', function () {
    $.fn.modal.Constructor.prototype.enforceFocus = function () { };
});

</script>


<?php 
echo form_open_multipart(base_url('admin/pendidikan/edit/'.$pendidikan->id_pendidikan)); 
?>


<div class="col-md-6">

	<div class="form-group">
		<label>Nama Pendidikan/Pelatihan</label>
		<input type="text" name="nama_pendidikan" class="form-control" placeholder="Nama Pendidikan/Pelatihan" value="<?php echo $pendidikan->nama_pendidikan ?>" required>
	</div>

	<div class="form-group">
		<label>Nama Institusi Pendidikan/Penyelenggara</label>
		<input type="text" name="nama_institusi" class="form-control" placeholder="Nama Institusi Pendidikan/Penyelenggara" value="<?php echo $pendidikan->nama_institusi ?>">
	</div>

	<div class="form-group">
		<label>Type Pendidikan</label>
		<select name="jenis_pendidikan" class="form-control">
			<option value="Formal">Pendidikan Formal</option>
			<option value="Informal" <?php if($pendidikan->jenis_pendidikan=="Informal") { echo "selected"; } ?>>Pendidikan Informal</option>
		</select>
	</div>

	<div class="form-group">
		<label>Jenis Pendidikan</label>
		<select name="id_jenis_pendidikan" class="form-control">

			<?php foreach($jenis_pendidikan as $jenis_pendidikan) { ?>
			<option value="<?php echo $jenis_pendidikan->id_jenis_pendidikan ?>" 
			<?php if($jenis_pendidikan->id_jenis_pendidikan==$pendidikan->id_jenis_pendidikan) { echo "selected"; } ?>
				>
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
			<option value="<?php echo $jenjang->id_jenjang ?>" 
			<?php if($jenjang->id_jenjang==$pendidikan->id_jenjang) { echo "selected"; } ?>
				>
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
				<input type="number" name="tahun" class="form-control" placeholder="Tahun Lulus" value="<?php echo $pendidikan->tahun ?>" required>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label>Tanggal Ijazah/Sertifikat</label>
				<input type="text" name="tanggal_ijazah" class="form-control datepicker" placeholder="Tanggal Ijazah/Sertifikat" value="<?php echo $pendidikan->tanggal_ijazah ?>">
			</div>

		</div>

	</div>

	

	<div class="form-group">
		<label>Nomor Ijazah/Sertifikat</label>
		<input type="text" name="nomor_ijazah" class="form-control" placeholder="Nomor Ijazah/Sertifikat" value="<?php echo $pendidikan->nomor_ijazah ?>">
	</div>


	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="keterangan" placeholder="Keterangan" class="form-control"><?php echo $pendidikan->keterangan ?></textarea>
	</div>

	<div class="form-group">
		<label>Upload File Ijazah/Sertifikat</label>
		<input type="file" name="gambar" class="form-control" placeholder="Upload File Ijazah/Sertifikat">
		<small class="text-danger">Extensi: doc, docx, pdf, zip, jpg, png, gif, jpeg</small>
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


