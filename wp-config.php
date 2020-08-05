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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'carolinamontagne' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '5},BTrlo#)R@}Gh+*IY9lr$i(3kfp,ROXqx|d(uCLk`0/2Sx#Jdg[KRx;$45K%mN' );
define( 'SECURE_AUTH_KEY',  'M,|FIs+]jiMgAcec;l5IhN`_728jrXs?jk886-U`K&P/RQz{e<q? ,S!#9 RU?c4' );
define( 'LOGGED_IN_KEY',    'K#@_}a75N+IBvhwCG~KJVPDJ6-rVVInxh]W_yU/:uRw}K}6BbG)to)F[6G$%Nz8#' );
define( 'NONCE_KEY',        'CsE00zzjA+_ci9`T/J@eTqM&|lf{s],cTjj~1v(Z+3-9N$n#A<~([j6mm_.0Y1S;' );
define( 'AUTH_SALT',        'Xm.VLIAN  ^A/s69=2;Z#&AbEPRn9|!c$nA*r-<LZ%I^evJi+AIpv7M]7XAcw0^P' );
define( 'SECURE_AUTH_SALT', 'abXe8sd1D`7fxIZ?>hcCf0sc_>!(LVAmuznFOM^Sg>dj1%dc-{@;I4]TsiaKR(4|' );
define( 'LOGGED_IN_SALT',   '|qAw2>ioHj6D?, ]FauG58E!U8X7#7yU^I&Bat/PybVzwQ:k8mXJ~HrT>{r3/.Nq' );
define( 'NONCE_SALT',       '%JI1{YJa1^T)5QWik9Fe7z>t1t7^]FP|<(,}.]``p6kqL<yG+9LCvy0?-x6PIvcM' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
