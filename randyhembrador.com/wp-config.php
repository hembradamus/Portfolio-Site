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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'randyhembrador_com');

/** MySQL database username */
define('DB_USER', 'randyhembradorco');

/** MySQL database password */
define('DB_PASSWORD', 'DRyVytfp');

/** MySQL hostname */
define('DB_HOST', 'mysql.randyhembrador.com');

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
define('AUTH_KEY',         'Wd(SLeIf6!~to%lcM(m^VHVqcKlV:NAP@`FM|!ukT@Un"qDk_*3d7Xxa;&TThhxp');
define('SECURE_AUTH_KEY',  '_x1mvjF*SN&q!*nPbnKN;&!i"Y)pvpgf%7`mlI3Dzmq8DfyRq0pbo|PhjQ"_3~5D');
define('LOGGED_IN_KEY',    '8agQePXUwg|h@sS+nDyvF/RpO1F%BWdT$D"a5@(M):rds":7W666xM0Ff)#AXZaI');
define('NONCE_KEY',        'HGJSJR0wC|74PK|pCX/+n&tAI_I@*(F)Pz&QIflLz`?T?)ZK65B328+zjn@ulEOq');
define('AUTH_SALT',        'V~Ma9ywNo58?0l|qRy&mxysO4Le`EcTEALQ2rO^i~pRLJF)A%P;w_Ox;WU4h;iWl');
define('SECURE_AUTH_SALT', '/!L~yM@FWu_:plBhV5K5qH+(%`lGZ(:Zd1YcBJdEnY~7Y;jVNiZj12;*$q`5"i/h');
define('LOGGED_IN_SALT',   'wYQ*VuEFnJLJKZA7hpfP%J3%PzjzR0*hYq!vm`4_$bI64!a)?Po%!;a"jv%Pr;/%');
define('NONCE_SALT',       '3tmJr1lpzYtc|$27j(OCN&TPZ`rPq(k@UA:a4d*QM?vSYHZvfY8Q@NUo@KTtI$?#');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_3dcmwk_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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

