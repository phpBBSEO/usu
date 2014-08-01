<?php
/**
*
* @package Ultimate SEO URL phpBB SEO
* @copyright (c) 2006 - 2014 www.phpbb-seo.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbbseo\usu\tests;

/**
* phpBB SEO Core Mock
* @package phpBBSEO
*/
class core extends \phpbbseo\usu\core
{
	public function read_config($from_bkp = false)
	{
		global $tc_settings, $tc_forum_urls;

		$this->seo_opt = array(
			'url_rewrite'			=> true,
			'modrtype'				=> 3,
			'sql_rewrite'			=> false,
			'profile_inj'			=> false,
			'profile_vfolder'		=> false,
			'profile_noids'			=> false,
			'rewrite_usermsg'		=> false,
			'rewrite_files'			=> false,
			'rem_sid'				=> false,
			'rem_hilit'				=> true,
			'rem_small_words'		=> false,
			'virtual_folder'		=> true,
			'virtual_root'			=> false,
			'cache_layer'			=> true,
			'rem_ids'				=> false,
			'redirect_404_forum'	=> false,
			'zero_dupe'				=> array(
				'on'			=> true,
				'strict'		=> true,
				'post_redir'	=> 'all',
			),
		);

		$this->cache_config['forum_urls'] = array();

		$this->cache_config['settings'] = & $tc_settings;
		$this->cache_config['forum_urls'] = & $tc_forum_urls;
		$this->cache_config['cached'] = true;
		$this->seo_opt = array_replace_recursive($this->seo_opt, $tc_settings);
		$this->modrtype = @isset($this->seo_opt['modrtype']) ? $this->seo_opt['modrtype'] : $this->modrtype;

		if ($this->modrtype > 1)
		{
			$this->seo_url['forum'] = & $this->cache_config['forum_urls'];
		}
	}
}
