<?php
/**
 * Template Name: Sidebar template
 */
?>

<?php get_header(); ?>

	<div class="row">

		<div class="col-sm-8">

			 <?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
			         the_content();		
				endwhile; endif; 
			?>

		</div> <!-- /.col -->
        <?php get_sidebar(); ?>
	</div> <!-- /.row -->

<?php get_footer(); ?>