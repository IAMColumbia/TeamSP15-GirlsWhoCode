<?php
/* Register widget */
function bp_featured_members_widget() {
	add_action('widgets_init', create_function('', 'return register_widget("BP_Featured_Members_Widget");') );
}
add_action( 'plugins_loaded', 'bp_featured_members_widget', 11 );


/**
 * BP_Featured_Members_Widget Class
 */
class BP_Featured_Members_Widget extends WP_Widget {
    
    
	/**
	 * Declare the bp_featured_members_widget Class
	 */
    function bp_featured_members_widget() {
    	//parent::WP_Widget( false, $name = __( 'Enhanced Featured Members Widget', 'buddypress' ) );
    	
    	$widget_ops = array( 'classname' => 'bp_featured_members', 'description' => __( 'Lets you choose one or more members to feature', EFMW_NAME ) );
    	$this->WP_Widget( 'bp_featured_members', __( 'Enhanced Featured Members', EFMW_NAME ), $widget_ops );
    }

    /**
	 * Output the Enhanced Featured Members Widget
	 */
    function widget( $args, $instance ) {		
        global $bp;
        $x = 0;
        extract( $args );
        $title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$members = empty( $instance[ 'members_to_feature' ] ) ? '' : $instance[ 'members_to_feature' ];
		$members = explode( ",", $members );
		//***$avsize = empty( $instance[ 'featured_members_avsize' ] ) ? '' : $instance[ 'featured_members_avsize' ];

		$max_members = array_slice($members, 0, 5);   // returns "a", "b", and "c"


		echo $before_widget;
		
		if( $title )
			echo $before_title . $title . $after_title;
	
		if ( $max_members[0] != "" ) : 
	
		?>

			<ul id="featured-members-list" class="item-list">
				<?php foreach ( $max_members as $member ) : ?>
					
					<li class="vcard">
					
						<div class="item-avatar">					
							<?php $member_id = bp_core_get_userid( $member ) ?>
							<a href="<?php echo bp_core_get_user_domain( $member_id ) ?>" title="<?php echo bp_core_get_user_displayname( $member_id ) ?>"><?php echo bp_core_fetch_avatar( array( 'item_id' => $member_id, 'type' => 'thumb' ) ) ?></a>
						</div>
						
						<div class="item">
							<div class="item-title fn">
								<a href="<?php echo bp_core_get_user_domain( $member_id ) ?>" title="<?php echo bp_core_get_user_displayname( $member_id ) ?>"><?php echo bp_core_get_user_displayname( $member_id ) ?>
                            
                            
									<?php echo xprofile_get_field_data( 'Program City', $member_id ); ?>
                                    <?php echo xprofile_get_field_data( 'Program Year', $member_id ); ?>
                                </a>
                    		</div>
						</div>
						
					
					</li>
					
				<?php endforeach; ?>
			</ul>
	
			<?php 
			if ( function_exists( 'wp_nonce_field' ) )
				wp_nonce_field( 'featured_members', '_wpnonce-members' );
			?>
	
		<?php else: ?>
			<p>
				<?php _e( "To add featured members, go to the Enhanced Featured Members Widget, and add the usernames you'd like to feature into the widget, separated by commas.", EFMW_NAME ) ?>
			</p>
		<?php 
	
		endif;

		echo $after_widget;

    }
    
    /**
	 * Save the Enhanced Featured Members Widget Settings
	 */
    function update( $new_instance, $old_instance ) {				
        
        $instance = $old_instance;
		$instance[ 'title' ] = strip_tags( stripslashes( $new_instance[ 'title' ] ) );
		$instance[ 'members_to_feature' ] = strip_tags( stripslashes( $new_instance[ 'members_to_feature' ] ) );
		//***$instance[ 'featured_members_avsize' ] = strip_tags( $new_instance[ 'featured_members_avsize' ] );
        
        return $instance;
    }

    /**
	 * Display the Enhanced Featured Members Widget Edit Form to Site Admin
	 */
    function form( $instance ) {				
      
        // Set Defaults, Parse the Settings Array
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'Featured Members', 'members_to_feature' => '' ) );
		
		$title = esc_attr( $instance[ 'title' ] );
		$members = esc_attr( $instance[ 'members_to_feature' ] );
		//***$avsize = esc_attr( $instance[ 'featured_members_avsize' ] );
        
        ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title:', EFMW_NAME ); ?></label><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'members_to_feature' ); ?>"><?php _e( 'Member Usernames:', EFMW_NAME ); ?></label><input class="widefat" id="<?php echo $this->get_field_id( 'members_to_feature' ); ?>" name="<?php echo $this->get_field_name( 'members_to_feature' ); ?>" type="text" value="<?php echo $members; ?>" />
			<br />
			<small><?php _e( 'Separate usernames by commas (no spaces)', EFMW_NAME ); ?></small>
		</p>
		
		<small>
			<?php
			echo "<div class='copy'><p><small>" . __( 'Plugin Widget Version', EFMW_NAME ) . ": " .  EFMW_VERSION . "<br />" . __( 'Plugin Licensed Under', EFMW_NAME ) . " <a href='http://www.gnu.org/licenses/gpl.html'>GPL 3.0</a><br /> Brought to you by <a href='http://www.buddyboss.com'>BuddyBoss.com</a></small></p></div>";
			?>
		</small>

   <?php }

} // class BP_Featured_Members_Widget

?>