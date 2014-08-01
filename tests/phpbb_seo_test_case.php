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
		global $phpbb_root_path, $phpEx, $config, $request, $user, $auth, $cache;

		require_once $phpbb_root_path . 'includes/functions.' . $phpEx;
		require_once $phpbb_root_path . 'includes/functions_content.' . $phpEx;

		require_once $phpbb_root_path . 'includes/utf/utf_tools.' . $phpEx;

		$config = new \phpbb\config\config(array(
			'server_name'	=> 'localhost',
			'server_port'	=> 80,
			'script_path'	=> '/',
		));

		$request = new \phpbbseo\usu\tests\mock\request();
		$user = new \phpbbseo\usu\tests\mock\user();
		$auth = new \phpbbseo\usu\tests\mock\auth();
		$cache = new \phpbbseo\usu\tests\mock\cache();

		return $this->configure();
	}

	protected function configure($settings = array(), $forum_urls = array())
	{
		global $phpbb_root_path, $phpEx, $config, $request, $user, $auth, $cache;
		global $tc_settings, $tc_forum_urls;

		$tc_settings = array();
		$tc_forum_urls = array();

		$tc_settings = $settings;
		$tc_forum_urls = $forum_urls;

		$this->phpbb_seo = new \phpbbseo\usu\tests\core($config, $request, $user, $auth, $phpbb_root_path, $phpEx);

		return $this->phpbb_seo;
	}
}
