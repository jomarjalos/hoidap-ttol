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
/**-------------------------------------------------------------------------------
 * @file: tmpl/default.php 2.5.0 00001, Apr 2012 12:00:00Z QExtensions $
 *-------------------------------------------------------------------------------*/

defined('_JEXEC') or die('Restricted access');

$doc = JFactory::getDocument();
$doc->addStyleSheet(JURI::root().'modules/mod_qeloginwfacebook/assets/css/mod_qeloginwfacebook.css');
?>
<div class="mod_loginwfacebook_wrapper">
<?php 

if ($user_info['loginUrl'] != ''){ ?>
    <a class="loginwfacebook_button" href="<?php echo $user_info['loginUrl']; ?>">
		<span><?php echo JText::_('LOGIN WITH FACEBOOK'); ?></span>
	</a> 
<?php 
}
/*
else {
	$name = @$user_info['name'] ? $user_info['name'] : JText::_('CUSTOMER');
	$user_link = @$user_info['link'] ? $user_info['link'] : '#';
	$email = @$user_info['email'] ? $user_info['email'] : 'noemail@needupdate.com';
	$username = @$user_info['username'] ? $user_info['username'] : $user_info['id'];
	
	$greeting = $params->get('greeting');
	echo '<p class="greeting_name">'.$greeting.' <a href="'.$user_link.'">'.$name.'</a></p>';
    echo '<img class="user_profile_image" src="https://graph.facebook.com/'.$username.'/picture">';
	echo '<p class="user_name">'.(@$user_info['username'] ? $user_info['username'] : $name).'</p><br style="clear: both;"/>';
	echo '
		<form class="logout_form" action="index.php" method="POST">
			<input type="hidden" name="logoutUrl" value="'.$user_info['logoutUrl'].'" />
			<input type="hidden" name="returnUrl" value="'.$logout_return_url.'" />
			<input type="submit" class="button loginwfacebook_button" value="'.JText::_('LOGOUT').'" />
			<p><input type="checkbox" name="and_logout_fb" value="1" /> '.JText::_('LOGOUT WITH FACEBOOK').' </p>
			<input type="hidden" name="qs_act" value="logout" />
		</form>';
    ?>
<?php } */ ?>
</div>
