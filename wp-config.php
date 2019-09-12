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
define('DB_NAME', 'admin_soft');

/** MySQL database username */
define('DB_USER', 'admin_soft');

/** MySQL database password */
define('DB_PASSWORD', 'yMmlMe4XOo');

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
define('AUTH_KEY',         'O6-Mq&H&(X,^f3*.;Q)0<MOq>71auPDn8w)gq3)K&ea2J|Y^/3GrUUxWp*PorB[<');
define('SECURE_AUTH_KEY',  '2Pr5A@QG4mkSOupKZ~%}H!MVE.qa`#~ryNTt/S$ #hae#rVU(03,FJoG|tQb$(T]');
define('LOGGED_IN_KEY',    'fr]lwvu?[W O$QuY7/0S^+0@WTn#^EADHeUvR3w8P5XVwopj~Ye(&cO!q12y]Cnn');
define('NONCE_KEY',        '+3JiOw~!*J>#BaVkB^uZqC&hvuCPQowd}z^P~z^+p^FyYc[o!f*mM>$@cZjZ%n5:');
define('AUTH_SALT',        ':}e/C+FfD^m6TA#rS/!.-kg pur<<_Ab?mK*?8Um_Pkzn>(b4e?ILI{.[_/PFcc1');
define('SECURE_AUTH_SALT', 'YI^{q13JAmm99z@4[jl{1!E J!0e{YlszL+4<?b3My.BCw&9et#.}e.3D>J@X!v+');
define('LOGGED_IN_SALT',   'k2/GsPe4Ypn{-I^0VwGas2T>6:(F:#hT=<zR_s[)3eb3}}4St7fiXE4RVD@YF_{/');
define('NONCE_SALT',       '+Hn`r!u=!>H $:NQSg]t}SX^c/MP7)LbUq;m9)C6kI5>D)$263`pl<Nk)ikqd`}Q');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wsp_';

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
