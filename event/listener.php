<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @version $Id: listener.php 431 2014-07-10 12:44:07Z  $
* @copyright (c) 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/* @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/* @var \phpbb\template\template */
	protected $template;

	/* @var \phpbb\user */
	protected $user;

	/* @var \phpbb\request\request */
	protected $request;

	/* @var \phpbb\db\driver\driver_interface */
	protected $db;

	/**
	* Current $phpbb_root_path
	* @var string
	*/
	protected $phpbb_root_path;

	/**
	* Current $php_ext
	* @var string
	*/
	protected $php_ext;

	protected $forum_id = 0;

	protected $topic_id = 0;

	protected $post_id = 0;

	protected $start = 0;

	protected $hilit_words = '';

	/**
	* Constructor
	*
	* @param \phpbb\config\config			$config			Config object
	* @param \phpbb\auth\auth			$auth			Auth object
	* @param \phpbb\template\template		$template		Template object
	* @param \phpbb\user				$user			User object
	* @param \phpbb\request\request			$request		Request object
	* @param \phpbb\db\driver\driver_interface	$db			Database object
	* @param string					$phpbb_root_path	Path to the phpBB root
	* @param string					$php_ext		PHP file extension
	*
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\auth\auth $auth, \phpbb\template\template $template, \phpbb\user $user, \phpbb\request\request $request, \phpbb\db\driver\driver_interface $db, $phpbb_root_path, $php_ext)
	{
		$this->template = $template;
		$this->user = $user;
		$this->config = $config;
		$this->auth = $auth;
		$this->request = $request;
		$this->db = $db;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.common'						=> 'core_common',
			'core.page_header_after'			=> 'core_page_header_after',
			'core.page_footer'					=> 'core_page_footer',
			'core.user_setup'					=> 'core_user_setup',
			'core.viewforum_modify_topicrow'	=> 'core_viewforum_modify_topicrow',
			'core.viewtopic_modify_page_title'	=> 'core_viewtopic_modify_page_title',
			'core.viewtopic_modify_post_row'	=> 'core_viewtopic_modify_post_row',
			'core.memberlist_view_profile'		=> 'core_memberlist_view_profile',
			'core.modify_username_string'		=> 'core_modify_username_string',
		);
	}

	public function core_user_setup($event)
	{
		if (empty(\phpbbseo\usu\core::$seo_opt['url_rewrite']))
		{
			return;
		}

		$user_data = $event['user_data'];

		switch(\phpbbseo\usu\core::$seo_opt['req_file'])
		{
			case 'viewforum':
				global $forum_data; // god save the hax

				if ($forum_data)
				{
					if ($forum_data['forum_topics_per_page'])
					{
						$this->config['topics_per_page'] = $forum_data['forum_topics_per_page'];
					}

					$start = \phpbbseo\usu\core::seo_chk_start($this->start, $this->config['topics_per_page']);

					if ($this->start != $start)
					{
						$this->start = (int) $start;
						$this->request->overwrite('start', $this->start);
					}

					\phpbbseo\usu\core::$seo_path['canonical'] = \phpbbseo\usu\core::drop_sid(append_sid("{$this->phpbb_root_path}viewforum.$this->php_ext", "f=$this->forum_id&amp;start=$this->start"));
					$default_sort_days = (!empty($user_data['user_topic_show_days'])) ? $user_data['user_topic_show_days'] : 0;
					$default_sort_key = (!empty($user_data['user_topic_sortby_type'])) ? $user_data['user_topic_sortby_type'] : 't';
					$default_sort_dir = (!empty($user_data['user_topic_sortby_dir'])) ? $user_data['user_topic_sortby_dir'] : 'd';

					$mark_read = request_var('mark', '');
					$sort_days = request_var('st', $default_sort_days);
					$sort_key = request_var('sk', $default_sort_key);
					$sort_dir = request_var('sd', $default_sort_dir);
					$keep_mark = in_array($mark_read, array('topics', 'topic', 'forums', 'all')) ? (boolean) ($user_data['is_registered'] || $config['load_anon_lastread']) : false;
					\phpbbseo\usu\core::$seo_opt['zero_dupe']['redir_def'] = array(
						'hash'		=> array('val' => request_var('hash', ''), 'keep' => $keep_mark),
						'f'			=> array('val' => $this->forum_id, 'keep' => true, 'force' => true),
						'st'		=> array('val' => $sort_days, 'keep' => true),
						'sk'		=> array('val' => $sort_key, 'keep' => true),
						'sd'		=> array('val' => $sort_dir, 'keep' => true),
						'mark'		=> array('val' => $mark_read, 'keep' => $keep_mark),
						'mark_time'	=> array('val' => request_var('mark_time', 0), 'keep' => $keep_mark),
						'start'		=> array('val' => $this->start, 'keep' => true),
					);
					\phpbbseo\usu\core::zero_dupe();
				}
				else
				{
					if (\phpbbseo\usu\core::$seo_opt['redirect_404_forum'])
					{
						\phpbbseo\usu\core::seo_redirect(\phpbbseo\usu\core::$seo_path['phpbb_url']);
					}
					else
					{
						send_status_line(404, 'Not Found');
					}
				}

				break;
			case 'viewtopic':
				global $topic_data, $topic_replies, $forum_id, $post_id, $view; // god save the hax

				if (empty($topic_data))
				{
					return;
				}

				$this->topic_id = $topic_id = (int) $topic_data['topic_id'];
				$this->forum_id = $forum_id;

				if (!empty($topic_data['topic_url']) || (isset($topic_data['topic_url']) && !empty(\phpbbseo\usu\core::$seo_opt['sql_rewrite'])))
				{
					if ($topic_data['topic_type'] == POST_GLOBAL)
					{
						// Let's make sure user will see global annoucements
						/*global $auth;
						$auth->cache[$forum_id]['f_read'] = 1;*/
						$_parent = \phpbbseo\usu\core::$seo_static['global_announce'];
					}
					else
					{
						$_parent = \phpbbseo\usu\core::$seo_url['forum'][$topic_data['forum_id']];
					}

					if (!\phpbbseo\usu\core::check_url('topic', $topic_data['topic_url'], $_parent))
					{
						if (!empty($topic_data['topic_url']))
						{
							// Here we get rid of the seo delim (-t) and put it back even in simple mod
							// to be able to handle all cases at once
							$_url = preg_replace('`' . \phpbbseo\usu\core::$seo_delim['topic'] . '$`i', '', $topic_data['topic_url']);
							$_title = \phpbbseo\usu\core::get_url_info('topic', $_url . \phpbbseo\usu\core::$seo_delim['topic'] . $topic_id, 'title');
						}
						else
						{
							$_title = \phpbbseo\usu\core::$modrtype > 2 ? censor_text($topic_data['topic_title']) : '';
						}

						unset(\phpbbseo\usu\core::$seo_url['topic'][$topic_id]);
						$topic_data['topic_url'] = \phpbbseo\usu\core::get_url_info('topic', \phpbbseo\usu\core::prepare_url( 'topic', $_title, $topic_id, $_parent, (( empty($_title) || ($_title == \phpbbseo\usu\core::$seo_static['topic']) ) ? true : false) ), 'url');
						unset(\phpbbseo\usu\core::$seo_url['topic'][$topic_id]);

						if ($topic_data['topic_url'])
						{
							// Update the topic_url field for later re-use
							$sql = "UPDATE " . TOPICS_TABLE . " SET topic_url = '" . $this->db->sql_escape($topic_data['topic_url']) . "'
								WHERE topic_id = $topic_id";
							$this->db->sql_query($sql);
						}
					}
					else
					{
						$topic_data['topic_url'] = '';
					}
				}
				else
				{
					$topic_data['topic_url'] = '';
				}

				\phpbbseo\usu\core::prepare_topic_url($topic_data, $this->forum_id);
				$start = \phpbbseo\usu\core::seo_chk_start($this->start, $this->config['posts_per_page']);

				if ($this->start != $start)
				{
					$this->start = (int) $start;
					$this->request->overwrite('start', $this->start);
				}

				\phpbbseo\usu\core::$seo_path['canonical'] = \phpbbseo\usu\core::drop_sid(append_sid("{$this->phpbb_root_path}viewtopic.$this->php_ext", "f=$this->forum_id&amp;t=$topic_id&amp;start=$this->start"));

				if (\phpbbseo\usu\core::$seo_opt['zero_dupe']['on'])
				{
					$highlight_match = $highlight = '';

					if ($this->hilit_words)
					{
						$highlight_match = phpbb_clean_search_string($this->hilit_words);
						$highlight = urlencode($highlight_match);
						$highlight_match = str_replace('\*', '\w+?', preg_quote($highlight_match, '#'));
						$highlight_match = preg_replace('#(?<=^|\s)\\\\w\*\?(?=\s|$)#', '\w+?', $highlight_match);
						$highlight_match = str_replace(' ', '|', $highlight_match);
					}

					if ($post_id && !$view && !\phpbbseo\usu\core::set_do_redir_post())
					{
						\phpbbseo\usu\core::$seo_opt['zero_dupe']['redir_def'] = array(
							'p'		=> array('val' => $post_id, 'keep' => true, 'force' => true, 'hash' => "p$post_id"),
							'hilit'	=> array('val' => (($highlight_match) ? $highlight : ''), 'keep' => !empty($highlight_match)),
						);
					}
					else
					{
						$default_sort_days = (!empty($user_data['user_topic_show_days'])) ? $user_data['user_topic_show_days'] : 0;
						$default_sort_key = (!empty($user_data['user_topic_sortby_type'])) ? $user_data['user_topic_sortby_type'] : 't';
						$default_sort_dir = (!empty($user_data['user_topic_sortby_dir'])) ? $user_data['user_topic_sortby_dir'] : 'd';

						$sort_days = request_var('st', $default_sort_days);
						$sort_key = request_var('sk', $default_sort_key);
						$sort_dir = request_var('sd', $default_sort_dir);
						$seo_watch = request_var('watch', '');
						$seo_unwatch = request_var('unwatch', '');
						$seo_bookmark = request_var('bookmark', 0);
						$keep_watch = (boolean) ($seo_watch == 'topic' && $user_data['is_registered']);
						$keep_unwatch = (boolean) ($seo_unwatch == 'topic' && $user_data['is_registered']);
						$keep_hash = (boolean) ($keep_watch || $keep_unwatch || $seo_bookmark);
						$seo_uid = max(0, request_var('uid', 0));
						\phpbbseo\usu\core::$seo_opt['zero_dupe']['redir_def'] = array(
							'uid'		=> array('val' => $seo_uid, 'keep' => (boolean) ($keep_hash && $seo_uid)),
							'f'			=> array('val' => $forum_id, 'keep' => true, 'force' => true),
							't'			=> array('val' => $topic_id, 'keep' => true, 'force' => true, 'hash' => $post_id ? "p$post_id" : ''),
							'p'			=> array('val' => $post_id, 'keep' =>  ($post_id && $view == 'show' ? true : false), 'hash' => "p$post_id"),
							'watch'		=> array('val' => $seo_watch, 'keep' => $keep_watch),
							'unwatch'	=> array('val' => $seo_unwatch, 'keep' => $keep_unwatch),
							'bookmark'	=> array('val' => $seo_bookmark, 'keep' => (boolean) ($user_data['is_registered'] && $this->config['allow_bookmarks'] && $seo_bookmark)),
							'start'		=> array('val' => $this->start, 'keep' => true, 'force' => true),
							'hash'		=> array('val' => request_var('hash', ''), 'keep' => $keep_hash),
							'st'		=> array('val' => $sort_days, 'keep' => true),
							'sk'		=> array('val' => $sort_key, 'keep' => true),
							'sd'		=> array('val' => $sort_dir, 'keep' => true),
							'view'		=> array('val' => $view, 'keep' => $view == 'print' ? (boolean) $this->auth->acl_get('f_print', $forum_id) : (($view == 'viewpoll' || $view == 'show') ? true : false)),
							'hilit'		=> array('val' => (($highlight_match) ? $highlight : ''), 'keep' => (boolean) !(!$user_data['is_registered'] && \phpbbseo\usu\core::$seo_opt['rem_hilit'])),
						);

						if (\phpbbseo\usu\core::$seo_opt['zero_dupe']['redir_def']['bookmark']['keep'])
						{
							// Prevent unessecary redirections
							// Note : bookmark, watch and unwatch cases could just not be handled by the zero dupe (no redirect at all when used),
							// but the handling as well acts as a security shield so, it's worth it ;)
							unset(\phpbbseo\usu\core::$seo_opt['zero_dupe']['redir_def']['start']);
						}
					}

					\phpbbseo\usu\core::zero_dupe();
				}

				break;
			case 'memberlist':
				if (isset($_REQUEST['un']))
				{
					$un = rawurldecode(request_var('un', '', true));

					if (!\phpbbseo\usu\core::is_utf8($un))
					{
						$un = utf8_normalize_nfc(utf8_recode($un, 'ISO-8859-1'));
					}

					$this->request->overwrite('un', $un);
				}

				break;
		}
	}

	public function core_common($event)
	{
		\phpbbseo\usu\core::init();

		if (empty(\phpbbseo\usu\core::$seo_opt['url_rewrite']))
		{
			return;
		}

		$this->start = max(0, request_var('start', 0));

		switch(\phpbbseo\usu\core::$seo_opt['req_file'])
		{
			case 'viewforum':
				$this->forum_id = max(0, request_var('f', 0));

				if (!$this->forum_id)
				{
					\phpbbseo\usu\core::get_forum_id($this->forum_id);

					if (!$this->forum_id)
					{
						if (\phpbbseo\usu\core::$seo_opt['redirect_404_forum'])
						{
							\phpbbseo\usu\core::seo_redirect(\phpbbseo\usu\core::$seo_path['phpbb_url']);
						}
						else
						{
							send_status_line(404, 'Not Found');
						}
					}
					else
					{
						$this->request->overwrite('f', (int) $this->forum_id);
					}
				}

				break;
			case 'viewtopic':
				$this->forum_id = max(0, request_var('f', 0));
				$this->topic_id = max(0, request_var('t', 0));
				$this->post_id = max(0, request_var('p', 0));

				if (!$this->forum_id)
				{
					\phpbbseo\usu\core::get_forum_id($this->forum_id);

					if ($this->forum_id > 0)
					{
						$this->request->overwrite('f', (int) $this->forum_id);
					}
				}

				$this->hilit_words = request_var('hilit', '', true);

				if ($this->hilit_words)
				{
					$this->hilit_words = rawurldecode($this->hilit_words);

					if (!\phpbbseo\usu\core::is_utf8($this->hilit_words))
					{
						$this->hilit_words = utf8_normalize_nfc(utf8_recode($this->hilit_words, 'iso-8859-1'));
					}

					$this->request->overwrite('hilit', $this->hilit_words);
				}

				if (!$this->topic_id && !$this->post_id)
				{
					if (\phpbbseo\usu\core::$seo_opt['redirect_404_forum'])
					{
						if ($this->forum_id && !empty(\phpbbseo\usu\core::$seo_url['forum'][$this->forum_id]))
						{
							\phpbbseo\usu\core::seo_redirect(append_sid("{$this->phpbb_root_path}viewforum.$this->php_ext", 'f=' . $this->forum_id));
						}
						else
						{
							\phpbbseo\usu\core::seo_redirect(\phpbbseo\usu\core::$seo_path['phpbb_url']);
						}
					}
					else
					{
						send_status_line(404, 'Not Found');
					}
				}

				break;
		}
	}

	public function core_page_header_after($event)
	{
		$this->template->assign_vars(array(
			'SEO_PHPBB_URL'		=> \phpbbseo\usu\core::$seo_path['phpbb_url'],
			'SEO_ROOT_URL'		=> \phpbbseo\usu\core::$seo_path['phpbb_url'],
			'SEO_BASE_HREF'		=> \phpbbseo\usu\core::$seo_opt['seo_base_href'],
			'SEO_START_DELIM'	=> \phpbbseo\usu\core::$seo_delim['start'],
			'SEO_SATIC_PAGE'	=> \phpbbseo\usu\core::$seo_static['pagination'],
			'SEO_EXT_PAGE'		=> \phpbbseo\usu\core::$seo_ext['pagination'],
			'SEO_EXTERNAL'		=> !empty($this->config['seo_ext_links']) ? 1 : '',
			'SEO_EXTERNAL_SUB'	=> !empty($this->config['seo_ext_subdomain']) ? 1 : '',
			'SEO_EXT_CLASSES'	=> !empty($this->config['seo_ext_classes']) ? preg_replace('`[^a-z0-9_|-]+`', '', str_replace(',', '|', trim($this->config['seo_ext_classes'], ', '))) : '',
			'SEO_HASHFIX'		=> \phpbbseo\usu\core::$seo_opt['url_rewrite'] && \phpbbseo\usu\core::$seo_opt['virtual_folder'] ? 1 : '',
			'SEO_PHPEX'			=> $this->php_ext,
		));

		$page_title = $event['page_title'];

		if (!empty($this->config['seo_append_sitename']) && !empty($this->config['sitename']))
		{
			$event['page_title'] = $page_title && strpos($page_title, $this->config['sitename']) === false ? $page_title . ' - ' . $this->config['sitename'] : $page_title;
		}
	}

	/**
	* Note : This mod is going to help your site a lot in Search Engines
	* If You really cannot put this link, you should at least provide us with one visible
	* (can be small but visible) link on your home page or your forum Index using this code for example :
	* <a href="http://www.phpbb-seo.com/" title="Search Engine Optimization By phpBB SEO">phpBB SEO</a>
	*/
	public function core_page_footer($event)
	{
		if (empty(\phpbbseo\usu\core::$seo_opt['copyrights']['title']))
		{
			\phpbbseo\usu\core::$seo_opt['copyrights']['title'] = strpos($this->config['default_lang'], 'fr') !== false  ?  'Optimisation du R&eacute;f&eacute;rencement par phpBB SEO' : 'Search Engine Optimization By phpBB SEO';
		}

		if (empty(\phpbbseo\usu\core::$seo_opt['copyrights']['txt']))
		{
			\phpbbseo\usu\core::$seo_opt['copyrights']['txt'] = 'phpBB SEO';
		}

		if (\phpbbseo\usu\core::$seo_opt['copyrights']['img'])
		{
			$output = '<a href="http://www.phpbb-seo.com/" title="' . \phpbbseo\usu\core::$seo_opt['copyrights']['title'] . '"><img src="' . \phpbbseo\usu\core::$seo_path['phpbb_url'] . 'ext/phpbbseo/usu/img/phpbb-seo.png" alt="' . \phpbbseo\usu\core::$seo_opt['copyrights']['txt'] . '" width="80" height="15"></a>';
		}
		else
		{
			$output = '<a href="http://www.phpbb-seo.com/" title="' . \phpbbseo\usu\core::$seo_opt['copyrights']['title'] . '">' . \phpbbseo\usu\core::$seo_opt['copyrights']['txt'] . '</a>';
		}

		$this->user->lang['TRANSLATION_INFO'] = (!empty($this->user->lang['TRANSLATION_INFO']) ? $this->user->lang['TRANSLATION_INFO'] . '<br>' : '') . $output;

		$this->template->assign_vars(array(
			'U_CANONICAL'	=> \phpbbseo\usu\core::get_canonical(),
		));
	}

	public function core_viewforum_modify_topicrow($event)
	{
		// Unfortunately, we do not have direct access to $topic_forum_id here
		global $topic_forum_id, $topic_id, $view_topic_url; // god save the hax

		$row = $event['row'];
		$topic_row = $event['topic_row'];
		\phpbbseo\usu\core::prepare_topic_url($row, $topic_forum_id);
		$view_topic_url_params = 'f=' . $topic_forum_id . '&amp;t=' . $topic_id;
		$view_topic_url = $topic_row['U_VIEW_TOPIC'] = \phpbbseo\usu\core::url_rewrite("{$this->phpbb_root_path}viewtopic.$this->php_ext", $view_topic_url_params, true, false, true);
		$event['topic_row'] = $topic_row;
		$event['row'] = $row;
	}

	public function core_viewtopic_modify_post_row($event)
	{
		$post_row = $event['post_row'];
		$row = $event['row'];

		$post_row['U_APPROVE_ACTION'] = append_sid("{$this->phpbb_root_path}mcp.$this->php_ext", "i=queue&amp;p={$row['post_id']}&amp;f=$this->forum_id&amp;redirect=" . urlencode(str_replace('&amp;', '&', append_sid("{$this->phpbb_root_path}viewtopic.$this->php_ext", "f=$this->forum_id&amp;t=$this->topic_id&amp;p=" . $row['post_id']) . '#p' . $row['post_id'])));
		$post_row['L_POST_DISPLAY'] = ($row['hide_post']) ? $this->user->lang('POST_DISPLAY', '<a class="display_post" data-post-id="' . $row['post_id'] . '" href="' . append_sid("{$this->phpbb_root_path}viewtopic.$this->php_ext", "f=$this->forum_id&amp;t=$this->topic_id&amp;p={$row['post_id']}&amp;view=show#p{$row['post_id']}") . '">', '</a>') : '';
		$event['post_row'] = $post_row;
	}

	public function core_viewtopic_modify_page_title($event)
	{
		$this->template->assign_vars(array(
			'U_PRINT_TOPIC'		=> ($this->auth->acl_get('f_print', $this->forum_id)) ? append_sid("{$this->phpbb_root_path}viewtopic.$this->php_ext", "f=$this->forum_id&amp;t=$this->topic_id&amp;view=print") : '',
			'U_BOOKMARK_TOPIC'	=> ($this->user->data['is_registered'] && $this->config['allow_bookmarks']) ? append_sid("{$this->phpbb_root_path}viewtopic.$this->php_ext", "f=$this->forum_id&amp;t=$this->topic_id&amp;bookmark=1&amp;hash=" . generate_link_hash("topic_$this->topic_id")) : '',
			'U_VIEW_RESULTS'	=> append_sid("{$this->phpbb_root_path}viewtopic.$this->php_ext", "f=$this->forum_id&amp;t=$this->topic_id&amp;view=viewpoll"),
		));
	}

	public function core_memberlist_view_profile($event)
	{
		if (empty(\phpbbseo\usu\core::$seo_opt['url_rewrite']))
		{
			return;
		}

		$member = $event['member'];
		\phpbbseo\usu\core::set_user_url( $member['username'], $member['user_id'] );
		\phpbbseo\usu\core::$seo_path['canonical'] = \phpbbseo\usu\core::drop_sid(append_sid("{$this->phpbb_root_path}memberlist.$this->php_ext", "mode=viewprofile&amp;u=" . $member['user_id']));
		\phpbbseo\usu\core::$seo_opt['zero_dupe']['redir_def'] = array(
			'mode'	=> array('val' => 'viewprofile', 'keep' => true),
			'u'		=> array('val' => $member['user_id'], 'keep' => true, 'force' => true),
		);
		\phpbbseo\usu\core::zero_dupe();
		$event['member'] = $member;
	}

	public function core_modify_username_string($event)
	{
		static $modes = array('profile' => 1, 'full' => 1);

		$mode = $event['mode'];

		if (!isset($modes[$mode]))
		{
			return;
		}

		$user_id = (int) $event['user_id'];

		if (
			!$user_id ||
			$user_id == ANONYMOUS ||
			($this->user->data['user_id'] != ANONYMOUS && !$this->auth->acl_get('u_viewprofile'))
		)
		{
			return;
		}

		$username = $event['username'];
		$custom_profile_url = $event['custom_profile_url'];
		\phpbbseo\usu\core::set_user_url($username, $user_id);

		if ($custom_profile_url !== false)
		{
			$profile_url = reapply_sid($custom_profile_url . (strpos($custom_profile_url, '?') !== false ?  '&amp;' : '?' ) . 'u=' . (int) $user_id);
		}
		else
		{
			$profile_url = append_sid("{$this->phpbb_root_path}memberlist.$this->php_ext", 'mode=viewprofile&amp;u=' . (int) $user_id);
		}

		// Return profile
		if ($mode == 'profile')
		{
			$event['username_string'] = $profile_url;
			return;
		}

		$username_string = str_replace(array('{PROFILE_URL}', '{USERNAME_COLOUR}', '{USERNAME}'), array($profile_url, $event['username_colour'], $event['username']), (!$event['username_colour']) ? $event['_profile_cache']['tpl_profile'] : $event['_profile_cache']['tpl_profile_colour']);
		$event['username_string'] = $username_string;
	}
}
