<p>
  <?php include('tambah.php') ?>
</p>


<table class="table table-striped table-bordered table-hover" id="example1">
<thead>
<tr>
    <th width="5%">#</th>
    <th>Nama pangkat</th>
    <th>Golongan</th>
    <th>Ruang</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($pangkat as $pangkat) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $pangkat->nama_pangkat ?></td>
    <td><?php echo $pangkat->golongan ?></td>
    <td><?php echo $pangkat->ruang ?></td>
    <td><?php echo $pangkat->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/pangkat/edit/'.$pangkat->id_pangkat) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>