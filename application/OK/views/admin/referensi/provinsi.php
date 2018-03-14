<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
  <th>ID</th>
  <th>KODE</th>
  <th>NAMA</th>
</tr>
</thead>
<tbody>

<?php $no = 1; foreach($provinsi as $provinsi){ ?>

<tr>
  <td><?php echo $no ?></td>
  <td><?php echo $provinsi->id_prov ?></td>
  <td><?php echo $provinsi->nama ?></td>
</tr>

<?php $no++; } ?>

</tbody>
</table>