<?php
/**
 # @package			QE Login with Facebook for Joomla! website
 # @sub_package		mod_qeloginwfacebook - QE Login with Facebook Module for Joomla! 2.5
 # @author			NetQ Creative Software
 # @copyright 		Copyright(C) 2012 QExtension.com. All Rights Reserved.
 # @license			GNU/GPL version 2 - http://www.gnu.org/licenses/gpl-2.0.html
 # @website			http://www.qextensions.com
 # @support			http://www.qextensions.com/forum
**/
/**---------------------------------------------------------------------------
 * @file: mod_qeloginwfacebook/helper.php 2.5.0 00001, Apr 2012 12:00:00Z QExtensions $
 *---------------------------------------------------------------------------*/

defined('_JEXEC') or die('Restricted access');
jimport('joomla.user.helper');
class QFbLoginModuleHelper{

	function initFbLogin($params){
		$task = JRequest::getVar('qs_act');
		$code = JRequest::getVar('code','');
		if (!class_exists('Facebook', false))
			require_once (JPATH_ROOT.DS.'modules'.DS.'mod_qeloginwfacebook'.DS.'lib'.DS.'facebook'.DS.'facebook.php');

		$app_id = $params->get('fb_app_id');
		$app_sec = $params->get('fb_app_sec');
		$logout_return_url	= base64_encode(JURI::root().trim($params->get('logout', 'index.php')));


		$facebook = new Facebook(array(
			'appId'  => $app_id,
			'secret' => $app_sec
		));
		$user = $facebook->getUser();
		$jUser = JFactory::getUser();
		
		/* check if logout action */
		if($task == 'logout' && $user && !empty($jUser->id)) {
			QFbLoginModuleHelper::logout();
		}
		
		if($user){
			try{
				$user_profile = $facebook->api('/me');
			}catch (FacebookApiException $e) {
				error_log($e);
				$user = null;
			}
		}
		
		// If facebook user state is loged-in then register or login into Joomla.
		if($user) {
			
			if (!($jUser && !empty($jUser->id))) {
			// if not loged in into Joomla system
				$user_info = array_merge((array)$user_profile, array('logoutUrl' => $facebook->getLogoutUrl(), 'loginUrl' => ''));
				$logoutUrl = $facebook->getLogoutUrl(array('next' => base64_decode($logout_return_url)));
				if(!empty($code)){
					$app =& JFactory::getApplication();
					$user_fields = new stdClass();
					$user_fields->id = NULL;
					$user_fields->name = $user_info['name'];
					$user_fields->username = $user_info['username'];
					$user_fields->email = $user_info['email'];
					$user_fields->password = $randomKeys.substr($facebook->getAccessToken(),0,20);

					QFbLoginModuleHelper::login($user_fields);
				}
				else {
					$facebook->destroySession();
					$user_info = array('logoutUrl' => '', 'loginUrl' => $facebook->getLoginUrl(array('scope' => 'email')));
				}
			}
			else {
			// if loged in into Joomla system
				$user_info = array(
					'name' => $jUser->name,
					'username' => $jUser->username,
					'email' => $jUser->email,
					'logoutUrl' => $facebook->getLogoutUrl(array('next' => base64_decode($logout_return_url))),
					'loginUrl' => ''
				);
			}
			
		}
		else{
		// If facebook user state is not loged-in then show facebook login url.
			$loginUrl = $facebook->getLoginUrl(array('scope' => 'email'));
			$user_info = array('logoutUrl' => '', 'loginUrl' => $facebook->getLoginUrl(array('scope' => 'email')));

		}
		
		return $user_info;
	}

	/* perform the login function */
	function login(&$data) {
		$app =& JFactory::getApplication();
		
        $passwd = $data->password;
		$rand_add = JUserHelper::genRandomPassword(32);
		$pass_crypt = JUserHelper::getCryptedPassword($passwd, $rand_add);
		$data->password = $pass_crypt.':'.$rand_add;
        $data->groups = array('2' => 2);

        //Check username in #_users for exists
		$userId = QFbLoginModuleHelper::getIdUsers($data->username);
		
        if($userId && $userId > 0){
			
			$jUser =& JFactory::getUser($userId);
			$jUser->set('email', $data->email);
			$jUser->set('password', $data->password);
			$jUser->set('groups', $data->groups);

			if (!$jUser->save()) {
				error_log("MOD_SOCIALLOGIN can not update user info with this error: ".$jUser->getError());
			}
        } else {
			
			$jUser =& JFactory::getUser();
			foreach($data as $key => $value){
				$jUser->set($key, $value);
			}

			if (!$jUser->save()) {
				error_log("MOD_SOCIALLOGIN can not save user info with this error: ".$jUser->getError());
			}
			
        }
		
		$return = base64_decode(JRequest::getVar('return'));
		
		/* prepare for perform login */
		$options = array();
		$options['remember'] = false;
		$options['return'] =$return;

		$credentials = array();
		$credentials['username'] = $data->username;
		$credentials['password'] = $passwd;

		/* preform the login action */
		$error = $app->login($credentials, $options);
		if(!JError::isError($error))
		{
			if (!$return) {
				$return	= 'index.php';
			}
			$app->enqueueMessage(JText::_('FACEBOOK USER LOGED IN SUCCESSFULLY'));
		}
		else
		{
			if (!$return) {
				$return	= 'index.php';
			}
			JError::raiseNotice('1', JText::_('CANNOT REGISTER OR LOGIN INTO JOOMLA'));
		}
		$app->redirect($return);
		
    }

	/* perform the logout function */
    function logout(){
        $app =& JFactory::getApplication();
        //Logout site
        $error = $app->logout();
        //Logout facebook
        $logoutUrl = JRequest::getVar('logoutUrl');
		$logout_fb_also = JRequest::getVar('and_logout_fb');
		if ($logout_fb_also == '1') {
			$app->redirect($logoutUrl);
		} else {
			$return = JRequest::getVar('returnUrl');
			$return = base64_decode($return);
			if (!JURI::isInternal($return) || !$return) {
				$return = 'index.php';
			}
			$app->redirect($return);
		}
    }

	/* get return URL when login or logout at site */
	function getReturnURL($params, $type){
		$app	= JFactory::getApplication();
		$router = $app->getRouter();
		$url = null;
		if ($itemid =  $params->get($type))
		{
			$db		= JFactory::getDbo();
			$query	= $db->getQuery(true);

			$query->select($db->quoteName('link'));
			$query->from($db->quoteName('#__menu'));
			$query->where($db->quoteName('published') . '=1');
			$query->where($db->quoteName('id') . '=' . $db->quote($itemid));

			$db->setQuery($query);
			if ($link = $db->loadResult()) {
				if ($router->getMode() == JROUTER_MODE_SEF) {
					$url = 'index.php&Itemid='.$itemid;
				}
				else {
					$url = $link.'&Itemid='.$itemid;
				}
			}
		}
		if (!$url)
		{
			// stay on the same page
			$uri = clone JFactory::getURI();
			$vars = $router->parse($uri);
			unset($vars['lang']);
			if ($router->getMode() == JROUTER_MODE_SEF)
			{
				if (isset($vars['Itemid']))
				{
					$itemid = $vars['Itemid'];
					$menu = $app->getMenu();
					$item = $menu->getItem($itemid);
					unset($vars['Itemid']);
					if (isset($item) && $vars == $item->query) {
						$url = 'index.php';
					}
					else {
						$url = 'index.php?'.JURI::buildQuery($vars).'&Itemid='.$itemid;
					}
				}
				else
				{
					$url = 'index.php?'.JURI::buildQuery($vars);
				}
			}
			else
			{
				$url = 'index.php?'.JURI::buildQuery($vars);
			}
		}

		return base64_encode($url);
	}

	function getType(){
		$user = & JFactory::getUser();
		return (!$user->get('guest')) ? 'logout' : 'login';
	}

	/* Generate Random key */
    function randomkeys($length) {
        $pattern = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $key = '';
        for($i = 0; $i < $length; $i++) {
            $key .= $pattern{rand(0,strlen($pattern)-1)};
        }
        return $key;
    }

	/* get user ID from db */
	function getIdUsers($username){
		$db = & JFactory::getDBO();
		$query = 'SELECT id FROM #__users WHERE username = ' . $db->Quote( $username );
		$db->setQuery($query, 0, 1);
		return $db->loadResult();
    }

}
?>
