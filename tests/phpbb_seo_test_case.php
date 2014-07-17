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
		global $phpbb_root_path, $phpEx, $config, $request;

		require_once $phpbb_root_path . 'includes/utf/utf_tools.' . $phpEx;

		$config = new \phpbb\config\config(array(
			'server_name'	=> 'localhost',
			'server_port'	=> 80,
			'script_path'	=> '/',
		));

		$request = new \phpbbseo\usu\tests\mock\request();

		$this->phpbb_seo = new \phpbbseo\usu\core();
		$this->phpbb_seo->init();
	}
}
