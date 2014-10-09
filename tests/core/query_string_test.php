<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu\tests\core;

class query_string_test extends \phpbbseo\usu\tests\phpbb_seo_test_case
{
	public function query_string_test_data()
	{
		return array(
			array(
				'case'		=> array(
					'var1'	=> 'bar',
					'var2'	=> 'foo',
				),
				'expected'	=> '?var1=bar&amp;var2=foo',
			),
			array(
				'case'		=> array(
					'var3'	=> 1,
					'var4'	=> 'foo',
					'var5'	=> '',
				),
				'expected'	=> '?var3=1&amp;var4=foo&amp;var5=',
			),
		);
	}

	/**
	* @dataProvider query_string_test_data
	*/
	function test_query_string($case, $expected)
	{
		$this->configure();
		$this->assertEquals($expected, $this->phpbb_seo->query_string($case));
	}
}
