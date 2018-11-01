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
define('DB_NAME', 'wordpress_film');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '*&@pgs+WOT%{qh>wwN|EA$`=zL$:+TA3M>Lc8gd,8~s#ZSOzCjZ^0cHO[4M_i_[l');
define('SECURE_AUTH_KEY',  'L>vcpP,nvX370)o`IzqumCni2N_7|V$N[9boR#fFowilnltrx,:R^_O*G:oS$839');
define('LOGGED_IN_KEY',    ':{?fzMgv/_G#wv)OU#A8PzYN2GV)^{bqRyYy.^]ctO%pA9-e4?KLcs)7,cswl4-t');
define('NONCE_KEY',        ',UmLQ~F)MMAXKLKhseWI)Q.DwPr!PRepXBG|D.R/UT|^x:VtgQ|wsC~Jl)W?Zmt.');
define('AUTH_SALT',        'n-C+i*cxX#y9L$`n6*B&Q0Rsl.%Uis4ng+jX06p>XrlH Cj)Uhs7=YTN@&T&e-`-');
define('SECURE_AUTH_SALT', 'z7)Qe0yqD5Oi!?UB&7TKh I1wgT$V8:/ld5FLqZvc[Ky2[MV]3A*;YH3[<OW{gO%');
define('LOGGED_IN_SALT',   ' 8hbo=aiYI%Aq^F[4N_;Ot/k~W&`M+4f&@?+H.}9%4q}LQH*m{cUp$]J^I?8-,qH');
define('NONCE_SALT',       '7il3;Nm;)u!ux_kwoQ}0gsMtqgU{UcVO@$Zlqs$+c]5GyVp&0~K@5Re@VA&C0+wG');

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
