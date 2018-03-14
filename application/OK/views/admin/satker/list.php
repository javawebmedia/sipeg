<p>
  <?php include('tambah.php') ?>
</p>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Nama SATKER</th>
    <th>Keterangan</th>
    <th>Urutan</th>
    <th width="20%">Bagian</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php 
$i=1; 
foreach($satker as $satker) { 
$id_satker  = $satker->id_satker;
$bagian     = $this->bagian_model->satker($id_satker);
?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $satker->nama_satker ?></td>
    <td><?php echo $satker->keterangan ?></td>
    <td><?php echo $satker->urutan ?></td>
    <td>
      Bagian-bagian:
      <br><small>
        <ol>
          <?php foreach($bagian as $bagian) { ?>
          <li><?php echo $bagian->nama_bagian ?></li>
          <?php } ?>
        </ol>
      </small>
      <br>
    </td>
    <td>

      <a href="<?php echo base_url('admin/satker/bagian/'.$satker->id_satker) ?>" 
      class="btn btn-success btn-xs"><i class="fa fa-sitemap"></i> Kelola Bagian</a>
      
      <a href="<?php echo base_url('admin/satker/edit/'.$satker->id_satker) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>