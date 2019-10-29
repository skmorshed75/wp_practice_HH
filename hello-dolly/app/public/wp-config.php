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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define('AUTH_KEY',         'oq/HITX//+hW7FILOgXjJW/P6EvE6IDILh2gKv6UzRNzlX7ohEBBZS1pqqjWEBj4BFHAr8mNl2l59dh4lsEaRQ==');
define('SECURE_AUTH_KEY',  'ocKNtrp95Ob1jAV10i3ZEABhrSg/cAT/S7OM+jwN6ECCAmy8g0M/CRWjTK/P6zzFcLgT0TRWYIORnLlCXWQWOA==');
define('LOGGED_IN_KEY',    '8xWxLIsTEtH+oO2C7O7mZCM49lvTStR5xywn7BIB0uz9t/RWi0V6P3/zNSkGOJxtluaamPMEw8coQxeqa7fJHw==');
define('NONCE_KEY',        'XZzQ3D7ipOcLc2s7L2K8fNUr5yK10GVH5mcq5VW1xDtPouGkOBQVkXyrfrvtoVZJbkyoSt9keJ+QXerkq+fZAA==');
define('AUTH_SALT',        'j6ejhCZ5sVmdJrc7uCtcAOpcKoSPSKVjH1HJoprHgrLHHSVK4q2+SPgiONl2Cwry26lesTVUlE2FcGe/eMSQAw==');
define('SECURE_AUTH_SALT', 'k67owzpopg5vfo3m3gcBw+8cSQsqay12A2DWXhuL55dlzowhAQlRas6+g/qH0xf66S/S/lGybnCJFrcWJhTT4g==');
define('LOGGED_IN_SALT',   'E7vR+mzu2lIbol3BeSXgjobsXnbsTXL8KegaHQIsZ5qTwyqWC3hfwhlln3JoJf72UOA5nJtUUdr0mgISANj8EA==');
define('NONCE_SALT',       'oxAED+n2e1NQyr1QDcWh7v36LbHR8q0rh4nwb/s7cLgKDv4lrDlqWw7L+pXm4ZGqlBkgL5Jiptg9ElTaQRDpBQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
define('ACF_EARLY_ACCESS', '5');




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
