<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu\tests\core;

class get_url_info_test extends \phpbbseo\usu\tests\phpbb_seo_test_case
{
	public function get_url_info_test_data()
	{
		return array(
			array(
				'type'		=> 'topic',
				'url'		=> 'welcome-to-phpbb3',
				'info'		=> 'title',
				'expected'	=> array(),
			),
		);
	}

	/**
	* @dataProvider get_url_info_test_data
	*/
	function test_get_url_info($type, $url, $info, $expected)
	{
		//$this->markTestIncomplete('.');

		$this->configure();
		$this->assertEquals($expected, $this->phpbb_seo->get_url_info($type, $url, $info));
	}
}
