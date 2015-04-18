<?php

add_image_size( 'featured-project', 425, 325, true );

add_filter('widget_text', 'do_shortcode');

add_action( 'wp_enqueue_scripts', 'child_add_scripts' );

/**
 * Register and enqueue a script that does not depend on a JavaScript library.
 */
function child_add_scripts() {
    wp_register_script(
        'custom-js',
        get_stylesheet_directory_uri() . '/js/custom.js',
        false,
        '1.0',
        true
    );

    wp_enqueue_script( 'custom-js' );
}

//if ( ! is_admin() || bp_loggedin_user_id() == 0) {
    add_filter('show_admin_bar', '__return_false');
//}


add_action('admin_bar_menu','modify_admin_bar', 999);

function modify_admin_bar($wp_admin_bar) {
	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('comments');
	$wp_admin_bar->remove_node('new-content');
	$wp_admin_bar->remove_node('my-account');
	$wp_admin_bar->remove_node('search');
	$wp_admin_bar->add_menu( array(
        'id'    => 'wp-custom-logout',
        'title' => 'Logout',
        'parent'=> 'top-secondary',
        'href'  => wp_logout_url()
    ) );
}

function get_user_role( $user_id ){

  $user_data = get_userdata( $user_id );

  if(!empty( $user_data->roles )){
  	 // echo $user_data->roles[0];
      return $user_data->roles[0];
  }
  return false; 

}

/**
 * Output the "options nav", the secondary-level single item navigation menu.
 *
 * Uses the $bp->bp_options_nav global to render out the sub navigation for the
 * current component. Each component adds to its sub navigation array within
 * its own setup_nav() function.
 *
 * This sub navigation array is the secondary level navigation, so for profile
 * it contains:
 *      [Public, Edit, Change-Avatar]
 *
 * The function will also analyze the current action for the current component
 * to determine whether or not to highlight a particular sub nav item.
 *
 * @uses bp_get_user_nav() Renders the navigation for a profile of a currently
 *       viewed user.
 */
function bp_get_custom_options_nav( $parent_slug = '' ) {
	$bp = buddypress();

	// If we are looking at a member profile, then the we can use the current
	// component as an index. Otherwise we need to use the component's root_slug
	$component_index = !empty( $bp->displayed_user ) ? bp_current_component() : bp_get_root_slug( bp_current_component() );
	$selected_item   = bp_current_action();

	if ( ! bp_is_single_item() ) {
		if ( !isset( $bp->bp_options_nav[$component_index] ) || count( $bp->bp_options_nav[$component_index] ) < 1 ) {
			return false;
		} else {
			$the_index = $component_index;
		}
	} else {
		$current_item = bp_current_item();

		if ( ! empty( $parent_slug ) ) {
			$current_item  = $parent_slug;
			$selected_item = bp_action_variable( 0 );
		}

		if ( !isset( $bp->bp_options_nav[$current_item] ) || count( $bp->bp_options_nav[$current_item] ) < 1 ) {
			return false;
		} else {
			$the_index = $current_item;
		}
	}

	// Loop through each navigation item
	foreach ( (array) $bp->bp_options_nav[$the_index] as $subnav_item ) {
		if ( empty( $subnav_item['user_has_access'] ) ) {
			continue;
		}

		// If the current action or an action variable matches the nav item id, then add a highlight CSS class.
		if ( $subnav_item['slug'] == $selected_item ) {
			$selected = ' class="current selected"';
		} else {
			$selected = '';
		}

		// List type depends on our current component
		$list_type = bp_is_group() ? 'groups' : 'personal';

		// echo out the final list item
		if (bp_loggedin_user_id() != bp_displayed_user_id()){
			if ($subnav_item['slug'] != 'public' && $subnav_item['slug'] != 'edit' && $subnav_item['slug'] != 'change-avatar'){
				echo apply_filters( 'bp_get_custom_options_nav_' . $subnav_item['css_id'], '<li id="' . $subnav_item['css_id'] . '-' . $list_type . '-li" ' . $selected . '><a id="' . $subnav_item['css_id'] . '" href="' . $subnav_item['link'] . '">' . $subnav_item['name'] . '</a></li>', $subnav_item, $selected_item );
			}
		}
		if (bp_loggedin_user_id() == bp_displayed_user_id() || get_user_role(bp_loggedin_user_id()) == 'administrator'){
		echo apply_filters( 'bp_get_custom_options_nav_' . $subnav_item['css_id'], '<li id="' . $subnav_item['css_id'] . '-' . $list_type . '-li" ' . $selected . '><a id="' . $subnav_item['css_id'] . '" href="' . $subnav_item['link'] . '">' . $subnav_item['name'] . '</a></li>', $subnav_item, $selected_item );
		
		}
	}
}

function theme_name_scripts() {
	wp_enqueue_style( 'danielle.css', get_stylesheet_uri() );
}

add_action( 'theme_name_scripts' );

?>