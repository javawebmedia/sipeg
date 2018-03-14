<div id="content" role="main">
<div class="page-header dark larger larger-desc">
<div class="container">
<div class="row">
</div><!-- End .row -->
</div><!-- End .container -->
</div><!-- End .page-header -->

<div class="container">
<div class="row">
<div class="col-md-9">

    <article class="entry single">

        <?php if($berita->gambar !="") { ?>
        
        <div class="entry-media">
            <figure>
                <img src="<?php echo base_url('assets/upload/image/'.$berita->gambar) ?>" alt="<?php echo $title ?>">
            </figure>
        </div> 

        <?php } ?>

        <span class="entry-date"><?php echo date('d',strtotime($berita->tanggal_publish)) ?><span><?php echo date('M',strtotime($berita->tanggal_publish)) ?></span></span>
        <h1 class="entry-title"><?php echo $title ?></h1>

        <div class="entry-content">
            <?php echo $berita->isi_berita ?>
        </div><!-- End .entry-content -->


    </article>
    
</div>
<!-- End 9 -->

<div class="col-md-3">
    <div class="widget">
        <h3>Profil kami</h3>
        <ul class="latest-posts-list">

            <?php foreach($listing as $listing) { ?>
            <li class="clearfix">
                <figure><img src="<?php if($listing->gambar=="") { echo base_url('assets/upload/image/thumbs/'.$site->icon); }else{ echo base_url('assets/upload/image/thumbs/'.$listing->gambar); } ?>" alt="<?php echo $listing->judul_berita ?>"></figure>
                <div class="entry-content">
                    <h5><a href="<?php echo base_url('berita/profil/'.$listing->slug_berita) ?>"><?php echo $listing->judul_berita ?></a></h5>
                    <p><?php echo date('d/m/Y',strtotime($listing->tanggal_publish)) ?> - <i class="fa fa-eye"></i> <a href="#"><?php echo $listing->hits ?></a></p>
                </div><!-- End .entry-content -->
            </li>
            <?php } ?>

        </ul>
    </div><!-- End .widget -->
</div>


</div><!-- End .row -->
</div><!-- End .container -->
</div><!-- End #content -->
<div class="mb20"></div><!-- space -->
