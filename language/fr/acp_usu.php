<?php
/**
*
* acp_usu [french]
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
	'ACP_MOD_REWRITE'	=> 'Réécriture d’URL',
	// ACP phpbb seo class
	'ACP_PHPBB_SEO_CLASS' => 'Configuration de la classe phpBB SEO',
	'ACP_PHPBB_SEO_CLASS_EXPLAIN'	=> 'Vous pouvez régler ici différentes options du mod phpBB SEO %1$s (%2$s).<br/>Les réglages par défaut comme les délimiteurs et les extensions doivent toujours être configurés dans le fichier <b>phpBB/ext/phpbbseo/usu/customise.php</b>, les modifier implique un changement de .htaccess ainsi que des redirections appropriées.%3$s',
	'ACP_PHPBB_SEO_VERSION' => 'Version',
	'ACP_PHPBB_SEO_MODE' => 'Mode',
	'ACP_SEO_SUPPORT_FORUM' => 'Forum de support',
	// ACP forum urls
	'ACP_FORUM_URL'	=> 'Configuration des URLs des forums',
	'ACP_FORUM_URL_EXPLAIN' => 'Vous pouvez régler ici le contenu du cache, qui sera injecté dans les URLs des forums.<br/>Les forums en vert sont en cache, ceux en rouge ne le sont pas encore.<br/><br/><b style="color:red">Nota Bene :</b><br/><em><b>mots-cles-fxx/</b> sera toujours convenablement redirigé par le Zéro Duplicate, mais pas si vous le modifiez par la suite : <b>mots-cles/</b> ne sera pas directement redirigé vers <b>autres-mots-cles/</b>.<br/> Dans ce cas, <b>mots-cles/</b> sera considéré comme un forum qui n’existe pas, à défaut de redirections personnalisées.</em><br/>',
	'ACP_NO_FORUM_URL'	=> '<b>La configuration des URLs des forums est désactivée<b><br/>La configuration des URLs des forums est uniquemant possible en mode Avancé ou Intermédiaire et lorsque le Cache des URLs des forums est activé.<br/> Les URLs éventuellement configurées continuent cependant d’être utilisées en mode Avancé ou Intermédiaire.',
	// ACP .htaccess
	'ACP_REWRITE_CONF'	=> 'Config Serveur',
	'ACP_REWRITE_CONF_EXPLAIN'	=> 'Cet outil vous aidera à construire votre config serveur.<br/>La version proposée ci-dessous prend en compte les réglages du fichier phpBB/ext/phpbbseo/usu/customise.php.<br/>Vous pouvez modifier les valeurs des tableaux $seo_ext et $seo_static et personnaliser vos URLs avant de générer une config serveur.<br/>Vous pouvez par exemple choisir d’utiliser .htm au lieu de .html, ’message’ au lieu de ’post’, ’mon-equipe’ au lieu de ’equipe’ etc ...<br/>Si vous modifiez ces valeurs après que vos pages aient été indexées, vous aurez besoin de redirections personnalisées.<br/>Les réglages par défaut ne sont pas du tout mauvais, vous pouvez sauter la première étape de personnalisation sans soucis si vous préférez.',
	'SEO_SERVER_CONF_RBASE'	=> 'Portée de la config serveur',
	'SEO_SERVER_CONF_RBASE_EXPLAIN' => 'La configuration du serveur peut être limitée au dossier physique de phpBB. Il est en générale préférable de limiter la portée de la config à l’endroit ou elle est utilisée, mais il peut être plus pratique de tout regrouper sur la racine du serveur.',
	'SEO_SERVER_CONF_SLASH'	=> 'Slash droit RegEx',
	'SEO_SERVER_CONF_SLASH_EXPLAIN'	=> 'En fonction de votre hébergeur, il se peut que vous ayez à retirer les slashes ("/") se trouvant devant la partie droite des RewriteRule. Ce slash particulier est par exemple utilisé par défaut pour Apache quand le .htaccess est instalé à la racine du domaine, et c’est le contraire quand phpBB est installé dans un sous dossier et que vous souhaitez mettre le .htaccess dans celui-ci.<br/>Les réglages par défaut fonctionneront le plus souvent, si ce n’est pas le cas, essayez de générer une config serveur avec cette option.',
	'SEO_SERVER_CONF_WSLASH'	=> 'Slash gauche RegEx',
	'SEO_SERVER_CONF_WSLASH_EXPLAIN'	=> 'En fonction de votre hébergeur, il se peut que vous ayez à ajouter des slashes ("/") se trouvant devant la partie gauche des RewriteRule. Ce slash particulier par exemple pas utilisé par défaut par Apache, mais l’est par Ngix.<br/>Les réglages par défaut fonctionneront le plus souvent, si ce n’est pas le cas, essayez de générer une config serveur avec cette option.',
	'SEO_MORE_OPTION'	=> 'Plus d’options',
	'SEO_MORE_OPTION_EXPLAIN'	=> 'Si le premier .htaccess suggéré ne fonctionne pas :<br/>Assurez vous tout d’abord que le mod_rewrite est bien activé sur votre serveur.<br/>Ensuite assurez vous d’avoir bien mis le .htaccess au bon endroit, et qu’il n’est pas perturbé par un autre se trouvant dans un autre dossier.<br/>Si ça ne suffit pas, activez cette option et validez pour découvrir plus d’options.',
	'SEO_SERVER_CONF_SAVE' => 'Sauvegarder la config serveur',
	'SEO_SERVER_CONF_SAVE_EXPLAIN' => 'Si vous cochez l’option, des fichiers contenant la config serveur seront générés dans le dossier phpbb_seo/cache/. Ils sont prêt à l’emploi et prennent en compte vos réglages actuels. Vous devrez simplement déplacer/copier le fichier correspondant à votre servuer (Apache .htaccess, config Ngix ...) au bon endroit.',
	'SEO_HTACCESS_ROOT_MSG'	=> 'Une fois prêt, vous pouvez sélectionner le code ci-dessous et le copier dans un fichier .htaccess vide ou utiliser l’option "Sauvegarder le .htaccess" ci-dessous.<br/> Ce .htaccess est fait pour être utilisé à la racine du domaine, ce qui dans votre cas signifie le dossier de votre ftp qui correspond à %1$s.<br/><br/>Vous pouvez générer un .htaccess fait pour être utilisé dans le sous-dossier éventuel de phpBB en utilisant l’option "Emplacement du .htaccess" ci-dessous.',
	'SEO_HTACCESS_FOLDER_MSG' => 'Une fois prêt, sélectionnez le code ci-dessous et copiez le dans un fichier .htaccess vide ou utilisez l’option "Sauvegarder le .htaccess" ci dessus.<br/> Ce .htaccess est fait pour être utilisé dans le dossier utilisé par phpBB, ce qui dans votre cas signifie le dossier de votre ftp qui correspond à %1$s.',
	'SEO_SERVER_CONF_CAPTION' => 'Légende',
	'SEO_SERVER_CONF_CAPTION_COMMENT' => 'Commentaires',
	'SEO_SERVER_CONF_CAPTION_STATIC' => 'Parties statiques, modifiables dans phpBB/ext/phpbbseo/usu/customise.php',
	'SEO_SERVER_CONF_CAPTION_SUFFIX' => 'Extensions, modifiables dans phpBB/ext/phpbbseo/usu/customise.php',
	'SEO_SERVER_CONF_CAPTION_DELIM' => 'Délimiteurs, modifiables dans phpBB/ext/phpbbseo/usu/customise.php',
	'SEO_SERVER_CONF_CAPTION_SLASH' => 'Slashes Optionnels',
	'SEO_SLASH_DEFAULT'	=> 'Défaut',
	'SEO_SLASH_ALT'		=> 'Alternative',
	'SEO_MOD_TYPE_ER'	=> 'Le type de mod rewrite n’est pas convenablement configuré dans phpBB/ext/phpbbseo/usu/customise.php',
	'SEO_SHOW'		=> 'Montrer',
	'SEO_HIDE'		=> 'Cacher',
	'SEO_SELECT_ALL'	=> 'Sélectionner',
	'SEO_APACHE_CONF' => 'Config Apache',
	//Ngix
	'SEO_NGIX_CONF' => 'Config Ngix',
	'SEO_NGIX_CONF_EXPLAIN' => 'Copiez / collez ce code this dans la configuration du serveur web et redemarrez Ngix.',
	// ACP extended
	'ACP_SEO_EXTENDED_EXPLAIN' => 'Configuration additionnelle des mods phpBB SEO.',
	// External links
	'SEO_EXTERNAL_LINKS' => 'Liens externes',
	'SEO_EXTERNAL_LINKS_EXPLAIN' => 'Activer ou non l’ouverture des liens externes dans une nouvelle fenêtre du navigateur',
	'SEO_EXTERNAL_SUBDOMAIN' => 'Liens externes sous-domaine',
	'SEO_EXTERNAL_SUBDOMAIN_EXPLAIN' => 'Considerer ou non les liens vers d’autres sous domaines du domaine de votre forum comme des liens internes à ne pas ouvrir dans une nouvelle fenêtre',
	'SEO_EXTERNAL_CLASSES' => 'Classe css externe',
	'SEO_EXTERNAL_CLASSES_EXPLAIN' => 'Vous pouvez définir des classes css qui activeront l’ouverture dans une nouvelle fenêtre pour les liens. Liste de classes séparées par des virgules, exemple : postlink,external',
	// Titles
	'SEO_PAGE_TITLES' => '<a href="http://www.phpbb-seo.com/fr/toolkit-phpbb-seo/optimisation-titres-t1653.html" title="Mod Optimal Titles" onclick="window.open(this.href); return false;">Titre des pages</a>',
	'SEO_APPEND_SITENAME' => 'Ajouter le nom du site au titres des pages',
	'SEO_APPEND_SITENAME_EXPLAIN' => 'Ajouter, ou non, le nom du site à la fin du titres des pages.<br/><b style="color:red;">Attention :</b><br/>Cette option nécéssite que vous ayez convenablement modifié tous vos overall_header.html pour le mod Optimal titles, le nom du site pourrait si non apparaitre deux fois dans le titres de pages',
	// Meta
	'SEO_META' => '<a href="http://www.phpbb-seo.com/fr/toolkit-phpbb-seo/meta-tags-dynamiques-seo-t1678.html" title="Mod Méta tags dynamiques" onclick="window.open(this.href); return false;">Méta tags</a>',
	'SEO_META_TITLE' => 'Méta title',
	'SEO_META_TITLE_EXPLAIN' => 'Titre méta par défaut, utilisé sur les pages n’ayant pas de titre défini. Désactive le méta title si vide',
	'SEO_META_DESC' => 'Méta description',
	'SEO_META_DESC_EXPLAIN' => 'Description méta par défaut, utilisé sur les pages n’ayant pas de description définie',
	'SEO_META_DESC_LIMIT' => 'Limite Méta description',
	'SEO_META_DESC_LIMIT_EXPLAIN' => 'Limite en nombre de mots pour les méta description',
	'SEO_META_BBCODE_FILTER' => 'Filtre Bbcodes',
	'SEO_META_BBCODE_FILTER_EXPLAIN' => 'Liste de bbcodes, séparées par des virgules, qui seront totallement filtrés dans les méta tags. Les autre seront simplement désactivé et leur contenu pourra apparaitre.<br/> Les bbcodes filtrés par défaut sont : <b>img,url,flash,code</b>.<br/><b style="color:red;">Attention :</b><br/>Ne pas filtrer les bbcodes img, url et flash n’est pas un bonne idée pour vos métas, de même que le bbcode code dans la plupart des cas. Dans le cas général, ne conservez le contenu des bbcodes qui en ont',
	'SEO_META_KEYWORDS' => 'Méta keywords',
	'SEO_META_KEYWORDS_EXPLAIN' => 'Mot clés méta par défaut, utilisés sur les pages n’ayant pas de description / mot clés définis. Entrez une liste de mot clés séparés par des espaces',
	'SEO_META_KEYWORDS_LIMIT' => 'Limite Méta keywords',
	'SEO_META_KEYWORDS_LIMIT_EXPLAIN' => 'Limite en nombre de mots pour les méta keywords',
	'SEO_META_MIN_LEN' => 'Filtre mots courts',
	'SEO_META_MIN_LEN_EXPLAIN' => 'Nombre de lettres limite pour la prise en compte des mots cléfs, seul les mots composés de plus de lettre que cette valeur seront pris en compte',
	'SEO_META_CHECK_IGNORE' => 'Filtre mots ignorés',
	'SEO_META_CHECK_IGNORE_EXPLAIN' => 'Exclure, ou non, les mots du fichier search_ignore_words.php des méta keywords',
	'SEO_META_LANG' => 'Méta langue',
	'SEO_META_LANG_EXPLAIN' => 'Code langue utilisé dans les méta tags',
	'SEO_META_COPY' => 'Méta copyright',
	'SEO_META_COPY_EXPLAIN' => 'Copyright utilisé dans les méta tags. Désactive le méta copyritght si vide',
	'SEO_META_FILE_FILTER' => 'Filtre fichiers',
	'SEO_META_FILE_FILTER_EXPLAIN' => 'Liste de noms de fichiers php sans extensions séparés par des virgules ne devant pas être indéxés (robots:noindex,follow). Exemple : ucp,mcp',
	'SEO_META_GET_FILTER' => 'Filtre _GET',
	'SEO_META_GET_FILTER_EXPLAIN' => 'Liste de variable _GET séparées par des virgules ne devant pas être indéxées (robots:noindex,follow). Exemple : style,hilit,sid',
	'SEO_META_ROBOTS' => 'Méta Robots',
	'SEO_META_ROBOTS_EXPLAIN' => 'La balise Méta Robots indique aux bots des moteur de recherche comment indexer les pages de votre site. Elle est réglée sur "index,follow" par défaut, ce qui autorise les moteurs de recherche à indexer et mettre en cache les pages et à suivre les liens qui s’y trouvent. Désactive la balise si vide.<br/><b style="color:red;">Attention :</b><br/>Cette balise est sensible, si vous mettez "noindex", aucune page ne sera référencée',
	'SEO_META_NOARCHIVE' => 'Méta Robots Noarchive',
	'SEO_META_NOARCHIVE_EXPLAIN' => 'La balise Méta Robots Noarchive indique aux moteurs de recherche s’ils doivent ou non mettre les pages en cache. Cette option ne concerne que la mise en cache des pages, elle est sans rapports avec l’indexation et le positionnement des pages.<br/>Vous pouvez ici choisir les forums qui auront l’option "noarchive" ajoutée à leur balise méta robots en cours.<br/>C’est par exemple très pratique si certains de vos forums sont ouverts aux robots sans être ouverts aux invités. Vous pourrez dans ce cas utiliser l’option noarchive pour ceux-ci, afin qu’ils apparaissent dans les résultats des moteurs de recherches sans que les invités puissent voir le contenu des pages sans s’inscrire via le cache des moteurs de recherches',
	'SEO_META_OG' => 'Open Graph',
	'SEO_META_OG_EXPLAIN' => 'Activer <a href="/docs/technical-guides/opengraph/defining-an-object/">Open Graph tags</a> pour permettre au Crawler Facebook de generer des prévisualisations quand votre contenu est partagé sur Facebook.',
	'SEO_META_FB_APP_ID' => 'App ID Facebook',
	'SEO_META_FB_APP_ID_EXPLAIN' => 'L’ID unique permettant à Facebook de reconnaitre votre site. Cette ID est cruciale pour le fonctionnement de <a href="https://developers.facebook.com/docs/insights/">Facebook Insights</a>.',
	// Install
	'SEO_INSTALL_PANEL'	=> 'Installation phpBB SEO',
	'SEO_ERROR_INSTALL'	=> 'Une erreur est survenue lore de l’installation. Il est plus prudent de désinstaller une fois avant de rééssayer.',
	'SEO_ERROR_INSTALLED'	=> 'Le module %s est déjà installé',
	'SEO_ERROR_ID'	=> 'Le module %s n’a pas d’ID.',
	'SEO_ERROR_UNINSTALLED'	=> 'Le module %s est déjà désinstallé',
	'SEO_ERROR_INFO'	=> 'Information :',
	'SEO_FINAL_INSTALL_PHPBB_SEO'	=> 'Aller à l’ACP',
	'SEO_FINAL_UNINSTALL_PHPBB_SEO'	=> 'Retour à l’index du forum',
	'CAT_INSTALL_PHPBB_SEO'	=> 'Installation',
	'CAT_UNINSTALL_PHPBB_SEO'=> 'Désinstallation',
	'SEO_OVERVIEW_TITLE'	=> 'Vue d’ensemble du mod rewrite phpBB SEO Ultimate SEO URL',
	'SEO_OVERVIEW_BODY'	=> 'Bienvenue sur notre Release publique du mod rewrite phpBB3 SEO %1$s %2$s.</p><p>Veuillez lire <a href="%3$s" title="Voir le sujet de mise à disposition" onclick="window.open(this.href); return false;"><b>le sujet de mise à disposition</b></a> pour plus de détails.</p><p><strong style="text-transform: uppercase;">Note:</strong> Vous devez avoir effectué les changements de code des fichiers et uploadé tous les nouveaux fichiers avant de continuer avec cet installeur.</p><p>Cet installeur vous guidera pendant le processus d’installation du module d’administration du mod rewrite phpBB3 SEO. Ce module vous permettra de choisir précisément vos URLs réécrites pour les meilleurs résultats dans les moteurs de recherche.</p>.',
	'CAT_SEO_PREMOD'	=> 'Premod phpBB SEO',
	'SEO_PREMOD_TITLE'	=> 'Vue d’ensemble de la premod phpBB SEO',
	'SEO_PREMOD_BODY'	=> 'Bienvenue sur notre Release publique de la premod phpBB SEO.</p><p>Veuillez lire <a href="http://www.phpbb-seo.com/fr/premod-phpbb-seo/premod-referencement-phpbb-t1951.html" title="Voir le sujet de mise à disposition" onclick="window.open(this.href); return false;"><b>le sujet de mise à disposition</b></a> pour plus de détails.</p><p><strong style="text-transform: uppercase;">Note:</strong> Vous allez pouvoir choisir entre les trois différents types de réécriture d’URLs pour phpBB3 de phpBB SEO.<br/><br/><b>Les différents types de réécritures disponibles :</b><ul><li><a href="http://www.phpbb-seo.com/fr/reecriture-url-simple/seo-url-phpbb-simple-t1945.html" title="Plus de détails sur le mode Simple"><b>Le mode Simple</b></a>,</li><li><a href="http://www.phpbb-seo.com/fr/reecriture-url-intermediaire/seo-url-intermediaire-t1946.html" title="Plus de détails sur le mode Intermédiaire"><b>Le mode Intermédiaire</b></a>,</li><li><a href="http://www.phpbb-seo.com/fr/reecriture-url-avancee/seo-url-phpbb-avance-t1501.html" title="Plus de détails sur le mode Avancé"><b>Le mode Avancé</b></a>.</li></ul>Ce choix est crucial, nous vous invitons à prendre le temps de vous familiariser avec cette premod avant de vous lancer.<br/>Cette premod est simple d’utilisation et d’installation, il vous suffit de suivre le processus normal d’installation de phpBB.<br/><br/>
	<p><u>Pré-requis pour la réécriture d’URLs:</u></p>
	<ul>
		<li>Serveur Apache (linux OS) avec le module mod_rewrite.</li>
		<li>Serveur IIS (windows OS) avec le module isapi_rewrite, vous devrez cependant modifier les rewriterules pour votre httpd.ini</li>
	</ul>
	<p>Une fois l’installation effectuée, vous devrez vous rendre dans l’ACP de phpBB pour configurer et activer la réécriture d’URLs.</p>',
	'SEO_LICENCE_TITLE'	=> 'RECIPROCAL PUBLIC LICENSE',
	'SEO_LICENCE_BODY'	=> 'Les mod rewrites phpBB SEO sont diffusés sous la licence RPL qui indique que vous ne devez pas retirer les crédits phpBB SEO<br/>Pour plus de détails concernant les exceptions possibles, merci de contacter un administrateur de phpBB SEO (Prioritairement SeO ou dcz).',
	'SEO_PREMOD_LICENCE'	=> 'Les mod rewrites phpBB SEO et le Zéro Duplicate inclus dans cette premod sont diffusés sous la licence RPL qui indique que vous ne devez pas retirer les crédits phpBB SEO<br/>Pour plus de détails concernant les exceptions possibles, merci de contacter un administrateur de phpBB SEO (Prioritairement SeO ou dcz).',
	'SEO_SUPPORT_TITLE'	=> 'Support',
	'SEO_SUPPORT_BODY'	=> 'Un support complet sera offert sur le <a href="%1$s" title=" Visitez le forum Réécriture URL %2$s" onclick="window.open(this.href); return false;"><b>forum Réécriture URL %2$s</b></a>. Nous fournirons des réponses aux questions générales, aux problèmes de configuration, et aux problèmes courants.</p><p>Prenez cette occasion de visiter notre <a href="http://www.phpbb-seo.com/fr/" title="Forum référencement" onclick="window.open(this.href); return false;"><b>Forum d’optimisation du référencement</b></a>.</p><p>Vous devriez vous <a href="http://www.phpbb-seo.com/fr/ucp.php?mode=register" title="S’inscrire sur phpBB SEO" onclick="window.open(this.href); return false;"><b>inscrire</b></a>, vous enregistrer et <a href="%3$s" title="Etre tenu au courant des mises à jours" onclick="window.open(this.href); return false;"><b>suivre le sujet de mise à disposition</b></a> pour être tenu au courant des mises à jours par mail.',
	'SEO_PREMOD_SUPPORT_BODY'	=> 'Un support complet sera offert sur le <a href="http://www.phpbb-seo.com/fr/premod-phpbb-seo/premod-referencement-phpbb-t1951.html" title="Visitez le forum Premod phpBB SEO" onclick="window.open(this.href); return false;"><b>forum Premod phpBB SEO</b></a>. Nous fournirons des réponses aux questions générales, aux problèmes de configuration, et aux problèmes courants.</p><p>Prenez cette occasion de visiter notre <a href="http://www.phpbb-seo.com/fr/" title="Forum référencement" onclick="window.open(this.href); return false;"><b>Forum d’optimisation du référencement</b></a>.</p><p>Vous devriez vous <a href="http://www.phpbb-seo.com/fr/ucp.php?mode=register" title="S’inscrire sur phpBB SEO" onclick="window.open(this.href); return false;"><b>inscrire</b></a>, vous enregistrer et <a href="http://www.phpbb-seo.com/fr/viewtopic.php?t=1951&watch=topic" title="Etre tenu au courant des mises à jours" onclick="window.open(this.href); return false;"><b>suivre le sujet de mise à disposition</b></a> pour être tenu au courant des mises à jours par mail.',
	'SEO_INSTALL_INTRO'		=> 'Bienvenue sur l’installeur phpBB SEO',
	'SEO_INSTALL_INTRO_BODY'	=> '<p>Vous êtes sur le point d’installer le mod rewrite phpBB SEO %1$s %2$s. Cet outil va activer le module d’administration du mod dans l’ACP de phpBB.</p><p>Une fois l’installation effectuée, vous devrez vous rendre dans l’ACP de phpBB pour configurer et activer la réécriture d’URLs.</p>
	<p><strong>Note:</strong> Si c’est votre première utilisation, nous vous conseillons de prendre le temps de tester ce mod sur un serveur local ou privé pour vous familiariser avec les nombreux standards de réécriture d’URLs pris en charge par le mod. De cette façon, vous ne montrerez pas des URLs différentes aux moteurs de recherches tous les deux jours pendant vos réglages. Et vous ne découvrirez pas un mois après installation que vous pouviez utiliser un meilleur standard d’URLs pour votre forum. Le patience est d’or pour le référencement, et même si le Zéro Duplicate rend les redirection HTTP 301 très faciles, vous ne voulez pas rediriger toutes vos URLs trop souvent.</p><br/>
	<p>Prés-requis :</p>
	<ul>
		<li>Serveur Apache (linux OS) avec le module mod_rewrite.</li>
		<li>Serveur IIS (windows OS) avec le module isapi_rewrite, vous devrez cependant modifier les rewriterules pour votre httpd.ini</li>
	</ul>',
	'SEO_INSTALL'		=> 'Installation',
	'UN_SEO_INSTALL_INTRO'		=> 'Bienvenue sur le désintalleur phpBB SEO',
	'UN_SEO_INSTALL_INTRO_BODY'	=> '<p>Vous êtes sur le point de désintaller le module d’administration du mod rewrite phpBB SEO%1$s %2$s.</p>
	<p><strong>Note:</strong> Cette opération ne désactivera pas la réécriture d’URLs sur votre forum tant que les fichiers de phpBB ne seront pas modifiés.</p>',
	'UN_SEO_INSTALL'		=> 'Désinstallation',
	'SEO_INSTALL_CONGRATS'		=> 'Félicitations !',
	'SEO_INSTALL_CONGRATS_EXPLAIN'	=> '<p>Vous avez correctement installé le mod rewrite phpBB3 SEO %1$s %2$s. Vous devriez maintenant vous rendre dans l’ACP de phpBB pour configurer et activer la réécriture d’URLs.<p>
	<p>Dans la nouvelle catégorie phpBB SEO, vous pourrez :</p>
	<h2>Configurer et activer la réécriture d’URLs</h2>
		<p>Prenez votre temps, c’est là que vous allez choisir à quoi vos URLs ressembleront. Les options du Zéro Duplicate apparaitront dans le même menu une fois installé.</p>
	<h2>Gérer précisément les URLs de vos forums</h2>
		<p>Vous pourrez, en mode Intermédiaire et Avancé, dissocier les URLs des forums de leurs titres réels et utiliser les mots clés que vous souhaitez dans celles-ci</p>
	<h2>Générer un .htaccess personnalisé</h2>
	<p>Une fois que vous aurez procédé aux réglages ci dessus, vous pourrez utiliser une interface simple pour générer votre .htaccess personnalisé et l’enregistrer sur votre serveur.</p>',
	'UN_SEO_INSTALL_CONGRATS'	=> 'Le module d’administration phpBB SEO à été désinstallé.',
	'UN_SEO_INSTALL_CONGRATS_EXPLAIN'	=> '<p>Vous avez correctement désinstallé le mod rewrite phpBB3 SEO  %1$s %2$s.<p>
	<p> Cette opération ne désactivera pas la réécriture d’URLs sur votre forum tant que les fichiers de phpBB ne seront pas modifiés.</p>',
	'SEO_VALIDATE_INFO'	=> 'Validation :',
	'SEO_SQL_ERROR' => 'Erreur lors de la requête SQL',
	'SEO_SQL_TRY_MANUALLY' => 'L’utilisateur SQL semble ne pas avoir les droit suffisant pour effectuer la requête nécéssaire, veuillez la lancer manuellement (phpMyadmin) :',
	// Security
	'SEO_LOGIN'		=> 'Vous devez être enregistré pour pouvoir accéder à cette page.',
	'SEO_LOGIN_ADMIN'	=> 'Vous devez être enregistré en tant qu’administrateur pour pouvoir accéder à cette page.<br/>Votre session à été détruite pour des raisons de sécurité.',
	'SEO_LOGIN_FOUNDER'	=> 'Vous devez être enregistré en tant que fondateur pour pouvoir accéder à cette page.',
	'SEO_LOGIN_SESSION'		=> 'La vérification de session a échoué.<br/>Aucune modification prise en compte.<br/>Votre session à été détruite pour des raisons de sécurité.',
	// Cache status
	'SEO_CACHE_FILE_TITLE'	=> 'Statut du cache',
	'SEO_CACHE_STATUS'		=> 'Le dossier du cache configuré est : <b>%s</b>',
	'SEO_CACHE_FOUND'		=> 'Le dossier cache a bien été trouvé.',
	'SEO_CACHE_NOT_FOUND'		=> 'Le dossier cache n’a pas été trouvé.',
	'SEO_CACHE_WRITABLE'		=> 'Le dossier cache est utilisable.',
	'SEO_CACHE_UNWRITABLE'		=> 'Le dossier cache n’est pas utilisable. Vous devez configurer son CHMOD sur 0777.',
	'SEO_CACHE_INNER_UNWRITABLE' => 'Les fichiers se trouvant dans le dossier cache ne sont pas utilisables. Assurez vous de configurer le bon CHMOD pour le dossier cache ET les fichiers qui s’y trouvent.',
	'SEO_CACHE_FORUM_NAME'		=> 'Nom du forum',
	'SEO_CACHE_URL_OK'		=> 'URL en cache',
	'SEO_CACHE_URL_NOT_OK'		=> 'URL pas en cache',
	'SEO_CACHE_URL'			=> 'URL finale',
	'SEO_CACHE_MSG_OK'	=> 'Le fichier cache a bien été mis à jour.',
	'SEO_CACHE_MSG_FAIL'	=> 'Un erreur s’est produite lors de la mise à jour du cache.',
	'SEO_CACHE_UPDATE_FAIL'	=> 'L’URL que vous avez soumise ne peut être utilisée, le cache n’a pas été modifié.',
	// Seo advices
	'SEO_ADVICE_DUPE'	=> 'Un duplicata de ce titre a été détecté pour une URL de forum : <b>%1$s</b>.<br/>Vous devez utiliser un titre et une URL unique pour chaque forum.',
	'SEO_ADVICE_RESERVED'   => 'Une URL réservée (utilisée par les posts, les profils ou les parties statiques des autres urls) a été détectée dans l’url du forum : <b>%1$s</b>.<br/>Son URL est restée inchangée.',
	'SEO_ADVICE_LENGTH'	=> 'L’URL en cache est un peu trop longue.<br/>Vous devriez en utiliser une plus courte.',
	'SEO_ADVICE_DELIM'	=> 'L’URL en cache utilise le délimiteur et l’ID du forum.<br/>Vous devriez en utiliser une sans.',
	'SEO_ADVICE_WORDS'	=> 'L’URL en cache contient un peu trop de mots.<br/>Vous devriez en utiliser une meilleur.',
	'SEO_ADVICE_DEFAULT'	=> 'L’URL finale, après formatage est celle par défaut.<br/>Vous devriez en utiliser une autre.',
	'SEO_ADVICE_START'	=> 'Les URLs soumises ne peuvent pas se terminer par un paramètre de pagination.<br/>Il a donc été retiré.',
	'SEO_ADVICE_DELIM_REM'	=> 'Les URLs soumises ne peuvent pas se terminer par un délimiteur de forum.<br/>Il a donc été retiré.',
	// Mod Rewrite type
	'ACP_SEO_SIMPLE'	=> 'Simple',
	'ACP_SEO_MIXED'		=> 'Intermédiaire',
	'ACP_SEO_ADVANCED'	=> 'Avancé',
	'ACP_ULTIMATE_SEO_URL'	=> 'Ultimate SEO URL',
	// URL Sync
	'SYNC_REQ_SQL_REW' => 'Vous devez activer le stockage d’URLs dans la base de données pour utiliser ce script!',
	'SYNC_TITLE' => 'Synchronisation des URLs',
	'SYNC_WARN' => 'Attention, veuillez ne pas interrompre le script avant qu’il ait finit, et faites une sauvegarde de votre base de données avant de l’utiliser!',
	'SYNC_COMPLETE' => 'Synchronisation effectuée !',
	'SYNC_RESET_COMPLETE' => 'Réinitialisation effectuée !',
	'SYNC_PROCESSING' => '<b>Synchronisation en cours, veuillez patienter ...</b><br/><br/><b>%1$s%%</b> ont été traité. <br/><b>%2$s</b> éléments on été traités.<br/><b>%3$s</b> éléments en tout, <b>%4$s</b> sont traités à la fois.<br/>Vitesse : <b>%5$s éléments/s.</b><br/>Temps écoulé pour ce cycle : <b>%6$ss</b><br/>Temps restant estimé : <b>%7$s minute(s)</b>',
	'SYNC_ITEM_UPDATED' => '<b>%1$s</b> éléments on été mise à jour',
	'SYNC_TOPIC_URLS' => 'Lancer la synchronisation des URL des sujets',
	'SYNC_RESET_TOPIC_URLS' => 'Réinitialiser toutes les URL de sujets',
	'SYNC_TOPIC_URL_NOTE' => 'Vous venez d’activer le stockage d’URLs dans la base de données, vous devriez maintenant synchroniser vos URLs de sujets en vous rendant sur %scette page%s si vous ne l’avez pas déjà fait.<br/>Cela ne modifiera pas vos URLs actuelles.<br/><b style="color:red">Nota Bene :</b><br/><em>Vous devriez synchroniser vos URLs uniquement si vous avez tout à fait défini votre standard d’URL. Ce n’est pas un drame si vous modifiez votre standard après avoir synchronisé vos URLs de sujets, vous devrez simplement le refaire a chaque modification de celui-ci.<br/>Ce n’est pas un drame non plus si vous ne le faites pas, vos URLs de sujets seraient alors mise à jour au cas par cas et à chaque visite d’un sujet dont l’URL ne serait pas a jour (vide ou non conforme à vos réglages).</em>',
	// phpBB SEO Class option
	'url_rewrite' => 'Activer la réécriture d’URLs',
	'url_rewrite_explain' => 'Une fois que vous aurez configuré les options ci-dessous, et généré votre .htaccess personnalisé, vous pouvez activer la réécriture d’URLs et vérifier que vos nouvelles URLs fonctionnent correctement. Si vous rencontrez des erreurs 404, c’est pratiquement à coup sûr lié au .htaccess, essayez alors les options du générateur de .htaccess pour en tester un nouveau.',
	'modrtype' => 'Type de réécriture d’URLs',
	'modrtype_explain' => 'Vous avez le choix entre trois standards de réécriture d’URLs.<br/>Les trois types de réécriture d’URLs sont : Le mode <a href="http://www.phpbb-seo.com/fr/reecriture-url-simple/seo-url-phpbb-simple-t1945.html" title="Plus de détails sur le mode Simple" onclick="window.open(this.href); return false;"><b>Simple</b></a>, le mode <a href="http://www.phpbb-seo.com/fr/reecriture-url-intermediaire/seo-url-intermediaire-t1946.html" title="Plus de détails sur le mode Intermédiaire" onclick="window.open(this.href); return false;"><b>Intermédiaire</b></a> et le mode <a href="http://www.phpbb-seo.com/fr/reecriture-url-avancee/seo-url-phpbb-avance-t1501.html" title="Plus de détails sur le mode Avancé" onclick="window.open(this.href); return false;"><b>Avancé</b></a>.<br/><br/><b style="color:red">Nota Bene :</b><br/><em>Modifier cette option va changer toutes les URLs de votre site presque trop facilement.<br/>Si vous la modifiez sur un site déjà convenablement indexé, l’opération doit être réalisée avec autant de soins et de réflexion préalable que s’il s’agissait d’une migration et pas trop souvent.<br/> La modification de cette option requiert une mise à jour de votre .htaccess.</em>',
	'sql_rewrite' => 'SQL Rewriting',
	'sql_rewrite_explain' => 'Permet d’activer les url personnalisées pour les sujets. Vous pourrez alors choisir une url précise pour chaque sujet, soit au moment de le créer, soit en éditant simplement celui-ci. Cette possibilité est toutefois réservée aux administrateurs et modérateurs du forum. <br/><br/><b style="color:red">Nota Bene :</b><br/><em>L’activation de cette option est sans conséquence sur vos url existantes, elles seront stockées telles qu’elles dans la base de donnée. Cependant, cela ne pourrait plus être le cas si vous désactivez l’option après l’avoir utilisée. Les URLs qui auraient été personnalisées pourraient alors de nouveau être traités comme si elle ne l’étaient pas.<br/>L’option a également le mérite de rendre beaucoup plus rapide la réécriture, principalement en mode avancé avec dossier virtuels, et de permettre une récupération bien plus simple des url récrites depuis n’importe quelle page.</em>',
	'profile_inj' => 'Injection profils et groupes',
	'profile_inj_explain' => 'Vous pouvez choisir d’utiliser les pseudos, les noms de groupes ainsi que les pages des messages des membres (optionel voir plus bas) dans leurs URLs respectives au lieu de la réécriture statique par défaut, <b>phpBB/pseudo-uxx.html</b> au lieu de <b>phpBB/membrexx.html</b>.',
	'profile_vfolder' => 'Dossiers virtuels pour les profils',
	'profile_vfolder_explain' => 'Vous pouvez simuler une structure en dossiers virtuels pour les profils et les pages des messages des membres (optionel voir plus bas), <b>phpBB/pseudo-uxx/(topics/)</b> ou <b>phpBB/membrexx/(topics/)</b> au lieu de <b>phpBB/pseudo-uxx(-topics).html</b> et <b>phpBB/membrexx(-topics).html</b>.<br/><br/><b style="color:red">Nota Bene :</b><br/><em>L’option "Profiles sans ID" impose cette option.<br/>La modification de cette option requiert une mise à jour de votre .htaccess.</em>',
	'profile_noids' => 'Profiles sans ID',
	'profile_noids_explain' => 'Quand l’injection des profils et groupes est activée, vous pouvez utiliser <b>phpBB/membre/pseudo</b> au lieu de <b>phpBB/pseudo-uxx.html</b>. phpBB utilise une requête SQL supplémentaire, mais légère, lors du chargement de ces pages sans ID de membre.<br/><br/><b style="color:red">Nota Bene :</b><br/><em>Les caractères spéciaux des pseudos ne sont pas pris en charge de la même manière par tous les navigateurs, FF forcera toujours l’urlencodage (<a href="http://www.php.net/urlencode">urlencode()</a>), et apparemment en Latin1 prioritairement, à contrario de IE et Opéra. Pour les options d’urlencodage avancées, reportez vous au fichier d’installation.<br/> La modification de cette option requiert une mise à jour de votre .htaccess.</em>',
	'rewrite_usermsg' => 'Réécriture Messages des membres et recherches communes',
	'rewrite_usermsg_explain' => 'Cette option n’a vraiment de sens que si vous laissez les profils et les recherches publiquement accessible.<br/> Activer cette option implique vraisemblablement une utilisation plus intense de la recherche et donc potentiellement une hausse de la charge serveur.<br/>Le type d’injection (avec et sans ID) reprend celui des des profils et groupes.<br/><b>phpBB/membre/pseudo/topics/</b> VS <b>phpBB/pseudo-uxx-topics.html</b> VS <b>phpBB/membrexx-topics.html</b>.<br/>Cette option utilise une requête SQL supplémentaire sur les pages des messages de membres.<br/>Elle active également la réécriture des recherches communes comme "sujets récents", "sujets sans réponses" et "nouveaux messages".<br/><br/><b style="color:red">Nota Bene :</b><br/><em>Le retrait d’ID sur ces pages pose les mêmes problèmes que dans les cas des pages de profils.<br/> La modification de cette option requiert une mise à jour de votre .htaccess.</em>',
	'rewrite_files' => 'Réécriture des fichiers joints',
	'rewrite_files_explain' => 'Activer la réécriture des fichiers joints. Cette option est très utile si vous avez un certain nombre d’images qui mériterait d’être indexées. Les fichiers joints doivent évidemment être téléchargeable par les robots pour que cette option ait un intérêt.<br/><br/><b style="color:red">Nota Bene :</b><br/><em>Assurez vous d’avoir la RewriteRule nécessaire (# PHPBB FILES ALL MODES) dans votre .htaccess lorsque vous activez cette option.</em>',
	'rem_sid' => 'Retrait des SID',
	'rem_sid_explain' => 'Les SID seront retirés pour 100% des URLs passées par la réécriture, pour les invités et donc les bots.<br/>Cela nous assure que les bots ne verront pas de SID sur les URLs de forums, sujets et messages, mais les visiteurs n’acceptant pas les cookies auront des chances de créer plus d’une session.<br/>Les SIDs sont toujours retirés pour les invités et robots par le Zéro Duplicate.',
	'rem_hilit' => 'Retrait des Highlights',
	'rem_hilit_explain' => 'Les Highlights seront retirées pour 100% des URLs passées par la réécriture, pour les invités et donc les bots.<br/>Cela nous assure que les bots ne verront pas de Highlights sur les URLs de forums, sujets et messages.<br/>Le Zéro Duplicate suivra ce réglage, en redirigeant les URLs avec des highlights pour les invités et les bots.',
	'rem_small_words' => 'Filtre des mots courts',
	'rem_small_words_explain' => 'Vous permet de ne pas injecter les mots de moins de 3 lettres dans les URLs.<br/><br/><b style="color:red">Nota Bene :</b><br/><em>L’activation de ces filtres peut changer un grand nombre d’URLs de votre site.<br/>Si vous l’activez sur un site déjà convenablement indexé, l’opération doit être réalisée avec autant de soins et de réflexion préalable que s’il s’agissait d’une migration et pas trop souvent.</em>',
	'virtual_folder' => 'Dossiers Virtuels',
	'virtual_folder_explain' => 'Vous permet d’utiliser les forums comme des dossiers virtuels dans les URLs des sujets.<br/><br/><b>Exemple :</b><br/><em><b>titre-forum-fxx/titre-sujet-txx.html</b> VS <b>titre-sujet-txx.html</b>pour une URL de sujet.</em><br/><br/><b style="color:red">Nota Bene :</b><br/><em>L’utilisation des dossiers virtuels peut changer un grand nombre d’URLs de votre site presque trop facilement.<br/>Si vous l’activez sur un site déjà convenablement indexé, l’opération doit être réalisée avec autant de soins et de réflexion préalable que s’il s’agissait d’une migration et pas trop souvent.<br/> La modification de cette option requiert une mise à jour de votre .htaccess.</em>',
	'virtual_root' => 'Racine Virtuelle',
	'virtual_root_explain' => 'Si phpBB est installé dans un sous dossier (exemple phpBB3/), vous pouvez simuler une installation à la racine du domaine pour les liens réécrits.<br/><br/><b>Exemple :</b><br/><em><b>phpBB3/titre-forum-fxx/titre-sujet-txx.html</b> VS <b>titre-forum-fxx/titre-sujet-txx.html</b> pour une URL de sujet.</em><br/><br/>Cela peut être pratique pour raccourcir vos URLs, surtout si vous utilisez l’option "Dossiers Virtuels". Les liens non réécrits continueront d’apparaître et de fonctionner à l’intérieur du dossier d’installation de phpBB.<br/><br/><b style="color:red">Nota Bene :</b><br/><em>L’utilisation de cette option impose d’utiliser une page d’accueil pour votre forum (comme forum.html).<br/> Elle peut également changer un grand nombre d’URLs de votre site presque trop facilement.<br/>Si vous l’activez sur un site déjà convenablement indexé, l’opération doit être réalisée avec autant de soins et de réflexion préalable que s’il s’agissait d’une migration et pas trop souvent.<br/> La modification de cette option requiert une mise à jour de votre .htaccess.</em>',
	'cache_layer' => 'Cache des URLs des forums',
	'cache_layer_explain' => 'Active le cache des URLs des forums, ce qui permet de dissocier leur titres de leurs URLs.<br/><b>Exemple :</b><br/><em><b>titre-forum-fxx/</b> VS <b>mots-clés-fxx/</b> pour une URL de forum.</em><br/><br/><b style="color:red">Nota Bene :</b><br/><em>Cette option vous permet de modifier les URLs de forum, ainsi que potentiellement celle de nombreux sujets si vous utilisez l’option "Dossiers Virtuels".<br/>Les URLs des sujets seront toujours convenablement redirigées par le Zéro Duplicate.<br/>Ce sera aussi le cas pour les forums dont les URLs comportent délimiteur et ID, voir ci-dessous.</em>',
	'rem_ids' => 'Retrait des ID de forums',
	'rem_ids_explain' => 'Permet de retirer le délimiteur et l’ID des forums de leurs URLs. Nécessite l’activation du Cache.<br/><br/><b>Exemple :</b><br/><em><b>mots-cles-fxx/</b> VS <b>mots-cles/</b> pour une URL de forum.</em><br/><br/><b style="color:red">Nota Bene :</b><br/><em>Cette option vous permet de modifier les URLs de forum, ainsi que potentiellement celle de nombreux sujets si vous utilisez l’option "Dossiers Virtuels".<br/>Les URLs des sujets seront toujours convenablement redirigées par le Zéro Duplicate.<br/><b>Cela ne sera pas le cas pour les URLs des forums utilisant cette option :</b><br/><b>mots-cles-fxx/</b> sera toujours convenablement redirigé, mais ce ne sera plus le cas si vous éditez par la suite<b>mots-cles/</b> pour utiliser par exemple <b>autres-mots-cles/</b>.<br/>Dans ce cas, <b>mots-cles/</b> sera considéré comme un forum qui n’existe pas, à défaut de redirections personnalisées. Cela dit, c’est une optimisation intéressante pour le référencement.</em>',
	'redirect_404_forum' => 'Redirection des forums en 404',
	'redirect_404_forum_explain' => 'Rediriger les URLs de forums qui n’existent pas vers l’index au lieux d’emmetre une 404 et d’afficher le message de phpBB.',
	'redirect_404_topic' => 'Redirection des messages en 404',
	'redirect_404_topic_explain' => 'Rediriger les URLs de sujets et messages qui n’existent pas vers l’index au lieux d’emmètre une 404 et d’afficher le message de phpBB.',
	// copytrights
	'copyrights' => 'Copyrights',
	'copyrights_img' => 'Lien Image',
	'copyrights_img_explain' => 'Vous pouvez afficher le lien en retour vers phpBB SEO grâce à une image ou un simple texte.',
	'copyrights_txt' => 'Texte du lien',
	'copyrights_txt_explain' => 'Vous pouvez personnaliser le texte du lien en retour vers phpBB SEO, laissez vide pour les valeurs par défauts.',
	'copyrights_title' => 'Titre du lien',
	'copyrights_title_explain' => 'Vous pouvez personaliser le texte du titre du lien en retour vers phpBB SEO, laissez vide pour les valeurs par défauts.',
	// Zero duplicate
	// Options
	'ACP_ZERO_DUPE_OFF' => 'Inactif',
	'ACP_ZERO_DUPE_MSG' => 'Message',
	'ACP_ZERO_DUPE_GUEST' => 'Invités',
	'ACP_ZERO_DUPE_ALL' => 'Tous',
	'zero_dupe' => 'Zéro Duplicate',
	'zero_dupe_explain' => 'Les options suivantes concernent le Zéro Duplicate, vous pouvez les modifier à votre guise.<br/>Ces options n’entrainent pas de modification du .htaccess.',
	'zero_dupe_on' => 'Activer le Zéro Duplicate',
	'zero_dupe_on_explain' => 'Permet d’activer les redirections du Zéro Duplicate.',
	'zero_dupe_strict' => 'Mode strict',
	'zero_dupe_strict_explain' => 'Quand il est activé le Zéro Dupe vérifiera que l’URL entrante est exactement égale à l’URL attendue.<br/>Quand il ne l’est pas le Zéro Dupe vérifiera uniquement que l’URL entrante commence bien par l’URL attendue.<br/>L’intérêt de ce réglage est de rendre plus facile l’installation et l’utilisation de mod qui ajouterait de telles variables, tout en maintenant une réduction de duplicate proche de 100 %.',
	'zero_dupe_post_redir' => 'Redirection des messages',
	'zero_dupe_post_redir_explain' => 'L’option va déterminer la manière de prendre en charge les URLs des messages ; elle peut prendre quatre valeurs :<br/><b>&nbsp;Inactif</b>, Pour désactiver les redirections des URLs de messages,<br/><b>&nbsp;Message</b>, Pour s’assurer seulement que postxx.html est utilisé pour une URL de message,<br/><b>&nbsp;Invités</b>, Pour rediriger les invités si besoin sur l’URL du sujet correspondant, plutot que sur postxx.html, et seulement s’assurer que postxx.html est utilisé pour les utilisateurs enregistrés,<br/><b>&nbsp;Tous</b>, Pour rediriger si besoin sur l’URL du sujet correspondant.<br/><br/><b style="color:red">Nota Bene :</b><br/><em>Conserver les URLs des messages en postxx.html est sans conséquence pour votre référencement dans la mesure ou vous avez bien mis en place l’interdiction de ces URLs dans votre robots.txt<br/>C’est certainement la redirection qui interviendrait le plus souvent sinon.<br/>De plus si vous choisissez de rediriger postxx.html dans tous les cas, cela implique qu’un message qui serait posté dans un sujet et qui serait ensuite déplacé dans un autre verra son URL changer.<br/>Ce n’est pas grave d’un point de vue du référencement, le Zéro Duplicate veille, mais l’URL initiale d’un message déplacé ne sera plus liée à celui ci dans ce cas là.</em>',
	// no duplicate
	'no_dupe' => 'No Duplicate',
	'no_dupe_on' => 'Activer le No Duplicate',
	'no_dupe_on_explain' => 'Le mod No Duplicate remplace les URLs de messages par leurs équivalents en URLs de sujet (avec pagination).<br/>L’activation du mod ajoute un LEFT JOIN sur une requête existante. Cela veut dire un peu plus de travail, mais cela ne devrait pas influencer significativement le temps de chargement de page.',
));
