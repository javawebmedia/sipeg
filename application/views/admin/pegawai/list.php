<?php if($this->session->userdata('akses_level')=="Pegawai") { }else{ ?>
<p>
	<a href="<?php echo base_url('admin/pegawai/tambah') ?>" title="Tambah Pegawai" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>
<?php } ?>

<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
  <th width="2%">NO</th>
  <th>Foto</th>
  <th>NAMA</th>
  <th>PENDIDIKAN</th>
  <th>JABATAN</th>
  <th>TTL</th>
  <th>L/P</th>
  <th width="30%">ACTION</th>
</tr>
</thead>
<tbody>

<?php $no = 1; foreach($pegawai as $pegawai){ ?>

<tr>
  <td><?php echo $no ?></td>
  <td><img src="<?php if($pegawai->gambar=="") { echo base_url() ?>assets/upload/image/profil.png<?php }else{ echo base_url('assets/upload/image/thumbs/'.$pegawai->gambar); } ?>" width="60" class="img img-thumbnail"></td>
  <td>
    <a href="<?php echo base_url('admin/pegawai/detail/'.$pegawai->id_pegawai) ?>" target="_blank">
      <?php echo $pegawai->nama_lengkap ?>
    </a>
    <br><small>
      NIP: <?php echo $pegawai->nip ?>
      <br>NRK: <?php echo $pegawai->nrk ?>
    </small>
  </td>
  <td><?php echo $pegawai->nama_pendidikan ?></td>
  <td><?php echo $pegawai->nama_jabatan ?></td>
  <td><?php echo $pegawai->tempat_lahir ?>, <?php echo date('d-m-Y',strtotime($pegawai->tanggal_lahir)) ?></td>
  <td><?php echo $pegawai->jenis_kelamin ?></td>
  <td>
    <?php if($this->session->userdata('akses_level')=="Pegawai") {
      include('update.php');
      ?>

      <a href="<?php echo base_url('admin/pegawai/cetak/'.$pegawai->id_pegawai) ?>" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-print"></i> Cetak</a>

    <a href="<?php echo base_url('admin/pegawai/edit/'.$pegawai->id_pegawai) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>


    <?php 
  }else{
    include('update.php');
    include('akses.php'); 
    ?>

    <a href="<?php echo base_url('admin/pegawai/cetak/'.$pegawai->id_pegawai) ?>" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-print"></i> Cetak</a>

    <a href="<?php echo base_url('admin/pegawai/edit/'.$pegawai->id_pegawai) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

    <?php include('delete.php'); } ?>

  </td>
</tr>

<?php $no++; } ?>

</tbody>
</table>