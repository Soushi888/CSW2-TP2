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
define( 'DB_NAME', 'csw2_tp2' );

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
define( 'AUTH_KEY',         'S^25}-1JZN()ZwQ]mXx@{YOHJa:yWi 3@Mc[SCkz5m#&71c):yWiu$t.oEr|VXD)' );
define( 'SECURE_AUTH_KEY',  'a=]!(OUG@Jf14_&7W16#zU[5qKOcm9UJ#6l69hqJ(!$T>p>dq}+pYi%A&ad#&}bO' );
define( 'LOGGED_IN_KEY',    '4XT*_CeI5xk]3qvNz*r,=A)]b6?F,Gw|X^;0XC>vnHm7|Drww8Ja%kzqP+4Qqz`R' );
define( 'NONCE_KEY',        '|eUASdANF5QI,U<v,xu!McZeE3X.xR^V%Nj+=jyu.]),x{a*i$yL|9BU9.I{8]VS' );
define( 'AUTH_SALT',        'YbAD-iRnpXAoiLf8Vwv*q;S:57YpPA7D$W_`A*.4}HV%kOn1#w>T#MA6=0IuC*~$' );
define( 'SECURE_AUTH_SALT', '6to?jLnVYH&e`:!0C!)jpi-3+j. ^v|b9je_8c#?-[T1tfl}}pwMx(vKOS@rr}6~' );
define( 'LOGGED_IN_SALT',   '?wU|i~DEZ7T.&YE||q{=GCARmN0:LPUYz[RbTztIKf)3a_jN=NXtPlgD$;oNgK8R' );
define( 'NONCE_SALT',       'UNTz;jz@pAV^`+IUFQtihJVLEnm8K{6]V>rXT{R?#`/?(dz{+=rXBS.jHYj$k|9F' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wptp_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
