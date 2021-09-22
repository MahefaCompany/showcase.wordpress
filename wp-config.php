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
define( 'DB_NAME', 'wp_test_1' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'u<&-&}fftrNEp?uf0&`_EtWZAAao %3;}hN|uV_@U[Tx^<pz=g_&R@?@;>`UO<yj' );
define( 'SECURE_AUTH_KEY',   '1ydYcr<+;%g=i2D;i%gPJorC.5Zf34y>YM;K3[[IAF-_wcLyX|XpmF X]h]CwB3.' );
define( 'LOGGED_IN_KEY',     ']i+33^S0sLG~HPZrA6}<C[*hE$qDN?5zF6=ZJk,De4k^LO>nOk|:6y3+ <M[4$)~' );
define( 'NONCE_KEY',         'xLnm3c!SB3KZnBHNaU.W.SZc0&=30+60e-W20{i7^>.BWS`!J$(_rH|*#6Q*Q2T$' );
define( 'AUTH_SALT',         'PJ-f26m;s`-)In7My(FMVJUykcPP$63ecYh_v EX.~IcH@sU/;de:-p6Z/v?/X{i' );
define( 'SECURE_AUTH_SALT',  'x_8~wu,E.R)M6Zn}gc5IkTuS&y*,=Z_<_8?+O&cN%FdwGqyn:_iY9=vqfV:WlM95' );
define( 'LOGGED_IN_SALT',    '[d1;wf:IPGK6/92[1wVV,%&=YnOZZJmp3X*{Ou,;YUp.x<^~UQzO=.{-GD@ZbjQ$' );
define( 'NONCE_SALT',        'T6DOm/IHQe}x 3OQCt~JgE(zv,{G7=[Y)y-RNMP.WW]CXc28!XpeKAviq9 E ;KM' );
define( 'WP_CACHE_KEY_SALT', 'wSZ5%fG#uLnpx|X5oHv+3?JFZukwSKY&)nL^}!L(GaFElHry&*+Mj!f|M;,;iW-]' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
