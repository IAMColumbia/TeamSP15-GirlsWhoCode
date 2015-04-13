<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'goodspar_wo6706');

/** MySQL database username */
define('DB_USER', 'goodspar_wo6706');

/** MySQL database password */
define('DB_PASSWORD', 'm5WXqtfhze4k');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'V/HWDUGmAK>IYEJczkheNFtm+nJN|B?wY%vMf^(<Jri^COOCxvQZAnEj+_]Gc(h<jqT}{EUuEfKYT@P=^cGoaN*XR!OLFk>AnkG!znYrj@x)-T(OocR$ReGgIkf-u;DF');
define('SECURE_AUTH_KEY', ']OfWiyqh{z]oUpvQ?|R!!OQalIH??fyNJeu)UGHCba@|BdX]{=ZQ{a(ZyM)?ivc/Nuroz_izBSf@fJUq|^w>q*$A@mM+ZB=A;l;VQ{IKtQ/*uG]{$hoGfY%qw@TvhqYU');
define('LOGGED_IN_KEY', '_mD<Z-BNkzs^EI^veU}I)@(Aznx(IkAro_gUFwLv+{B*dcnqclJvkAzq}mhR(g>;uApVGIgpkzvXFCBU+&h%Vy*/BuA*TD|gorkh{&Y)rva]M[oO)AMgGY)xxk+><b@j');
define('NONCE_KEY', 'Odlj@XwM[Rz;g;lW^v_tDZ>NV<%]()VsGl-]YFBskt+EdL/KEu+po>d|J+hAC)KIcRbhQ&VYtt[acVg|B)Kyv)fbyQX&Jv%B<ri?oy$PD-RYo?nBE**{Z[kXhBU(XJm&');
define('AUTH_SALT', 'L!faBE/OmpNsZAchj!(XS-CQugME>So{t](YUt)Ldp|Yc|@iA|)K<e$dt|Ug&UHz=nV(|);I^Ut[F>XZTp}/vJMzsTb=<myF|}v_o+xx|%&izoWfzffw@Pkh|f|Q+Ov$');
define('SECURE_AUTH_SALT', 'IYcJHarB]_jh?YFUgw+RtpQzfle/y]v?QT@cGqEwIzk-S%D^AVhxJZniEEZd*<*A}SjHtfE&ROBpq{avI<J][VBuq[eOJlK=$KO>M@Iq[OgZLm?vJ^jYjtOwZh}r>-mg');
define('LOGGED_IN_SALT', 'ba@zljtrCE|fat{FGQayv!-;hd!ZU_bBj*gt(P=-](Hq]i%wHLPsvHEYZpaRQq|QgD@WcY|Eg|ytd@vYKSwoMD?V--p$]KRMPr@zX+pEAcSTF@aj-RjKHkJgka&;ZI/x');
define('NONCE_SALT', '?Hc<GjWNns[M-bLsz$p%%O<UheygLmgs&>ZVt&CHBg%AKpomPgv)@quF_kTv{;^mc]c||fs}a_JfZoNn;+Ahc]gI+b/DtYi&Wf;vJt/Ryj>A)!bt+K-Nid)FVAW$hmkU');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_oduk_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define( "BP_GROUPS_SLUG", "classes" );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}

