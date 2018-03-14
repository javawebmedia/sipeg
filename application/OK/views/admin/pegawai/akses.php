<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#Akses<?php echo $pegawai->id_pegawai ?>">
  <i class="fa fa-lock"></i> Akses
</button>



<div class="modal fade" id="Akses<?php echo $pegawai->id_pegawai ?>">
  <?php echo form_open(base_url('admin/pegawai/akses')) ?>

<input type="hidden" name="id_pegawai" value="<?php echo $pegawai->id_pegawai ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Beri Akses untuk Pegawai: <?php echo $pegawai->nama_lengkap ?></h4>
      </div>
      <div class="modal-body">
        <p class="alert alert-warning"><i class="fa fa-warning"></i> Yakin ingin memberi akses ke pegawai ini?</p>

        <!-- PASSWORD -->
        <div class="form-group">
          <label>Password untuk akses ke Sistem</label>
          <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo strtoupper(random_string('alnum',6)); ?>" required>
        </div>
        <!-- END PASSWORD -->

      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-success">
          <i class="fa fa-check"></i> Ya, Berikan Akses
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
