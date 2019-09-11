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
define( 'DB_NAME', 'admin_africa' );

/** MySQL database username */
define( 'DB_USER', 'admin_africa' );

/** MySQL database password */
define( 'DB_PASSWORD', 'ufNx4zNdRn' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'r0;P4=;R.E%,<Rm]W7U1PgK~wFmoVdI5=R]K,H5[OG[$_odt]v[BXv]KcMh9D:HV' );
define( 'SECURE_AUTH_KEY',  'Bl7P5n-jxn2-P:)J<woK>@c$JRi_gRHBu,$/iT2^)w{}T{XZ}}`uWDz1{BcPR3iJ' );
define( 'LOGGED_IN_KEY',    '{4kKjkV$Z:+INuO6.O3{o;.#}H$WmFNF;XEo0ZdvQpRdro6~v39so!. .Z-`as?Y' );
define( 'NONCE_KEY',        'MAr?^X+){+U+WHo##f9d5S_?>EIBI[G;F3^PfAa<GTiS_##b98Eav1zW/|eUyxOW' );
define( 'AUTH_SALT',        'YXuA3:8I#cK:_~.,z3NIQT>Z9[i4=qoR_lwUvU^8tH3$HmO]zQ&rRfRUcZ(?v<Lr' );
define( 'SECURE_AUTH_SALT', 'l%A,rJds[3F_m]d}$gQYUJ,8-JnC5P8A_kF,}e~~h^tMCJ^ 43o{ezUzpF%?xc$@' );
define( 'LOGGED_IN_SALT',   'd9~i:/T/2gNp!KM-+!yn^`rF62<XLOs&1d5ETnuz$r(7cf~Tw7I[#Tf-cu4l]l|v' );
define( 'NONCE_SALT',       'N{2&^l?Ed}$/}7y^UupJ#k:HTUgAUT-J<g#Tj }Lj~$wuD[Rnx${|^{=%Ulg<_xN' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wsx_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
