<?php
/**
 * Template Name: Portfolio template
 */
?>

<?php get_header(); ?>
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
                    
                    the_post_thumbnail();
                    the_title();
                    the_content();
        
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
                        <a class="activator"><i class="fa fa-share-alt"></i></a>

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