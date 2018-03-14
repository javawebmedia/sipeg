
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Nama jenjang jenjang</th>
    <th>Slug</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($jenjang as $jenjang) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $jenjang->nama_jenjang ?></td>
    <td><?php echo $jenjang->slug_jenjang ?></td>
    <td><?php echo $jenjang->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/jenjang/edit/'.$jenjang->id_jenjang) ?>" 
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