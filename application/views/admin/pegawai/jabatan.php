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

<?php $i=1; foreach($jabatan as $jabatan) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
      <?php if($jabatan->gambar=="") { ?>

        <span class="btn btn-danger btn-xs">
          <i class="fa fa-times"></i> Tidak ada
        </span>

      <?php }else{ ?>

        Tersedia
        
      <?php } ?>
    </td>
    <td><?php echo $jabatan->nama_lengkap ?></td>
    <td><?php echo $jabatan->nama_jabatan ?></td>
    <td><?php echo $jabatan->nama_satker ?>
      <br><small><?php echo $jabatan->nama_bagian ?></small>
    </td>
    <td><?php echo $jabatan->nama_pangkat ?>
      <br>Gol: <?php echo $jabatan->golongan ?>/<?php echo $jabatan->ruang ?>
    </td>
    <td><?php echo $jabatan->nama_pendidikan ?></td>
    <td><?php echo $jabatan->tmt ?></td>
</tr>

<?php $i++; } ?>

</tbody>
</table>