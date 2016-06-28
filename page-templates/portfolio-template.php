<?php
/**
 * Template Name: Portfolio template
 */
?>

<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
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
            
				endwhile; endif; 
			?>

		</div> <!-- /.col -->

	</div> <!-- /.row -->

</div> <!-- /.container -->

<?php get_footer(); ?>