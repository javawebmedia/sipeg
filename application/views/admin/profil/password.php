<?php 
echo form_open(base_url('admin/profil/password'));
?>


<div class="col-md-6">
	<div class="form-group form-group-lg">
		<label>Password Baru (Minimal 6 dan maksimal 32 karakter)</label>
		<input type="password" name="password" class="form-control" placeholder="Password baru" required>
	</div>

	<div class="form-group form-group-lg">
		<label>Konfirmasi password</label>
		<input type="password" name="konfirmasi_password" class="form-control" placeholder="Konfirmasi password" required>
	</div>

<div class="form-group text-left">
	<button class="btn btn-success btn-lg" type="submit">
		<i class="fa fa-save"></i> Ganti Password
	</button>
	<button class="btn btn-default btn-lg" type="reset">
		<i class="fa fa-times"></i> Reset
	</button>
</div>
</div>

<?php 
echo form_close();
?>

<script>
	$("#kota").chained("#id_prov");
</script>