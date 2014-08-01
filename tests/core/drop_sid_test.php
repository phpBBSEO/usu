<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu\tests\core;

class drop_sid_test extends \phpbbseo\usu\tests\phpbb_seo_test_case
{
	public function drop_sid_test_data()
	{
		// sid value to test in all base_cases
		$sids = array('thesidishere', 'TheSidisHere', 'Th3S1d1sH3r3');

		// use only & in urls, &amp; case will be added automatically
		$base_cases = array(
			array(
				'case'		=> 'http://www.example.com/path/page.ext?sid=%1$s',
				'expected'	=> 'http://www.example.com/path/page.ext',
			),
			array(
				'case'		=> 'http://www.example.com/path/page.ext?sid=%1$s&var1=val1&var2=val2',
				'expected'	=> 'http://www.example.com/path/page.ext?var1=val1&var2=val2',
			),
			array(
				'case'		=> 'http://www.example.com/path/page.ext?var1=val1&var2=val2&sid=%1$s',
				'expected'	=> 'http://www.example.com/path/page.ext?var1=val1&var2=val2',
			),
			array(
				'case'		=> 'http://www.example.com/path/page.ext?var1=val1&var2=val2&sid=%1$s&var3=val3',
				'expected'	=> 'http://www.example.com/path/page.ext?var1=val1&var2=val2&var3=val3',
			),
		);

		// generate all sub cases
		$data = array();

		foreach ($base_cases as $test)
		{
			extract($test);

			// test &amp; if appropriate
			$expected_amp = '';

			if (strpos($case, '&') !== false)
			{
				$expected_amp = str_replace('&', '&amp;', $expected);
			}

			// generate all sid cases
			foreach ($sids as $sid)
			{
				$_case = sprintf($case, $sid);

				$data[] = array(
					'case'		=> $_case,
					'expected'	=> $expected,
				);

				// also test &amp; if appropriate
				if ($expected_amp)
				{
					$case_amp = str_replace('&', '&amp;', $_case);

					$data[] = array(
						'case'		=> $case_amp,
						'expected'	=> $expected_amp,
					);
				}
			}
		}

		return $data;
	}
	/**
	* @dataProvider drop_sid_test_data
	*/
	function test_drop_sid($case, $expected)
	{
		$this->configure();
		$this->assertEquals($expected, $this->phpbb_seo->drop_sid($case));
	}
}
