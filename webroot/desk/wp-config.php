<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rd_desk' );

/** Database username */
define( 'DB_USER', 'rd_desk' );

/** Database password */
define( 'DB_PASSWORD', 'gj1hm134' );

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
define( 'AUTH_KEY',         'MI[7,NZr ]Z/ W?}>L_Ra/lX6b|JMOA7JeghUIDUsS2exv*?_gO^Om@X2%9zToN+' );
define( 'SECURE_AUTH_KEY',  '?#>+CL,4U$?YMYS5*z%9(Je%e6`S1`-|c3[ ~_qFyDD:E5~6InYnp2_U%;qXF]iO' );
define( 'LOGGED_IN_KEY',    '74WbG`s,Qm{;.1to^4&_jz*ag_*/~ nj)q@^5nOp86i#%fqb(F=29R+,.c9t(#HG' );
define( 'NONCE_KEY',        'T}PBFRv-zr~X$lJ@]Kqj9ub(~@}A(d7X%jV>sM^wbeCxj`8Grno<VdbPxZbywR;P' );
define( 'AUTH_SALT',        'GWxc%vYS[ZP[S3vwW?pS54mai,LzRz pO2Rs!A{wK$:K8m2`l@JX`QvrPJ^?o.On' );
define( 'SECURE_AUTH_SALT', '6;d{?NXC?/~f`.X5xgg?{YHhfF^PL=Xa|oSm`OT2)1:98t)/+kBdsYzflF5Vy-Iy' );
define( 'LOGGED_IN_SALT',   'X!nW~S;jbH2_J}J}$r/:}vd!t{f19Z_c))7k;,@[KJ[lewaw6JQ~ME&i=dXFh0;[' );
define( 'NONCE_SALT',       '@P mmn~XW|G/ L:pZHJXcdG~u^W/7>;?U#:/p9XLg9 mOk8quaa8 :DZYXt1hTW<' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
