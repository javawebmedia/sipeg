<div id="content" role="main">
<div class="page-header dark larger larger-desc">
<div class="container">
<div class="row">
    <div class="col-md-12">
        <h1><?php echo $title ?></h1>
    </div><!-- End .col-md-6 -->
</div><!-- End .row -->
</div><!-- End .container -->
</div><!-- End .page-header -->

<div class="mb40"></div><!-- space -->

<div class="container">
<div class="row">

<div class="col-md-8">
<?php foreach($berupload as $berupload) { ?>
<article class="entry">
<span class="entry-date"><?php echo date('d',strtotime($berupload->tanggal_publish)) ?><span><?php echo date('M',strtotime($berupload->tanggal_publish)) ?></span></span>
<div class="row">
    <!-- 
    <div class="col-md-4">
        
        <?php if($berupload->gambar != "") { ?>
        <div class="entry-media">
          <figure>
          <a href="<?php echo base_url('berupload/read/'.$berupload->slug_berupload) ?>">
            <img src="<?php echo base_url('assets/filemanager/userfiles/image/thumbs/'.$berupload->gambar) ?>" alt="<?php echo $berupload->judul_berupload ?>" class="img-responsive">
          </a>
           </figure>
        </div>
        <?php } ?>

    </div>End .col-md-6 -->

    <div class="col-md-12">

        <h2 class="entry-title"><a href="<?php echo base_url('berupload/read/'.$berupload->slug_berupload) ?>"><?php echo $berupload->judul_berupload ?></a></h2>

        <div class="entry-content">
           <p><?php echo strip_tags(character_limiter($berupload->isi_berupload,160)) ?></p>
        </div><!-- End .entry-content -->

        <footer class="entry-footer clearfix">
            <span class="entry-cats">
                <span class="entry-label"><i class="fa fa-tag"></i>Kategori:</span><a href="<?php echo base_url('berupload/kategori/'.$berupload->slug_kategori) ?>"><?php echo $berupload->nama_kategori ?></a>
            </span><!-- End .entry-tags -->
            <span class="entry-separator">/</span>
            <a href="#" class="entry-eye"><?php echo $berupload->hits ?> hits</a>
            <span class="entry-separator">/</span>
            Oleh <a href="#" class="entry-author"><?php if($berupload->nama =="") { echo "Admin"; }else{ echo $berupload->nama; } ?></a>
            
        </footer>
    </div><!-- End .col-md-6 -->
</div><!-- End .row -->

</article>
  <?php } ?> 
                        
</div>

<div class="col-md-4">

<div class="panel panel-default">
    <div class="panel-heading">Berupload Terpopuler</div>
    <div class="panel-body">
         <div class="widget">
        <ul class="links" style="padding: 0;">
            <?php foreach($populer as $populer) { ?>
            <li style="border-bottom: dotted thin #fcc;"><a href="<?php echo base_url('berupload/read/'.$populer->slug_berupload) ?>"><?php echo $populer->judul_berupload ?> (<?php echo number_format($populer->hits,'0',',','.') ?> hits)</a></li>
            <?php } ?>
        </ul>
    </div>
    </div>
</div>

</div>

</div>

    <div class="clearfix"></div>
        <div class="col-md-12 text-center pagination pagin">
        <div class="clearfix"></div>
        <?php if(isset($pagin)) { echo $pagin; }  ?>
        <div class="clearfix"></div>
        </div>
 
 </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb20"></div><!-- space -->

</div><!-- End #content -->