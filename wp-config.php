<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

//define('WP_HOME','http://127.0.0.1/~ariera/websoa');
//define('WP_SITEURL','http://127.0.0.1/~ariera/websoa');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'soastaff_wordpress');

/** MySQL database username */
define('DB_USER', 'soastaff_wp');

/** MySQL database password */
define('DB_PASSWORD', 'D1io0fKc6d1(');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '&Vev<gsd=qg*|zY6Q~Vl(bw2~+RT|TtOg>5-MyxP-Oqg^C;hZof!)%9mY|P~tF3C');
define('SECURE_AUTH_KEY',  'O(JUp9N^*,x3.}xWBCD+>7t`;D|f8WqTdyf40w&{]_3O.1$:Z6&ia(%nEdODDyw/');
define('LOGGED_IN_KEY',    'ml2{>m@S{qCObfa.:p%11>  }<t6EKdjdh&{Py}/||N,$&$4u5&NEZ1vqxCv$4z;');
define('NONCE_KEY',        'vo4snF:H~{NzI>aMR+T{t~&8#rP2~oAzc9hjH0Fuohr6phtJGe[N&BOLU.Q&jgIL');
define('AUTH_SALT',        '>Uwzd;9XWOA^h5*++c6i-u:f{6Y.zfNo-:EDH%+aoa|@kwL`x?QlP5 {8NGX_rHV');
define('SECURE_AUTH_SALT', 'lp{M7@b&@ 6bAN=QK|ZF$|L/FCDnXgZmM:q-FoVPeHMe|R.{` EoQJl;-aCyn3Px');
define('LOGGED_IN_SALT',   'r8+GW],h+QtGv|1Lxam.;xCg]DCIMFfV9Jb92$yWB9OXQQ)ggLB|k|H@%`x9F6{V');
define('NONCE_SALT',       'Z~KlX$B9QIU*(x-7$eD:))P}*X) [X2NErcFk $>Hjg%_ ;e+Ywk!wUK Mu-%Ke:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
