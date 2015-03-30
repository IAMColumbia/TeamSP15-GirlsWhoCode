<?php

add_action( 'bp_before_member_header_meta', 'devb_show_role_on_profile');
function devb_show_role_on_profile(){
	global $wp_roles;
	 
	$user_id = bp_displayed_user_id();
	 
	$user = get_userdata( $user_id );
	 
	$roles = $user->roles;
	 
	 if ( !$roles)
	 return ;
	 
	 if ( !isset( $wp_roles ) )
	 $wp_roles = new WP_Roles();
	 
	 $named_roles = array();
	 
	foreach( $roles as $role ){
	 
	$named_roles [] = $wp_roles->role_names[$role];
	 }
	 
	if( $named_roles )
	 echo '<span class="user-role activity">'. join( ', ', $named_roles ) . '</span>';
	 
}

?>