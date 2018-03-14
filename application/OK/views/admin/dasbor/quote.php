<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 
// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>
<script src="<?php echo base_url() ?>assets/fa-picker/dist/js/fontawesome-iconpicker.js"></script>

<form action="<?php echo base_url('admin/dasbor/quote') ?>" method="post">

<input type="hidden" name="id_konfigurasi" value="<?php echo $site['id_konfigurasi'] ?>">

<div class="col-md-6">
	<div class="form-group">
    	<label>Quote 1</label>
       <textarea name="judul_1" class="form-control" placeholder="Judul quote 1"><?php echo $site['judul_1'] ?></textarea>
        
    </div>
    <div class="form-group">
    	<label>Quote 2</label>
       <textarea name="judul_2" class="form-control" placeholder="Judul quote 2"><?php echo $site['judul_2'] ?></textarea>
        
    </div>
    <div class="form-group">
    	<label>Quote 3</label>
        <textarea name="judul_3" class="form-control" placeholder="Judul quote 3"><?php echo $site['judul_3'] ?></textarea>
        
    </div>
    <div class="form-group">
    	<label>Quote 4</label>
       <textarea name="judul_4" class="form-control" placeholder="Judul quote 4"><?php echo $site['judul_4'] ?></textarea>
        
    </div>
    <div class="form-group">
    	<label>Quote 5</label>
        <textarea name="judul_5" class="form-control" placeholder="Judul quote 5"><?php echo $site['judul_5'] ?></textarea>
        
    </div>
    <div class="form-group">
    	<label>Quote 6</label>
        <textarea name="judul_6" class="form-control" placeholder="Judul quote 6"><?php echo $site['judul_6'] ?></textarea>
        
    </div>
</div>

<div class="col-md-6">
<div class="col-md-12 lead text-center"><i class="fa fa-github fa-3x picker-target"></i></div>
	<div class="form-group">
    	<label>Icon Quote 1 (Current icon: <i class="fa <?php echo $site['pesan_1'] ?> fa-2x"></i> <?php echo $site['pesan_1'] ?>)</label>
       	<input class="form-control icp icp-auto" type="text" name="pesan_1" value="<?php echo $site['pesan_1'] ?>" />
        
    </div>
    
    <div class="form-group">
    	<label>Icon Quote 2 (Current icon: <i class="fa <?php echo $site['pesan_2'] ?> fa-2x"></i> <?php echo $site['pesan_2'] ?>)</label>
       	<input class="form-control icp icp-auto" type="text" name="pesan_2" value="<?php echo $site['pesan_2'] ?>" />
    </div>
    
    <div class="form-group">
    	<label>Icon Quote 3 (Current icon: <i class="fa <?php echo $site['pesan_3'] ?> fa-2x"></i> <?php echo $site['pesan_3'] ?>)</label>
       	<input class="form-control icp icp-auto" type="text" name="pesan_3" value="<?php echo $site['pesan_3'] ?>" />
    </div>
    
    <div class="form-group">
    	<label>Icon Quote 4 (Current icon: <i class="fa <?php echo $site['pesan_4'] ?> fa-2x"></i> <?php echo $site['pesan_4'] ?>)</label>
      	<input class="form-control icp icp-auto" type="text" name="pesan_4" value="<?php echo $site['pesan_4'] ?>" />
    </div>
    
    <div class="form-group">
    	<label>Icon Quote 5 (Current icon: <i class="fa <?php echo $site['pesan_5'] ?> fa-2x"></i> <?php echo $site['pesan_5'] ?>)</label>
      	<input class="form-control icp icp-auto" type="text" name="pesan_5" value="<?php echo $site['pesan_5'] ?>" />
    </div>
    
    <div class="form-group">
    	<label>Icon Quote 6 (Current icon: <i class="fa <?php echo $site['pesan_6'] ?> fa-2x"></i> <?php echo $site['pesan_6'] ?>)</label>
      	<input class="form-control icp icp-auto" type="text" name="pesan_6" value="<?php echo $site['pesan_6'] ?>" />
    </div>
   
</div>

<div class="col-md-12">
	<input type="submit" name="submit" value="Save Configuration" class="btn btn-primary">
    <input type="reset" name="reset" value="Reset" class="btn btn-primary">
</div>

<div class="col-md-12">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
</form>
<script>
    $(function() {      
        $('.icp-auto').on('click', function() {
            $('.icp-auto').iconpicker();
            
        }).trigger('click');


        // Events sample:
        // This event is only triggered when the actual input value is changed
        // by user interaction
        $('.icp').on('iconpickerSelected', function(e) {
            $('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
                    e.iconpickerInstance.options.iconBaseClass + ' ' +
                    e.iconpickerInstance.getValue(e.iconpickerValue);
        });
    });
</script>