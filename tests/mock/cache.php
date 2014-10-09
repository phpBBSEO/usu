<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu\tests\mock;

/**
* Cache Mock
* @package phpBB3
*/
class cache extends \phpbb\cache\driver\null
{
	public function __construct()
	{
	}

	public function obtain_bots()
	{
		return array();
	}

	public function obtain_word_list()
	{
		return array();
	}

	public function set_bots($bots)
	{
	}
}
