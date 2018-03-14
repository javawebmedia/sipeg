<table class="table table-striped table-bordered table-hover" id="example1">
<thead>
<tr>
    <th>#</th>
    <th>File</th>
    <th>Nama</th>
    <th>Type</th>
    <th>Jenis</th>
    <th>Jenjang</th>
    <th>Institusi</th>
    <th>Tahun Lulus</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($pendidikan as $pendidikan) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
      <?php if($pendidikan->gambar=="") { ?>

        <span class="btn btn-danger btn-xs">
          <i class="fa fa-times"></i> Tidak ada
        </span>

      <?php }else{ ?>

       Tersedia
        
      <?php } ?>
    </td>
    <td><?php echo $pendidikan->nama_pendidikan ?></td>
    <td><?php echo $pendidikan->jenis_pendidikan ?></td>
    <td><?php echo $pendidikan->nama_jenis_pendidikan ?></td>
    <td><?php echo $pendidikan->nama_jenjang ?></td>
    <td><?php echo $pendidikan->nama_institusi ?></td>
    <td><?php echo $pendidikan->tahun ?></td>
</tr>

<?php $i++; } ?>

</tbody>
</table>