<?php 
echo form_open(base_url('admin/pegawai/tambah'));
?>
<div class="col-md-12">
<div class="form-group text-right">
	<button class="btn btn-success btn-lg" type="submit">
		<i class="fa fa-save"></i> Simpan Data
	</button>
	<button class="btn btn-default btn-lg" type="reset">
		<i class="fa fa-times"></i> Reset
	</button>
</div>
</div>

<div class="col-md-12">
	<div class="form-group form-group-lg has-success">
		<label>Level Hak Akses</label>
		<select name="akses_level" class="form-control">
			<option value="Admin">Admin</option>
			<option value="Kepala Puskesmas">Kepala Puskesmas</option>
			<option value="Kepala TU">Kepala TU</option>
			<option value="Pegawai">Pegawai</option>
		</select>
	</div>
</div>	

<div class="col-md-6">
	<div class="form-group form-group-lg has-error">
		<label>Nama lengkap</label>
		<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap" value="<?php echo set_value('nama_lengkap') ?>" required>
	</div>
</div>

<div class="col-md-3">
	<div class="form-group form-group-lg has-error">
		<label>NRK</label>
		<input type="number" name="nrk" class="form-control" placeholder="NRK" value="<?php echo set_value('nrk') ?>" required>
	</div>
</div>	

<div class="col-md-3">
	<div class="form-group form-group-lg has-error">
		<label>NIP</label>
		<input type="number" name="nip" class="form-control" placeholder="NIP" value="<?php echo set_value('nip') ?>" required>
	</div>
</div>

<div class="col-md-3">
	<div class="form-group">
		<label>Jenis Pegawai</label>
		<select name="id_jenis_pegawai" class="form-control">

			<?php foreach($jenis as $jenis) { ?>
			<option value="<?php echo $jenis->id_jenis_pegawai ?>">
				<?php echo $jenis->nama_jenis_pegawai ?>
			</option>
			<?php } ?>

		</select>
	</div>
</div>

<div class="col-md-3">
	<div class="form-group">
		<label>Jenis Kelamin</label>
		<select name="jenis_kelamin" class="form-control">
			<option value="P">Perempuan</option>}
			<option value="L">Laki-laki</option>}
		</select>
	</div>
</div>		

<div class="col-md-3">
	<div class="form-group">
		<label>Gelar depan (mis: dr, Dr)</label>
		<input type="text" name="gelar_depan" class="form-control" placeholder="Gelar depan (mis: dr, Dr)" value="<?php echo set_value('gelar_depan') ?>">
	</div>
</div>

<div class="col-md-3">
	<div class="form-group">
		<label>Gelar belakang (mis: Sp.OG, S.Pd)</label>
		<input type="text" name="gelar_belakang" class="form-control" placeholder="Gelar belakang (mis: Sp.OG, S.Pd)" value="<?php echo set_value('gelar_belakang') ?>">
	</div>
</div>	

<div class="col-md-3">
	<div class="form-group">
		<label>TMT CPNS (jika PNS)</label>
		<input type="text" name="tmt_cpns" class="form-control datepicker" placeholder="YYYY-MM-DD" value="<?php echo set_value('tmt_cpns') ?>" data-date-format="yyyy-mm-dd">
	</div>
	
	<div class="form-group">
		<label>TMT PNS / TMT Jadi Pegawai</label>
		<input type="text" name="tmt_pns" class="form-control datepicker" placeholder="YYYY-MM-DD" value="<?php echo set_value('tmt_pns') ?>" data-date-format="yyyy-mm-dd">
	</div>
	
</div>

<div class="col-md-3">
	<div class="form-group">
		<label>Tempat lahir</label>
		<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir" value="<?php echo set_value('tempat_lahir') ?>">
	</div>
	<div class="form-group">
		<label>Tanggal lahir</label>
		<input type="text" name="tanggal_lahir" class="form-control datepicker" placeholder="YYYY-MM-DD" value="<?php echo set_value('tanggal_lahir') ?>" data-date-format="yyyy-mm-dd">
	</div>
</div>

<div class="col-md-3">
	<div class="form-group">
		<label>Agama</label>
		<select name="agama" class="form-control">

			<?php foreach($agama as $agama) { ?>
			<option value="<?php echo $agama->id_agama ?>">
				<?php echo $agama->nama_agama ?>
			</option>
			<?php } ?>

		</select>
	</div>
</div>

<div class="col-md-3">
	<div class="form-group">
		<label>Status Perkawinan</label>
		<select name="status_kawin" class="form-control">
			<option value="Menikah">Menikah</option>
			<option value="Belum Menikah">Belum Menikah</option>
			<option value="Janda Cerai">Janda Cerai</option>
			<option value="Janda Mati">Janda Mati</option>
			<option value="Duda Cerai">Duda Cerai</option>
			<option value="Duda Mati">Duda Mati</option>
		</select>
	</div>
</div>	

<div class="col-md-3">
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>">
	</div>
</div>	

<div class="col-md-3">
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>">
	</div>
</div>

<div class="col-md-3">
	<div class="form-group">
		<label>NIK</label>
		<input type="number" name="nik" class="form-control" placeholder="NIK" value="<?php echo set_value('nik') ?>">
	</div>
</div>

<div class="col-md-3">
	<div class="form-group">
		<label>NPWP</label>
		<input type="number" name="npwp" class="form-control" placeholder="NPWP" value="<?php echo set_value('npwp') ?>">
	</div>
</div>	

<div class="col-md-5">
	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo set_value('alamat') ?></textarea>
	</div>
</div>

<div class="col-md-7">
<div class="row">
	<div class="col-md-6">
	<div class="form-group">
		<label>Provinsi</label>
		<select name="provinsi" class="form-control select2" id="id_prov">

			<option value="">Pilih Provinsi</option>

			<?php foreach($provinsi as $provinsi) { ?>
			<option value="<?php echo $provinsi->id_prov ?>">
				<?php echo $provinsi->nama ?>
			</option>
			<?php } ?>

		</select>
	</div>


	<div class="form-group">
		<label>Kecamatan</label>
		<input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" value="<?php echo set_value('kecamatan') ?>">
	</div>

	</div>
	<div class="col-md-6">
	<div class="form-group">
		<label>Kabupaten/Kota</label>
		<select name="kota" class="form-control select2" id="kota">

			<option value="">Pilih kota/kabupaten</option>

			<?php foreach($kota as $kota) { ?>
			<option value="<?php echo $kota->id_kab ?>" class="<?php echo $kota->id_prov ?>">
				<?php echo $kota->nama ?>
			</option>
			<?php } ?>

		</select>
	</div>

	<div class="form-group">
		<label>Kelurahan</label>
		<input type="text" name="kelurahan" class="form-control" placeholder="Kelurahan" value="<?php echo set_value('kelurahan') ?>">
	</div>
</div>
</div>	
</div>	

<div class="clearfix"></div>	

<div class="col-md-4">
	<div class="form-group">
		<label>Nomor BPJS</label>
		<input type="text" name="nomor_bpjs" class="form-control" placeholder="Nomor BPJS" value="<?php echo set_value('nomor_bpjs') ?>">
	</div>
</div>	

<div class="col-md-4">
	<div class="form-group">
		<label>Nomor rekening Bank</label>
		<input type="text" name="nomor_rekening" class="form-control" placeholder="Nomor rekening Bank" value="<?php echo set_value('nomor_rekening') ?>">
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Nama Bank</label>
		<input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" value="<?php echo set_value('nama_bank') ?>">
	</div>
</div>

<div class="col-md-12">
<div class="form-group text-center">
	<button class="btn btn-success btn-lg" type="submit">
		<i class="fa fa-save"></i> Simpan Data
	</button>
	<button class="btn btn-default btn-lg" type="reset">
		<i class="fa fa-times"></i> Reset
	</button>
</div>
</div>

<?php 
echo form_close();
?>

<script>
	$("#kota").chained("#id_prov");
</script>