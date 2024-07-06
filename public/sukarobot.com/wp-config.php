<?php
define( 'WP_CACHE', true );
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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'n1606904_wp269' );

/** Database username */
define( 'DB_USER', 'n1606904_wp269' );

/** Database password */
define( 'DB_PASSWORD', 'p3Sf(b.6E0' );

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
define( 'AUTH_KEY',         'mt7q2kelvwz3oezpj2grzsocb48xmdffg1hhink14e3lgmshfibkabz6sr9v48jc' );
define( 'SECURE_AUTH_KEY',  'y4h3pmqoprd0oixwt4nyfxm75rum346tcsu5kfrdxbxqlddw23a5ra4kclgofshf' );
define( 'LOGGED_IN_KEY',    'wrk8oznvxninz2mzfe2y1lwnu6bs5m66kxpshugqrj71et3hwkt5mcadvygj4vpa' );
define( 'NONCE_KEY',        'dvu1pqp9ksxi237ohews6mend8egh7iuf9wy2rojblzaiszc0yzf6pkmloqekto0' );
define( 'AUTH_SALT',        'vhiwynogm2yqoihjgp7sdbf2br0mh7e5cgwjeeve3wdy9h6wn7rpuz3st8e1yttp' );
define( 'SECURE_AUTH_SALT', 'k5trxt0urxlhsxlmkctznm4dwjtop9sovfhfglx4j4n55ixkqrvnt8fkz43mufj1' );
define( 'LOGGED_IN_SALT',   'oucjqqjiricdhqen1rcyggkgfbvgs7easahtsgjeh5b8npilf7tcf3o0bwkqbhv0' );
define( 'NONCE_SALT',       'xy7r6fo05jznrva4l4mzbkpazqogsitg0npdr4h2mkhbf486kvc1g0h8qvopipjm' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpzl_';

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
