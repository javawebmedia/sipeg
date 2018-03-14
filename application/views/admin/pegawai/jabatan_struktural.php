<table class="table table-striped table-bordered table-hover" id="example1">
<thead>
<tr>
    <th>#</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Satker</th>
    <th>Pangkat</th>
    <th>Pendidikan</th>
    <th>TMT Terakhir</th>
    <th>TMT Seharusnya</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($jabatan as $jabatan) { 
  $maksimal             = date('Y',strtotime($jabatan->tmt))+4;
  $tanggal_struktural   = $maksimal.'-'.date('m-d',strtotime($jabatan->tmt));
  $ts1                  = date_create(date('Y-m-d'));
  $ts2                  = date_create($tanggal_struktural);
  $diff                 = date_diff($ts1,$ts2);
  ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $jabatan->nama_lengkap ?></td>
    <td><?php echo $jabatan->nama_jabatan ?></td>
    <td><?php echo $jabatan->nama_satker ?>
      <br><small><?php echo $jabatan->nama_bagian ?></small>
    </td>
    <td><?php echo $jabatan->nama_pangkat ?>
      <br>Gol: <?php echo $jabatan->golongan ?>/<?php echo $jabatan->ruang ?>
    </td>
    <td><?php echo $jabatan->nama_pendidikan ?></td>
    <td><?php echo date('d-m-Y',strtotime($jabatan->tmt)) ?></td>
    <td><?php echo date('d-m-Y',strtotime($tanggal_struktural)) ?></td>
</tr>

<?php $i++; } ?>

</tbody>
</table>