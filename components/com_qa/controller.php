<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Content Component Controller
 *
 * @package		Joomla.Site
 * @subpackage	com_content
 * @since		1.5
 */
class QAController extends JControllerLegacy
{
	protected $default_view = 'category';

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
		$cachable = true;
		
		$user = JFactory::getUser();
		
		$vName	= JRequest::getCmd('view', 'questions');
		JRequest::setVar('view', $vName);
		
		$requiredLogin = array('post_question');
		
		if (in_array($vName, $requiredLogin) && $user->guest)
		{
			$link = JRoute::_('index.php?option=com_users&view=login');
			$this->setRedirect($link, 'Vui lòng đăng nhập trước!', 'notice');
			
			return false;
		}

		$safeurlparams = array('catid'=>'INT', 'id'=>'INT', 'cid'=>'ARRAY', 'year'=>'INT', 'month'=>'INT', 'limit'=>'UINT', 'limitstart'=>'UINT',
			'showall'=>'INT', 'return'=>'BASE64', 'filter'=>'STRING', 'filter_order'=>'CMD', 'filter_order_Dir'=>'CMD', 'filter-search'=>'STRING', 'print'=>'BOOLEAN', 'lang'=>'CMD');

		parent::display($cachable, $safeurlparams);

		return $this;
	}
}
