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
define( 'DB_NAME', 'wordpress_gitperfume' );

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

define( 'WP_POST_REVISIONS', 3 );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '>v?Rf%le8js~9D>DufRpF+.R@!IJO10,y8uSWVoDsU7~ TgpdF8w-Z+3Ge4Tx$Kb' );
define( 'SECURE_AUTH_KEY',  'ow07TZK+ncDQgzf?S9K+t87DQO}1b[mx$|Qe3VcGo&6<x(LE6sxi^/mv]^}f82><' );
define( 'LOGGED_IN_KEY',    'Eh/R)`-h~fr2p5.=H.}dpd<O{*y_Cp_iSm%W=gPA_[u^81OWBe2W4&.L2UTA%`bA' );
define( 'NONCE_KEY',        'qo>Yk%eB#)/+3OrWQj)q`s6}O!QGLJ!*,ZCT%T6AD{mKBoTwS43`,ON#my7-TKq]' );
define( 'AUTH_SALT',        'aGl?_fj3Q.81LZ>]YW3oMC,@(b4mRWz]/dajWstf<p;oU|xmLQID[U,J@;s+A1g6' );
define( 'SECURE_AUTH_SALT', 'o-PV}U-D6in=XT6sy6Hg[*K{9e_K!6PShs3?>C^22VYjsJL++*ukt<Jkd?CfkYs8' );
define( 'LOGGED_IN_SALT',   '1}<-wj$6J5zXfy8A,jIOgN|`w2P|{^P!f*?dNgA*u6{ib3JX>>,<6s=qz>:DhhqR' );
define( 'NONCE_SALT',       'QcUFT{[+W#;3lj5~.J3qHO[%e{=)ce6e:o5%+qrN2p:PwB`) 6+ptL&/8hYNi&:y' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'rfu_';

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
