
<a data-target="#Delete<?php echo $pegawai->id_pegawai ?>" role="button" class="btn btn-danger btn-xs" data-toggle="modal">
  <i class="fa fa-trash-o"></i> Hapus
</a>

<div class="modal fade hide" id="Delete<?php echo $pegawai->id_pegawai ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-remote="<?php echo base_url('admin/pegawai/delete/'.$pegawai->id_pegawai) ?>">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Hapus Data Pegawai</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>