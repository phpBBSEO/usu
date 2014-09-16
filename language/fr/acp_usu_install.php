<?php
/**
*
* acp_usu_install [french]
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
	// ACP
	'SEO_RELATED_TOPICS' => 'Related topics',
	'SEO_RELATED' => 'Activer les articles en relation',
	'SEO_RELATED_EXPLAIN' => 'Afficher ou non une liste de sujets en relation sur les pages de sujets.<br/><b style="color:red;">Note :</b><br/>Avec MYSQL >=4.1 et si la table des sujets utilise MyISAM, la relation sera établile via un index FullText sur le titre des sujets et les résultats seront classé par pertinence. Dans les autres cas, une requête LIKE sera utilisée et les résultats seront classés par ordre de publication',
	'SEO_RELATED_CHECK_IGNORE' => 'Filtre mots ignorés',
	'SEO_RELATED_CHECK_IGNORE_EXPLAIN' => 'Exclure, ou non, les mots du fichier search_ignore_words.php lors de la recherche des articles en relation',
	'SEO_RELATED_LIMIT' => 'Nombre de résultats',
	'SEO_RELATED_LIMIT_EXPLAIN' => 'Nombre de résultats à afficher au maximum',
	'SEO_RELATED_ALLFORUMS' => 'Recherche sur tous les forums',
	'SEO_RELATED_ALLFORUMS_EXPLAIN' => 'Rechercher sur tous les forums au lieux de rechercher uniquement dans le forum en cours.<br/><b style="color:red;">Note :</b><br/>Rechercher sur tous les forums est un peu plus lent et n’apporte pas forcément de meilleurs résultats',
	// Install
	'INSTALLED' => 'Mod phpBB SEO Related Topics installé',
	'ALREADY_INSTALLED' => 'Le mod phpBB SEO Related Topics est déjà installé',
	'FULLTEXT_INSTALLED' => 'Index FullText Mysql installé',
	'FULLTEXT_NOT_INSTALLED' => 'L’index FullText Mysql n’est pas disponible sur ce serveur, SQL LIKE sera utilisé',
	'INSTALLATION' => 'Installation du mod phpBB SEO Related Topics',
	'INSTALLATION_START' => '&rArr; <a href="%1$s" ><b>Installer le mod</b></a><br/><br/>&rArr; <a href="%2$s" ><b>Réessayer d’installer l’index Mysql FullText</b></a> (Mysql >= 4.1 utilisant Myisam pour la table des topic uniquement)<br/><br/>&rArr; <a href="%3$s" ><b>Désinstaller le mod</b></a>',
	// un-install
	'UNINSTALLED' => 'Mod phpBB SEO Related Topics désinstallé',
	'ALREADY_UNINSTALLED' => 'Le mod phpBB SEO Related Topics est déjà désinstallé',
	'UNINSTALLATION' => 'Désinstallation du mod phpBB SEO Related Topics',
	// SQL message
	'SQL_REQUIRED' => 'L’utilisateur SQL n’a pas assez de privilèges pour modifer des tables, vous devez lancer cette requpete manuellement pour ajouter ou retirer l’index FullText Mysql :<br/>%1$s',
	// Security
	'SEO_LOGIN'		=> 'Vous devez être enregistré pour pouvoir accéder à cette page.',
	'SEO_LOGIN_ADMIN'	=> 'Vous devez être enregistré en tant qu’administrateur pour pouvoir accéder à cette page.<br/>Votre session à été détruite pour des raisons de sécurité.',
	'SEO_LOGIN_FOUNDER'	=> 'Vous devez être enregistré en tant que fondateur pour pouvoir accéder à cette page.',
	'SEO_LOGIN_SESSION'		=> 'La vérification de session a échoué.<br/>Aucune modification prise en compte.<br/>Votre session à été détruite pour des raisons de sécurité.',
));
