<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_ntrip
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_ntrip')) {
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Add script
$doc = JFactory::getDocument();

$doc->addScript(JURI::root() . 'media/qa/jquery-1.7.2.min.js');
$doc->addScript(JURI::root() . 'components/com_qa/helpers/html/js/qa.js');

// Helper
require_once JPATH_COMPONENT.'/helpers/qa.php';

// Execute the task.
$controller	= JControllerLegacy::getInstance('QA');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
