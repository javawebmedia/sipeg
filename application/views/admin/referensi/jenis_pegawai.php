<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
  <th>ID</th>
  <th>NAMA</th>
</tr>
</thead>
<tbody>

<?php $no = 1; foreach($jenis_pegawai as $jenis_pegawai){ ?>

<tr>
  <td><?php echo $no ?></td>
  <td><?php echo $jenis_pegawai->nama_jenis_pegawai ?></td>
</tr>

<?php $no++; } ?>

</tbody>
</table>