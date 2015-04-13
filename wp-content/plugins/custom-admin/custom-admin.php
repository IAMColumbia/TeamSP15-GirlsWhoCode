<?php
/*
Plugin Name: Custom Admin
Plugin URI: http://goodspark.com/gwc
Description: This plugin customizes the WordPress dashboard.
Version: 1.0
Author: Columbia College Chicago
Author URI: iam.colum.edu
License: GPLv2
*/


add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');
function wpc_dashboard_widgets() {
	global $wp_meta_boxes;
	// Today widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	// Last comments
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	// Incoming links
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	// Plugins
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
}

// Custom WordPress Admin Color Scheme
function admin_css() {
	wp_enqueue_style( 'admin_css', get_stylesheet_directory_uri() . '/admin.css' );
}
add_action('admin_print_styles', 'admin_css' );

// remove unwanted dashboard widgets for relevant users
function wptutsplus_remove_dashboard_widgets() {
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
}
add_action( 'wp_dashboard_setup', 'wptutsplus_remove_dashboard_widgets' );

// Move the 'Right Now' dashboard widget to the right hand side
function wptutsplus_move_dashboard_widget() {
    $user = wp_get_current_user();
    global $wp_meta_boxes;
    $widget = $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'];
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
    $wp_meta_boxes['dashboard']['side']['core']['dashboard_right_now'] = $widget;
}
add_action( 'wp_dashboard_setup', 'wptutsplus_move_dashboard_widget' );

// Rename Posts to News in Menu
function wptutsplus_change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Projects';
    $submenu['edit.php'][5][0] = 'All Projects';
    $submenu['edit.php'][10][0] = 'Add Project';
}
add_action( 'admin_menu', 'wptutsplus_change_post_menu_label' );

// Edit submenus
function wptutsplus_change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Project';
    $labels->singular_name = 'All Projects';
    $labels->add_new = 'Add Project';
    $labels->add_new_item = 'Add New Project';
    $labels->edit_item = 'Edit Project Item';
    $labels->new_item = 'New Project';
    $labels->view_item = 'View Project';
    $labels->search_items = 'Search Projects';
    $labels->not_found = 'No Projects found';
    $labels->not_found_in_trash = 'No Projects found in Trash';
}
add_action( 'admin_menu', 'wptutsplus_change_post_object_label' );

// Remove Comments menu item for all but Administrators
function wptutsplus_remove_comments_menu_item() {
    $user = wp_get_current_user();
    //if ( ! $user->has_cap( 'manage_options' ) ) {
        remove_menu_page( 'edit-comments.php' );
    //}
}
add_action( 'admin_menu', 'wptutsplus_remove_comments_menu_item' );


?>