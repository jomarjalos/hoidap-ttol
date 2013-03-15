<?php
/**
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Banners master display controller.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_qa
 * @since		1.6
 */
class QAController extends JControllerLegacy
{
	public $default_view = 'questions';
	/**
	 * Method to display a view.
	 *
	 * @param	boolean			If true, the view output will be cached
	 * @param	array			An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return	JController		This object to support chaining.
	 * @since	1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		// Load the submenu.
		QAHelper::addSubmenu(JRequest::getCmd('view', 'questions'));

//		$view	= JRequest::getCmd('view', 'hotels');
//		$layout = JRequest::getCmd('layout', 'default');
//		$id		= JRequest::getInt('id');		
		parent::display();

		return $this;
	}
}
