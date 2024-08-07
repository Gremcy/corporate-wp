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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dbs9917588' );

/** Database username */
define( 'DB_USER', 'dbu1181582' );

/** Database password */
define( 'DB_PASSWORD', 'i8VPzmg#ce5^cK9$' );

/** Database hostname */
define( 'DB_HOST', 'rdbms.strato.de' );

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
define( 'AUTH_KEY',         '(sp_WCHOV:-UG<MfjcuZf@Ns(FFxU%o[%:9;ON5LNw)`[a;r(Syj|^:8taLKkof[' );
define( 'SECURE_AUTH_KEY',  ']CaX.{a$L%z<eM>_sU |qj~`_eCC,jnNxqy?&W^l7~#XR%Lc8<3j~}7-y,9``N1k' );
define( 'LOGGED_IN_KEY',    '-5?_+:RAax@F2D|BNVf9LsXO^{i2S h6p^7QW*A~M?#u+<,cXqt%icO/G?gfDfIB' );
define( 'NONCE_KEY',        '.|>AbgQmK| -![7 5e%@%[>cki3zO5X+N_rXWfX9#apbn2; 0w!mc02gBq;(Bw6,' );
define( 'AUTH_SALT',        'r,1qyC0%gw3.St /<c:UHn~six6n1Iqj+&UIcep^Gb^Mf%xu$U<ip/w%D)&D}DY=' );
define( 'SECURE_AUTH_SALT', '9x1i~!9 Ju&!qDb]|~Qf+X?LD[aK;I:2HEl>(mhhX;oBDr8zx0g5g+BcX`(7y,we' );
define( 'LOGGED_IN_SALT',   '~IkoW%s8x-2)DcgTRNgx`3TR@3H~|-H$^4UN7^gk*]<7-$t`?s}B;4+w^dmUlrq,' );
define( 'NONCE_SALT',       '9xMC~#1 l2)G>u% ~iH7)TwJFow0xE`iq*h6aNn38l8iR8Q&?|T&i*NU:-#![cgg' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'hcm_';

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

/* Add any custom values between this line and the "stop editing" line. */

// theme
define( 'WP_DEFAULT_THEME', 'hcmconsult' );

// general changes
define('WP_POST_REVISIONS', 0);
define('AUTOSAVE_INTERVAL', 3600);
define('EMPTY_TRASH_DAYS', 3600);

// disabling updates
define('AUTOMATIC_UPDATER_DISABLED', true);
define('DISALLOW_FILE_EDIT', true);
//define('DISALLOW_FILE_MODS', true);

// allow svg
define('ALLOW_UNFILTERED_UPLOADS', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
