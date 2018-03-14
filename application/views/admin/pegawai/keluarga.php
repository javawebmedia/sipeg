<table class="table table-striped table-bordered table-hover" id="example1">
<thead>
<tr>
    <th>#</th>
    <th>Foto</th>
    <th>Nama Keluarga</th>
    <th>Status</th>
    <th>L/P</th>
    <th>TTL</th>
    <th>Pendidikan</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($keluarga as $keluarga) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
      <?php if($keluarga->gambar=="") { echo 'Tidak ada'; }else{ ?>
      <img src="<?php echo base_url('assets/upload/image/thumbs/'.$keluarga->gambar) ?>" class="img img-thumbnail" width="60">
      <?php } ?>
    </td>
    <td><?php echo $keluarga->nama_lengkap ?></td>
    <td><?php echo $keluarga->nama_hubkel ?></td>
    <td><?php echo $keluarga->jenis_kelamin ?></td>
    <td><?php echo $keluarga->tempat_lahir ?>, <?php echo date('d-m-Y',strtotime($keluarga->tanggal_lahir)) ?></td>
    <td><?php echo $keluarga->nama_jenjang ?></td>
</tr>

<?php $i++; } ?>

</tbody>
</table>