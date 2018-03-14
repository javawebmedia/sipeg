<p>
  <?php include('tambah.php') ?>
</p>


<table class="table table-striped table-bordered table-hover" id="example1">
<thead>
<tr>
    <th width="5%">#</th>
    <th>Nama</th>
    <th>Urutan</th>
    <th>Aktif</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($hubkel as $hubkel) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $hubkel->nama_hubkel ?></td>
    <td><?php echo $hubkel->urutan ?></td>
    <td><?php if($hubkel->aktif==1) { echo 'Aktif'; }else{ echo 'Non Aktif'; } ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/hubkel/edit/'.$hubkel->id_hubkel) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>