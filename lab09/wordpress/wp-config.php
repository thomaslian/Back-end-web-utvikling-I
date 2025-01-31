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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '^|~72s/ th-g4/`2(@e d[qI@BoFn7>;T`|QlJ511i2fng{:`YjJ>Ts^`&x_S<W/' );
define( 'SECURE_AUTH_KEY',  '?tlTo#h(fkwP[`dM+sJ-7`Uz[rVKew5,qtW$r]W%xoKQRzT_4BQQdbp Xx?n%ro`' );
define( 'LOGGED_IN_KEY',    '0P_>A!~@UilW-*W%V:-4$2h^E_6Kg$u(=x>%5f=Xd(-T4tW=f]l;rYW):m9~D(AG' );
define( 'NONCE_KEY',        'rWB<taMXF9n[]QK,3^EHw<e[Vp$67e9@e#Sf;%DZ;_C:Eef_f7Bv?1~O!>;%|/pa' );
define( 'AUTH_SALT',        '(=EK/WT^H#RmJ,3%fny{@k8KF5k4c6&Ru`X!)1UV,l`v*0q:Ig}B)rAwlrY7e_/{' );
define( 'SECURE_AUTH_SALT', 't)at<UaBF5/IPjT~I`gI5Sov;mS1YQ^._lWk@LgvN#iHMt^D*c9qbG%AF)`_M]kV' );
define( 'LOGGED_IN_SALT',   '{Uqy9& tqsutvM/JYoA,9U;ue>|UDo5e6S?8{KtpI>JwDWW9m@nOBu2&+K3JV__U' );
define( 'NONCE_SALT',       'q8tuG;8v[W(gnF(aq;5T2f$+kExrKet0e/Edr@0gS!p}zwXa;[k2a9R@/YD!}(,=' );

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
