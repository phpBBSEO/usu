<?php
/**
*
* acp_usu_install [Italian]
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
	'SEO_RELATED_TOPICS' => 'Argomenti correlati',
	'SEO_RELATED' => 'Attivazione degli argomenti correlati',
	'SEO_RELATED_EXPLAIN' => 'Visualizza o no la lista degli argomenti correlati nelle pagine degli argomenti.<br/><b style="color:red;">Nota:</b><br/>Con MySQL >=4.1 e la tabella relativa all’argomento utilizzando MyISAM, gli argomenti correlati sono ottenuti usando un Indice Full Text dove il titolo dell’argomento sarà ordinato per rilevanza. In altri casi, come SQL LIKE i risultati saranno ordinati per data di pubblicazione',
	'SEO_RELATED_CHECK_IGNORE' => 'Ignora filtro parole',
	'SEO_RELATED_CHECK_IGNORE_EXPLAIN' => 'Attiva le esclusioni tramite la funzione del file search_ignore_words.php nella ricerca degli argomenti correlati',
	'SEO_RELATED_LIMIT' => 'Limite degli argomenti correlati',
	'SEO_RELATED_LIMIT_EXPLAIN' => 'Numero massimo di argomenti correlati da visualizzare',
	'SEO_RELATED_ALLFORUMS' => 'Cerca in tutti i forum',
	'SEO_RELATED_ALLFORUMS_EXPLAIN' => 'Cerca in tutti i forum, invece di cercare in quello attuale.<br /><b style="color:red;">Nota:</b><br />La ricerca in tutti i forum è un po’ più lenta e non produce necessariamente risultati migliori.',
	// Install
	'INSTALLED' => 'phpBB SEO argomenti correlati installata',
	'ALREADY_INSTALLED' => 'phpBB SEO argomenti correlati è già stata installata',
	'FULLTEXT_INSTALLED' => 'L’Indice Full Text MySQL è installato',
	'FULLTEXT_NOT_INSTALLED' => 'L’Indice Full Text MySQL non è disponibile su questo server, verrà utilizzato SQL LIKE.',
	'INSTALLATION' => 'Installazione di phpBB SEO argomenti correlati',
	'INSTALLATION_START' => '&rArr; <a href="%1$s" ><b>Procedi con l’installazione della MOD</b></a><br /><br />&rArr; <a href="%2$s" ><b>Riprova per impostare l’Indice Full Text</b></a> (MySQL >= 4.1 utilizzando solo le tabelle MyISam per gli argomenti)<br /><br />&rArr; <a href="%3$s" ><b>Procedi con la disinstallazione della MOD.</b></a>',
	// un-install
	'UNINSTALLED' => 'phpBB SEO argomenti correlati disinstallata',
	'ALREADY_UNINSTALLED' => 'phpBB SEO argomenti correlati è già stata disinstallata',
	'UNINSTALLATION' => 'Disinstallazione phpBB SEO argomenti correlati',
	// SQL message
	'SQL_REQUIRED' => 'L’utente del DB configurato non dispone di privilegi sufficienti per modificare le tabelle, è necessario eseguire questa query manualmente per aggiungere o eliminare l’Indice MySQL Full Text:<br />%1$s',
	// Security
	'SEO_LOGIN'	  => 'Devi essere iscritto e connesso per visualizzare questa pagina.',
	'SEO_LOGIN_ADMIN'   => 'Devi essere iscritto e connesso come amministratore per visualizzare questa pagina.<br />La sessione è stata chiusa per motivi di sicurezza.',
	'SEO_LOGIN_FOUNDER'   => 'Devi essere iscritto e connesso come fondatore per visualizzare questa pagina.',
	'SEO_LOGIN_SESSION'   => 'Controllo sessione non riuscito.<br />Le impostazioni non sono state modificate.<br />La sessione è stata chiusa per motivi di sicurezza.',
	));
