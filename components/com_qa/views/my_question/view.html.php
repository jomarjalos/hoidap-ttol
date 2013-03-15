<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_qa
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * HTML View class for the Content component
 *
 * @package		Joomla.Site
 * @subpackage	com_qa
 * @since 1.5
 */
class QAViewMy_Question extends JViewLegacy
{
	protected $item;
	
	function display($tpl = null)
	{
		$this->item = $this->get('Item');
		
		if (!$this->item->id)
		{
			JFactory::getApplication()->redirect(JURI::root(), 'Xin lỗi, bạn không có quyền để truy cập phần này.', 'notice');
			return false;
		}
		
		parent::display($tpl);
	}
}
