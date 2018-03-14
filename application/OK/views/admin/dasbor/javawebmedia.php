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
	height: 150,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
<style>
#imagePreview {
    width: 175px;
    height: 175px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
	margin-right: 10px;
}
.gambar {
	margin-left: 10px;
	padding: 10px;
}
</style>
<script type="text/javascript">
$(function() {
    $("#file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>


<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 

// File upload error
if(isset($error)) {
	echo '<div class="alert alert-success">';
	echo $error;
	echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>

<form action="<?php echo base_url('admin/dasbor/javawebmedia') ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id_konfigurasi" value="<?php echo $site['id_konfigurasi'] ?>">
	
    <div class="col-md-12">
    <div class="form-group">
    <label><?php $site['namaweb'] ?> Information</label>
    <textarea name="javawebmedia" class="form-control" placeholder="<?php $site['namaweb'] ?> information" id="isi"><?php echo $site['javawebmedia'] ?></textarea>
    </div>
    </div>
    
    <div class="col-md-6">
    <div class="form-group">
    	<label>Upload a new logo</label>
        <input type="file" name="gambar" class="form-control" id="file">
        <div id="imagePreview"></div>
        <div class="gambar">
        Current yacth picture<br>
        <img src="<?php echo base_url('assets/upload/image/'.$site['gambar']) ?>" style="max-width:200px; height:auto;">
        </div>
    </div>
    </div>
    
    <div class="col-md-6">
    <div class="form-group">
 <label>Video code (from Youtube)</label>
 </div>
<div class="form-group input-group">
      <span class="input-group-addon"><i class="fa fa-link"></i> https://www.youtube.com/watch?v=</span>
        <input type="text" name="video" required class="form-control" placeholder="Kode video dari Youtube" value="<?php echo $site['video'] ?>">
	</div>
    
    <div class="form-group">
   	  <label> See for detail:</label>
      	<a href="<?php echo base_url('assets/images/youtube.jpg') ?>" target="_blank">
        <img src="<?php echo base_url('assets/images/youtube.jpg') ?>" class="img-responsive">
        </a>
	</div>
	</div>
   
    
    <div class="col-md-12">
	<input type="submit" name="submit" value="Save Yacht Information" class="btn btn-primary">
    <input type="reset" name="reset" value="Reset" class="btn btn-primary">
</div>
</form>