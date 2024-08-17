<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ekomn_blog' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '8<!ZNr.:7]%U;(|kc7b)+D6tA.%bx>+cW55BR?e-Wt0#A3;~SK=c/brB}9UDwJ${' );
define( 'SECURE_AUTH_KEY',  '_Bh9>ccc^0O`0)X5*wM+2#QIi@t^>>NxRSW(Ty ^G>W~WK?LOpNZ(/]s}#?>qmN;' );
define( 'LOGGED_IN_KEY',    'm_}MY(sF9nq{ZB[ZOStL 8nC$.(8@:u C,[.!E-$&iev {`0z^L&?eCZS51ZKs}!' );
define( 'NONCE_KEY',        'z) _mzy.NxoxpZ0q/}Qve#o9nK,^j(&t[W|Xi/Y3|I4-rL>8M.j!8 69(}a|w5Cv' );
define( 'AUTH_SALT',        'td^+4^BkSohY_hyX]:[(jB*GTtE%y!i^`y1R{oo}<2C,_*kciwe.Der%]}`dDb>w' );
define( 'SECURE_AUTH_SALT', '.m3VedE_$.%2mVp,]bJ!Mv]u{~k_v|xk&JYJXV3uCs+N>BEkQV7&COdeMz(+D-Id' );
define( 'LOGGED_IN_SALT',   'hyk.a;`gx*tN#7~>,oQ$/e:2P5Wv`KA+.0JMzOj:]))XbDR8FmQA!nQC7 $$QV%{' );
define( 'NONCE_SALT',       'rAL:Utr{mZx2-,aj-|^:tDa`}&;vRA_,vL@Q?h~5Lcqtc8lZe_u_[l;Z.9Dg626p' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define('FS_METHOD', 'direct');
