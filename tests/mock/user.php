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
* User Mock
* @package phpBB3
*/
class user extends \phpbb\user
{
	public function __construct()
	{
	}

	public function lang()
	{
		return implode(' ', func_get_args());
	}
}
