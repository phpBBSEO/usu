<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @version $Id: rewriter.php 418 2014-06-30 08:32:39Z  $
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
namespace phpbbseo\usu;

/**
* rewriter Class
* www.phpBB-SEO.com
* @package Ultimate SEO URL phpBB SEO
*/

class rewriter
{
	/**
	* URL rewritting for viewtopic.php
	* With Virtual Folder Injection
	*/
	public static function viewtopic()
	{
		global $phpbb_root_path;

		core::filter_url(core::$stop_vars);
		core::$path = core::$seo_path['phpbb_urlR'];

		if (!empty(core::$get_vars['p']))
		{
			core::$url = core::$seo_static['post'] . core::$get_vars['p'] . core::$seo_ext['post'];
			unset(core::$get_vars['p'], core::$get_vars['f'], core::$get_vars['t'], core::$get_vars['start']);

			return;
		}

		if (isset(core::$get_vars['t']) && !empty(core::$seo_url['topic'][core::$get_vars['t']]))
		{
			// Filter default params
			core::filter_get_var(core::$get_filter['topic']);
			core::{core::$paginate_method['topic']}(core::$seo_ext['topic']);
			core::$url = core::$seo_url['topic'][core::$get_vars['t']] . core::$start;
			unset(core::$get_vars['t'], core::$get_vars['f'], core::$get_vars['p']);

			return;
		}
		else if (!empty(core::$get_vars['t']))
		{
			// Filter default params
			core::filter_get_var(core::$get_filter['topic']);
			core::{core::$paginate_method['topic']}(core::$seo_ext['topic']);
			core::$url = core::$seo_static['topic'] . core::$get_vars['t'] . core::$start;
			unset(core::$get_vars['t'], core::$get_vars['f'], core::$get_vars['p']);

			return;
		}

		core::$path = core::$seo_path['phpbb_url'];

		return;
	}

	/**
	* URL rewritting for viewforum.php
	*/
	public static function viewforum()
	{
		global $phpbb_root_path;

		core::$path = core::$seo_path['phpbb_urlR'];
		core::filter_url(core::$stop_vars);

		if (!empty(core::$get_vars['f']))
		{
			// Filter default params
			core::filter_get_var(core::$get_filter['forum']);
			core::{core::$paginate_method['forum']}(core::$seo_ext['forum']);

			if (empty(core::$seo_url['forum'][core::$get_vars['f']]))
			{
				core::$url = core::$seo_static['forum'] . core::$get_vars['f'] . core::$start;
			}
			else
			{
				core::$url = core::$seo_url['forum'][core::$get_vars['f']] . core::$start;
			}

			unset(core::$get_vars['f']);

			return;
		}

		core::$path = core::$seo_path['phpbb_url'];

		return;
	}

	/**
	* URL rewritting for memberlist.php
	* with nicknames and group name injection
	*/
	public static function memberlist()
	{
		global $phpbb_root_path;

		core::$path = core::$seo_path['phpbb_urlR'];

		if (@core::$get_vars['mode'] === 'viewprofile' && !@empty(core::$seo_url['user'][core::$get_vars['u']]))
		{
			core::$url = core::$seo_url['user'][core::$get_vars['u']] . core::$seo_ext['user'];
			unset(core::$get_vars['mode'], core::$get_vars['u']);

			return;
		}
		else if (@core::$get_vars['mode'] === 'group' && !@empty(core::$seo_url['group'][core::$get_vars['g']]))
		{
			core::{core::$paginate_method['group']}(core::$seo_ext['group']);
			core::$url =  core::$seo_url['group'][core::$get_vars['g']] . core::$start;
			unset(core::$get_vars['mode'], core::$get_vars['g']);

			return;
		}
		else if (@core::$get_vars['mode'] === 'leaders')
		{
			core::$url =  core::$seo_static['leaders'] . core::$seo_ext['leaders'];
			unset(core::$get_vars['mode']);

			return;
		}

		core::$path = core::$seo_path['phpbb_url'];

		return;
	}

	/**
	* URL rewritting for search.php
	*/
	public static function search()
	{
		global $phpbb_root_path;

		if (isset(core::$get_vars['fid']))
		{
			core::$get_vars = array();
			core::$url = core::$url_in;

			return;
		}

		core::$path = core::$seo_path['phpbb_urlR'];
		$user_id = !empty(core::$get_vars['author_id']) ? core::$get_vars['author_id'] : ( isset(core::$seo_url['username'][rawurldecode(@core::$get_vars['author'])]) ? core::$seo_url['username'][rawurldecode(@core::$get_vars['author'])] : 0);

		if ($user_id && isset(core::$seo_url['user'][$user_id]))
		{
			// Filter default params
			core::filter_get_var(core::$get_filter['search']);
			core::{core::$paginate_method['user']}(core::$seo_ext['user']);
			$sr = (@core::$get_vars['sr'] == 'topics' ) ? 'topics' : 'posts';
			core::$url = core::$seo_url['user'][$user_id] . core::$seo_delim['sr'] . $sr . core::$start;
			unset(core::$get_vars['author_id'], core::$get_vars['author'], core::$get_vars['sr']);

			return;
		}
		else if (core::$seo_opt['profile_noids'] && !empty(core::$get_vars['author']))
		{
			// Filter default params
			core::filter_get_var(core::$get_filter['search']);
			core::rewrite_pagination_page();
			$sr = (@core::$get_vars['sr'] == 'topics' ) ? '/topics' : '/posts';
			core::$url = core::$seo_static['user'] . '/' . core::seo_url_encode(core::$get_vars['author']) . $sr . core::$start;
			unset(core::$get_vars['author'], core::$get_vars['author_id'], core::$get_vars['sr']);

			return;
		}
		else if (!empty(core::$get_vars['search_id']))
		{
			switch (core::$get_vars['search_id'])
			{
				case 'active_topics':
					core::filter_get_var(core::$get_filter['search']);
					core::{core::$paginate_method['atopic']}(core::$seo_ext['atopic']);
					core::$url = core::$seo_static['atopic'] . core::$start;
					unset(core::$get_vars['search_id'], core::$get_vars['sr']);

					if (@core::$get_vars['st'] == 7)
					{
						unset(core::$get_vars['st']);
					}

					return;
				case 'unanswered':
					core::filter_get_var(core::$get_filter['search']);
					core::{core::$paginate_method['utopic']}(core::$seo_ext['utopic']);
					core::$url = core::$seo_static['utopic'] . core::$start;
					unset(core::$get_vars['search_id']);

					if (@core::$get_vars['sr'] == 'topics')
					{
						unset(core::$get_vars['sr']);
					}

					return;
				case 'egosearch':
					global $user;

					core::set_user_url($user->data['username'], $user->data['user_id']);
					core::$url = core::$seo_url['user'][$user->data['user_id']] . core::$seo_delim['sr'] . 'topics' . core::$seo_ext['user'];
					unset(core::$get_vars['search_id']);

					return;
				case 'newposts':
					core::filter_get_var(core::$get_filter['search']);
					core::{core::$paginate_method['npost']}(core::$seo_ext['npost']);
					core::$url = core::$seo_static['npost'] . core::$start;
					unset(core::$get_vars['search_id']);

					if (@core::$get_vars['sr'] == 'topics')
					{
						unset(core::$get_vars['sr']);
					}

					return;
				case 'unreadposts':
					core::filter_get_var(core::$get_filter['search']);
					core::{core::$paginate_method['urpost']}(core::$seo_ext['urpost']);
					core::$url = core::$seo_static['urpost'] . core::$start;
					unset(core::$get_vars['search_id']);

					if (@core::$get_vars['sr'] == 'topics')
					{
						unset(core::$get_vars['sr']);
					}

					return;
			}
		}

		core::$path = core::$seo_path['phpbb_url'];

		return;
	}

	/**
	* URL rewritting for download/file.php
	*/
	public static function phpbb_files()
	{
		core::filter_url(core::$stop_vars);
		core::$path = core::$seo_path['phpbb_filesR'];

		if (isset(core::$get_vars['id']) && !empty(core::$seo_url['file'][core::$get_vars['id']]))
		{
			core::$url = core::$seo_url['file'][core::$get_vars['id']];

			if (!empty(core::$get_vars['t']))
			{
				core::$url .= core::$seo_delim['file'] . core::$seo_static['thumb'];
			}
			/*
			else if (@core::$get_vars['mode'] == 'view')
			{
				core::$url .= core::$seo_delim['file'] . 'view';
			}
			*/

			core::$url .= core::$seo_delim['file'] . core::$get_vars['id'];
			unset(core::$get_vars['id'], core::$get_vars['t'], core::$get_vars['mode']);

			return;
		}

		core::$path = core::$seo_path['phpbb_files'];

		return;
	}

	/**
	* URL rewritting for index.php
	*/
	public static function index()
	{
		core::$path = core::$seo_path['phpbb_urlR'];

		if (core::filter_url(core::$stop_vars))
		{
			core::$url = core::$seo_static['index'] . core::$seo_ext['index'];

			return;
		}

		core::$path = core::$seo_path['phpbb_url'];

		return;
	}
}
