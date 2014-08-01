<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu\tests\core;

class format_url_test extends \phpbbseo\usu\tests\phpbb_seo_test_case
{
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
		$this->configure();
		$this->assertEquals($expected, $this->phpbb_seo->format_url($case, $type));
	}
}
