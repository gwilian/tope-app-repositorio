<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'word_bd' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'word_bd' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'azGK4xYfMjFcXkME' );

define('FS_METHOD','direct');

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'd9m8D2i}#:5%1vA3AE#>k3hS|M4N-BS3)^M{VoP,GCp/CD{cyX%W~Ba:Xt!4]=+t' );
define( 'SECURE_AUTH_KEY',  'UKHf2( jgpoEMPPx!pwK?9OUMUi2=xpB0snLmqS[?.MR!pZ&W)pFkdA@dw;%NAEp' );
define( 'LOGGED_IN_KEY',    'HLyVjKGUs359~!0[=amg(aJVI_IpT-u3,3Z5kvnT1bte(]An.MEr#*N%,3VfB5BP' );
define( 'NONCE_KEY',        'aFyb^j&Ms;ev@<l{_G.GZLtI8{.Lw1D^&ojN.}i$(ehz,j?+q58Wr~U-|3(5GREy' );
define( 'AUTH_SALT',        'MWpP7[6Z$4mjH&^@JDN.6P)~QJ$NLc_?a?u;eh#~,ytN3=a]-+i5oGt80yK`i.1a' );
define( 'SECURE_AUTH_SALT', '(-e6l^NH/?F<tg+t[]]|X;YX8V^>-F56ejJfwne;AGZ-P?X@9S,jwU$(<w2]|/[h' );
define( 'LOGGED_IN_SALT',   'Omh{]^ANYXLXyJy%o}toHzm4/)MFHP[k*Z(Qq=tL~M%CqeMY4$=HNx@-[$O^dq~R' );
define( 'NONCE_SALT',       'wvJj XO%&s#{bN;5D+kDh<%|U-<1l@[Yr[HJe<2ds>x3R>8y(_LwT8?805p~,zh0' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
