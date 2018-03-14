<p class="text-right">
	<a href="<?php echo base_url('admin/jabatan_fungsional/pegawai/'.$pegawai->id_pegawai) ?>" class="btn btn-success">
		<i class="fa fa-backward"></i> Kembali
	</a>

	<a href="<?php echo base_url('admin/jabatan_fungsional/cetak/'.$jabatan_fungsional->id_jabatan_fungsional) ?>" class="btn btn-danger">
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
			<td>Nama Jabatan fungsional</td>
			<td>:</td>
			<td><?php echo $jabatan_fungsional->nama_jabatan_fungsional ?></td>
		</tr>
		<tr>
			<td>Satker - Bagian</td>
			<td>:</td>
			<td><?php echo $jabatan_fungsional->nama_satker.' - '.$jabatan_fungsional->nama_bagian ?></td>
		</tr>
		<tr>
			<td>Golongan - Pangkat</td>
			<td>:</td>
			<td><?php echo $jabatan_fungsional->golongan.'/'.$jabatan_fungsional->ruang ?> - <?php echo $jabatan_fungsional->nama_pangkat ?></td>
		</tr>
		<tr>
			<td>Pendidikan</td>
			<td>:</td>
			<td><?php echo $jabatan_fungsional->nama_pendidikan ?></td>
		</tr>
		<tr>
			<td>Nomor SK</td>
			<td>:</td>
			<td><?php echo $jabatan_fungsional->no_sk ?></td>
		</tr>
		<tr>
			<td>Tanggal SK / TMT</td>
			<td>:</td>
			<td><?php echo date('d-m-Y',strtotime($jabatan_fungsional->tanggal_sk)) ?> / <?php echo date('d-m-Y',strtotime($jabatan_fungsional->tmt)) ?></td>
		</tr>
		<tr>
			<td>Pejabat Penanda Tangan</td>
			<td>:</td>
			<td><?php echo $jabatan_fungsional->nama_pjt ?> (NIP: <?php echo $jabatan_fungsional->nip_pjt ?>)</td>
		</tr>
		<tr>
			<td>File SK</td>
			<td>:</td>
			<td>
				<?php if($jabatan_fungsional->gambar=="") { ?>

        <span class="btn btn-danger btn-xs">
          <i class="fa fa-times"></i> Tidak ada
        </span>

      <?php }else{ ?>

        <a href="<?php echo base_url('assets/upload/file/'.$jabatan_fungsional->gambar) ?>" target="_blank" class="btn btn-success btn-xs">
          <i class="fa fa-download"></i> Lihat/Unduh
        </a>
        
      <?php } ?>
			</td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>:</td>
			<td><?php echo $jabatan_fungsional->keterangan ?></td>
		</tr>
	</tbody>
</table>