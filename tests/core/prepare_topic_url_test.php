<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu\tests\core;

class prepare_topic_url_test extends \phpbbseo\usu\tests\phpbb_seo_test_case
{
	public function prepare_topic_url_test_data()
	{
		return array(
			array(
				'topic_data'	=> array(
					'topic_id'		=> 1,
					'forum_id'		=> 1,
					'topic_title'	=> 'Welcome to phpBB3',
					'topic_type'	=> POST_NORMAL,
				),
				'expected'		=> 'topic1',
			),
		);
	}

	/**
	* @dataProvider prepare_topic_url_test_data
	*/
	function test_prepare_topic_url($topic_data, $expected)
	{
		$this->assertEquals($expected, $this->phpbb_seo->prepare_topic_url($topic_data));
	}
}
