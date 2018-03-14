<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
  <th>ID</th>
  <th>NAMA AGAMA</th>
</tr>
</thead>
<tbody>

<?php $no = 1; foreach($agama as $agama){ ?>

<tr>
  <td><?php echo $no ?></td>
  <td><?php echo $agama->nama_agama ?></td>
</tr>

<?php $no++; } ?>

</tbody>
</table>