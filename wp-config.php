<?php
define('WP_HOME','http://wordpress:2082');
define('WP_SITEURL','http://wordpress:2082');
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
define('DB_NAME', 'atp_db');

/** MySQL database username */
define('DB_USER', 'tung');

/** MySQL database password */
define('DB_PASSWORD', 'tung');

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
define('AUTH_KEY',         'LwM4=SiNb;g-Sj{Otv/6@qw~ie|4BUw0EW|7;g;|FE{e_vjl3`.p@e#TK:F0N=6z');
define('SECURE_AUTH_KEY',  'UWo}0~X+i<5|iPop%5K*wilQ[(?sPe(M*-D3**}4`y0XGIWn=%^3uv/v/:Iv,~PK');
define('LOGGED_IN_KEY',    'r<)(]>}q0un~AX}W,uM@*h|TK1K|g6W2Je9PiTO[ z@UCh@8Qp]Q^FXOlN*R-n*L');
define('NONCE_KEY',        'f],,06[~R=+MoS`#4a=4?7b0eIUq`uM~bHw%s(+ZMV;{,=ye~aN>/}r{mUJ?r%Nq');
define('AUTH_SALT',        '@.u{dI.|a#|A!|n|W9&5*uDbeBCQ]#@AHTkqh`=]/4-pevmKSb|--M8R#_1$X{l4');
define('SECURE_AUTH_SALT', 'G^fCr:SUnS=3{yhbpC;Qh8K<d;A;zr:M-Cyb9>eFoc]LX_>jGiB+Xf<B_Gfv1Gu<');
define('LOGGED_IN_SALT',   'g}@$Q+kdrOa|Kg8HAS[q=BmZB^&1Jv&q_?@^piwxghQx>wyM,{lf49pvQ/+=3g^n');
define('NONCE_SALT',       ' q=F[L{8n%#Tx(57@cm{GugB;6}`]4L?;>AZxw[w$j4C}lOJ!rYEFiC|hS.f5{; ');

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
