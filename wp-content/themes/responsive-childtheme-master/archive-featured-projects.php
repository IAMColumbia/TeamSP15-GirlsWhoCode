<?php
/*
Template Name: Archive of Featured Projects
*/
?>
<?php get_header(); ?>
		
			<?php 
				echo do_shortcode('[display-posts tag="featured" posts_per_page="20" include_excerpt="true" image_size="thumbnail" wrapper="div"]');
			?>					
			</div>
		</div>
<?php get_footer(); ?>