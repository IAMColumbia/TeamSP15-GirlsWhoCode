<?php
/*
Plugin Name: Enhanced Featured Members Widget
Plugin URI: http://www.buddyboss.com
Description: An enhanced version of Jeff Sayre's Featured Members Widget. This BuddyPress widget lets you choose one or more members to feature, including an avatar and a text link to each member's profile.
Version: 1.1
Revision Date: Jan 9, 2014
Requires at least: WordPress 3.6, BuddyPress 1.7
Tested up to: WordPress 3.8, BuddyPress 1.9.1
License: GNU General Public License 3.0 (GPL) http://www.gnu.org/licenses/gpl.html
Author: BuddyBoss.com
Author URI: http://www.buddyboss.com/
*/

define('EFMW_VERSION','1.1');
define('EFMW_NAME','Enhanced Featured Members Widget');
define('EFMW_ROOT',dirname(__FILE__).'/');
define('EFMW_DIR',basename(dirname(__FILE__)));

register_activation_hook( __FILE__,'efmw_activate');
register_deactivation_hook( __FILE__,'efmw_deactivate');

function efmw_activate() { }
function efmw_deactivate() { }

/*
 * Check if BuddyPress is installed
 */
function efmw_bp_check() {
    if(!is_plugin_active('buddypress/bp-loader.php')):
        echo '<div class="error"><p>';
        echo __('You need to install and active <b><a href="'.site_url().'/wp-admin/plugin-install.php?tab=search&type=term&s=buddypress&plugin-search-input=Search+Plugins">
        Buddypress</strong></a> before using the <strong>Enhanced Featured Members Widget</b>','efmw');
        echo '</p></div>';
    endif;
}
add_action('admin_notices', 'efmw_bp_check');

/*
 * Loads Enhanced Featured Members Widget only if BuddyPress is installed
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(is_plugin_active('buddypress/bp-loader.php')):

require_once (  EFMW_ROOT.'bp-featured-members-widget.php'  );
endif;

?>