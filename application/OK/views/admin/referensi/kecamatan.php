<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
  <th>ID</th>
  <th>KODE</th>
  <th>NAMA</th>
  <th>KABUPATEN</th>
  <th>PROVINSI</th>
</tr>
</thead>
<tbody>

<?php $no = 1; foreach($kecamatan as $kecamatan){ ?>

<tr>
  <td><?php echo $no ?></td>
  <td><?php echo $kecamatan->id_kec ?></td>
  <td><?php echo $kecamatan->nama ?></td>
  <td><?php echo $kecamatan->nama_kabupaten ?></td>
  <td><?php echo $kecamatan->nama_provinsi ?></td>
</tr>

<?php $no++; } ?>

</tbody>
</table>