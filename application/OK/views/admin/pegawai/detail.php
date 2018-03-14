<p class="text-right">
	<a href="<?php echo base_url('admin/pegawai/cetak/'.$pegawai->id_pegawai) ?>" class="btn btn-danger" target="_blank">
		<i class="fa fa-print"></i> Cetak Data
	</a>
</p>

<h4 class="alert alert-info">DETAIL PEGAWAI</h4>

<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th width="25%">NRK - Nama Pegawai</th>
			<th width="1%">:</th>
			<th><?php echo $pegawai->nrk ?> - <?php echo $pegawai->nama_lengkap ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Tempat, tanggal lahir</td>
			<td>:</td>
			<td><?php echo $pegawai->tempat_lahir ?>, <?php echo date('d-m-Y',strtotime($pegawai->tanggal_lahir)) ?></td>
		</tr>
		<tr>
			<td>Status Pegawai</td>
			<td>:</td>
			<td><?php echo $pegawai->nama_jenis_pegawai ?></td>
		</tr>
		<tr>
			<td>Nama Jabatan</td>
			<td>:</td>
			<td><?php echo $pegawai->nama_jabatan ?></td>
		</tr>
		<tr>
			<td>Satker - Bagian</td>
			<td>:</td>
			<td><?php echo $pegawai->nama_satker.' - '.$pegawai->nama_bagian ?></td>
		</tr>
		<tr>
			<td>Golongan - Pangkat</td>
			<td>:</td>
			<td><?php echo $pegawai->golongan.'/'.$pegawai->ruang ?> - <?php echo $pegawai->nama_pangkat ?></td>
		</tr>
		<tr>
			<td>Pendidikan</td>
			<td>:</td>
			<td><?php echo $pegawai->nama_pendidikan ?></td>
		</tr>
	</tbody>
</table>

<h4 class="alert alert-info">RIWAYAT JABATAN STRUKTURAL</h4>

<?php include('jabatan.php') ?>

<h4 class="alert alert-info">RIWAYAT PENDIDIKAN FORMAL DAN INFORMAL</h4>

<?php include('pendidikan.php') ?>

<h4 class="alert alert-info">ANGGOTA KELUARGA</h4>

<?php include('keluarga.php') ?>