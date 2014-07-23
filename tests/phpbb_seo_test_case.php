<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu\tests;

class phpbb_seo_test_case extends \phpbb_test_case
{
	/**
	* \phpbbseo\usu\core
	*/
	public $phpbb_seo;

	public function setUp()
	{
		global $phpbb_root_path, $phpEx, $config, $request, $user, $auth;

		require_once $phpbb_root_path . 'includes/utf/utf_tools.' . $phpEx;

		$config = new \phpbb\config\config(array(
			'server_name'	=> 'localhost',
			'server_port'	=> 80,
			'script_path'	=> '/',
		));

		$request = new \phpbbseo\usu\tests\mock\request();
		$user = new \phpbbseo\usu\tests\mock\user();
		$auth = new \phpbbseo\usu\tests\mock\auth();

		$this->phpbb_seo = new \phpbbseo\usu\core($config, $request, $user, $auth, $phpbb_root_path, $phpEx, false);
	}

	protected function setConfig($settings = array(), $forum_urls = array())
	{
		$this->phpbb_seo->seo_opt = array(
			'url_rewrite'			=> true,
			'modrtype'				=> 3,
			'sql_rewrite'			=> false,
			'profile_inj'			=> false,
			'profile_vfolder'		=> false,
			'profile_noids'			=> false,
			'rewrite_usermsg'		=> false,
			'rewrite_files'			=> false,
			'rem_sid'				=> false,
			'rem_hilit'				=> true,
			'rem_small_words'		=> false,
			'virtual_folder'		=> true,
			'virtual_root'			=> false,
			'cache_layer'			=> true,
			'rem_ids'				=> false,
			'redirect_404_forum'	=> false,
			'zero_dupe'				=> array(
				'on'			=> true,
				'strict'		=> true,
				'post_redir'	=> 'all',
			),
		);

		$this->phpbb_seo->cache_config['forum_urls'] = array();

		$this->phpbb_seo->cache_config['settings'] = & $settings;
		$this->phpbb_seo->cache_config['forum_urls'] = & $forum_urls;
		$this->phpbb_seo->cache_config['cached'] = true;
		$this->phpbb_seo->seo_opt = array_replace_recursive($this->phpbb_seo->seo_opt, $settings);
		$this->phpbb_seo->modrtype = @isset($this->phpbb_seo->seo_opt['modrtype']) ? $this->phpbb_seo->seo_opt['modrtype'] : $this->phpbb_seo->modrtype;

		if ($this->phpbb_seo->modrtype > 1)
		{
			$this->seo_url['forum'] = & $this->cache_config['forum_urls'];
		}
	}
}
