<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu\tests\core;

class format_url_test extends \phpbb_test_case
{
	private function setup_test_case()
	{
		global $phpbb_root_path, $config, $request;

		$phpbb_root_path = './';

		$config = new \phpbb\config\config(array(
			'server_name'	=> 'localhost',
			'server_port'	=> 80,
			'script_path'	=> '/',
		));

		$request = new \phpbbseo\usu\tests\mock\request();

		$phpbb_seo = new \phpbbseo\usu\core();
		$phpbb_seo->init();
	}

	public function format_url_test_data()
	{
		return array(
			array(
				'case'		=> 'This is a test',
				'expected'	=> 'this-is-a-test',
			),
			array(
				'case'		=> 'phpBB & SEO',
				'expected'	=> 'phpbb-seo',
			),
			array(
				'case'		=> '&.-',
				'expected'	=> 'topic',
			),
			array(
				'case'		=> '&.-',
				'expected'	=> 'forum',
				'type'		=> 'forum',
			),
		);
	}

	/**
	* @dataProvider format_url_test_data
	*/
	function test_format_url($case, $expected, $type = 'topic')
	{
		$this->setup_test_case();

		$this->assertEquals($expected, $phpbb_seo->format_url($case), $type);
	}
}
