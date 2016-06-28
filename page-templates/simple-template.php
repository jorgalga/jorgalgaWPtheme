<?php
/**
 * Template Name: Simple template
 */
?>

<?php get_header(); ?>
<div class="container">

	<div class="row">

		<div class="col-sm-12">

			 <?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
			         the_content();		
				endwhile; endif; 
			?>

		</div> <!-- /.col -->

	</div> <!-- /.row -->

</div> <!-- /.container -->

<?php get_footer(); ?>