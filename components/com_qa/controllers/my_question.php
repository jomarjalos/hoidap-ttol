<?php

class QAControllerMy_Question extends JControllerLegacy
{
	public function post()
	{
		if (JFactory::getUser()->guest)
			return false;		
		
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
		
		$url = JRoute::_('index.php?option=com_qa&view=my_question&id='.JRequest::getInt('id').'&Itemid=' . JRequest::getInt('Itemid'), false);
		
		$post = JRequest::get('post');
		
		$title = trim($post['title']);
		$content = trim($_POST['content']);
		
		if ($title == '' || $content == '')
		{
			$this->setRedirect($url, 'Thông tin không đầy đủ!', 'notice');
			return false;
		}
		
		$model = $this->getModel('My_Question', 'QAModel');
		$saveResult = $model->save($title, $content);
		
		$this->setRedirect($url = JRoute::_('index.php?Itemid=' . JRequest::getInt('Itemid'), false), 'Sửa câu hỏi thành công!');
		return true;
	}
}