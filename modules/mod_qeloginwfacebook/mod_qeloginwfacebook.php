<?php
/**
 # @package			QE Login with Facebook for Joomla! website
 # @sub_package		mod_qeloginwfacebook - QE Login with Facebook for Joomla! 2.5
 # @author			NetQ Creative Software
 # @copyright 		Copyright(C) 2012 QExtension.com. All Rights Reserved.
 # @license			GNU/GPL version 2 - http://www.gnu.org/licenses/gpl-2.0.html
 # @website			http://www.qextensions.com
 # @support			http://www.qextensions.com/forum
**/
/**---------------------------------------------------------------------------
 * @file: mod_qeloginwfacebook.php 2.5.0 00001, Apr 2012 12:00:00Z QExtensions $
 *---------------------------------------------------------------------------*/
 
defined('_JEXEC') or die('Restricted access');

require_once (dirname(__FILE__).DS.'helper.php');
$randomKeys = QFbLoginModuleHelper::randomkeys(5);
/* 
$login_return_url	= QFbLoginModuleHelper::getReturnURL($params,'login');
$logout_return_url	= QFbLoginModuleHelper::getReturnURL($params,'logout');
 */
$login_return_url	= base64_encode(JURI::root().trim($params->get('login', 'index.php')));
$logout_return_url	= base64_encode(JURI::root().trim($params->get('logout', 'index.php')));

$user_info = QFbLoginModuleHelper::initFbLogin($params);

require(JModuleHelper::getLayoutPath('mod_qeloginwfacebook'));
?>
