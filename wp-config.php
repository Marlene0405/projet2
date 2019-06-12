<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'Zumba' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ynn60fu*`@z CF@G>kVI[IH/ j1B8v<}b-[6{>#B<[,_]KcTYtf#GW0hX!^#UuE8' );
define( 'SECURE_AUTH_KEY',  '`MgXvn(y6r7e/`c;8Kf~~JHKax^wVbsH+pTY@f&u1m?~4WLW6F@dQMV^7mBz,5h5' );
define( 'LOGGED_IN_KEY',    '4E0`he,?=M4^vR1m3t&c,@Q[C$RCwRT%!t`Qb)$#0eNtnyDDXnXLX RWDf_J-c0B' );
define( 'NONCE_KEY',        'R)a{]yl.L2T!$O$+@(=3}Ac$/_In`HS;EZHQdS$xwQIg:`z>r1x;+Anm^g3u,*oU' );
define( 'AUTH_SALT',        '?4e9:KWP1y*!e?%#&P^?Up:jYDtnZWd_0o/l|hv}$!2&k[ZoXbaIUYv)EW6{1IR[' );
define( 'SECURE_AUTH_SALT', 'bVmqC&o{gnP`a;pdz5HB934q#TLt|vo2&CL%+K1K4I?q*fx6i:d3KdNOW3jO.=~O' );
define( 'LOGGED_IN_SALT',   'zmUXqWs(|XB2eSFP:frkYb{-v>=d<y7gcu#U`SX&q60wgYv0`K@O0a.StenN)0(9' );
define( 'NONCE_SALT',       '@~m(O[[Jw#FI,p <.0B?aG<u8CY4>ucPvw@cQwd`c+W,mkcYhHiepexog>>]lVze' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'bmm_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
