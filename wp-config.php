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
define('DB_NAME', 'wks_zen');

/** MySQL database username */
define('DB_USER', 'wks_zen');

/** MySQL database password */
define('DB_PASSWORD', 'ictvm9Ercu');

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
define('AUTH_KEY',         '3N<]Nb4Fw] =t/M3FgPgS9~:(kP9w`EZjf>K}G4h}iG  Rn;/-qDLG9Gf@HSC79$');
define('SECURE_AUTH_KEY',  'uWi{3B:/m?2[4td=MhwzRxd(}d -9ov%>v|(0FyX-Y]c+7tQsu:~9fh>%U)o#cG?');
define('LOGGED_IN_KEY',    '1v$WS`zYRC61)PKKAebpqxu:)N)![T(9R&w2_Qx(Ilv_Us|0%shaZIMgROkk$_GT');
define('NONCE_KEY',        'l?!LOY^!~Wueeb:x#tRLz?!3(z<OF()IF+eO*R qTAFcAC4v&OWM8z267w$>T0is');
define('AUTH_SALT',        'TF-Q5NAX(YhAQGhl~DE70.`r03i(X@N&FCgC`?=w#9boV=W!NM](<)Xc8IUOU+6Q');
define('SECURE_AUTH_SALT', 'n*fcq2TA?~|q,)LYy?#sp& s;mArw4:l8&OAr8@7zP=n)%0v:p)OJZNU&!=Bh{(Z');
define('LOGGED_IN_SALT',   'obk07qdk2tclh;IJpNYmD_J8x2y!LTIR|+T4>q~TT<)=/85g$_b.qC(v_T`2gLse');
define('NONCE_SALT',       'l&)P,x6lmoN}x%GAe_jw ;YQY=wX2r|~$)Gq,t0jX[-y^?ri)4{*4&pd4.rFVWOV');

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
