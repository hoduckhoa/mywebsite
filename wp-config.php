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
define('DB_NAME', 'thuyviet_data');

/** MySQL database username */
define('DB_USER', 'thuyviet_data');

/** MySQL database password */
define('DB_PASSWORD', 'fdvo0ZUk');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'aNyF,z=l`o4jwTL^*vYfJ24V_srq8%aLK}{[TcT{QG`WLv8Y:<}^6%$+F8?]mbz+');
define('SECURE_AUTH_KEY',  'JcwngoUh%S)YHQ$P|5D_L@P]w9+:YY{2wn@`qW3._5ZBn&#>8_{_w{!{) N-uI+/');
define('LOGGED_IN_KEY',    '8%k4f7%{|;yvvBF}RwM~ktoT0l{p`=zbtaP.B8h4;Bpm$1X16c?7&~_o19=H;?~^');
define('NONCE_KEY',        '5]?)`_O@dfqdbi$pJumS9|-5Q8g}`b/DAit::IM=Amsv{b_g]-fP-rXx$:Q|a>bn');
define('AUTH_SALT',        'gOj%-ha2TGLs$!^qYiPf-hW~<VtVB1wU3N:8iqaVkel!-)@zDCh-V,0$R=sqlzv^');
define('SECURE_AUTH_SALT', 'g(8c*JD!/i5FRWt|H{Na~84h~^h|3-VnW]7>4`XBCFJR`X=OZ#r(So5X<2fGgK-?');
define('LOGGED_IN_SALT',   'Mbp8#.)pM8Fyt82([Lf7RZB+:0|I8sl,qHh8Djyf>+c}(+0HQr$g|WZA^-*9oajE');
define('NONCE_SALT',       'x/;<p,z8o+GbdGqV?&OmFv]Ef0jE8;]pF2:4ND3&3w/u_,GJfh7!{4,:f[CIlf6^');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
