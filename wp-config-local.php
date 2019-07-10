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

define( 'DB_NAME', 'regenmed' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '>)c}kG 1m|{Hh[q }0S0?+XWR]=};~kLI%ea0nLBq*4/9Du0J@lq:+FdFd&AbHaA' );
define( 'SECURE_AUTH_KEY',  '^r.[$`e>DQ5-6FUGF,=&sLN+hlECBi$V,tPRW<G?%`iu#`(x8J?S2Q90?}#eP,wT' );
define( 'LOGGED_IN_KEY',    '4z%>3d=y;} <W_/FO73^F.Ime]J7aH 7sNKWD!eF)C/NH}&$Twy?cjt%o}M[[yLl' );
define( 'NONCE_KEY',        'pqK6D!9]$e,oZio.9WT1h9zJN;f>v$YE~5K{G/A|E1:xYq`T|;ETYvj/sDg:Z[45' );
define( 'AUTH_SALT',        'Hg>F|pDsYXrEIw~`yt&//9}=NeZ2$c13ZfQ~hBol:@b4*W_o:%@yFvzP~wR8b3&?' );
define( 'SECURE_AUTH_SALT', 'tRWg,Vnm2o<^Zp_dFj}GeStQ)V^]*A W~TAJrdnLf-*8Ak0?&u805j@nJi:s5Qcg' );
define( 'LOGGED_IN_SALT',   '*,.-:P87QKgk_~qI%Jz^3(aIp9l*&,q]jqmU[>j3 %k!r6[%0,$:;2jy%JZi-A{N' );
define( 'NONCE_SALT',       'lOgN%bduPujn!-#|E]!W(r_uPJ,h|5}|&bt#/wZ~/yEy177s~2Oc-au:aqiN+rK`' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
