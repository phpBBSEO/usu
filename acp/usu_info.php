<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @version $$
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu\acp;

class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\phpbbseo\usu\acp\usu',
			'title'		=> 'ACP_CAT_PHPBB_SEO',
			'version'	=> '2.0.0-b1',
			'modes'		=> array(
				'settings'	=> array(
					'title'	=> 'ACP_PHPBB_SEO_CLASS',
					'auth'	=> 'acl_a_board',
					'cat'	=> array('ACP_MOD_REWRITE')
				),
				'forum_url'	=> array(
					'title'	=> 'ACP_FORUM_URL',
					'auth'	=> 'acl_a_board',
					'cat'	=> array('ACP_MOD_REWRITE')
				),
				'htaccess'	=> array(
					'title'	=> 'ACP_HTACCESS',
					'auth'	=> 'acl_a_board',
					'cat'	=> array('ACP_MOD_REWRITE')
				),
				'extended'	=> array(
					'title'	=> 'ACP_SEO_EXTENDED',
					'auth'	=> 'acl_a_board',
					'cat'	=> array('ACP_MOD_REWRITE')
				),
			));
	}
}
