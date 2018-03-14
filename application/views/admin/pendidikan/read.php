<p class="text-right">
	<a href="<?php echo base_url('admin/pendidikan/pegawai/'.$pegawai->id_pegawai) ?>" class="btn btn-success">
		<i class="fa fa-backward"></i> Kembali
	</a>

	<a href="<?php echo base_url('admin/pendidikan/cetak/'.$pendidikan->id_pendidikan) ?>" class="btn btn-danger">
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
			<td>Nama Pendidikan</td>
			<td>:</td>
			<td><?php echo $pendidikan->nama_pendidikan ?></td>
		</tr>
		<tr>
			<td>Jenis pendidikan</td>
			<td>:</td>
			<td><?php echo $pendidikan->nama_jenis_pendidikan ?></td>
		</tr>
		<tr>
			<td>Tanggal Ijazah/Sertifikat</td>
			<td>:</td>
			<td><?php echo $pendidikan->tanggal_ijazah ?></td>
		</tr>
		<tr>
			<td>Nomor Ijazah</td>
			<td>:</td>
			<td><?php echo $pendidikan->nomor_ijazah ?></td>
		</tr>
		<tr>
			<td>Tahun Lulus</td>
			<td>:</td>
			<td><?php echo $pendidikan->tahun ?></td>
		</tr>
		<tr>
			<td>Nama Institusi/Penyelenggaran</td>
			<td>:</td>
			<td><?php echo $pendidikan->nama_institusi ?></td>
		</tr>
		<tr>
			<td>File Ijazah/Sertifikat</td>
			<td>:</td>
			<td>
				<?php if($pendidikan->gambar=="") { ?>

        <span class="btn btn-danger btn-xs">
          <i class="fa fa-times"></i> Tidak ada
        </span>

      <?php }else{ ?>

        <a href="<?php echo base_url('assets/upload/file/'.$pendidikan->gambar) ?>" target="_blank" class="btn btn-success btn-xs">
          <i class="fa fa-download"></i> Lihat/Unduh
        </a>
        
      <?php } ?>
			</td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>:</td>
			<td><?php echo $pendidikan->keterangan ?></td>
		</tr>
	</tbody>
</table>