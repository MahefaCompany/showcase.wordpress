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
define( 'AUTH_KEY',         '}iw8#^&})A2phk|xG;L5;W`QH<gnE3~[S#SnV!|xO9p|~DS$-PX!b6#^_{;z07=2' );
define( 'SECURE_AUTH_KEY',  'QZbV;{X*C`{h/|]c)jDk46 [23~pDPSs;GLTJ^I[WNQX63ni3VD@{fxstU/SE82R' );
define( 'LOGGED_IN_KEY',    'VC>Y;4(JvJom/#_o4.BVi>,aFYj0OyJ`eKKxjd{;.UqH{4/2x9mh/.9&2CZ8yOv4' );
define( 'NONCE_KEY',        'rd5pbq6tO6^9-73a(R=n9[tIOm}_.aldgJbw5Q.J> smEe@9!3_A`lQ@f:@c|#t>' );
define( 'AUTH_SALT',        'LtN9M_Y_2nuEzArx|GUTxH>db!-t60^bl8J~Bz8~N*2;[H&oQ:53]V**c?&FY9P]' );
define( 'SECURE_AUTH_SALT', '}[A0fMA~<0kfS)8*j,m2|if5?$haoU(Ol5wdJl]8-~Q6h2h~Z$nukQ%F_evR?t$h' );
define( 'LOGGED_IN_SALT',   'TvI~-b!-Jt0i5=R_r$0yQ{BDOTxRhKc2gKN!X~<-Y<1WcX|S_;@KwQgx?YQ-GK`@' );
define( 'NONCE_SALT',       '^KDWT7r01id!#f.hcmkVJV3/uTgtiy|`s4dg6Yl`-Cq9~aud~YAqd>8J%SJl[nQ~' );

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
