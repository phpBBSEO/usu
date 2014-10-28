<?php
/**
*
* acp_usu [Italian]
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
	// ACP Main CAT
	'ACP_CAT_PHPBB_SEO'	=> 'phpBB SEO',
	'ACP_MOD_REWRITE'	=> 'Impostazioni riscrittura degli URL',
	// ACP phpBB seo class
	'ACP_PHPBB_SEO_CLASS'	=> 'Impostazioni phpBB SEO Classs',
	'ACP_PHPBB_SEO_CLASS_EXPLAIN'	=> 'Da qui è possibile configurare le varie opzioni di phpBB SEO %1$s (%2$s).<br/>Le varie impostazioni predefinite come i delimitatori e i suffissi, devono ancora essere impostate su <b>phpBB/ext/phpbbseo/usu/customise.php</b>; tieni presente che la modifica di queste, implica un aggiornamento del file .htaccess per generare appropriati reindirizzamenti. %3$s',
	'ACP_PHPBB_SEO_VERSION' => 'Versione',
	'ACP_PHPBB_SEO_MODE' => 'Modalità',
	'ACP_SEO_SUPPORT_FORUM' => 'Forum di supporto',
	// ACP forum URLs
	'ACP_FORUM_URL'	=> 'Gestione URL forum',
	'ACP_FORUM_URL_EXPLAIN'		=> 'Puoi vedere cosa c’è nel file di cache contenente il titolo del forum che sovrascriverà il relativo URL.<br/>I forum di colore verde vengono memorizzati nella cache, quelli in rosso lo saranno in seguito.<br/><br/><b style="color:red">Attenzione: </b><br/><em><b>qualsiasi-titolo-fxx/</b> sarà correttamente reindirizzato con Zero duplicati, ma non sarà così se si modifica <b>qualsiasi-titolo/</b> con <b>qualcosa-altro/</b>.<br/> In tal caso, <b>qualsiasi-titolo/</b> sarà trattato come un forum che non esiste se non si impostano i reindirizzamenti appropriati.</em>',
	'ACP_NO_FORUM_URL'	=> '<b>Gestione URL forum disabilitata<b><br/>La gestione URL del forum è disponibile solo in modalità avanzata, mista e quando la cache degli URL del forum è attivata.<br/>La gestione URL del forum, già configurata, rimarrà attiva in modalità avanzata e mista.',
	// ACP .htaccess
	'ACP_REWRITE_CONF'	=> 'Configurazione server',
	'ACP_HTACCESS_EXPLAIN'	=> 'Questo modulo ti aiuterà a configurare il tuo server.<br/>La versione qui proposta è basata sulle impostazioni contenute nel file phpBB/ext/phpbbseo/usu/customise.php.<br/>Tu puoi modificare le voci $seo_ext e $seo_static prima di installare la configurazione del server per ottenere gli URL personalizzati.<br/>Puoi per esempio scegliere di utilizzare .htm in luogo di .html, "messaggio" in luogo di "post" "lo-staff" in luogo di "the-team" e così via.<br/>Se si modificano queste voci su un Forum già indicizzato, saranno necessari reindirizzamenti personalizzati.<br/>Le impostazioni predefinite sono funzionali; si può saltare questo passo senza preoccupazione se si preferisce.<br/>Tuttavia è preferibile attuare immediatamente tali modifiche, al fine di limitare i reindirizzamenti personalizzati.',
	'SEO_SERVER_CONF_RBASE'	=> 'Configurazione Area',
	'SEO_SERVER_CONF_RBASE_EXPLAIN' => 'La configurazione del server può essere limitata a una cartella fisica di phpBB. Si può limitare la configurazione del server a una cartella specifica, ma può essere utile raggruppare tutto nella root del dominio.',
	'SEO_SERVER_CONF_SLASH'	=> 'Slash regEx a destra',
	'SEO_HTACCESS_SLASH_EXPLAIN'	=> 'A seconda dell’Host, potrebbe essere necessario eliminare o aggiungere lo slash ("/") all’inizio della parte destra di ogni regola di riscrittura. Lo slash a destra è utilizzato per impostazione predefinita quando il file .htaccess si trova nella root principale. È il contrario di quando il phpBB è installato in una sottocartella e si vuole utilizzare un file .htaccess nella medesima cartella.<br />Le impostazioni predefinite, di solito, sono funzionali; se così non è nel tuo caso, prova a modificare la Configurazione server utilizzando questa opzione.',
	'SEO_SERVER_CONF_WSLASH'	=> 'Slash regEx a sinistra',
	'SEO_SERVER_CONF_WSLASH_EXPLAIN'	=> 'A seconda dell’Host, potrebbe essere necessario aggiungere uno slash ("/") all’inizio della parte sinistra di ogni regola di riscrittura. Questo slash ("/") non è utilizzato per impostazione predefinita con Apache, ma con Ngix.<br/>Le impostazioni predefinite, di solito, sono funzionali; se così non è nel tuo caso, prova a prova a modificare la Configurazione  del server utilizzando questa opzione.',
	'SEO_MORE_OPTION'	=> 'Altre opzioni',
	'SEO_MORE_OPTION_EXPLAIN' => 'Se il primo file .htaccess generato non funziona prima di tutto assicurati che la riscrittura degli URL sia attiva presso il tuo Host.<br/> Quindi, assicurati di aver caricato il file .htaccess nella cartella corretta e che non ci siano altri file .htaccess preesistenti, che possano inibire l’attività di riscrittura.<br/>Se fatte con attenzione queste verifiche, il problema sussiste, premi il pulsante "Altre opzioni".',
	'SEO_SERVER_CONF_SAVE' => 'Salva la configurazione del server',
	'SEO_SERVER_CONF_SAVE_EXPLAIN' => 'Se selezionato, i file di configurazione del server verranno generati nella cartella phpbb_seo/cache/. Quindi devono essere appositamente copiati dalla citata cartella, alla posizione corretta.',
	'SEO_HTACCESS_ROOT_MSG'	=> 'Dopo avere effettuato la configurazione, puoi selezionare e copiare il codice .htaccess in un file .htaccess e lì incollarlo. Oppure puoi utilizzare la funzione "Salva il file .htaccess".<br />Il file .htaccess è generato per essere usato nella root principale del dominio, che nel tuo caso è %1$s.<br />Puoi generare un file .htaccess destinato ad essere utilizzato in una sottocartella phpBB utilizzando la voce "Posizione htaccess".',
	'SEO_HTACCESS_FOLDER_MSG' => 'Dopo avere effettuato la configurazione, puoi selezionare e copiare il codice .htaccess in un file .htaccess e lì incollarlo. Oppure puoi utilizzare la funzione "Salva il file .htaccess".<br />Il file .htaccess è generato per essere usato nella cartella in cui phpBB è installato, che nel tuo caso è %1$s.<br />',
	'SEO_SERVER_CONF_CAPTION' => 'Titolo',
	'SEO_SERVER_CONF_CAPTION_COMMENT' => 'Commenti',
	'SEO_SERVER_CONF_CAPTION_STATIC' => 'Parti statiche, modificabili in phpBB/ext/phpbbseo/usu/customise.php',
	'SEO_SERVER_CONF_CAPTION_DELIM' => 'Delimitatori, modificabili in phpBB/ext/phpbbseo/usu/customise.php',
	'SEO_SERVER_CONF_CAPTION_SUFFIX' => 'Suffissi, modificabili in phpBB/ext/phpbbseo/usu/customise.php',
	'SEO_SERVER_CONF_CAPTION_SLASH' => 'Slash opzionali',
	'SEO_SLASH_DEFAULT'	=> 'Predefinito',
	'SEO_SLASH_ALT'		=> 'Alternativo',
	'SEO_MOD_TYPE_ER'	=> 'Il tipo di riscrittura non è impostato correttamente in phpBB/ext/phpbbseo/usu/core.php.',
	'SEO_SHOW'		=> 'Mostra',
	'SEO_HIDE'		=> 'Nascondi',
	'SEO_SELECT_ALL'	=> 'Seleziona tutto',
	'SEO_APACHE_CONF' => 'Configurazione Apache',
	//Ngix
	'SEO_NGIX_CONF' => 'Configurazione Ngix',
	'SEO_NGIX_CONF_EXPLAIN' => 'Copia e incolla questo codice nel tuo file di configurazione del server web e riavvia Ngix.',
	// ACP extended
	'ACP_SEO_EXTENDED_EXPLAIN' => 'phpBB SEO impostazioni estese',
	'SEO_EXTERNAL_LINKS' => 'Link esterni',
	'SEO_EXTERNAL_LINKS_EXPLAIN' => 'Apri o no i link esterni in una nuova finestra / scheda.',
	'SEO_EXTERNAL_SUBDOMAIN' => 'Link sottodominio',
	'SEO_EXTERNAL_SUBDOMAIN_EXPLAIN' => 'Tratta o no, i link di eventuali sottodomini relativi al dominio del tuo Forum come link interni da aprire nella stessa finestra.',
	'SEO_EXTERNAL_CLASSES' => 'Classe CSS esterna',
	'SEO_EXTERNAL_CLASSES_EXPLAIN' => 'Qui puoi definire alcune classi CSS che attiveranno la funzionalità per aprire una nuova finestra cliccando sui link. Elenca i nomi della classe, separandoli con una virgola. Per esempio: postlink, external.',
	// Titles
	'SEO_PAGE_TITLES' => '<a href="http://www.phpbb-seo.com/en/phpbb-seo-toolkit/optimal-titles-t1289.html" title="Ottimizza i titoli" onclick="window.open(this.href); return false;">Pagina titoli</a>',
	'SEO_APPEND_SITENAME' => 'Aggiungi il nome del sito ai titoli delle pagine',
	'SEO_APPEND_SITENAME_EXPLAIN' => 'Aggiungi o no il nome del sito ai titoli delle pagine.<br/><b style="color:red;">Attenzione: </b><br/>Questa opzione richiede che siano opportunamente modificati i titoli del file overall_header.html, altrimenti il nome del sito potrebbe essere ripetuto nei titoli delle pagine.',
	// Meta
	'SEO_META' => '<a href="http://www.phpbb-seo.com/en/phpbb-seo-toolkit/seo-dynamic-meta-tags-t1308.html" title="Meta tag dinamici" onclick="window.open(this.href); return false;">Meta tag</a>',
	'SEO_META_TITLE' => 'Meta title',
	'SEO_META_TITLE_EXPLAIN' => 'Il meta title predefinito, verrà utilizzato per definire il titolo della pagina. Disattiva il tag meta title se è vuoto.',
	'SEO_META_DESC' => 'Meta description',
	'SEO_META_DESC_EXPLAIN' => 'Il meta description predefinito, utilizzato sulla pagina senza definire un meta description',
	'SEO_META_DESC_LIMIT' => 'Limite meta description',
	'SEO_META_DESC_LIMIT_EXPLAIN' => 'Limite parole per il meta tag description',
	'SEO_META_BBCODE_FILTER' => 'Filtro BBcode',
	'SEO_META_BBCODE_FILTER_EXPLAIN' => 'Elenco dei BBCode che saranno completamente filtrati in meta tag separati da virgola. Altri semplicemente, verranno disattivati e il loro contenuto sarà visualizzato nei meta tag.<br/>Per impostazione predefinita, i BBCode filtrati sono: <b>img,url,flash,code</b>.<br/><b style="color:red;">Attenzione: </b><br/>Filtrare i BBCode img, url, flash e code non è una buona idea, nella maggioranza dei casi. In linea generale, puoi mantenere i BBcode nei meta',
	'SEO_META_KEYWORDS' => 'Meta keywords',
	'SEO_META_KEYWORDS_EXPLAIN' => 'I meta keyword predefiniti, utilizzati sulla pagina, non stanno definendo meta keyword. Basta inserire un elenco di parole chiave',
	'SEO_META_KEYWORDS_LIMIT' => 'Limite meta keyword',
	'SEO_META_KEYWORDS_LIMIT_EXPLAIN' => 'Limite parole per il tag meta keyword',
	'SEO_META_MIN_LEN' => 'Filtro parole corte',
	'SEO_META_MIN_LEN_EXPLAIN' => 'Numero minimo di caratteri consentiti in una parola da inserire nel tag meta keyword; solo le parole composte da un numero di caratteri superiori a quello indicato saranno considerate',
	'SEO_META_CHECK_IGNORE' => 'Ignora filtro parole',
	'SEO_META_CHECK_IGNORE_EXPLAIN' => 'Applica o no, le esclusioni search_ignore_words.php nel meta tag dei meta keyword',
	'SEO_META_LANG' => 'Meta lang',
	'SEO_META_LANG_EXPLAIN' => 'Codice lang utilizzato nei meta tag',
	'SEO_META_COPY' => 'Meta copyright',
	'SEO_META_COPY_EXPLAIN' => 'Copyright utilizzato nel meta tag. Disattiva il meta tag di copyright se è vuoto',
	'SEO_META_FILE_FILTER' => 'Filtro file',
	'SEO_META_FILE_FILTER_EXPLAIN' => 'Elenco separato da virgole di nomi di file e script php che non dovrebbero essere indicizzati (robots: noindex,follow). Esempio: ucp, mcp',
	'SEO_META_GET_FILTER' => 'Filtro _GET',
	'SEO_META_GET_FILTER_EXPLAIN' => 'Elenco separato da virgole di variabili _GET che non dovrebbero essere indicizzate (robots: noindex, follow). Esempio: style,hilit,sid',
	'SEO_META_ROBOTS' => 'Meta robots',
	'SEO_META_ROBOTS_EXPLAIN' => 'Il meta tag robots dice ai Bot come devono indicizzare le pagine. La sua impostazione predefinita è "index,follow", che consente ai Bot di indicizzare le pagine, di archiviare la cache e di seguire i link relativi. Disattiva il meta tag robots se è vuoto.<br/><b style="color:red;">Attenzione: </b><br/>Questo tag è rilevante; se si sceglie di usare il "noindex", nessuna delle tue pagine sarà indicizzata',
	'SEO_META_NOARCHIVE' => 'Meta robots noarchive',
	'SEO_META_NOARCHIVE_EXPLAIN' => 'Il meta tag robots noarchive dice ai Bot di non archiviare la cache della pagina. È solo la cache della pagina; non ha alcun rapporto con l’indicizzazione e la SERP della pagina.<br/>Da qui è possibile selezionare una lista di forum che avranno l’opzione "noarchive" aggiunta al meta robots.<br/>Questa funzione può essere utile per esempio quando si dispone di alcuni forum accessibili ai Bot ma non agli ospiti. Aggiungendo l’opzione "noarchive" si impedirà agli ospiti di accedere ai contenuti tramite la cache del motore di ricerca, mentre il forum e gli argomenti verranno comunque visualizzati nella SERP.',
	'SEO_META_OG' => 'Open Graph',
	'SEO_META_OG_EXPLAIN' => 'Attiva i <a href="/docs/technical-guides/opengraph/defining-an-object/">tag Open Graph</a> per consentire al crawler di Facebook di generare anteprime quando il contenuto è condiviso su Facebook.',
	'SEO_META_FB_APP_ID' => 'Facebook App ID',
	'SEO_META_FB_APP_ID_EXPLAIN' => 'L’ID univoco che consente a Facebook di conoscere l’identità del tuo sito. Questo è fondamentale per far funzionare correttamente <a href="https://developers.facebook.com/docs/insights/">Facebook Insights</a>.',
	// Install
	'SEO_INSTALL_PANEL'	=> 'Pannello installazione di phpBB SEO',
	'SEO_ERROR_INSTALL'	=> 'Si è verificato un errore durante il processo di installazione. È preferibile procedere alla disinstallazione prima di riprovare.',
	'SEO_ERROR_INSTALLED'	=> 'Il modulo %s è già stato installato.',
	'SEO_ERROR_ID'	=> 'Il modulo %1$ non ha avuto un ID assegnato.',
	'SEO_ERROR_UNINSTALLED'	=> 'Il modulo %s è già stato disinstallato.',
	'SEO_ERROR_INFO'	=> 'Informazione:',
	'SEO_FINAL_INSTALL_PHPBB_SEO'	=> 'Login al PCA',
	'SEO_FINAL_UNINSTALL_PHPBB_SEO'	=> 'Torna all’Indice',
	'CAT_INSTALL_PHPBB_SEO'	=> 'Installazione',
	'CAT_UNINSTALL_PHPBB_SEO'	=> 'Disinstallazione',
	'SEO_OVERVIEW_TITLE'	=> 'Panoramica phpBB SEO Ultimate SEO URL',
	'SEO_OVERVIEW_BODY'	=> 'Benvenuto sul rilascio pubblico di %1$s phpBB3 SEO MOD rewrite %2$s.</p><p>Leggi <a href="%3$s" title="Controlla l’argomento di rilascio" onclick="window.open(this.href); return false;"><b>l’argomento di rilascio</b></a> per ulteriori informazioni</p><p><strong style="text-transform: uppercase;">Nota:</strong> È necessario aver già modificato tutti i file che la modifica richiede e caricato tutti i file che devono essere aggiunti, prima di procedere con questa procedura di installazione guidata.</p> <p>Questo modulo, ti guiderà attraverso il processo di installazione di phpBB3 SEO MOD rewrite tramite il tuo PCA. Potrai scegliere con precisione il metodo di riscrittura degli URL, per ottenere i migliori risultati sui motori di ricerca</p>.',
	'CAT_SEO_PREMOD'	=> 'phpBB SEO Premod',
	'SEO_PREMOD_TITLE'	=> 'Panoramica phpBB SEO Premod',
	'SEO_PREMOD_BODY'	=> 'Benvenuto sul rilascio pubblico di phpBB SEO Premod.</p><p>Leggi <a href="http://www.phpbb-seo.com/en/phpbb-seo-premod/seo-url-premod-t1549.html" title="Controlla l’argomento di rilascio" onclick="window.open(this.href); return false;"><b>l’argomento di rilascio</b></a> per ulteriori informazioni</p><p><strong style="text-transform: uppercase;">Nota:</strong> Sarai in grado di scegliere fra i tre tipi di riscrittura di phpBB3 SEO MOD.<br /><br /><b>Tre diversi tipi di riscrittura disponibili:</b><ul><li><a href="http://www.phpbb-seo.com/en/simple-seo-url/simple-phpbb-seo-url-t1566.html" title="Ulteriori informazioni sulla modalità semplice"><b>Modalità semplice</b></a>,</li><li><a href="http://www.phpbb-seo.com/en/mixed-seo-url/mixed-phpbb-seo-url-t1565.html" title="Ulteriori informazioni sulla modalità mista"><b>Modalità mista</b></a>,</li><li><a href="http://www.phpbb-seo.com/en/advanced-seo-url/advanced-phpbb-seo-url-t1219.html" title="Ulteriori informazioni sulla modalità avanzata"><b>Modalità avanzata</b></a>.</li></ul>Questa scelta è molto importante; ti invitiamo a prendere il tempo necessario per scoprire pienamente le caratteristiche SEO di questa MOD prima di andare online.<br />Questa MOD è semplice da installare come il phpBB3; basta seguire il regolare processo di installazione.<br /><br />
	<p>Requisiti per la riscrittura degli URL: </p>
	<ul>
		<li>Apache server (Linux OS) con il modulo mod_rewrite.</li>
		<li>IIS server (Windows OS) con il modulo isapi_rewrite, ma dovrai forse adattare le regole di riscrittura nel file httpd.ini</li>
	</ul>
	<p>Una volta installata, sarà necessario andare sul PCA per configurare e attivare la MOD.</p>',
	'SEO_LICENCE_TITLE'	=> 'LICENZA RECIPROCA PUBBLICA',
	'SEO_LICENCE_BODY'	=> 'La MOD phpBB SEO rewrite è rilasciata sotto la licenza RPL che afferma che non è possibile rimuovere i crediti di phpBB SEO.<br />Per ulteriori informazioni su possibili eccezioni, contatta un amministratore di phpBB SEO (in particolare SeO o dcz).',
	'SEO_PREMOD_LICENCE'	=> 'La MOD phpBB SEO rewrite e la MOD Zero duplicati inclusa nella Premod sono rilasciate sotto la licenza RPL che afferma che non è possibile rimuovere i crediti di phpBB SEO.<br />Per ulteriori informazioni su possibili eccezioni, contatta un amministratore di phpBB SEO (in particolare SeO o dcz).',
	'SEO_SUPPORT_TITLE'	=> 'Supporto',
	'SEO_SUPPORT_BODY'	=> 'Pieno supporto sarà dato su <a href="%1$s" title="Visita il %2$s SEO URL forum" onclick="window.open(this.href); return false;"><b>%2$s SEO URL forum</b></a>. Risponderemo a domande di carattere generale, ai problemi di configurazione e daremo supporto per i problemi comuni.</p> <p>Non dimenticare di visitare il nostro <a href="http://www.phpbb-seo.com/en/" title="SEO Forum" onclick="window.open(this.href); return false;"><b>Search Engine Optimization forum</b></a>.</p><p>Puoi <a href="http://www.phpbb-seo.com/en/ucp.php?mode=register" title="Registrarsi su phpBB SEO" onclick="window.open(this.href); return false;"><b>registrarti</b></a>, eseguire il login e <a href="%3$s" title="Avviso per gli aggiornamenti" onclick="window.open(this.href); return false;"><b>sottoscrivere l’argomento di rilascio</b></a> per essere avvisato via email su ogni aggiornamento.',
	'SEO_PREMOD_SUPPORT_BODY'	=> 'Pieno supporto sarà dato su <a href="http://www.phpbb-seo.com/en/phpbb-seo-premod/seo-url-premod-t1549.html" title="Visita il forum phpBB SEO Premod" onclick="window.open(this.href); return false;"><b>phpBB SEO Premod forum</b></a>. Forniremo risposte a domande di carattere generale, ai problemi di configurazione e al supporto per determinare i problemi comuni.</p> <p>Non dimenticate di visitare il nostro <a href="http://www.phpbb-seo.com/en/" title="SEO Forum" onclick="window.open(this.href); return false;"><b>Search Engine Optimization forum</b></a>.</p><p>Puoi <a href="http://www.phpbb-seo.com/en/ucp.php?mode=register" title="Registrarsi su phpBB SEO" onclick="window.open(this.href); return false;"><b>registrarti</b></a>, eseguire il login e <a href="http://www.phpbb-seo.com/en/viewtopic.php?t=1549&watch=topic" title="Avviso per gli aggiornamenti" onclick="window.open(this.href); return false;"><b>sottoscrivere l’argomento di rilascio</b></a> per essere avvisato via email su ogni aggiornamento.',
	'SEO_INSTALL_INTRO'		=> 'Benvenuti nella procedura guidata relativa all’installazione di phpBB SEO',
	'SEO_INSTALL_INTRO_BODY'	=> '<p>Stai per installare la MOD %1$s phpBB SEO rewrite %2$s. Questo strumento di installazione attiverà il pannello della MOD phpBB SEO rewrite nel tuo PCA.</p><p>Una volta installata, sarà necessario andare nel PCA per attivare e configurare la MOD.</p>
	<p><strong>Nota:</strong> Se è la prima volta che installi questa MOD, ti invitiamo vivamente di testare i vari tipi di riscrittura degli URL in locale o su forum sperimentale. In questo modo, non si mostrerà un URL diverso ai Bot ogni giorno durante i test. E non scoprirai un mese dopo che si sarebbero preferiti URL differenti. La pazienza è una virtù SEO saggia e anche se Zero duplicati rende il reindirizzamento HTTP molto facile, non è bene reindirizzare gli URL di tutti i forum troppo spesso.</p><br />
	<p>Requisiti: </p>
	<ul>
		<li>Apache server (Linux OS) con il modulo mod_rewrite.</li>
		<li>IIS server (Windows OS) con il modulo isapi_rewrite, ma dovrai forse adattare le regole di riscrittura nel file httpd.ini</li>
	</ul>',
	'SEO_INSTALL'		=> 'Installa',
	'UN_SEO_INSTALL_INTRO'		=> 'Benvenuti su phpBB SEO procedura di disinstallazione guidata',
	'UN_SEO_INSTALL_INTRO_BODY'	=> '<p>Si sta per disinstallare la MOD %1$s phpBB SEO rewrite %2$s modulo PCA.</p>
	<p><strong>Nota:</strong> Questo non disattiverà la riscrittura degli URL sulla tua Board fino a quando i file del phpBB non saranno modificati.</p>',
	'UN_SEO_INSTALL'		=> 'Disinstalla',
	'SEO_INSTALL_CONGRATS'			=> 'Congratulazioni!',
	'SEO_INSTALL_CONGRATS_EXPLAIN'	=> '<p>Hai installato con successo la MOD %1$s phpBB3 SEO rewrite %2$s. Ora si dovrebbe andare sul PCA di phpBB e procedere con le impostazioni della MOD rewrite.<p>
	<p>Nella nuova categoria phpBB SEO, sarai in grado di: </p>
	<h2>Attivare e configurare la riscrittura degli URL</h2>
		<p>Prenditi il tempo necessario, per scegliere come sarà la riscrittura degli URL. Le opzioni di Zero duplicati saranno qui configurabili ad installazione avvenuta.</p>
	<h2>Scegliere il tipo di URL per il tuo forum.</h2>
		<p>Utilizzando la modalità mista o avanzata, si potranno dissociare gli URL del forum dai loro titoli e scegliere di utilizzare qualsiasi parola chiave.</p>
	<h2>Generare e personalizzare il file .htaccess</h2>
	<p>Una volta impostate le opzioni di cui sopra, si sarà in grado di generare un file .htaccess personalizzato in pochissimo tempo e salvarlo direttamente sul server.</p>',
	'UN_SEO_INSTALL_CONGRATS'	=> 'Il modulo di phpBB SEO è stato rimosso dal PCA.',
	'UN_SEO_INSTALL_CONGRATS_EXPLAIN'	=> '<p>Hai disinstallato con successo la MOD %1$s phpBB3 SEO rewrite %2$s.<p>
	<p>Questo non disattiverà la riscrittura degli URL sulla tua Board fino a quando i file del phpBB sono ancora modificati.</p>',
	'SEO_VALIDATE_INFO'	=> 'Info Validazione: ',
	'SEO_SQL_ERROR' => 'Errore SQL',
	'SEO_SQL_TRY_MANUALLY' => 'L’utente del DB sembra non avere privilegi sufficienti per eseguire la query SQL; è necessario eseguirla manualmente (da phpMyAdmin):',
	// Security
	'SEO_LOGIN'		=> 'Devi essere iscritto e connesso per vedere questa pagina.',
	'SEO_LOGIN_ADMIN'	=> 'Devi essere connesso come amministratore per visualizzare questa pagina.<br/>La sessione è stata distrutta per motivi di sicurezza.',
	'SEO_LOGIN_FOUNDER'	=> 'Devi essere connesso come fondatore per visualizzare questa pagina.',
	'SEO_LOGIN_SESSION'	=> 'Controllo sessione non riuscito.<br />Le impostazioni non sono state modificate.<br />La sessione è stata distrutta per motivi di sicurezza.',
	// Cache status
	'SEO_CACHE_FILE_TITLE'	=> 'Stato della cache',
	'SEO_CACHE_STATUS'	=> 'La cartella è configurata come: <b>%s</b>',
	'SEO_CACHE_FOUND'	=> 'La cartella cache è stata trovata con successo.',
	'SEO_CACHE_NOT_FOUND'	=> 'La cartella cache non è stata trovata.',
	'SEO_CACHE_WRITABLE'	=> 'La cartella cache è scrivibile.',
	'SEO_CACHE_UNWRITABLE'	=> 'La cartella cache non è scrivibile. Devi impostare i permessi CHMOD su 0777.',
	'SEO_CACHE_INNER_UNWRITABLE' => 'Alcuni file all’interno della cartella cache non sono scrivibili; assicurati che i permessi CHMOD siano configurati correttamente sia per la cartella cache che per i file in essa contenuti.',
	'SEO_CACHE_FORUM_NAME'	=> 'Nome del forum',
	'SEO_CACHE_URL_OK'	=> 'URL cache',
	'SEO_CACHE_URL_NOT_OK'	=> 'Questo URL del forum non è memorizzato nella cache',
	'SEO_CACHE_URL'		=> 'URL finale',
	'SEO_CACHE_MSG_OK'	=> 'La cache è stata aggiornata con successo.',
	'SEO_CACHE_MSG_FAIL'	=> 'Si è verificato un errore durante l’aggiornamento dei file della cache.',
	'SEO_CACHE_UPDATE_FAIL'	=> 'L’URL che hai inserito non può essere utilizzato; la cache è stata modificata.',
	// Seo advices
	'SEO_ADVICE_DUPE'	=> 'Una voce duplicata nel titolo è stata rilevata per un URL di un forum: <b>%1$s</b>.<br/>Rimarrà invariato fino a quando non si aggiorna.',
	'SEO_ADVICE_RESERVED'	=> 'Un URL riservato all’iscrizione (utilizzato da altri URL, come i profili utente e simili) è stato rilevato nel titolo per un URL di un forum: <b>%1$s</b>.<br/>Rimarrà invariato fino a quando non si aggiorna.',
	'SEO_ADVICE_LENGTH'	=> 'L’URL della cache è troppo lungo.<br/>Prova ad accorciarlo.',
	'SEO_ADVICE_DELIM'	=> 'L’URL della cache contiene il delimitatore SEO e IDT.<br/>Configuralo in base all’originale.',
	'SEO_ADVICE_WORDS'	=> 'L’URL della cache contiene troppe parole.<br/>Prova ad accorciarlo.',
	'SEO_ADVICE_DEFAULT'	=> 'L’URL che termina dopo la formattazione, è basato su un’impostazione predefinita<br />Configuralo in base all’originale.',
	'SEO_ADVICE_START'	=> 'L’URL del forum non può terminare con un parametro di impaginazione.<br/>Sarà rimosso dopo aver cliccato su Invio.',
	'SEO_ADVICE_DELIM_REM'	=> 'L’URL del forum non può terminare con un delimitatore del forum.<br/>Sarà rimosso dopo aver cliccato su Invio.',
	// Mod Rewrite type
	'ACP_SEO_SIMPLE'	=> 'Semplice',
	'ACP_SEO_MIXED'		=> 'Mista',
	'ACP_SEO_ADVANCED'	=> 'Avanzata',
	'ACP_ULTIMATE_SEO_URL'	=> 'Ultimate SEO URL',
	// URL Sync
	'SYNC_REQ_SQL_REW' => 'Devi attivare la riscrittura SQL per utilizzare questo script!',
	'SYNC_TITLE' => 'Sincronizzazione degli URL',
	'SYNC_WARN' => 'Attenzione: effettua un backup del database prima di avviare lo script e non fermarne l’esecuzione finché non è concluso!',
	'SYNC_COMPLETE' => 'Sincronizzazione completata!',
	'SYNC_RESET_COMPLETE' => 'Ripristino completato!',
	'SYNC_PROCESSING' => '<b>Elaborazione in corso... attendere prego... </b><br/><br/><b>%1$s%%</b> sono stati processati. <br />Finora, <b>%2$s</b> elementi sono stati processati.<br/><b>%3$s</b> voci in totale, <b>%4$s</b> vengono processati in un momento.<br/>Velocità: <b>%5$s voce/i.</b><br/>Tempo speso per questo ciclo: <b>%6$ss</b><br/>Tempo stimato rimanente: <b>%7$s minuto(i)</b>',
	'SYNC_ITEM_UPDATED' => '<b>%1$s</b> voci sono state aggiornate',
	'SYNC_TOPIC_URLS' => 'Inizio sincronizzazione URL argomenti',
	'SYNC_RESET_TOPIC_URLS' => 'Ripristina tutti gli URL degli argomenti',
	'SYNC_TOPIC_URL_NOTE' => 'Hai appena attivato l’opzione di riscrittura SQL, se non lo hai già fatto, dovresti ora sincronizzare gli URL di tutti i tuoi argomenti andando su %squesta pagina%s.<br/>Questo non modificherà gli URL correnti<br/><b style="color:red">Nota: </b><br/><em>Dovresti solo sincronizzare gli URL degli argomenti dopo aver impostato l’URL standard. Non è un dramma se si modifica l’URL standard dopo aver sincronizzato l’argomento, ma in questo caso dovresti ripetere la sincronizzazione ogni volta.<br/>L’URL del tuo argomento, sarebbe così aggiornato ad ogni visita nel caso in cui l’URL dell’argomento fosse vuoto o non corrispondente allo standard attuale.</em>',
	// phpBB SEO Class option
	'url_rewrite' => 'Attiva la riscrittura degli URL',
	'url_rewrite_explain' => 'Dopo aver impostato i parametri che seguono, e dopo aver generato il file .htaccess personalizzato, puoi attivare la riscrittura degli URL e controllare se l’URL riscritto funziona correttamente. Se ottieni errori 404, è probabile che ci sia un problema nel tuo file .htaccess. In tal caso, prova a crearne uno nuovo con il tool relativo.',
	'modrtype' => 'Tipo di riscrittura URL',
	'modrtype_explain' => 'Puoi scegliere fra tre tipi di riscrittura URL phpBB SEO MOD.<br/> <a href="http://www.phpbb-seo.com/en/simple-seo-url/simple-phpbb-seo-url-t1566.html" title="Ulteriori informazioni sulla modalità semplice" onclick="window.open(this.href); return false;"><b>Semplice</b></a> <a href="http://www.phpbb-seo.com/en/mixed-seo-url/mixed-phpbb-seo-url-t1565.html" title="Ulteriori informazioni sulla modalità mista" onclick="window.open(this.href); return false;"><b>Mista</b></a> <a href="http://www.phpbb-seo.com/en/advanced-seo-url/advanced-phpbb-seo-url-t1219.html" title="Ulteriori informazioni sulla modalità avanzata" onclick="window.open(this.href); return false;"><b>Avanzata</b></a>.<br/><br/><b style="color:red">Nota: </b><br/><em>La modifica di questa opzione cambierà tutti gli URL del tuo sito web.<br/>Farlo con un sito web già indicizzato dovrebbe pertanto essere considerato con attenzione quasi come se fosse un trasferimento da un dominio a un altro.<br/>Quindi valuta molto bene, se è il caso di farlo.<br/>La modifica di queste opzioni richiede l’aggiornamento del file .htaccess.</em>',
	'sql_rewrite' => 'Attiva la riscrittura SQL',
	'sql_rewrite_explain' => 'Questa opzione ti permetterà di scegliere un URL per ogni argomento. Potrai impostare con precisione l’URL di un argomento quando si crea o quando si modifica un messaggio esistente. Questa funzionalità è però riservata agli amministratori e ai moderatori.<br/><br/><b style="color:red">Nota: </b><br/><em>Attivare questa opzione non cambierà l’URL dell’argomento. Gli URL esistenti saranno conservati così come sono visualizzati nel database. Ma non può essere effettuato se lo disattivi dopo aver avviato la funzione. In questo caso, gli URL personalizzati possono essere trattati come se non fossero riscritti.<br/>La funzione ha inoltre il grande vantaggio di cristallizzare la riscrittura degli URL totalmente, soprattutto quando si utilizza l’opzione cartella virtuale in modalità avanzata, per rendere molto più facile il recupero degli URL riscritti da qualsiasi pagina.</em>',
	'profile_inj' => 'Inizializzazione profili e gruppi',
	'profile_inj_explain' => 'Puoi visualizzare nomi utente, nomi di gruppi e la pagina dei messaggi utente (opzionale... vedi sotto) nel tuo URL in luogo di quello predefinito, <b>phpbb/nomeutente-uxx.html</b> in luogo di <b>phpbb/utentexx.html</b>..',
	'profile_vfolder' => 'Profilo cartella virtuale',
	'profile_vfolder_explain' => 'Puoi scegliere di simulare una struttura di cartelle per i profili e per gli URL della pagina dei messaggi utente (opzionale... vedi sotto), <b>phpbb/nomeutente-uxx/(argomenti/)</b> o <b>phpbb/utentexx/(argomenti/)</b> in luogo di <b>phpbb/nomeutente-uxx(-argomenti).html</b> e <b>phpbb/utentexx(-argomenti).html</b>.<br/><br/><b style="color:red">Nota: </b><br/><em>Questo rimuoverà il profilo ID.<br/>La modifica di questa opzione richiede l’aggiornamento del file .htaccess.</em>',
	'profile_noids' => 'Rimuovi il profilo ID',
	'profile_noids_explain' => 'Quando la funzione profili e gruppi è attivata, è possibile utilizzare <b>esempio.com/phpbb/utente/nomeutente</b> in luogo del predefinito <b>esempio.com/phpbb/nomeutente-uxx.html</b>. phpBB utilizza una query SQL extra, ma leggera, sulle pagine prive di ID utente. <br /><br /><b style="color:red">Nota</b><br/><em>I caratteri speciali non saranno riconosciuti da tutti browser. FF utilizza la codifica (<a href="http://www.php.net/urlencode">urlencode()</a>), utilizzando latin1, mentre IE e Opera browser non la utilizzano. Per le opzioni avanzate di codifica, si prega di leggere il relativo file di installazione.<br/>La modifica di questa opzione richiede l’aggiornamento del file .htaccess.</em>',
	'rewrite_usermsg' => 'Ricerca comune e pagine riscritte dei messaggi utente',
	'rewrite_usermsg_explain' => 'Questa opzione ha più senso se si consente l’accesso pubblico ad entrambi i profili e alle pagine di ricerca.<br/>Se attivi questa opzione ci sarà un maggiore utilizzo di funzioni di ricerca e quindi un carico più pesante per il server.<br/>Il tipo di riscrittura degli URL (con e senza ID) segue quello fissato per i profili e i gruppi.<br/><b>phpbb/messaggi/nomeutente/argomenti/</b> in luogo di <b>phpbb/nomeutente-uxx-argomenti.html</b> in luogo di <b>phpbb/utentexx-argomenti.html</b>.<br/>Inoltre questa opzione attiva la riscrittura nella pagina di ricerca comune, negli argomenti attivi, nei messaggi senza risposta e nei messaggi recenti.<br/><br/><b style="color:red">Nota:</b><br /><em>La rimozione degli ID su questi link comporterà la stessa limitazione che si ha nei profili utente.<br/>La modifica di questa opzione richiede l’aggiornamento del file .htaccess.</em>',
	'rewrite_files' => 'Riscrittura allegati',
	'rewrite_files_explain' => 'Attiva la riscrittura degli allegati di phpBB. Può essere di grande aiuto se si hanno molte immagini allegate che si vogliono indicizzare. I file ovviamente, devono essere scaricabili dai Bot perché possano essere indicizzati.<br/><br/><b style="color:red">Nota:</b><br/><em>Assicurati di avere le necessarie regole di riscrittura (# PHPBB FILES ALL MODES) nel tuo file .htaccess quando si attiva questa opzione.</em>',
	'rem_sid' => 'Rimozione SID',
	'rem_sid_explain' => 'I SID verranno rimossi dal 100% degli URL che passano attraverso phpbb_seo class, per gli ospiti e quindi per i Bot.<br/>Questo garantisce che i Bot non vedranno SID sul forum, negli URL degli argomenti e dei messaggi, ma gli ospiti che non accettano i cookie molto probabilmente creeranno più di una sessione.<br/>Per impostazione predefinita, Zero duplicati produrrà un reindirizzamento HTTP 301 negli URL, con SID per gli ospiti e per i Bot.',
	'rem_hilit' => 'Rimozione Highlights',
	'rem_hilit_explain' => 'Gli Highlights saranno rimossi dal 100% degli URL che passano attraverso phpbb_seo class, per gli ospiti e quindi per i Bot.<br/>Questo garantisce che i Bot non vedranno gli Highlights sul Forum, negli URL degli argomenti e dei messaggi.<br/>Zero duplicati segue automaticamente questa impostazione, ad esempio un reindirizzamento HTTP 301 degli URL, con Highlights per gli ospiti e per i Bot.',
	'rem_small_words' => 'Rimuovi parole corte',
	'rem_small_words_explain' => 'Permette di eliminare tutte le parole inferiori a tre lettere nella riscrittura degli URL.<br/><br/><b style="color:red">Nota</b><br/><em>Il filtro modifica potenzialmente parecchi URL del tuo sito web.<br/>Anche se Zero duplicati regolerà tutti i reindirizzamenti, pensa bene prima di modificare questa opzione in un sito già indicizzato; si dovrebbe considerare quasi come se fosse un trasferimento da un dominio a un altro.<br/>Quindi valuta molto bene, se è il caso di farlo.</em>',
	'virtual_folder' => 'Cartella virtuale',
	'virtual_folder_explain' => 'Permette di aggiungere negli URL interessati il nome del forum-sezione, come cartella virtuale.<br/><br/><b>Esempio:</b><br/><em><b>nome-forum-sezione-fxx/titolo-argomento-txx.html</b> in luogo di <b>titolo-argomento-txx.html</b>.</em><br /><br /><b style="color:red">Nota</b><br/><em>L’opzione cartella virtuale può cambiare tutti gli URL del tuo sito web quasi troppo facilmente.<br/>Iniziare a usarla in un sito web già indicizzato dovrebbe pertanto essere considerato con attenzione quasi come se fosse un trasferimento da un dominio a un altro.<br/>Quindi valuta molto bene, se è il caso di farlo.<br/>La modifica di questa opzione richiede l’aggiornamento del file .htaccess.</em>',
	'virtual_root' => 'Root virtuale',
	'virtual_root_explain' => 'Se il phpBB è installato in una sottocartella (per esempio phpBB3/), è possibile simulare una root di installazione per i link riscritti.<br/><br/><b>Esempio:</b><br/><em><b>phpBB3/nome-forum-sezione-fxx/titolo-argomento-txx.html</b> in luogo di <b>nome-forum-sezione-fxx/titolo-argomento-txx.html</b>.</em><br/><br/>Questo può essere utile per accorciare un po’ gli URL, specialmente se si sta utilizzando la funzione "Cartella virtuale". I link UnRewritten continueranno ad apparire e a lavorare nella cartella di phpBB.<br/><br/><b style="color:red">Nota:</b><br/><em>Utilizzando questa opzione si richiede l’utilizzo di una Home Page oltre all’Indice del Forum (come forum.html).<br/>La modifica di questa opzione cambierà tutti gli URL del tuo sito web.<br/>Farlo con un sito web già indicizzato dovrebbe pertanto essere considerato con attenzione quasi come se fosse un trasferimento da un dominio a un altro.<br/>Quindi valuta molto bene, se è il caso di farlo.<br/>La modifica di queste opzioni richiede l’aggiornamento del file .htaccess.</em>',
	'cache_layer' => 'Forum URL cache',
	'cache_layer_explain' => 'Attiva la cache per gli URL del forum che permette di separare i titoli del forum dai loro URL.<br/><br/><b>Esempio:</b><br/><em><b>nome-forum-sezione-fxx/</b> in luogo di <b>qualsiasi-titolo-fxx/</b>.</em><br /><br /><b style="color:red">Nota</b><br/><em>Questa opzione ti permetterà di modificare gli URL del forum, gli URL degli argomenti quindi, potenzialmente troppi se si utilizza l’opzione Cartella virtuale.<br/>Gli URL degli argomenti saranno sempre reindirizzati correttamente con Zero duplicati.<br/>Sarà anche il caso per gli URL dei forum di mantenere il delimitatore e l’ID; vedi sotto.</em>',
	'rem_ids' => 'Rimozione Forum ID',
	'rem_ids_explain' => 'Rimuovi gli ID e i delimitatori negli URL dei forum. Si applicano solo se la cache del Forum per gli URL è attiva.<br/><br/><b>Esempio:</b><br/><em><b>qualsiasi-titolo-fxx/</b> in luogo di <b>qualsiasi-titolo/</b>.</em><br/><br/><b style="color:red">Nota:</b><br/><em>Questa opzione ti permetterà di modificare gli URL del forum, gli URL degli argomenti, potenzialmente troppi se si utilizza l’opzione Cartella virtuale.<br/>Gli URL degli argomenti saranno sempre reindirizzati correttamente con Zero duplicati.<br/>Non sarà sempre così con gli URL dei forum:<br/><b>qualsiasi-titolo-fxx/</b> sarà sempre correttamente reindirizzato con Zero duplicati, ma non sarà così se si modifica <b>qualsiasi-titolo/</b> con <b>qualcosa-altro/</b>.<br/> In tal caso <b>qualsiasi-titolo/</b> sarà considerato come un forum che non esiste.<br />Quindi è bene pensarci, prima di modificare questa opzione.</em>',
	'redirect_404_forum' => 'Reindirizzamenti 404 per i forum',
	'redirect_404_forum_explain' => 'Reindirizza forum non esistenti verso l’Indice con un redirect 301 invece di emettere un 404 con il messaggio standard di phpBB.',
	'redirect_404_topic' => 'Reindirizzamenti 404 per gli argomenti',
	'redirect_404_topic_explain' => 'Reindirizza argomenti non esistenti verso l’Indice con un redirect 301 invece di emettere un 404 con il messaggio standard di phpBB.',
	// copyrights
	'copyrights' => 'Copyright',
	'copyrights_img' => 'Link immagine',
	'copyrights_img_explain' => 'Da qui è possibile scegliere di visualizzare il link del copyright phpBB SEO come un’immagine oppure come un link di testo.',
	'copyrights_txt' => 'Link testuale',
	'copyrights_txt_explain' => 'Puoi scegliere di visualizzare il copyright attraverso un link testuale con testo di ancoraggio. Lascia il campo vuoto per utilizzare i valori predefiniti.',
	'copyrights_title' => 'Titolo link',
	'copyrights_title_explain' => 'Puoi scegliere di visualizzare il copyright phpBB SEO attraverso il Titolo link. Lascia il campo vuoto per utilizzare i valori predefiniti.',
	// Zero duplicate
	// Options
	'ACP_ZERO_DUPE_OFF' => 'Off',
	'ACP_ZERO_DUPE_MSG' => 'Messaggio',
	'ACP_ZERO_DUPE_GUEST' => 'Ospite',
	'ACP_ZERO_DUPE_ALL' => 'Tutto',
	'zero_dupe' =>'Zero duplicati',
	'zero_dupe_explain' => 'Le seguenti impostazioni riguardano Zero duplicati, e puoi modificarle in base alle tue esigenze.<br />Questo non richiede l’aggiornamento del file .htaccess.',
	'zero_dupe_on' => 'Attiva Zero duplicati',
	'zero_dupe_on_explain' => 'Permette di attivare e disattivare i reindirizzamenti di Zero duplicati.',
	'zero_dupe_strict' => 'Modalità rigorosa',
	'zero_dupe_strict_explain' => 'Quando viene attivato, Zero duplicati verificherà se l’URL richiesto corrisponde esattamente a quello cercato.<br/>Se è impostato su No, Zero duplicati farà in modo che l’URL cercato corrisponda a quello richiesto.<br/>L’interesse è quello di rendere più facile trattare con MOD che possano interferire con Zero duplicati attraverso l’aggiunta di variabili GET.',
	'zero_dupe_post_redir' => 'Reindirizzamenti messaggi',
	'zero_dupe_post_redir_explain' => 'Questa opzione consente di stabilire come gestire gli URL dei messaggi, ma può assumere quattro valori:<br/><b>&nbsp;Off</b>, non reindirizzare gli URL dei messaggi, in ogni caso;<br/><b>&nbsp;Messaggio</b>, assicurati che postxx.html sia usato per gli URL dei messaggi;<br/><b>&nbsp;Ospite</b>, reindirizza gli ospiti se necessario per l’URL corrispondente all’argomento piuttosto che al postxx.html, assicurati che postxx.html sia utilizzato per gli utenti registrati;<br/><b>&nbsp;Tutto</b>, reindirizza se necessario all’URL dell’argomento corrispondente.<br/><br/><b style="color:red">Nota</b><br/><em>Mantieni l’URL <b>postxx.html</b> e finché si mantiene non consentire l’indicizzazione attraverso il robots.txt.<br/> Reindirizzare tutto produce molto probabilmente più reindirizzamenti.<br/>Se si reindirizza l’URL postxx.html in tutti i casi, ciò significa che anche un messaggio che sarebbe stato pubblicato in un argomento e poi trasferito in un altro, produrrà la modifica dell’URL, ma grazie a Zero duplicati il link sarà correttamente reindirizzato</em>.',
	// no duplicate
	'no_dupe' => 'Nessun duplicato',
	'no_dupe_on' => 'Attiva Nessun duplicato',
	'no_dupe_on_explain' => 'Nessun duplicato sostituisce gli URL dei messaggi con l’URL dell’argomento corrispondente (con impaginazione).<br/>Questo non aggiunge alcun SQL, solo un LEFT JOIN su una query già eseguita, che potrebbe produrre ancora maggiore lavoro per il carico del server.',
));

$lang = array_merge($lang, array(
	'ACP_CAT_PHPBB_SEO' => 'phpBB SEO',
	'ACP_MOD_REWRITE' => 'Impostazioni riscrittura degli URL',
	'ACP_PHPBB_SEO_CLASS' => 'Impostazioni phpBB SEO Class',
	'ACP_FORUM_URL' => 'Gestione URL forum',
	'ACP_HTACCESS' => '.htaccess',
	'ACP_SEO_EXTENDED' => 'Configurazione estesa',
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
