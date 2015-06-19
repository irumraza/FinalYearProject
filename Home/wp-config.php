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
define('DB_NAME', 'u872816773_ubyhu');

/** MySQL database username */
define('DB_USER', 'u872816773_yhaze');

/** MySQL database password */
define('DB_PASSWORD', 'aGaXyZuSeV');

/** MySQL hostname */
define('DB_HOST', 'mysql');

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
define('AUTH_KEY',         'FuKHqm92iRZN1cQMz1xfXHb8h7ECni7M4f7GNmgxCkkfKyo2CjGRHOkAG1QGa1Cz');
define('SECURE_AUTH_KEY',  'pWibBFNdMrxOC3CtM7eJ8baZIgzVrmU0j9QOFzhIdY8WlgcOj0JnRovlt25U2EWq');
define('LOGGED_IN_KEY',    'Yc0wcvwKrs8GNTxifieX5eyfOXOebAflgO2hS3JPeXdS2fFzdMNLYjD4aJP4k42A');
define('NONCE_KEY',        'cSCRB5V9AxlXZpMoW6WKoM4NmViFj6aDwOVO9xhz6vp6gDgHpLE5RL9RwoeSzTMI');
define('AUTH_SALT',        '8ZAly6r9RPZGASXI3BZxNrXuB7LRGLVIZxHhN4C6rqJZnDUmOe7kgovlie2CupFo');
define('SECURE_AUTH_SALT', 'Qcmo8l199SsUpKJ9DX1hJpkJ3pRyLVXlAIAB3uJYP1yK0dBwH6Jv0Rmg7mHb6JPv');
define('LOGGED_IN_SALT',   'oQIz73nOkk9v5ttvfV7o0nWJs1WlBlmJsuPhF32bK5nnz3UQmx0p02PrqBd7Eud4');
define('NONCE_SALT',       'JarNpuWefX4wuq7ZijxwaX3BFm5OZCKyX9A61EtQEXh4Avr9v3QiWgczkpKLlWhj');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'lkd6_';

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
