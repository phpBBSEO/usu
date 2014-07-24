<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @version $$
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu;

/**
* pagination Class
* www.phpBB-SEO.com
* @package Ultimate SEO URL phpBB SEO
*/
class pagination extends \phpbb\pagination
{
	/** @var \phpbbseo\usu\core */
	protected $core;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/**
	* Current $php_ext
	* @var string
	*/
	protected $php_ext;

	/**
	* Constructor
	*
	* @param	\phpbbseo\usu\core			$core
	* @param	\phpbb\template\template	$template
	* @param	\phpbb\user					$user
	* @param	\phpbb\controller\helper	$helper
	* @param	string						$php_ext		PHP file extension
	*/
	public function __construct(\phpbbseo\usu\core $core, \phpbb\template\template $template, \phpbb\user $user, \phpbb\controller\helper $helper, $php_ext)
	{
		$this->core = $core;
		$this->template = $template;
		$this->user = $user;
		$this->helper = $helper;
		$this->php_ext = $php_ext;
	}

	/**
	* paginate
	*
	*/
	public function generate_page_link($base_url, $on_page, $start_name, $per_page)
	{
		$paginated = array();

		if (!is_string($base_url))
		{
			if (is_array($base_url['routes']))
			{
				$route = ($on_page > 1) ? $base_url['routes'][1] : $base_url['routes'][0];
			}
			else
			{
				$route = $base_url['routes'];
			}

			$params = (isset($base_url['params'])) ? $base_url['params'] : array();
			$is_amp = (isset($base_url['is_amp'])) ? $base_url['is_amp'] : true;
			$session_id = (isset($base_url['session_id'])) ? $base_url['session_id'] : false;

			if ($on_page > 1 || !is_array($base_url['routes']))
			{
				$params[$start_name] = (int) $on_page;
			}

			return $this->helper->route($route, $params, $is_amp, $session_id);
		}

		if (!isset($paginated[$base_url]))
		{
			$rewriten = $this->core->url_rewrite($base_url);

			@list($rewriten, $qs) = explode('?', $rewriten, 2);

			if (
				// rewriten urls are absolute
				!preg_match('`^(https?\:)?//`i', $rewriten) ||
				// they are not php scripts
				preg_match('`\.' . $this->php_ext . '$`i', $rewriten)
			)
			{
				// in such case, rewrite as usual
				$url_delim = (strpos($base_url, '?') === false) ? '?' : ((strpos($base_url, '?') === strlen($base_url) - 1) ? '' : '&amp;');
				$paginated[$base_url] = $base_url . $url_delim . '%1\$s=%2\$s';
			}
			else
			{
				$hasExt = preg_match('`^((https?\:)?//[^/]+.+)(\.[a-z0-9]+)$`i', $rewriten);

				if ($hasExt)
				{
					// start location is before the ext
					$rewriten = preg_replace('`^((https?\:)?//[^/]+.+)(\.[a-z0-9]+)$`i', '\1' . $this->core->seo_delim['start'] . '%2\$s\3', $rewriten);
				}
				else
				{
					// start is appened
					$rewriten = rtrim($rewriten, '/') . '/' . $this->core->seo_static['pagination'] .  '%2$s' . $this->core->seo_ext['pagination'];
				}

				$paginated[$base_url] = $rewriten . ($qs ? "?$qs" : '');
			}
		}

		// we'll see if start_name has use cases, and we can still work with rewriterules
		return ($on_page > 1) ? sprintf($paginated[$base_url], $start_name, ($on_page - 1) * $per_page) : $base_url;
	}
}
