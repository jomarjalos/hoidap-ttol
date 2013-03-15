<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_stats
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * @package		Joomla.Site
 * @subpackage	mod_stats
 * @since		1.5
 */
class modQAMenuHelper
{
	function getUrl($Itemid)
	{
		$menu = &JSite::getMenu(); 
		$activeMenu = $menu->getActive();
		
		$item = JFactory::getApplication()->getMenu()->getItem( $Itemid );
		$url = JRoute::_('index.php' . '?Itemid=' . $Itemid);
		
		$active = (is_object($activeMenu) && $Itemid == $activeMenu->id) ? 'true' : false;
		
		return array('url' => $url, 'active' => $active);
	}
}
