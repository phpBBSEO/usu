<?php
/**
*
* info_acp_usu [french]
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
	'ACP_MOD_REWRITE' => 'Réécriture d’url',
	'ACP_PHPBB_SEO_CLASS' => 'Configuration de la classe phpBB SEO',
	'ACP_FORUM_URL' => 'Configuration des URLs des forums',
	'ACP_REWRITE_CONF' => 'Config Serveur',
	'ACP_SEO_EXTENDED' => 'Configuration additionnelle',
	'ACP_SYNC_URL' => 'Synchronisation des URLs',
	'ACP_PREMOD_UPDATE' => '<h1>Annonce de mise à jour</h1>
	<p>Cette mise à jour ne concerne que la premod, pas phpBB lui même.</p>
	<p>Une nouvelle version de la premod phpBB SEO est donc disponible : %1$s<br/>Veuillez vous rendre sur <a href="%2$s" title="Le sujet de mise à disposition"><b>le sujet de mise à disposition</b></a> pour procéder à la mise à jour.</p>',
	'SEO_LOG_INSTALL_PHPBB_SEO' => '<strong>Installation du mod rewrite phpBB SEO (v%s)</strong>',
	'SEO_LOG_INSTALL_PHPBB_SEO_FAIL' => '<strong>Echec de l’installation du mod rewrite phpBB SEO</strong><br/>%s',
	'SEO_LOG_UNINSTALL_PHPBB_SEO' => '<strong>Désinstallation du mod rewrite phpBB SEO (v%s)</strong>',
	'SEO_LOG_UNINSTALL_PHPBB_SEO_FAIL' => '<strong>Echec de la désinstallation du mod rewrite phpBB SEO</strong><br/>%s',
	'SEO_LOG_CONFIG_SETTINGS' => '<strong>Modification des réglages de la classe phpBB SEO</strong>',
	'SEO_LOG_CONFIG_FORUM_URL' => '<strong>Modification des URLs des Forum</strong>',
	'SEO_LOG_CONFIG_HTACCESS' => '<strong>Nouveau .htaccess généré</strong>',
	'SEO_LOG_CONFIG_EXTENDED' => '<strong>Modification des réglages additionnels des mods phpBB SEO</strong>',
));
