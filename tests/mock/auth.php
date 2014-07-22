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
* Auth Mock
* @package phpBB3
*/
class auth extends \phpbb\auth\auth
{
	public function __construct()
	{
	}

	public function acl(&$userdata)
	{
	}

	public function obtain_user_data($user_id)
	{
		return array();
	}

	public function acl_get($opt, $f = 0)
	{
		return true;
	}

	public function acl_getf($opt, $clean = false)
	{
		return array();
	}

	public function acl_getf_global($opt)
	{
		return true;
	}

	public function acl_get_list($user_id = false, $opts = false, $forum_id = false)
	{
		return array();
	}

	public function acl_cache(&$userdata)
	{
	}

	public function acl_clear_prefetch($user_id = false)
	{
	}

	public function acl_role_data($user_type, $role_type, $ug_id = false, $forum_id = false)
	{
		return array();
	}

	public function login($username, $password, $autologin = false, $viewonline = 1, $admin = 0)
	{
		return array();
	}
}
