<?php

class QAModelQuestion extends JModel
{
	public function getItem()
	{
		require_once JPATH_ROOT . "/sitelibs/php/jbbcode/Parser.php";
		
//		require_once("jbbcode-1.0.1/Parser.php");
 
		$parser = new JBBCode\Parser();
		$parser->loadDefaultCodes();
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$id = JRequest::getInt('id', 0);
		
		$query->select('q.*')
				->select('DATE_FORMAT(q.created, "%d/%m/%Y") AS created')
				->select('(SELECT COUNT(id) FROM #__qa_question_answers qa WHERE qa.question_id = q.id) AS count_answers')
				->from('#__qa_questions q')
				->select('u.username AS author')
				->join('LEFT', '#__users u ON q.created_by = u.id')
				->where('q.id = ' . $id)
				->where('q.state = 1');
		$db->setQuery($query);
		
		$rec = $db->loadObject();
		
		$query = $db->getQuery(true);
		$query->select('qa.*')
				->select('DATE_FORMAT(qa.created, "%d/%m/%Y") AS created')
				->from('#__qa_question_answers qa')
				->select('u.username AS author')
				->join('LEFT', '#__users u ON qa.created_by = u.id')
				->where('question_id = ' . $id)
				->where('state = 1')
				->order('qa.id DESC');
		
		$db->setQuery($query);
		
		$rec->answers = $db->loadObjectList();
		
		if ($db->getErrorMsg())
			die($db->getErrorMsg ());
		
		foreach ($rec->answers as & $answer)
		{
//			var_dump($answer->content);
			$content = $parser->parse(htmlspecialchars($answer->content) );
//			var_dump($content);
			$answer->content = $parser->getAsHtml();			
		}
		
		$tags = explode(',', $rec->tags);
		
		$arrTags = array();
		
		foreach ($tags as $tag)
			$arrTags[] = trim($tag);
			
		$rec->tags = $arrTags;
		
		$parser->parse(htmlspecialchars($rec->content) );
		$rec->bbcode = $parser->getAsHtml();
		
		return $rec;
	}
	
	public function save($title, $content, $tags)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$alias = MainHelperClass::convertAlias($title);
		$alias = strtolower(str_replace(' ', '-', $alias));
		
		$created = date('Y-m-d H:i:s');
		$created_by = JFactory::getUser()->id;
		$title = $db->quote($title);
		$content = $db->quote($content);
		
		$query->insert('#__qa_questions (catid, title, alias, content, tags, created, created_by, state)');
		$query->values(QUESTION_DEFAULT_CATEGORY . ', ' . $title.', "'.$alias.'", '.$content.', "'.$tags.'", "'.$created.'", "'.$created_by.'", 1');
		
		$db->setQuery($query);
		$db->query();
		
		if ($db->getErrorMsg())
			die($db->getErrorMsg ());
		
		// Update tags
		MainHelperClass::updateTags($tags);
		
		return true;
	}
	
	public function saveAnswer($questionId, $content)
	{
//		var_dump($content); die;
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$created = date('Y-m-d H:i:s');
		$created_by = JFactory::getUser()->id;
		$content = $db->quote($content);
		
		$query->insert('#__qa_question_answers (question_id, content, created, created_by, state)');
		$query->values($questionId.', '.$content.', "'.$created.'", "'.$created_by.'", 1');
		
		$db->setQuery($query);
		$db->query();
		
		if ($db->getErrorMsg())
			die($db->getErrorMsg ());
		
		return true;
	}
}