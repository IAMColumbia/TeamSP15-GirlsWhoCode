<?php

//** Change labels for role functionality in Wordpress, added by Lauren 3/18/15 **//
function wps_change_role_name() {
	global $wp_roles;
	if ( ! isset( $wp_roles ) )
		$wp_roles = new WP_Roles();
		
		remove_role( 'author' );
		remove_role( 'contributor' );
		
		$wp_roles->roles['subscriber']['name'] = 'Student/Alumni';
		$wp_roles->role_names['subscriber'] = 'Student/Alumni';

		$wp_roles->roles['editor']['name'] = 'Instructor';
		$wp_roles->role_names['editor'] = 'Instructor';
		
		$wp_roles->roles['administrator']['name'] = 'Admin/Staff';
		$wp_roles->role_names['administrator'] = 'Admin/Staff';

	}
add_action('init', 'wps_change_role_name');


//** Hide Member Name in the permalink slug for privacy, added by Lauren 3/2/15 **//
function bp_get_user_domain_with_id( $domain, $user_id, $user_nicename = false, $user_login = false ) {

  if ( empty( $user_id ) )
		return;

	if( isset($user_nicename) )
		$user_nicename = bp_core_get_username($user_id);

	//if ( !$domain = wp_cache_get( 'bp_user_domain_' . $user_id, 'bp' ) ) {
		$after_domain =  bp_get_members_root_slug() . '/' . $user_id;
	
		$domain       = trailingslashit( bp_get_root_domain() . '/' . $after_domain );
		$domain       = apply_filters( 'bp_core_get_user_domain_pre_cache', $domain, $user_id, $user_nicename, $user_login );

		// Cache the link
		if ( !empty( $domain ) ) {
			wp_cache_set( 'bp_user_domain_' . $user_id, $domain, 'bp' );
		}
	//}
	
	return $domain;
	
}
add_filter('bp_core_get_user_domain', 'bp_get_user_domain_with_id', 10, 4);


function bp_get_userid_with_id($userid, $username){
	//if the username is an userid ?
	if(ctype_digit($username)){
		// check if a user with userid equal to $username exist
		$aux = get_userdata( $username );
		if( get_userdata( $username ) )
			$userid = $username;
	}
	return $userid;
}
add_filter('bp_core_get_userid', 'bp_get_userid_with_id', 10, 2);

//add_filter('bp_core_get_userid_from_nicename', 'bp_get_userid_with_ideddde',10, 1);

// bp_core_get_userid_from_nicename filter havn't the $username in param  :(    so i was 
// add filter to bp_is_username_compatibility_mode to force the excution of bp_core_get_userid
// *** check line 261 of bp-core-catchuri.php ***

function bp_is_username_compatibility_mode_always_true(){
	return true;
}
add_filter('bp_is_username_compatibility_mode', 'bp_is_username_compatibility_mode_always_true');
?>