<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/var/www/html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
/** The name of the database for WordPress */
define('DB_NAME', 'equipment_hunt');

/** MySQL database username */
define('DB_USER', 'equipment_hunt');

/** MySQL database password */
define('DB_PASSWORD', 'Eqhunt88');

/** MySQL hostname */
define('DB_HOST', 'equipment-hunt-db-instance.coo6gfxrysvw.us-west-2.rds.amazonaws.com');

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
define('AUTH_KEY',         '8+nywv7RzX!!zmg#D~9(^Diz;#[B2ZO#o}NC.je+7gfTRXT&_.,Xt <3$<>IadW-');
define('SECURE_AUTH_KEY',  '*~pU-`BEvVv:Nx$%&Swq~A~q++EI@0FbPpzSy]=+563zpm@:l/]$]yc[/x}qk0Ro');
define('LOGGED_IN_KEY',    'x%evBVR+ !|i&y|*:}&cxv5OE~=v|z&K]I+5xJ++#/gRcJLGl26O(Y*@n3H{x BN');
define('NONCE_KEY',        ']l.t>j5Sm_=n7+G?kth;o3g~,fd6lG/:xRI]|H:{/b>#;_|M/OFjojZ!4!cung#=');
define('AUTH_SALT',        '*t0@&RWj{L8>T5-?*iR_;(Ud~hs]i-b?3B *]~NSfQg>3$V/rJpiO(5dSO+(@sn.');
define('SECURE_AUTH_SALT', '/WyfKgj]=V7:cQ>JDrfArlq |`B>0i8:7-g+ {|-uqnaIkJ(n&bjX[YJ=Z:Eg=N?');
define('LOGGED_IN_SALT',   'MU=B^}Ev=!x>3D^}n6c=6nkFZ4(t(/ytM7G{5n<_3)g$VSvwP)1gln*HWm=g4? v');
define('NONCE_SALT',       'JcYec`{S+]AW]+E@pieHqmh]`zzM#%|4;Fcsi(hMX-qCI0to1_B+M=4Q6a||Erb[');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
