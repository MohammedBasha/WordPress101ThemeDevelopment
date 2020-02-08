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
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress101');

/** MySQL database username */
define('DB_USER', 'wordpress101');

/** MySQL database password */
define('DB_PASSWORD', 'wordpress101');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'KXAMk%rw>W^Ry3aa5v!^y@2*>p9E5I[Dn,Nl5G:<o0,1>Zan.mJfgQM~o3ADoovm');
define('SECURE_AUTH_KEY',  'H,i3vBi`-k/,XJ;XrwF$c%z?{5LzDayaR}zB6AQuzpY[:aNTM8*O)pk-3.^;iYH?');
define('LOGGED_IN_KEY',    ')s#f:_Q>-[gGV0FhM-F:A{i%v$>YRVU +#CvP~nN :*h`O3lcqwX (_fE`p6#%!:');
define('NONCE_KEY',        '%O>P)wr@df-Hp.52kmH]`}MT|9<bi2S]28V@pbt5f8!pH1?mW,(Xt%UUCQJ4($7(');
define('AUTH_SALT',        'DLIX8:Sc3D&%Yl%ssI7y7dOc^<&1<d a6i`}$3370+-?AwNg):k568U=v2rTpW]+');
define('SECURE_AUTH_SALT', 'EhS+$pIO`AnV&Jf{G5s^=|bxj<F#dg%u]wLqRUj_#Zh*?@aBf~.s~;t-;U-yGL{m');
define('LOGGED_IN_SALT',   '+23HBbo[n/lqDj9doWw&6s}V5Sb 2MK1.Z/A^WZ;kL*,#.408qi8g1?I/ar>? Uj');
define('NONCE_SALT',       ',4-o9l[gy7-lU| S@m(zj-*Pjg(v/;39PGFbux,DA~oIB7u7ww ($0Vmy:@3Es;:');

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

define( 'WP_DEBUG_DISPLAY', true );

define( 'WP_DEBUG_LOG', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
