<p class="alert alert-success text-center">
	Ketik kata kunci pada kolom <strong>Search</strong> untuk mencari data pegawai, lalu klik tombol <strong>Kelola Keluarga</strong>
</p>

<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
  <th>NIP</th>
  <th>NAMA LENGKAP</th>
  <th>TTL</th>
  <th>L/P</th>
  <th width="25%">ACTION</th>
</tr>
</thead>
<tbody>

<?php $no = 1; foreach($pegawai as $pegawai){ ?>

<tr>
  <td><?php echo $pegawai->nip ?></td>
  <td>
    <a href="<?php echo base_url('admin/pegawai/detail/'.$pegawai->id_pegawai) ?>" target="_blank">
      <?php echo $pegawai->nama_lengkap ?>
    </a>
  </td>
  <td><?php echo $pegawai->tempat_lahir ?>, <?php echo date('d-m-Y',strtotime($pegawai->tanggal_lahir)) ?></td>
  <td><?php echo $pegawai->jenis_kelamin ?></td>
  <td>

    <a href="<?php echo base_url('admin/keluarga/pegawai/'.$pegawai->id_pegawai) ?>" class="btn btn-success"><i class="fa fa-plus"></i> Kelola Keluarga</a>

  </td>
</tr>

<?php $no++; } ?>

</tbody>
</table>