<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
  <th>ID</th>
  <th>KODE</th>
  <th>NAMA</th>
  <th>PROVINSI</th>
</tr>
</thead>
<tbody>

<?php $no = 1; foreach($kabupaten as $kabupaten){ ?>

<tr>
  <td><?php echo $no ?></td>
  <td><?php echo $kabupaten->id_kab ?></td>
  <td><?php echo $kabupaten->nama ?></td>
  <td><?php echo $kabupaten->nama_provinsi ?></td>
</tr>

<?php $no++; } ?>

</tbody>
</table>