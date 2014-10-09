<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu\tests\core;

class set_user_url_test extends \phpbbseo\usu\tests\phpbb_seo_test_case
{
	public function set_user_url_test_data()
	{
		return array(
			array(
				'username'	=> 'bar',
				'user_id'	=> 1,
				'expected'	=> array(
					'member1',
					'bar-u1',
					'member/bar',
				),
			),
		);
	}

	/**
	* @dataProvider set_user_url_test_data
	*/
	function test_set_user_url($username, $user_id, $expected)
	{
		$this->configure();
		$this->phpbb_seo->set_user_url($username, $user_id);
		$this->assertEquals($expected[0], $this->phpbb_seo->seo_url['user'][$user_id]);

		unset($this->phpbb_seo->seo_url['user'][$user_id]);

		$this->configure(array('profile_inj' => true));
		$this->phpbb_seo->set_user_url($username, $user_id);
		$this->assertEquals($expected[1], $this->phpbb_seo->seo_url['user'][$user_id]);

		unset($this->phpbb_seo->seo_url['user'][$user_id]);

		$this->configure(array('profile_inj' => true, 'profile_noids' => true));
		$this->phpbb_seo->set_user_url($username, $user_id);
		$this->assertEquals($expected[2], $this->phpbb_seo->seo_url['user'][$user_id]);
	}
}
