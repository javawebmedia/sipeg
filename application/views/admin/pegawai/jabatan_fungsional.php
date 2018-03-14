<table class="table table-striped table-bordered table-hover" id="example1">
<thead>
<tr>
    <th>#</th>
    <th>File</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Satker</th>
    <th>Pangkat</th>
    <th>Pendidikan</th>
    <th>TMT</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($jabatan_fungsional as $jabatan_fungsional) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
      <?php if($jabatan_fungsional->gambar=="") { ?>

        <span class="btn btn-danger btn-xs">
          <i class="fa fa-times"></i> Tidak ada
        </span>

      <?php }else{ ?>

        Tersedia
        
      <?php } ?>
    </td>
    <td><?php echo $jabatan_fungsional->nama_lengkap ?></td>
    <td><?php echo $jabatan_fungsional->nama_jabatan_fungsional ?></td>
    <td><?php echo $jabatan_fungsional->nama_satker ?>
      <br><small><?php echo $jabatan_fungsional->nama_bagian ?></small>
    </td>
    <td><?php echo $jabatan_fungsional->nama_pangkat ?>
      <br>Gol: <?php echo $jabatan_fungsional->golongan ?>/<?php echo $jabatan_fungsional->ruang ?>
    </td>
    <td><?php echo $jabatan_fungsional->nama_pendidikan ?></td>
    <td><?php echo $jabatan_fungsional->tmt ?></td>
</tr>

<?php $i++; } ?>

</tbody>
</table>