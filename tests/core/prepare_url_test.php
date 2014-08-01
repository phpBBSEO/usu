<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu\tests\core;

class prepare_url_test extends \phpbbseo\usu\tests\phpbb_seo_test_case
{
	public function prepare_url_test_data()
	{
		return array(
			array(
				'type'		=> 'topic',
				'title'		=> 'This is the topic Title',
				'id'		=> 123,
				'expected'	=> '/this-is-the-topic-title-t123',
			),
			array(
				'type'		=> 'topic',
				'title'		=> '',
				'id'		=> 321,
				'expected'	=> '/topic-t321',
			),
		);
	}

	/**
	* @dataProvider prepare_url_test_data
	*/
	function test_prepare_url($type, $title, $id, $expected)
	{
		$this->configure();
		$this->assertEquals($expected, $this->phpbb_seo->prepare_url($type, $title, $id));
	}
}
