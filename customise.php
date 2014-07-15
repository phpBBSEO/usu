<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @version $$
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
namespace phpbbseo\usu;

/**
* customize Class
* www.phpBB-SEO.com
* @package Ultimate SEO URL phpBB SEO
*/
class customise
{
	/**
	* init()
	*/
	public static function init()
	{
	}

	/**
	* inject()
	*/
	public static function inject()
	{
		global $phpEx, $config, $phpbb_root_path;

		// ===> Custom url replacements <===
		// Here you can set up custom replacements to be used in title injection.
		// Example : array( 'find' => 'replace')
		//	core::$url_replace = array(
		//		// Purely cosmetic replace
		//		'$' => 'dollar', '€' => 'euro',
		//		'\'s' => 's', // it's => its / mary's => marys ...
		//		// Language specific replace (German example)
		//		'ß' => 'ss',
		//		'Ä' => 'Ae', 'ä' => 'ae',
		//		'Ö' => 'Oe', 'ö' => 'oe',
		//		'Ü' => 'Ue', 'ü' => 'ue',
		//	);

		// ===> Custom values Delimiters, Static parts and Suffixes <===
		// ==> Delimiters <==
		// Can be overridden, requires .htaccess update <=
		// Example :
		//	core::$seo_delim['forum'] = '-mydelim'; // instead of the default "-f"

		// ==> Static parts <==
		// Can be overridden, requires .htaccess update.
		// Example :
		//	core::$seo_static['post'] = 'message'; // instead of the default "post"
		// !! phpBB files must be treated a bit differently !!
		// Example :
		//	core::$seo_static['file'][ATTACHMENT_CATEGORY_QUICKTIME] = 'quicktime'; // instead of the default "qt"
		//	core::$seo_static['file_index'] = 'my_files_virtual_dir'; // instead of the default "resources"

		// ==> Suffixes <==
		// Can be overridden, requires .htaccess update <=
		// Example :
		// 	core::$seo_ext['topic'] = '/'; // instead of the default ".html"

		// ==> Forum redirect <==
		// In case you are using forum id removing and need to edit some forum urls
		// that where already indexed, you can keep track of them ritgh here
		//
		// Example :
		//
		// core::$forum_redirect = array(
		// 	// 'old-url-without-id-nor-suffix' => forum_id,
		// 	'old-forum-url' => 23,
		// 	'another-one' => 32,
		// 	'another-version-of-the-same' => 32,
		// );
		//

		// ==> Special for lazy French, others may delete this part
		if (strpos($config['default_lang'], 'fr') !== false)
		{
			core::$seo_static['user'] = 'membre';
			core::$seo_static['group'] = 'groupe';
			core::$seo_static['global_announce'] = 'annonces';
			core::$seo_static['leaders'] = 'equipe';
			core::$seo_static['atopic'] = 'sujets-actifs';
			core::$seo_static['utopic'] = 'sans-reponses';
			core::$seo_static['npost'] = 'nouveaux-messages';
			core::$seo_static['urpost'] = 'non-lu';
			core::$seo_static['file_index'] = 'ressources';
		}
		// <== Special for lazy French, others may delete this part
	}
}
