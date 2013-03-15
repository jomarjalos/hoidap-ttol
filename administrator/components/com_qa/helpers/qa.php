<?php
/**
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Banners component helper.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_qa
 * @since		1.6
 */
class QAHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param	string	The name of the active view.
	 *
	 * @return	void
	 * @since	1.6
	 */
	public static function addSubmenu($vName)
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_QA_SUBMENU_QUESTIONS'),
			'index.php?option=com_qa&view=questions',
			$vName == 'questions'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_QA_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&extension=com_qa',
			$vName == 'categories'
		);
		if ($vName=='categories') {
			JToolBarHelper::title(
				JText::sprintf('COM_CATEGORIES_CATEGORIES_TITLE', JText::_('com_qa')),
				'banners-categories');
		}
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @param	int		The category ID.
	 *
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions($categoryId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($categoryId)) {
			$assetName = 'com_qa';
			$level = 'component';
		} else {
			$assetName = 'com_qa.category.'.(int) $categoryId;
			$level = 'category';
		}

		$actions = JAccess::getActions('com_qa', $level);

		foreach ($actions as $action) {
			$result->set($action->name,	$user->authorise($action->name, $assetName));
		}

		return $result;
	}
}
