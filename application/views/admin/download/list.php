<p><a href="<?php echo base_url('admin/download/tambah') ?>" class="btn btn-primary">
<i class="fa fa-plus"></i> Tambah</a></p>


<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Download File</th>
    <th>Judul</th>
    <th>Kategori - Posisi</th>
    <th>Website</th>
    <th>Author</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($download as $download) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
      <a href="<?php echo base_url('admin/download/unduh/'.$download->id_download) ?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-download"></i> Download</a>
    </td>
    <td><?php echo $download->judul_download ?>
      
      <br><small>
      Link:<br> 
      <textarea name="aa"><?php echo base_url('assets/upload/image/'.$download->gambar) ?></textarea>
      </small>

    </td>
    <td><?php echo $download->nama_kategori_download ?> - <?php echo $download->jenis_download ?></td>
    <td><?php echo $download->website ?></td>
    <td><?php echo $download->nama ?></td>
    <td>
      <a href="<?php echo base_url('download/read/'.$download->id_download) ?>" 
      class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

      <a href="<?php echo base_url('admin/download/edit/'.$download->id_download) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>