<?php

class QAControllerQuestion extends JControllerLegacy
{
	public function post()
	{
		if (JFactory::getUser()->guest)
			return false;		
		
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
		
		$url = JRoute::_('index.php?Itemid=' . QUESTION_ADD_QUESTION_ITEMID);
		
		$post = JRequest::get('post');
		
		$title = trim($post['title']);
		$content = trim($_POST['content']);
		$tags = trim($post['tags']);
		
		if ($title == '' || $content == '' || $tags == '')
		{
			$this->setRedirect($url, 'Thông tin không đầy đủ!', 'notice');
			return false;
		}
		
		$model = $this->getModel('Question', 'QAModel');
		$saveResult = $model->save($title, $content, $tags);
		
		$this->setRedirect(JURI::base(), 'Gửi câu hỏi thành công!');
		return true;
	}
	
	public function answer()
	{
		if (JFactory::getUser()->guest)
			return false;
		
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
		
		$url = JRoute::_('index.php?option=com_qa&view=question&id=' . JRequest::getInt('question_id').':'.JRequest::getString('question_alias'), false);
		
		$post = JRequest::get('post');
		
//		var_dump($_POST['content']); die;
		
		$content = trim($_POST['content']);
		
		if ($content == '')
		{
			$this->setRedirect($url, 'Thông tin không đầy đủ!', 'notice');
			return false;
		}
		
		$model = $this->getModel('Question', 'QAModel');
		$saveResult = $model->saveAnswer($post['question_id'], $content);
		
		$this->setRedirect($url, 'Cảm ơn bạn đã trả lời!');
		return true;
	}
}