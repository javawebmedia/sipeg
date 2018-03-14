<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $pegawai->id_pegawai ?>">
  <i class="fa fa-trash-o"></i> Hapus
</button>



<div class="modal fade" id="Delete<?php echo $pegawai->id_pegawai ?>">
  <?php echo form_open(base_url('admin/pegawai/delete')) ?>
<input type="hidden" name="id_pegawai" value="<?php echo $pegawai->id_pegawai ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Pegawai: <?php echo $pegawai->nama_lengkap ?></h4>
      </div>
      <div class="modal-body">
        <p class="alert alert-warning"><i class="fa fa-warning"></i> Yakin ingin menghapus data pegawai ini?</p>
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-danger">
          <i class="fa fa-trash-o"></i> Ya, Hapus data ini
        </button>
        <button type="button" class="btn btn-success" data-dismiss="modal">
          <i class="fa fa-times"></i> Cancel
        </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  <?php echo form_close(); ?>
</div>
<!-- /.modal -->
