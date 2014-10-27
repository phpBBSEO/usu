<?php
/**
*
* info_acp_usu [Italian]
* @package Ultimate SEO URL phpBB SEO
* @version $$
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
/**
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//
$lang = array_merge($lang, array(
	'ACP_CAT_PHPBB_SEO' => 'phpBB SEO',
	'ACP_MOD_REWRITE' => 'Impostazioni riscrittura degli URL',
	'ACP_PHPBB_SEO_CLASS' => 'Impostazioni phpBB SEO Class',
	'ACP_FORUM_URL' => 'Gestione URL forum',
	'ACP_REWRITE_CONF' => 'Configurazione server',
	'ACP_SEO_EXTENDED' => 'Configurazione estesa',
	'ACP_SYNC_URL' => 'Sincronizzazione URL',
	'ACP_PREMOD_UPDATE' => '<h1>Annuncio di rilascio</h1>
	<p>Questo aggiornamento riguarda soltanto la Premod e non il core del phpBB.</p>
	<p>Una nuova versione della Premod phpBB SEO è disponibile: %1$s<br />Visita<a href="%2$s" title="Argomento di rilascio"><b> l’argomento di rilascio</b></a> e aggiorna la tua installazione</p>',
	'SEO_LOG_INSTALL_PHPBB_SEO' => '<strong>phpBB SEO MOD rewrite installata (v%s)</strong>',
	'SEO_LOG_INSTALL_PHPBB_SEO_FAIL' => '<strong>Installazione di phpBB SEO MOD rewrite fallita</strong><br/>%s',
	'SEO_LOG_UNINSTALL_PHPBB_SEO' => '<strong>phpBB SEO MOD rewrite disinstallata (v%s)</strong>',
	'SEO_LOG_UNINSTALL_PHPBB_SEO_FAIL' => '<strong>Disinstallazione di phpBB SEO MOD rewrite fallita</strong><br/>%s',
	'SEO_LOG_CONFIG_SETTINGS' => '<strong>Modificate le impostazioni di phpBB SEO Class</strong>',
	'SEO_LOG_CONFIG_FORUM_URL' => '<strong>Modificati gli URL del Forum</strong>',
	'SEO_LOG_CONFIG_HTACCESS' => '<strong>Generato un nuovo file .htaccess</strong>',
	'SEO_LOG_CONFIG_EXTENDED' => '<strong>Modificata la configurazione estesa phpBB SEO</strong>',
));
