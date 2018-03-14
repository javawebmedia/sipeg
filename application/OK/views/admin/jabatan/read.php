<p class="text-right">
	<a href="<?php echo base_url('admin/jabatan/pegawai/'.$pegawai->id_pegawai) ?>" class="btn btn-success">
		<i class="fa fa-backward"></i> Kembali
	</a>

	<a href="<?php echo base_url('admin/jabatan/cetak/'.$jabatan->id_jabatan) ?>" class="btn btn-danger">
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
			<td>Nama Jabatan</td>
			<td>:</td>
			<td><?php echo $jabatan->nama_jabatan ?></td>
		</tr>
		<tr>
			<td>Satker - Bagian</td>
			<td>:</td>
			<td><?php echo $jabatan->nama_satker.' - '.$jabatan->nama_bagian ?></td>
		</tr>
		<tr>
			<td>Golongan - Pangkat</td>
			<td>:</td>
			<td><?php echo $jabatan->golongan.'/'.$jabatan->ruang ?> - <?php echo $jabatan->nama_pangkat ?></td>
		</tr>
		<tr>
			<td>Pendidikan</td>
			<td>:</td>
			<td><?php echo $jabatan->nama_pendidikan ?></td>
		</tr>
		<tr>
			<td>Nomor SK</td>
			<td>:</td>
			<td><?php echo $jabatan->no_sk ?></td>
		</tr>
		<tr>
			<td>Tanggal SK / TMT</td>
			<td>:</td>
			<td><?php echo date('d-m-Y',strtotime($jabatan->tanggal_sk)) ?> / <?php echo date('d-m-Y',strtotime($jabatan->tmt)) ?></td>
		</tr>
		<tr>
			<td>Pejabat Penanda Tangan</td>
			<td>:</td>
			<td><?php echo $jabatan->nama_pjt ?> (NIP: <?php echo $jabatan->nip_pjt ?>)</td>
		</tr>
		<tr>
			<td>File SK</td>
			<td>:</td>
			<td>
				<?php if($jabatan->gambar=="") { ?>

        <span class="btn btn-danger btn-xs">
          <i class="fa fa-times"></i> Tidak ada
        </span>

      <?php }else{ ?>

        <a href="<?php echo base_url('assets/upload/file/'.$jabatan->gambar) ?>" target="_blank" class="btn btn-success btn-xs">
          <i class="fa fa-download"></i> Lihat/Unduh
        </a>
        
      <?php } ?>
			</td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>:</td>
			<td><?php echo $jabatan->keterangan ?></td>
		</tr>
	</tbody>
</table>