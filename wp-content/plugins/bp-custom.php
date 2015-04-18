<?php 

// you could load in additional php files here, I think. So each person could have their own dev file (maybe create a dir in buddypress called dev, then I could have a file called bp-lauren.php and load it in here)
define( 'BPLANG', 'en_US' );
if ( file_exists( WP_LANG_DIR . '/buddypress-' . BPLANG . '.mo' ) ) {
    load_textdomain( 'buddypress', WP_LANG_DIR . '/buddypress-' . BPLANG . '.mo' );
}

define( 'BP_SETTINGS_SLUG', 'grr' );
define( "BP_GROUPS_SLUG", "classes" );
define( 'BP_DEFAULT_COMPONENT', 'classes');

include('buddypress/dev/lauren.php');
include('buddypress/dev/danielle.php');
include('buddypress/dev/rebecca.php');


?>