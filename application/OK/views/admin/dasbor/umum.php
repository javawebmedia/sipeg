<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
	file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: '<?php echo base_url() ?>assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    },
    selector: "#isi",
	height: 100,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
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

<?php echo form_open(base_url('admin/dasbor/konfigurasi')) ?>

<input type="hidden" name="id_konfigurasi" value="<?php echo $site['id_konfigurasi'] ?>">

<div class="col-md-12">
 <div class="form-group">
    <label>Summary of the company</label>
    <textarea name="tentang" rows="3" class="form-control" placeholder="Summary of the company" id="isi"><?php echo $site['tentang'] ?></textarea>
    </div>
</div>

<div class="col-md-6">
	<h3>Basic information:</h3><hr>
    <div class="form-group">
    <label>Company name</label>
    <input type="text" name="namaweb" placeholder="Nama organisasi/perusahaan" value="<?php echo $site['namaweb'] ?>" required class="form-control">
    </div>
    
    <div class="form-group">
    <label>Company tagline/motto</label>
    <input type="text" name="tagline" placeholder="Company tagline/motto" value="<?php echo $site['tagline'] ?>" class="form-control">
    </div>
    
    

    
    <div class="form-group">
    <label>Website address</label>
    <input type="url" name="website" placeholder="<?php echo base_url() ?>" value="<?php echo $site['website'] ?>" class="form-control">
    </div>
    
    <div class="form-group">
    <label>Official email</label>
    <input type="email" name="email" placeholder="youremail@address.com" value="<?php echo $site['email'] ?>" class="form-control" required>
    </div>
    
     <div class="form-group">
    <label>Address</label>
    <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat perusahaan/organisasi"><?php echo $site['alamat'] ?></textarea>
    </div>
    
     <div class="form-group">
    <label>Phone number</label>
    <input type="text" name="telepon" placeholder="021-000000" value="<?php echo $site['telepon'] ?>" class="form-control">
    </div>
    
      <div class="form-group">
    <label>Fax</label>
    <input type="text" name="fax" placeholder="021-000000" value="<?php echo $site['fax'] ?>" class="form-control">
    </div>
    
     <div class="form-group">
    <label>Mobile / Celluler</label>
    <input type="text" name="hp" placeholder="021-000000" value="<?php echo $site['hp'] ?>" class="form-control">
    </div>
    
    <h3>Social network</h3><hr>
    
    <div class="form-group">
    <label>Facebook <i class="fa fa-facebook"></i></label>
    <input type="url" name="facebook" placeholder="http://facebook.com/namakamu" value="<?php echo $site['facebook'] ?>" class="form-control">
    </div>
    
    <div class="form-group">
    <label>Twitter <i class="fa fa-twitter"></i></label>
   <input type="url" name="twitter" placeholder="http://twitter.com/namakamu" value="<?php echo $site['twitter'] ?>" class="form-control">
    </div>
    
     <div class="form-group">
    <label>Instagram <i class="fa fa-instagram"></i></label>
   <input type="url" name="instagram" placeholder="http://instagram.com/namakamu" value="<?php echo $site['instagram'] ?>" class="form-control">
    </div>
    
</div>

<div class="col-md-6">
	<h3>Modul SEO (Search Engine Optimization)</h3><hr>
	<div class="form-group">
    <label>Keywords (Keyword search for Google, Bing, etc)</label>
    <textarea name="keywords" rows="3" class="form-control" placeholder="Kata kunci / keywords"><?php echo $site['keywords'] ?></textarea>
    </div>
    
    <div class="form-group">
    <label>Metatext</label>
    <textarea name="metatext" rows="5" class="form-control" placeholder="Kode metatext"><?php echo $site['metatext'] ?></textarea>
    </div>
    
    <h3>Google Map</h3><hr>
    <div class="form-group">
    <label>Google Map</label>
    <textarea name="google_map" rows="5" class="form-control" placeholder="Kode dari Google Map"><?php echo $site['google_map'] ?></textarea>
    </div>
    
    <div class="form-group map">
        <style type="text/css" media="screen">
            iframe {
                width: 100%;
                max-height: 200px;
            }
        </style>
    <?php echo $site['google_map'] ?>
    </div>
</div>

<div class="col-md-12">
	<input type="submit" name="submit" value="Save Configuration" class="btn btn-primary">
    <input type="reset" name="reset" value="Reset" class="btn btn-primary">
</div>

</form>