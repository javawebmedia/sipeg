<p class="text-right">
	<a href="<?php echo base_url('admin/keluarga/pegawai/'.$pegawai->id_pegawai) ?>" class="btn btn-success">
		<i class="fa fa-backward"></i> Kembali
	</a>

	<a href="<?php echo base_url('admin/keluarga/cetak/'.$keluarga->id_keluarga) ?>" class="btn btn-danger">
		<i class="fa fa-print"></i> Cetak Data
	</a>
</p>

<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th width="25%">NRK - Nama Pegawai</th>
			<th width="1%">:</th>
			<th><?php echo $pegawai->nrk ?> - <?php echo $pegawai->nama_lengkap ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Nama anggota Keluarga</td>
			<td>:</td>
			<td><?php echo $keluarga->nama_lengkap ?></td>
		</tr>
		<tr>
			<td>Hubungan keluarga</td>
			<td>:</td>
			<td><?php echo $keluarga->nama_hubkel ?></td>
		</tr>
		<tr>
			<td>Tempat lahir</td>
			<td>:</td>
			<td><?php echo $keluarga->tempat_lahir ?></td>
		</tr>
		<tr>
			<td>Tanggal lahir</td>
			<td>:</td>
			<td><?php echo $keluarga->tanggal_lahir ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><?php echo $keluarga->jenis_kelamin ?></td>
		</tr>
		<tr>
			<td>Agama</td>
			<td>:</td>
			<td><?php echo $keluarga->nama_agama ?></td>
		</tr>
		<tr>
			<td>Pendidikan</td>
			<td>:</td>
			<td><?php echo $keluarga->nama_jenjang ?></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>:</td>
			<td><?php echo $keluarga->keterangan ?></td>
		</tr>
	</tbody>
</table>