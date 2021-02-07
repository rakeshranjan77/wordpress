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
define( 'DB_NAME', 'wordpresstest' );

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
define( 'AUTH_KEY',         'ky@JZr*e<[,9s(.M4nyJ>eqqfz<OwW6EHsZ5HVymnr=#7-BB1G<TXvoq5=Tvx,+g' );
define( 'SECURE_AUTH_KEY',  '+*QTZ_r6>CT.}IgBO9]0xzU,Gd$<<EVJ1b+?zHe+nA14 Na[q0-^2o6}m5<|Z%Rz' );
define( 'LOGGED_IN_KEY',    'dHdbT>JW8L7?o47a<G}R)H &HrZyy~&ZhvMq3]21,k85#13{.nP[?J{A$&G7ISY]' );
define( 'NONCE_KEY',        '^HA`PX<x evTVooWLaU3!I2{w|L#@M%e@@|a,!HX1_Xv_W=4AhO^ vuF9]7/XXs~' );
define( 'AUTH_SALT',        '<xV.(e^3#i=36A`O%VB%C60E$=m1)K Ah7M=LF/#vant}4)8(r>r{E?u%?QM_LDH' );
define( 'SECURE_AUTH_SALT', '>7l rgz%;^HBI5AhIH0GZOl?xS!H#U(v?Ax`2u%vd^:Qq]`V0)qaeIEC<Sq&)hau' );
define( 'LOGGED_IN_SALT',   'PIs&^VYe.Wjj+)6w 7o}rp?@d@>yF_`lG>{{={qr;+!J1QR{cmQzW%gy2-@&UNS#' );
define( 'NONCE_SALT',       'BLb]f}B4,(;6yK:IaxP]M~Z4}}j-N+b.by>-zX/i{Oj*-RopQw5I>9TUkoN(pF-1' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
