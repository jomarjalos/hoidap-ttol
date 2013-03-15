<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_qa_menu
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$linkHome = modQAMenuHelper::getUrl(101);
$linkQuestion = modQAMenuHelper::getUrl(103);
$linkTips = modQAMenuHelper::getUrl(104);
$linkTutorials = modQAMenuHelper::getUrl(105);
$linkAddQuestion = modQAMenuHelper::getUrl(107);
$linkTags = modQAMenuHelper::getUrl(104);

require JModuleHelper::getLayoutPath('mod_qa_menu', $params->get('layout', 'default'));
