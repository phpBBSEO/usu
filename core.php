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
* core Class
* www.phpBB-SEO.com
* @package Ultimate SEO URL phpBB SEO
*/
class core
{
	/**
	* mod rewrite type
	* 	1 : simple
	* 	2 : mixed
	* 	3 : advanced
	*/
	public static $modrtype = 2; // We set it to mixed as a default value

	/**
	* paths
	*/
	public static $seo_path = array();

	/**
	* uri cache
	*/
	public static $seo_url = array(
		'forum'		=>  array(),
		'topic'		=>  array(),
		'user'		=> array(),
		'username'	=> array(),
		'group'		=> array(),
		'file'		=> array(),
	);

	/**
	* GET filters
	*/
	public static $get_filter = array(
		'forum'		=> array('st' => 0, 'sk' => 't', 'sd' => 'd'),
		'topic'		=> array('st' => 0, 'sk' => 't', 'sd' => 'a', 'hilit' => ''),
		'search'	=> array('st' => 0, 'sk' => 't', 'sd' => 'd', 'ch' => ''),
	);

	/**
	* file filters
	*/
	private static $stop_files = array(
		'posting'	=> 1,
		'faq'		=> 1,
		'ucp'		=> 1,
		'swatch'	=> 1,
		'mcp'		=> 1,
		'style'		=> 1,
		'cron'		=> 1,
	);

	/**
	* dir filters
	*/
	public static $stop_dirs = array();

	/**
	* qs filters
	*/
	public static $stop_vars = array('view=', 'mark=', 'watch=', 'hash=');

	/**
	* seo delimiters
	*/
	public static $seo_delim = array(
		'forum'	=> '-f',
		'topic'	=> '-t',
		'user'	=> '-u',
		'group'	=> '-g',
		'start'	=> '-',
		'sr'	=> '-',
		'file'	=> '/',
	);

	/**
	* seo suffixes
	*/
	public static $seo_ext = array(
		'forum'				=> '.html',
		'topic'				=> '.html',
		'post'				=> '.html',
		'user'				=> '.html',
		'group'				=> '.html',
		'index'				=> '',
		'global_announce'	=> '/',
		'leaders'			=> '.html',
		'atopic'			=> '.html',
		'utopic'			=> '.html',
		'npost'				=> '.html',
		'urpost'			=> '.html',
		'pagination'		=> '.html',
		'gz_ext'			=> '',
	);

	/**
	* seo static
	*/
	public static $seo_static = array(
		'forum'				=> 'forum',
		'topic'				=> 'topic',
		'post'				=> 'post',
		'user'				=> 'member',
		'group'				=> 'group',
		'index'				=> '',
		'global_announce'	=> 'announces',
		'leaders'			=> 'the-team',
		'atopic'			=> 'active-topics',
		'utopic'			=> 'unanswered',
		'npost'				=> 'newposts',
		'urpost'			=> 'unreadposts',
		'pagination'		=> 'page',
		'gz_ext'			=> '.gz',
	);

	/**
	* hbase
	*/
	public static $file_hbase = array();

	/**
	* current page url
	*/
	public static $page_url = '';

	/**
	* options with default values
	*/
	public static $seo_opt = array(
		'url_rewrite'			=> false,
		'modrtype'				=> 2,
		'sql_rewrite'			=> false,
		'profile_inj'			=> false,
		'profile_vfolder'		=> false,
		'profile_noids'			=> false,
		'rewrite_usermsg'		=> false,
		'rewrite_files'			=> false,
		'rem_sid'				=> false,
		'rem_hilit'				=> true,
		'rem_small_words'		=> false,
		'virtual_folder'		=> false,
		'virtual_root'			=> false,
		'cache_layer'			=> true,
		'rem_ids'				=> false,
		'redirect_404_forum'	=> false,
	);

	/**
	* runtime variables
	*/
	public static $rewrite_method = array();
	public static $paginate_method = array();
	public static $seo_cache = array();
	public static $cache_config = array();
	public static $RegEx = array();
	public static $sftpl = array();
	public static $url_replace = array();
	public static $ssl = array('requested' => false, 'forced' => false);
	public static $forum_redirect = array();

	/**
	* rewriting private variable
	* per url values
	*/
	public static $get_vars = array();
	public static $path = '';
	public static $start = '';
	public static $filename = '';
	public static $file = '';
	public static $url_in = '';
	public static $url = '';

	private static $inited = false;

	/**
	* init
	*/
	public static function init()
	{
		global $phpEx, $config, $phpbb_root_path, $request;

		if (self::$inited)
		{
			return;
		}

		self::$inited = true;

		// fix for an interesting bug with parse_str http://bugs.php.net/bug.php?id=48697
		// and apparently, the bug is still here in php5.3
		@ini_set("mbstring.internal_encoding", 'UTF-8');

		// reset the rewrite_method for $phpbb_root_path
		self::$rewrite_method[$phpbb_root_path] = array();

		// phpBB files must be treated a bit differently
		self::$seo_static['file'] = array(
			ATTACHMENT_CATEGORY_NONE		=> 'file',
			ATTACHMENT_CATEGORY_IMAGE		=> 'image',
			ATTACHMENT_CATEGORY_WM			=> 'wm',
			ATTACHMENT_CATEGORY_RM			=> 'rm',
			ATTACHMENT_CATEGORY_THUMB		=> 'image',
			ATTACHMENT_CATEGORY_FLASH		=> 'flash',
			ATTACHMENT_CATEGORY_QUICKTIME	=> 'qt',
		);

		self::$seo_static['file_index'] = 'resources';
		self::$seo_static['thumb'] = 'thumb';

		// Options that may be bypassed by the cached settings.
		self::$cache_config['dynamic_options'] = array_keys(self::$seo_opt); // Do not change

		// copyright notice, do not change
		self::$cache_config['dynamic_options']['copyrights'] = self::$seo_opt['copyrights'] = array('img' => true, 'txt' => '', 'title' => '');

		// Caching config
		define('PHPBB_SEO_USU_ROOT_DIR', rtrim(dirname(realpath(__FILE__)), '\\/') . '/');
		self::$seo_opt['cache_folder'] = PHPBB_SEO_USU_ROOT_DIR . 'cache/'; // where the cache file is stored

		self::$seo_opt['topic_type'] = array(); // do not change
		self::$cache_config['cache_enable'] = true; // do not change
		self::$cache_config['rem_ids'] = self::$seo_opt['rem_ids']; // do not change, set up above
		self::$cache_config['file'] = self::$seo_opt['cache_folder'] . 'config.runtime.' . $phpEx;
		self::$cache_config['cached'] = false; // do not change
		self::$cache_config['forum_urls'] = array(); // do not change
		self::$cache_config['forum'] = array(); // do not change
	//	self::$cache_config['topic'] = array(); // do not change
		self::$cache_config['settings'] = array(); // do not change

		// --> Zero Dupe
		self::$seo_opt['zero_dupe'] = array(
			'on'			=> false, // Activate or not the redirections : true / false
			'strict'		=> false, // strict compare, == VS strpos() : true / false
			'post_redir'	=> 'guest', // Redirect post urls if not valid ? : guest / all / post / off
		);
		self::$cache_config['dynamic_options']['zero_dupe'] = self::$seo_opt['zero_dupe']; // Do not change
		self::$seo_opt['zero_dupe']['do_redir'] = false; // do not change
		self::$seo_opt['zero_dupe']['go_redir'] = true; // do not change
		self::$seo_opt['zero_dupe']['do_redir_post'] = false; // do not change
		self::$seo_opt['zero_dupe']['start'] = 0; // do not change
		self::$seo_opt['zero_dupe']['redir_def'] = array(); // do not change
		// <-- Zero Dupe

		// --> DOMAIN SETTING <-- //
		// SSL, beware with cookie secure, it won't force ssl here,
		// so you will need to switch to ssl for your user to use cookie based session (no sid)
		// could be done by using an https link to login form (or within the redirect after login)
		self::$ssl['requested'] = (bool) ($request->server('HTTPS') || ($request->server('SERVER_PORT') === 443));
		self::$ssl['forced'] = (bool) (($config['server_protocol'] === 'https://'));
		self::$ssl['use'] = (bool) (self::$ssl['requested'] || self::$ssl['forced']);

		// Server Settings, rely on DB
		$server_protocol = self::$ssl['use'] ? 'https://' : 'http://';
		$server_name = trim($config['server_name'], '/ ');
		$server_port = max(0, (int) $config['server_port']);
		$server_port = ($server_port && $server_port <> 80) ? ':' . $server_port : '';
		$script_path = trim($config['script_path'], './ ');
		$script_path = (empty($script_path)) ? '' : $script_path . '/';

		self::$seo_path['root_url'] = strtolower($server_protocol . $server_name . $server_port . '/');
		self::$seo_path['phpbb_urlR'] = self::$seo_path['phpbb_url'] =  self::$seo_path['root_url'] . $script_path;
		self::$seo_path['phpbb_script'] = $script_path;
		self::$seo_path['phpbb_files'] = self::$seo_path['phpbb_url'] . 'download/';
		self::$seo_path['canonical'] = '';

		// magic quotes, do it like this in case phpbbseo class is not started in common.php
		if (!defined('STRIP'))
		{
			if (version_compare(PHP_VERSION, '6.0.0-dev', '<'))
			{
				if (get_magic_quotes_gpc())
				{
					define('SEO_STRIP', true);
				}
			}
		}
		else if (STRIP)
		{
			define('SEO_STRIP', true);
		}

		// File setting
		self::seo_req_uri();
		self::$seo_opt['seo_base_href'] = self::$seo_opt['req_file'] = self::$seo_opt['req_self'] = '';

		if ($script_name = $request->server('PHP_SELF'))
		{
			// From session.php
			// Replace backslashes and doubled slashes (could happen on some proxy setups)
			self::$seo_opt['req_self'] = str_replace(array('\\', '//'), '/', $script_name);

			// basenamed page name (for example: index)
			self::$seo_opt['req_file'] = urlencode(htmlspecialchars(str_replace(".$phpEx", '', basename(self::$seo_opt['req_self']))));
		}

		customise::init();

		// Let's load config and forum urls, mods adding options in the cache file must do it in customise::init
		self::read_config();

		// Load settings from setup.php
		customise::inject();

		// Let's make sure that settings are consistent
		self::check_config();
		self::$seo_path['phpbb_filesR'] = self::$seo_path['phpbb_urlR'] . self::$seo_static['file_index'] . self::$seo_delim['file'];

		// see if we have some custom replacement
		if (!empty(self::$url_replace))
		{
			self::$url_replace = array(
				'find'		=> array_keys(self::$url_replace),
				'replace'	=> array_values(self::$url_replace)
			);
		}

		// Array of the filenames that require the use of a base href tag.
		self::$file_hbase = array_merge(array('viewtopic' => self::$seo_path['phpbb_url'], 'viewforum' => self::$seo_path['phpbb_url'], 'memberlist' => self::$seo_path['phpbb_url'], 'search' => self::$seo_path['phpbb_url']), self::$file_hbase);

		// Stop dirs
		self::$stop_dirs = array_merge(array($phpbb_root_path . 'adm/' => false), self::$stop_dirs);

		// Rewrite functions array : array('path' => array('file_name' => 'function_name'));
		// Warning, this way of doing things is path aware, this implies path to be properly sent to append_sid()
		// Allow to add options without slowing down the URL rewriting process
		self::$rewrite_method[$phpbb_root_path] = array_merge(
			array(
				'viewtopic'		=> 'viewtopic',
				'viewforum'		=> 'viewforum',
				'index'			=> 'index',
				'memberlist'	=> 'memberlist',
				'search'		=> self::$seo_opt['rewrite_usermsg'] ? 'search' : '',
			),
			self::$rewrite_method[$phpbb_root_path]
		);
		// This hax is required because phpBB Path helper is tricked
		// into thinking our virtual dirs are real
		self::$rewrite_method[$phpbb_root_path . '../']['viewforum'] = 'viewforum';
		self::$rewrite_method[$phpbb_root_path . '../']['viewtopic'] = 'viewtopic';
		self::$rewrite_method[$phpbb_root_path . 'download/']['file'] = self::$seo_opt['rewrite_files'] ? 'phpbb_files' : '';

		// allow empty ext
		$pag_mtds = array();

		foreach (self::$seo_ext as $key => $ext)
		{
			$pag_mtds[$key] = trim($ext, '/') ? 'rewrite_pagination' : 'rewrite_pagination_page';
		}

		self::$paginate_method = array_merge(
			$pag_mtds,
			self::$paginate_method
		);

		self::$RegEx = array_merge(
			array(
				'topic'	=> array(
					'check'		=> '`^' . (self::$seo_opt['virtual_folder'] ? '%1$s/' : '') . '(' . self::$seo_static['topic'] . '|[a-z0-9_-]+' . self::$seo_delim['topic'] . ')$`i',
					'match'		=> '`^((([a-z0-9_-]+)(' . self::$seo_delim['forum'] . '([0-9]+))?/)?(' . self::$seo_static['topic'] . '(?!=' . self::$seo_delim['topic'] . ')|.+(?=' . self::$seo_delim['topic'] . '))(' . self::$seo_delim['topic'] . ')?)([0-9]+)$`i',
					'parent'	=> 2,
					'parent_id'	=> 5,
					'title'		=> 6,
					'id'		=> 8,
					'url'		=> 1,
				),
				'forum'	=> array(
					'check'		=> self::$modrtype >= 2 ? '`^[a-z0-9_-]+(' . self::$seo_delim['forum'] . '[0-9]+)?$`i' : '`^' . self::$seo_static['forum'] . '[0-9]+$`i',
					'match'		=> '`^((' . self::$seo_static['forum'] . '|.+)(' . self::$seo_delim['forum'] . '([0-9]+))?)$`i',
					'title'		=> '\2',
					'id'		=> '\4',
				),
			),
			self::$RegEx
		);

		// preg_replace() patterns for format_url()
		// One could want to add |th|horn after |slash, but I'm not sure that Þ should be replaced with t and Ð with e
		self::$RegEx['url_find'] = array('`&([a-z]+)(acute|grave|circ|cedil|tilde|uml|lig|ring|caron|slash);`i', '`&(amp;)?[^;]+;`i', '`[^a-z0-9]`i'); // Do not remove : deaccentuation, html/xml entities & non a-z chars
		self::$RegEx['url_replace'] = array('\1', '-', '-');

		if (self::$seo_opt['rem_small_words'])
		{
			self::$RegEx['url_find'][] = '`(^|-)[a-z0-9]{1,2}(?=-|$)`i';
			self::$RegEx['url_replace'][] = '-';
		}

		self::$RegEx['url_find'][] ='`[-]+`'; // Do not remove : multi hyphen reduction
		self::$RegEx['url_replace'][] = '-';

		// $1 parent : string/
		// $2 title / url : topic-title / forum-url-fxx
		// $3 id
		self::$sftpl = array_merge(
			array(
				'topic'			=> (self::$seo_opt['virtual_folder'] ? '%1$s/' : '') . '%2$s' . self::$seo_delim['topic'] . '%3$s',
				'topic_smpl'	=> (self::$seo_opt['virtual_folder'] ? '%1$s/' : '') . self::$seo_static['topic'] . '%3$s',
				'forum'			=> self::$modrtype >= 2 ? '%1$s' : self::$seo_static['forum'] . '%2$s',
				'group'			=> self::$seo_opt['profile_inj'] ? '%2$s' . self::$seo_delim['group'] . '%3$s' : self::$seo_static['group'] . '%3$s',
			),
			self::$sftpl
		);

		if (self::$seo_opt['url_rewrite'] && !defined('ADMIN_START') && isset(self::$file_hbase[self::$seo_opt['req_file']]))
		{
			self::$seo_opt['seo_base_href'] = '<base href="' . self::$file_hbase[self::$seo_opt['req_file']] . '"/>';
		}

		return;
	}

	/**
	* will make sure that configured options are consistent
	*/
	public static function check_config()
	{
		self::$modrtype = max(0, (int) self::$modrtype);

		// For profiles and user messages pages, if we do not inject, we do not get rid of ids
		self::$seo_opt['profile_noids'] = self::$seo_opt['profile_inj'] ? self::$seo_opt['profile_noids'] : false;

		// If profile noids ... or user messages virtual folder
		if (self::$seo_opt['profile_noids'] || self::$seo_opt['profile_vfolder'])
		{
			self::$seo_ext['user'] = trim(self::$seo_ext['user'], '/') ? '/' : self::$seo_ext['user'];
		}

		self::$seo_delim['sr'] = trim(self::$seo_ext['user'], '/') ? self::$seo_delim['sr'] : self::$seo_ext['user'];

		// If we use virtual folder ...
		if (self::$seo_opt['virtual_folder'])
		{
			self::$seo_ext['forum'] = self::$seo_ext['global_announce'] = trim(self::$seo_ext['forum'], '/') ? '/' : self::$seo_ext['forum'];
		}

		// If the forum cache is not activated
		if (!self::$seo_opt['cache_layer'])
		{
			self::$seo_opt['rem_ids'] = false;
		}

		// virtual root option
		if (self::$seo_opt['virtual_root'] && self::$seo_path['phpbb_script'])
		{
			// virtual root is available and activated
			self::$seo_path['phpbb_urlR'] = self::$seo_path['root_url'];
			self::$file_hbase['index'] = self::$seo_path['phpbb_url'];
			self::$seo_static['index'] = empty(self::$seo_static['index']) ? 'forum' : self::$seo_static['index'];
		}
		else
		{
			// virtual root is not used or usable
			self::$seo_opt['virtual_root'] = false;
		}

		self::$seo_ext['index'] = empty(self::$seo_static['index']) ? '' : (empty(self::$seo_ext['index']) ? '.html' : self::$seo_ext['index']);

		// In case url rewriting is deactivated
		if (!self::$seo_opt['url_rewrite'] || self::$modrtype == 0)
		{
			self::$seo_opt['sql_rewrite'] = false;
			self::$seo_opt['zero_dupe']['on'] = false;
		}
	}

	// --> URL rewriting functions <--
	/**
	* format_url($url, $type = 'topic')
	* Prepare Titles for URL injection
	*/
	public static function format_url($url, $type = 'topic')
	{
		$url = preg_replace('`\[.*\]`U','',$url);

		if (isset(self::$url_replace['find']))
		{
			$url = str_replace(self::$url_replace['find'], self::$url_replace['replace'], $url);
		}

		$url = htmlentities($url, ENT_COMPAT, 'UTF-8');
		$url = preg_replace(self::$RegEx['url_find'] , self::$RegEx['url_replace'], $url);
		$url = strtolower(trim($url, '-'));

		return empty($url) ? $type : $url;
	}

	/**
	* set_url($url, $id = 0, $type = 'forum', $parent = '')
	* Prepare url first part and checks cache
	*/
	public static function set_url($url, $id = 0, $type = 'forum', $parent = '')
	{
		if (empty(self::$seo_url[$type][$id]))
		{
			return (self::$seo_url[$type][$id] = !empty(self::$cache_config[$type . '_urls'][$id]) ? self::$cache_config[$type . '_urls'][$id] : sprintf(self::$sftpl[$type], $parent, self::format_url($url, self::$seo_static[$type]) . self::$seo_delim[$type] . $id, $id));
		}

		return self::$seo_url[$type][$id];
	}

	/**
	* prepare_url($type, $title, $id, $parent = '', $smpl = false)
	* Prepare url first part
	*/
	public static function prepare_url($type, $title, $id, $parent = '', $smpl = false)
	{
		return empty(self::$seo_url[$type][$id]) ? (self::$seo_url[$type][$id] = sprintf(self::$sftpl[$type . ($smpl ? '_smpl' : '')], $parent, !$smpl ? self::format_url($title, self::$seo_static[$type]) : '', $id)) : self::$seo_url[$type][$id];
	}

	/**
	* set_title($type, $title, $id, $parent = '')
	* Set title for url injection
	*/
	public static function set_title($type, $title, $id, $parent = '')
	{
		return empty(self::$seo_url[$type][$id]) ? (self::$seo_url[$type][$id] = ($parent ? $parent . '/' : '') . self::format_url($title, self::$seo_static[$type])) : self::$seo_url[$type][$id];
	}

	/**
	* get_url_info($type, $url, $info = 'title')
	* Get info from url (title, id, parent etc ...)
	*/
	public static function get_url_info($type, $url, $info = 'title')
	{
		$url = trim($url, '/ ');

		if (preg_match(self::$RegEx[$type]['match'], $url, $matches))
		{
			return !empty($matches[self::$RegEx[$type][$info]]) ? $matches[self::$RegEx[$type][$info]] : '';
		}

		return '';
	}

	/**
	* check_url($type, $url, $parent = '')
	* Validate a prepared url
	*/
	public static function check_url($type, $url, $parent = '')
	{
		if (empty($url))
		{
			return false;
		}

		$parent = !empty($parent) ? (string) $parent : '[a-z0-9/_-]+';

		return !empty(self::$RegEx[$type]['check']) ? preg_match(sprintf(self::$RegEx[$type]['check'], $parent), $url) : false;
	}

	/**
	* prepare_topic_url(&$topic_data, $topic_forum_id)
	* Prepare topic url with SQL based URL rewriting
	*/
	public static function prepare_topic_url(&$topic_data, $topic_forum_id = 0)
	{
		$id = max(0, (int) $topic_data['topic_id']);

		if (empty(self::$seo_url['topic'][$id]))
		{
			if (!empty($topic_data['topic_url']))
			{
				return (self::$seo_url['topic'][$id] = $topic_data['topic_url'] . $id);
			}
			else
			{
				if (self::$modrtype > 2)
				{
					$topic_data['topic_title'] = censor_text($topic_data['topic_title']);
				}

				$topic_forum_id = $topic_forum_id ? $topic_forum_id : $topic_data['forum_id'];
				$parent_forum = $topic_data['topic_type'] == POST_GLOBAL ? self::$seo_static['global_announce'] : (!empty(self::$seo_url['forum'][$topic_forum_id]) ? self::$seo_url['forum'][$topic_forum_id] : '');

				return (self::$seo_url['topic'][$id] = sprintf(self::$sftpl['topic' . (self::$modrtype > 2 ? '' : '_smpl')], $parent_forum, self::$modrtype > 2 ? self::format_url($topic_data['topic_title'], self::$seo_static['topic']) : '', $id));
			}
		}

		return self::$seo_url[$type][$id];
	}

	/**
	* prepare_forum_url(&$forum_data, $parent = '')
	* Prepare url first part and checks cache
	*/
	public static function prepare_forum_url(&$forum_data)
	{
		$id = max(0, (int) $forum_data['forum_id']);

		if (empty(self::$seo_url['forum'][$id]))
		{
			self::$seo_url['forum'][$id] = sprintf(self::$sftpl['forum'], self::format_url($forum_data['forum_name'], self::$seo_static['forum']) . self::$seo_delim['forum'] . $id, $id);
		}

		return self::$seo_url['forum'][$id];
	}

	/**
	* prepare_iurl($data, $type, $parent = '')
	* Prepare url first part (not for forums) with SQL based URL rewriting
	*/
	public static function prepare_iurl(&$data, $type, $parent = '')
	{
		$id = max(0, (int) $data[$type . '_id']);

		if (empty(self::$seo_url[$type][$id]))
		{
			if (!empty($data[$type . '_url']))
			{
				return (self::$seo_url[$type][$id] = $data[$type . '_url'] . $id);
			}
			else
			{
				return (self::$seo_url[$type][$id] = sprintf(self::$sftpl[$type . (self::$modrtype > 2 ? '' : '_smpl')], $parent, self::$modrtype > 2 ? self::format_url($data[$type . '_title'], self::$seo_static[$type]) : '', $id));
			}
		}

		return self::$seo_url[$type][$id];
	}

	/**
	* drop_sid($url)
	* drop the sid's in url
	*/
	public static function drop_sid($url)
	{
		return (strpos($url, 'sid=') !== false) ? trim(preg_replace(array('`&(amp;)?sid=[a-z0-9]+(&amp;|&)?`i', '`(\?)sid=[a-z0-9]+(&amp;|&)?`i'), array('\2', '\1'), $url), '?') : $url;
	}

	/**
	* set_user_url($username, $user_id = 0)
	* Prepare profile url
	*/
	public static function set_user_url($username, $user_id = 0)
	{
		if (empty(self::$seo_url['user'][$user_id]))
		{
			$username = strip_tags($username);

			self::$seo_url['username'][$username] = $user_id;

			if (self::$seo_opt['profile_inj'])
			{
				if (self::$seo_opt['profile_noids'])
				{
					self::$seo_url['user'][$user_id] = self::$seo_static['user'] . '/' . self::seo_url_encode($username);
				}
				else
				{
					self::$seo_url['user'][$user_id] = self::format_url($username,  self::$seo_delim['user']) . self::$seo_delim['user'] . $user_id;
				}
			}
			else
			{
				self::$seo_url['user'][$user_id] = self::$seo_static['user'] . $user_id;
			}
		}
	}

	/**
	* seo_url_encode($url)
	* custom urlencoding
	*/
	public static function seo_url_encode($url)
	{
		// can be faster to return $url directly if you do not allow more chars than
		// [a-zA-Z0-9_\.-] in your usernames
		// return $url;
		// Here we hanlde the "&", "/", "+" and "#" case proper (http://www.php.net/urlencode => http://issues.apache.org/bugzilla/show_bug.cgi?id=34602)
		static $find = array('&', '/', '#', '+');
		static $replace = array('%26', '%2F', '%23', '%2b');

		return rawurlencode(str_replace($find, $replace, \utf8_normalize_nfc(htmlspecialchars_decode(str_replace('&amp;amp;', '%26', rawurldecode($url))))));
	}

	/**
	* url_rewrite($url, $params = false, $is_amp = true, $session_id = false)
	* builds and Rewrite URLs.
	* Allow adding of many more cases than just the
	* regular phpBB URL rewritting without slowing down the process.
	* Mimics append_sid with some shortcuts related to how url are rewritten
	*/
	public static function url_rewrite($url, $params = false, $is_amp = true, $session_id = false, $recache = false)
	{
		global $phpEx, $user, $_SID, $_EXTRA_URL, $phpbb_root_path;

		$qs = $anchor = '';
		self::$get_vars = array();
		$amp_delim = ($is_amp) ? '&amp;' : '&';

		if (strpos($url, '#') !== false)
		{
			list($url, $anchor) = explode('#', $url, 2);
			$anchor = '#' . $anchor;
		}

		@list(self::$path, $qs) = explode('?', $url, 2);

		if (is_array($params))
		{
			if (!empty($params['#']))
			{
				$anchor = '#' . $params['#'];
				unset($params['#']);
			}

			$qs .= ($qs ? $amp_delim : '') . self::query_string($params, $amp_delim, '');
		}
		else if ($params)
		{
			if (strpos($params, '#') !== false)
			{
				list($params, $anchor) = explode('#', $params, 2);
				$anchor = '#' . $anchor;
			}

			$qs .= ($qs ? $amp_delim : '') . $params;
		}

		// Appending custom url parameter?
		if (!empty($_EXTRA_URL))
		{
			$qs .= ($qs ? $amp_delim : '') . implode($amp_delim, $_EXTRA_URL);
		}

		// Sid ?
		if ($session_id === false && !empty($_SID))
		{
			$qs .= ($qs ? $amp_delim : '') . "sid=$_SID";
		}
		else if ($session_id)
		{
			$qs .= ($qs ? $amp_delim : '') . "sid=$session_id";
		}

		// Build vanilla URL
		if (preg_match("`\.[a-z0-9]+$`i", self::$path))
		{
			self::$file = basename(self::$path);
			self::$path = ltrim(str_replace(self::$file, '', self::$path), '/');
		}
		else
		{
			self::$file = '';
			self::$path = ltrim(self::$path, '/');
		}

		self::$url_in = self::$file . ($qs ? '?' . $qs : '');
		$url = self::$path . self::$url_in;

		if (!$recache && isset(self::$seo_cache[$url]))
		{
			return self::$seo_cache[$url] . $anchor;
		}

		if (!self::$seo_opt['url_rewrite'] || defined('ADMIN_START') || isset(self::$stop_dirs[self::$path]))
		{
			return (self::$seo_cache[$url] = $url) . $anchor;
		}

		self::$filename = trim(str_replace(".$phpEx", '', self::$file));

		if (isset(self::$stop_files[self::$filename]))
		{
			// add full url
			$url = self::$path == $phpbb_root_path ? self::$seo_path['phpbb_url'] . preg_replace('`^' . $phpbb_root_path . '`', '', $url) : $url;

			return (self::$seo_cache[$url] = $url) . $anchor;
		}

		parse_str(str_replace('&amp;', '&', $qs), self::$get_vars);

		// strp slashes if necessary
		if (defined('SEO_STRIP'))
		{
			self::$get_vars = array_map('\\phpbbseo\\core::stripslashes', self::$get_vars);
		}

		if (empty($user->data['is_registered']))
		{
			if (self::$seo_opt['rem_sid'])
			{
				unset(self::$get_vars['sid']);
			}

			if (self::$seo_opt['rem_hilit'])
			{
				unset(self::$get_vars['hilit']);
			}
		}

		self::$url = self::$file;

		if (!empty(self::$rewrite_method[self::$path][self::$filename]))
		{
			$rewrite_method_name = self::$rewrite_method[self::$path][self::$filename];

			rewriter::$rewrite_method_name();

			return (self::$seo_cache[$url] = self::$path . self::$url . self::query_string(self::$get_vars, $amp_delim, '?')) . $anchor;
		}
		else
		{
			return (self::$seo_cache[$url] = $url) . $anchor;
		}
	}

	/**
	* Returns true if the user can edit urls
	* @access public
	*/
	public static function url_can_edit($forum_id = 0)
	{
		global $user, $auth;

		if (empty(self::$seo_opt['sql_rewrite']) || empty($user->data['is_registered']))
		{
			return false;
		}

		if ($auth->acl_get('a_'))
		{
			return true;
		}

		// un comment to grant url edit perm to moderators in at least a forums
		/*
		if ($auth->acl_getf_global('m_'))
		{
			return true;
		}
		*/

		$forum_id = max(0, (int) $forum_id);

		if ($forum_id && $auth->acl_get('m_', $forum_id))
		{
			return true;
		}

		return false;
	}

	/**
	* Will break if a $filter pattern is foundin $url.
	* Example $filter = array("view=", "mark=");
	*/
	public static function filter_url($filter = array())
	{
		foreach ($filter as $patern)
		{
			if (strpos(self::$url_in, $patern) !== false)
			{
				self::$get_vars = array();
				self::$url = self::$url_in;

				return false;
			}
		}

		return true;
	}

	/**
	* Will unset all default var stored in $filter array.
	* Example $filter = array('st' => 0, 'sk' => 't', 'sd' => 'a', 'hilit' => '');
	*/
	public static function filter_get_var($filter = array())
	{
		if (!empty(self::$get_vars))
		{
			foreach (self::$get_vars as $paramkey => $paramval)
			{
				if (isset($filter[$paramkey]))
				{
					if ($filter[$paramkey] ==  self::$get_vars[$paramkey] || !isset(self::$get_vars[$paramkey]))
					{
						unset(self::$get_vars[$paramkey]);
					}
				}
			}
		}

		return;
	}

	/**
	* Appends the GET vars in the query string
	* @access public
	*/
	public static function query_string($get_vars = array(), $amp_delim = '&amp;', $url_delim = '?')
	{
		if(empty($get_vars))
		{
			return '';
		}

		$params = array();

		foreach ($get_vars as $key => $value)
		{
			if (is_array($value))
			{
				foreach ($value as $k => $v)
				{
					$params[] = $key . '[' . $k . ']=' . $v;
				}
			}
			else
			{
				// until https://tracker.phpbb.com/browse/PHPBB3-12852 is fixed
				// $params[] = $key . (!trim($value) ? '' : '=' . $value);
				$params[] = $key . '=' . $value;
			}
		}

		return $url_delim . implode($amp_delim , $params);
	}

	/**
	* rewrite pagination, simple
	* -xx.html
	*/
	public static function rewrite_pagination($suffix)
	{
		self::$start = self::seo_start(@self::$get_vars['start']) . $suffix;

		unset(self::$get_vars['start']);
	}

	/**
	* rewrite pagination, virtual folder
	* /pagexx.html
	*/
	public static function rewrite_pagination_page($suffix = '/')
	{
		self::$start = self::seo_start_page(@self::$get_vars['start'], $suffix);

		unset(self::$get_vars['start']);

		return self::$start;
	}

	/**
	* Returns usable start param
	* -xx
	*/
	public static function seo_start($start)
	{
		return ($start >= 1) ? self::$seo_delim['start'] . (int) $start : '';
	}

	/**
	* Returns usable start param
	* pagexx.html
	* Only used in virtual folder mode
	*/
	public static function seo_start_page($start, $suffix = '/')
	{
		return ($start >= 1) ? '/' . self::$seo_static['pagination'] . (int) $start . self::$seo_ext['pagination'] : $suffix;
	}

	/**
	* Returns the full REQUEST_URI
	*/
	public static function seo_req_uri()
	{
		global $request;

		self::$seo_path['uri'] = $request->server('HTTP_X_REWRITE_URL'); // IIS  isapi_rewrite

		if (empty(self::$seo_path['uri']))
		{
			// Apache mod_rewrite
			self::$seo_path['uri'] = $request->server('REQUEST_URI');
		}

		if (empty(self::$seo_path['uri']))
		{
			self::$seo_path['uri'] =  $request->server('SCRIPT_NAME') . (($qs = $request->server('QUERY_STRING')) != '' ? "?$qs" : '');
		}

		self::$seo_path['uri'] = str_replace('%26', '&', rawurldecode(ltrim(self::$seo_path['uri'], '/')));

		// workaround for FF default iso encoding
		if (!self::is_utf8(self::$seo_path['uri']))
		{
			self::$seo_path['uri'] = \utf8_normalize_nfc(\utf8_recode(self::$seo_path['uri'], 'iso-8859-1'));
		}

		self::$seo_path['uri'] = self::$seo_path['root_url'] . self::$seo_path['uri'];

		return self::$seo_path['uri'];
	}

	/**
	* seo_end() : The last touch function
	* Note : This mod is going to help your site a lot in Search Engines
	* We request that you keep this copyright notice as specified in the licence.
	* If You really cannot put this link, you should at least provide us with one visible
	* (can be small but visible) link on your home page or your forum Index using this code for example :
	* <a href="http://www.phpbb-seo.com/" title="Search Engine Optimization">phpBB SEO</a>
	*/
	public static function seo_end($return = false)
	{
		global $user, $config;

		if (empty(self::$seo_opt['copyrights']['title']))
		{
			self::$seo_opt['copyrights']['title'] = strpos($config['default_lang'], 'fr') !== false  ?  'Optimisation du R&eacute;f&eacute;rencement' : 'Search Engine Optimization';
		}

		if (empty(self::$seo_opt['copyrights']['txt']))
		{
			self::$seo_opt['copyrights']['txt'] = 'phpBB SEO';
		}

		if (self::$seo_opt['copyrights']['img'])
		{
			$output = '<br /><a href="http://www.phpbb-seo.com/" title="' . self::$seo_opt['copyrights']['title'] . '"><img src="' . self::$seo_path['phpbb_url'] . 'images/phpbb-seo.png" alt="' . self::$seo_opt['copyrights']['txt'] . '"/></a>';
		}
		else
		{
			$output = '<br /><a href="http://www.phpbb-seo.com/" title="' . self::$seo_opt['copyrights']['title'] . '">' . self::$seo_opt['copyrights']['txt'] . '</a>';
		}

		if ($return)
		{
			return $output;
		}
		else
		{
			$user->lang['TRANSLATION_INFO'] .= $output;
		}

		return;
	}

	// -> Cache functions
	/**
	* forum_id(&$forum_id, $forum_uri = '')
	* will tell the forum id from the uri or the forum_uri GET var by checking the cache.
	*/
	public static function get_forum_id(&$forum_id, $forum_uri = '')
	{
		if (empty($forum_uri))
		{
			global $request;

			$forum_uri = request_var('forum_uri', '');

			if (!empty($request))
			{
				$request->overwrite('forum_uri', null, \phpbb\request\request_interface::REQUEST);
				$request->overwrite('forum_uri', null, \phpbb\request\request_interface::GET);
			}
			else
			{
				unset($_GET['forum_uri'], $_REQUEST['forum_uri']);
			}
		}

		if (empty($forum_uri) || $forum_uri == self::$seo_static['global_announce'])
		{
			return 0;
		}

		if ($id = @array_search($forum_uri, self::$cache_config['forum_urls']))
		{
			$forum_id = max(0, (int) $id);
		}
		else if ($id = self::get_url_info('forum', $forum_uri, 'id'))
		{
			$forum_id = max(0, (int) $id);
		}
		else if (!empty(self::$forum_redirect))
		{
			if (isset(self::$forum_redirect[$forum_uri]))
			{
				$forum_id = max(0, (int) self::$forum_redirect[$forum_uri]);
			}
		}

		return $forum_id;
	}

	/**
	* read_config()
	*/
	public static function read_config($from_bkp = false)
	{
		if (
			!self::$cache_config['cache_enable'] ||
			!file_exists(self::$cache_config['file'])
		)
		{
			self::$cache_config['cached'] = false;

			return false;
		}

		include(self::$cache_config['file']);

		if (!empty($settings))
		{
			self::$cache_config['settings'] = & $settings;
			self::$cache_config['forum_urls'] = & $forum_urls;
			self::$cache_config['cached'] = true;
			self::$seo_opt = array_replace_recursive(self::$seo_opt, $settings);
			self::$modrtype = @isset(self::$seo_opt['modrtype']) ? self::$seo_opt['modrtype'] : self::$modrtype;

			if (self::$modrtype > 1)
			{
				// bind cached URLs
				self::$seo_url['forum'] = & self::$cache_config['forum_urls'];
			}
		}
		else
		{
			if (!$from_bkp)
			{
				// Try the current backup
				@copy($file . '.current', $file);

				return self::read_config(true);
			}

			self::$cache_config['cached'] = false;

			return false;
		}
	}

	/**
	* sslify($url, $ssl = true)
	* properly set http protocol (eg http or https)
	*/
	public static function sslify($url, $ssl = null)
	{
		static $mask = '`^https?://`i';

		$replace = $ssl !== null ? ($ssl ? 'https://' : 'http://') : '//';

		return preg_replace($mask, $replace, trim($url));
	}

	/**
	* is_utf8($string)
	* Borrowed from php.net : http://www.php.net/mb_detect_encoding (detectUTF8)
	*/
	public static function is_utf8($string)
	{
		// non-overlong 2-byte|excluding overlongs|straight 3-byte|excluding surrogates|planes 1-3|planes 4-15|plane 16
		return preg_match('%(?:[\xC2-\xDF][\x80-\xBF]|\xE0[\xA0-\xBF][\x80-\xBF]|[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}|\xED[\x80-\x9F][\x80-\xBF] |\xF0[\x90-\xBF][\x80-\xBF]{2}|[\xF1-\xF3][\x80-\xBF]{3}|\xF4[\x80-\x8F][\x80-\xBF]{2})+%xs', $string);
	}

	/**
	* stripslashes($value)
	* Borrowed from php.net : http://www.php.net/stripslashes
	*/
	public static function stripslashes($value)
	{
		return is_array($value) ? array_map('\\phpbbseo\\core::stripslashes', $value) : stripslashes($value);
	}

	/**
	* Custom HTTP 301 redirections.
	* To kill duplicates
	*/
	public static function seo_redirect($url, $code = 301, $replace = true)
	{
		static $supported_headers = array(
			301	=> 'Moved Permanently',
			302	=> 'Found',
			307	=> 'Temporary Redirect',
		);

		if (
			!isset($supported_headers[$code]) ||
			@headers_sent()
		)
		{
			return false;
		}

		garbage_collection();

		$url = str_replace('&amp;', '&', $url);

		// Behave as redirect() for checks to provide with the same level of protection
		// Make sure no linebreaks are there... to prevent http response splitting for PHP < 4.4.2
		if (strpos(urldecode($url), "\n") !== false || strpos(urldecode($url), "\r") !== false || strpos($url, ';') !== false)
		{
			send_status_line(400, 'Bad Request');

			trigger_error('INSECURE_REDIRECT', E_USER_ERROR);
		}

		// Now, also check the protocol and for a valid url the last time...
		$allowed_protocols = array('http', 'https'/*, 'ftp', 'ftps'*/);
		$url_parts = parse_url($url);

		if ($url_parts === false || empty($url_parts['scheme']) || !in_array($url_parts['scheme'], $allowed_protocols))
		{
			send_status_line(400, 'Bad Request');

			trigger_error('INSECURE_REDIRECT', E_USER_ERROR);
		}

		send_status_line($code, $supported_headers[$code]);
		/*header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Pragma: no-cache');
		header('Expires: -1');*/
		header('Location: ' . $url);

		exit_handler();
	}

	/**
	* Set the do_redir_post option right
	*/
	public static function set_do_redir_post()
	{
		global $user;

		switch (self::$seo_opt['zero_dupe']['post_redir'])
		{
			case 'guest':
				if (empty($user->data['is_registered']))
				{
					self::$seo_opt['zero_dupe']['do_redir_post'] = true;
				}

				break;
			case 'all':
				self::$seo_opt['zero_dupe']['do_redir_post'] = true;

				break;
			case 'off': // Do not redirect
				self::$seo_opt['zero_dupe']['do_redir'] = false;
				self::$seo_opt['zero_dupe']['go_redir'] = false;
				self::$seo_opt['zero_dupe']['do_redir_post'] = false;

				break;
			default:
				self::$seo_opt['zero_dupe']['do_redir_post'] = false;

				break;
		}

		return self::$seo_opt['zero_dupe']['do_redir_post'];
	}

	/**
	* Redirects if the uri sent does not match (fully) the
	* attended url
	*/
	public static function zero_dupe($url = '', $uri = '', $path = '')
	{
		global $auth, $user, $_SID, $phpbb_root_path, $config;

		if (!self::$seo_opt['zero_dupe']['on'] || empty(self::$seo_opt['req_file']) || (!self::$seo_opt['rewrite_usermsg'] && self::$seo_opt['req_file'] == 'search'))
		{
			return false;
		}

		if (isset($_REQUEST['explain']) && (boolean) ($auth->acl_get('a_') && defined('DEBUG_CONTAINER')))
		{
			if (request_var('explain', 0) == 1)
			{
				return true;
			}
		}

		$path = empty($path) ? $phpbb_root_path : $path;
		$uri = !empty($uri) ? $uri : self::$seo_path['uri'];
		$reg = !empty($user->data['is_registered']) ? true : false;
		$url = empty($url) ? self::expected_url($path) : str_replace('&amp;', '&', append_sid($url, false, true, 0));
		$url = self::drop_sid($url);

		// Only add sid if user is registered and needs it to keep session
		if (isset($_GET['sid']) && !empty($_SID) && ($reg || !self::$seo_opt['rem_sid']))
		{
			if (request_var('sid', '') == $user->session_id)
			{
				$url .=  (\utf8_strpos($url, '?') !== false ? '&' : '?') . 'sid=' . $user->session_id;
			}
		}

		$url = str_replace('%26', '&', urldecode($url));
		//var_dump($uri, $url);exit;

		if (self::$seo_opt['zero_dupe']['do_redir'])
		{
			self::seo_redirect($url);
		}
		else
		{
			$url_check = $url;

			// we remove url hash for comparison, but keep it for redirect
			if (strpos($url, '#') !== false)
			{
				list($url_check, $hash) = explode('#', $url, 2);
			}

			if (self::$seo_opt['zero_dupe']['strict'])
			{
				return self::$seo_opt['zero_dupe']['go_redir'] && (($uri != $url_check) ? self::seo_redirect($url) : false);
			}
			else
			{
				return self::$seo_opt['zero_dupe']['go_redir'] && ((\utf8_strpos($uri, $url_check) === false) ? self::seo_redirect($url) : false);
			}
		}
	}

	/**
	* expected_url($path = '')
	* build expected url
	*/
	public static function expected_url($path = '')
	{
		global $phpbb_root_path, $phpEx;

		$path = empty($path) ? $phpbb_root_path : $path;
		$params = array();

		foreach (self::$seo_opt['zero_dupe']['redir_def'] as $get => $def)
		{
			if ((isset($_GET[$get]) && $def['keep']) || !empty($def['force']))
			{
				$params[$get] = $def['val'];

				if (!empty($def['hash']))
				{
					$params['#'] = $def['hash'];
				}
			}
		}

		self::$page_url = append_sid($path . self::$seo_opt['req_file'] . ".$phpEx", $params, true, 0);

		return self::$page_url;
	}

	/**
	* set_cond($bool, $type = 'bool_redir', $or = true)
	* Helps out grabbing boolean vars
	*/
	public static function set_cond($bool, $type = 'do_redir', $or = true)
	{
		if ($or)
		{
			self::$seo_opt['zero_dupe'][$type] = (boolean) ($bool || self::$seo_opt['zero_dupe'][$type]);
		}
		else
		{
			self::$seo_opt['zero_dupe'][$type] = (boolean) ($bool && self::$seo_opt['zero_dupe'][$type]);
		}

		return;
	}

	/**
	* check start var consistency
	* Returns our best guess for $start, eg the first valid page
	*/
	public static function seo_chk_start($start = 0, $limit = 0)
	{
		self::$start = 0;

		if ($limit > 0)
		{
			$start = is_int($start/$limit) ? $start : intval($start/$limit)*$limit;
		}

		if ($start >= 1)
		{
			self::$start = self::$seo_delim['start'] . (int) $start;

			return (int) $start;
		}

		self::$start = '';

		return 0;
	}

	/**
	* get_canonical
	* Returns the canonical url if ever built
	* Beware with ssl :
	* 	Since we want zero duplicate, the canonical element will only use https when ssl is forced
	* 	(eg set as THE server protocol in config) and will use http in other cases.
	*/
	public static function get_canonical()
	{
		return !empty(self::$seo_path['canonical']) ? self::sslify(self::$seo_path['canonical'], self::$ssl['forced']) : '';
	}
}
