<?php
/**
 *
 * @package responsive-childtheme-master
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php $blog_title = get_bloginfo('name'); ?>
		<main id="main" class="site-main alumni-front-page" role="main">
			<h2 class="site_title"><?php echo($blog_title); ?></h2>
			<?php echo do_shortcode('[do_widget "(BuddyPress) Members"]'); ?>
			
		</main>
	</div><!--ends wrapper-->


<?php get_footer(); ?>
