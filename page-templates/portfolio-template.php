<?php
/**
 * Template Name: Portfolio template
 */
?>

<?php get_header(); ?>

<div class="container">
	<div class="row">
        <div class="col-sm-4">
            <div class="portfolio-header">
                 <h2>Portfolio</h2>
            </div>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
		
			 <?php 
                
                $custom_posts = new WP_Query( array(
                    'category_name' => 'portfolio',
                    'posts_per_page' => 10,
                    'order_by' => 'date',
                    'order'    => 'DESC'
                ));
            
				 if ( $custom_posts->have_posts() ) : while ( $custom_posts->have_posts() ) : $custom_posts->the_post();
                    
        
                    $description =  get_the_content();
                    $description = substr($description,0,90).'...';
            
                    ?>
                    <!--Card Light-->
                    <div class="col-sm-4">
                    <div class="card">

                        <!--Card image-->
                        <div class="view overlay hm-white-slight">
                            <!--<img src="http://mdbootstrap.com/images/reg/reg%20(59).jpg" class="img-fluid" alt="">-->
                            <img src="<?php echo the_post_thumbnail_url();  ?>" class="img-fluid" alt="">
                            <a href="#">
                                <div class="mask"></div>
                            </a>
                        </div>
                        <!--/.Card image-->

                        <!--Social shares button-->
                        <div class="card-share">
                                    <div class="social-reveal">
                                        <!--Facebook-->
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=http://mdbootstrap.com/mdb4-release-note/" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="btn-floating btn-fb waves-effect waves-light"><i class="fa fa-facebook"> </i></a>
                                        <!--Twitter-->
                                        <a href="https://twitter.com/home?status=http://mdbootstrap.com/mdb4-release-note/%20by%20@MDBootstrap" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="btn-floating btn-tw waves-effect waves-light"><i class="fa fa-twitter"> </i></a>
                                        <!--Google -->
                                        <a href="https://plus.google.com/share?url=http://mdbootstrap.com/mdb4-release-note/" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="btn-floating btn-small btn-gplus waves-effect waves-light"><i class="fa fa-google-plus"> </i></a>
                                    </div>
                                    <a class="btn-floating btn-action share-toggle btn-ptc waves-effect waves-light"><i class="fa fa-share-alt"></i></a>
                                </div>

                        <!--Card content-->
                        <div class="card-block">
                            <!--Title-->
                            <h4 class="card-title"><?php echo get_the_title(); ?></h4>
                            <hr>
                            <!--Text-->
                            
                            
                            <p class="card-text"><?php echo $description; ?></p>
                            <a href="" class="link-text"><h5>Read more <i class="fa fa-chevron-right"></i></h5></a>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card Light-->
                    </div> <!-- /.col -->
                    <?php


            
            
            
            
				endwhile; endif; 
			?>

		

	</div> <!-- /.row -->

</div> <!-- /.container -->

<?php get_footer(); ?>