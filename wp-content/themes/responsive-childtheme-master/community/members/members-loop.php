<?php

/**
 * BuddyPress - Members Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>
<?php 
	global $wp_roles;

	$logged_in_user = bp_loggedin_user_id();
?>
<?php do_action( 'bp_before_members_loop' ); ?>

<?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>

	<div id="pag-top" class="pagination">


		<div class="pagination-links" id="member-dir-pag-top">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

	<?php do_action( 'bp_before_directory_members_list' ); ?>

	<ul id="members-list" class="item-list" role="main">

	<?php while ( bp_members() ) : bp_the_member(); ?>
		
		<?php 
			$current_member_id = bp_get_member_user_id();
			$user_info = get_userdata($current_member_id);

      		$level =  implode(', ', $user_info->roles);
		?>
		
		<!-- <script type="text/javascript">
		<?php if ($logged_in_user == 000) { ?>
		$("a").each(function(){
		        if($(this).hasClass("disabled")){
		        	$(this).removeAttr("href");
		        }
			  });
		<?php  }; ?>
		</script> -->
		      
		  
		<?php if ($level != 'administrator') { ?>
		<li>
			<div class="item-avatar">
				<a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar(); ?></a>
			</div>

			<div class="item">
				<div class="item-title">
					<a href="<?php bp_member_permalink(); ?>">
						<div class="member-name"><?php bp_member_profile_data( 'field=First Name' ); ?></div>            
						<div class="member-city-year"><?php bp_member_profile_data( 'field=Program City' ); ?> <?php bp_member_profile_data( 'field=Program Year' ); ?></div>
                    </a>
               </div>
			<!-- <div class="item-meta"><span class="activity"><?php //bp_member_last_active(); ?></span></div> -->

				<?php do_action( 'bp_directory_members_item' ); ?>

				<?php
				 /***
				  * If you want to show specific profile fields here you can,
				  * but it'll add an extra query for each member in the loop
				  * (only one regardless of the number of fields you show):
				  *
				  * bp_member_profile_data( 'field=the field name' );
				  */
				?>
			</div>

		</li>
		<?php }; ?>
	<?php endwhile; ?>

	</ul>

	<?php do_action( 'bp_after_directory_members_list' ); ?>

	<?php bp_member_hidden_fields(); ?>

	<div id="pag-bottom" class="pagination">

		

		<div class="pagination-links" id="member-dir-pag-bottom">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( "Sorry, no members were found.", 'buddypress' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_members_loop' ); ?>
