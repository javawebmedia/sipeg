
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Nama pekerjaan</th>
    <th>Slug</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($pekerjaan as $pekerjaan) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $pekerjaan->nama_pekerjaan ?></td>
    <td><?php echo $pekerjaan->slug_pekerjaan ?></td>
    <td><?php echo $pekerjaan->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/pekerjaan/edit/'.$pekerjaan->id_pekerjaan) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

       <a class="btn btn-success btn-xs" data-toggle="modal" href="#Detail<?php echo $periode->id_periode ?>" id="modellink<?php echo $periode->id_periode ?>"><i class="fa fa-eye"></i></a>

       <script type="text/javascript">
  $(document).ready(function(){
    var url = "<?php echo base_url('admin/periode/detail/'.$periode->id_periode) ?>";
    jQuery('#modellink<?php echo $periode->id_periode ?>').click(function(e) {
        $('.modal-container').load(url,function(result){
        $('#Detail<?php echo $periode->id_periode ?>').modal({show:true});
      });
    });
  });
</script>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>