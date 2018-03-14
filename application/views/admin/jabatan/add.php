<script>
  $('#Tambah').on('show', function () {
    $.fn.modal.Constructor.prototype.enforceFocus = function () { };
});

</script>
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah Riwayat Jabatan
</button>

<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">

<?php 
echo form_open_multipart(base_url('admin/jabatan/pegawai/'.$pegawai->id_pegawai)); 
?>

<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Tambah data?</h4>
</div>
<div class="modal-body">


<div class="col-md-8">

	<div class="form-group form-group-lg">
		<label>Nama Jabatan</label>
		<input type="text" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan" value="<?php echo set_value('nama_jabatan') ?>" required>
	</div>
</div>

<div class="col-md-4">

<div class="form-group form-group-lg">
<label>Status Jabatan</label>
<select name="status_jabatan" class="form-control">
  <option value="Aktif">Aktif</option>
  <option value="Non Aktif">Non Aktif</option>
</select>
</div>

</div>

<div class="col-md-4">
	<div class="form-group">
		<label>TMT Jabatan</label>
		<input type="text" name="tmt" class="form-control datepicker" placeholder="YYYY-MM-DD" value="<?php echo set_value('tmt') ?>">
	</div>

	<div class="form-group">
		<label>Unit/Satuan Kerja</label>
		<select name="id_satker" class="form-control" id="id_satker">

			<option value="">Pilih Satker/Unit Kerja</option>

			<?php foreach($satker as $satker) { ?>
			<option value="<?php echo $satker->id_satker ?>">
				<?php echo $satker->nama_satker ?>
			</option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Bagian</label>
		<select name="id_bagian" class="form-control" id="id_bagian">

			<option value="">Pilih Bagian</option>
			<?php foreach($bagian as $bagian) { ?>
			<option value="<?php echo $bagian->id_bagian ?>" class="<?php echo $bagian->id_satker ?>">
				<?php echo $bagian->nama_bagian ?>
			</option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Pangkat</label>
		<select name="id_pangkat" class="form-control" id="id_pangkat">

			<option value="">Pilih Pangkat</option>
			<?php foreach($pangkat as $pangkat) { ?>
			<option value="<?php echo $pangkat->id_pangkat ?>">
				<?php echo $pangkat->golongan ?>/<?php echo $pangkat->ruang ?> - <?php echo $pangkat->nama_pangkat ?>
			</option>
			<?php } ?>
		</select>
	</div>
	

	<div class="form-group">
		<label>Pendidikan</label>
		<select name="id_pendidikan" class="form-control" id="id_pendidikan">

			<option value="">Pilih Jenjang Pendidikan</option>
			<?php foreach($pendidikan as $pendidikan) { ?>
			<option value="<?php echo $pendidikan->id_pendidikan ?>">
				<?php echo $pendidikan->nama_pendidikan ?>
			</option>
			<?php } ?>
		</select>
	</div>

</div>

<div class="col-md-8">




	
	<div class="row">

		<div class="col-md-6">

			<div class="form-group">
				<label>Tanggal SK</label>
				<input type="text" name="tanggal_sk" class="form-control datepicker" placeholder="YYYY-MM-DD" value="<?php echo set_value('tanggal_sk') ?>">
			</div>

			<div class="form-group">
				<label>Nomor SK</label>
				<input type="text" name="no_sk" class="form-control" placeholder="Nomor SK" value="<?php echo set_value('no_sk') ?>">
			</div>

			
		</div>

		<div class="col-md-6">

			<div class="form-group">
				<label>Nama Pejabat Penanda Tangan</label>
				<input type="text" name="nama_pjt" class="form-control" placeholder="Nama Pejabat Penanda Tangan" value="<?php echo set_value('nama_pjt') ?>" required>
			</div>

			<div class="form-group">
				<label>NIP Pejabat Penanda Tangan</label>
				<input type="text" name="nip_pjt" class="form-control" placeholder="NIP Pejabat Penanda Tangan" value="<?php echo set_value('nip_pjt') ?>">
			</div>

		</div>

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


<script>
	$("#id_bagian").chained("#id_satker");
</script>