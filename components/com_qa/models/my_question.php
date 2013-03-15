<?php

class QAModelMy_Question extends JModel
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
		
		return $rec;
	}
	
	public function save($title, $content)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$alias = MainHelperClass::convertAlias($title);
		$alias = strtolower(str_replace(' ', '-', $alias));
		
		$modified = date('Y-m-d H:i:s');
		$title = $db->quote($title);
		$content = $db->quote($content);
		
		$query->update('#__qa_questions');
		$query->set('catid = '.QUESTION_DEFAULT_CATEGORY . ', 
						title = ' . $title.', 
						alias = "'.$alias.'",
						content = '.$content.',
						modified = "'.$modified.'", 
						state = 1');
		$query->where('id = ' . JRequest::getInt('id', 0));
		
		$db->setQuery($query);
		$db->query();
		
		if ($db->getErrorMsg())
			die($db->getErrorMsg ());
		
		return true;
	}
}