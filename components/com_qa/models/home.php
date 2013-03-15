<?php

class QAModelHome extends JModel
{
	public function getListQuery()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('q.*')
				->select('DATE_FORMAT(q.created, "%d/%m/%Y") AS created')
				->select('(SELECT COUNT(id) FROM #__qa_question_answers qa WHERE qa.question_id = q.id) AS count_answers')
				->from('#__qa_questions q')
				->select('u.username AS author')
				->join('LEFT', '#__users u ON q.created_by = u.id')
				->where('q.state = 1')
				->order('q.id DESC')
			;
		
		return $query;
	}
	
	public function getItems()
	{
		$db = JFactory::getDbo();
		$query = $this->getListQuery();
		
		$db->setQuery($query, 0, 50);
		$rs = $db->loadObjectList();
		
		if ($db->getErrorMsg())
			die($db->getErrorMsg ());
		
		foreach ($rs as & $item)
		{
			$arrTags = array();
			$tags = explode(',', $item->tags);
			
			foreach ($tags as $tag)
				$arrTags[] = trim($tag);
			
			$item->tags = $arrTags;
		}
		
		return $rs;
	}
}