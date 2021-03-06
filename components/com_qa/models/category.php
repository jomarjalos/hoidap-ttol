<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

class QAModelCategory extends JModelList
{
	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * return	void
	 * @since	1.6
	 */
	protected function populateState($ordering = null, $direction = null)
	{
		$pk		= JRequest::getInt('id');
		$this->setState('category.id', $pk);
		
		$this->setState('list.limit', 50);
		$this->setState('list.start', JRequest::getUInt('limitstart', 0));
		$this->setState('filter.tag', JRequest::getString('tag', ''));
	}
	
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
		
		$tag = $this->getState('filter.tag');
		
		if ($tag)
			$query->where ('q.tags LIKE "%'.$tag.'%"');
		
		return $query;
	}
	
	public function getItems()
	{
		$rs = parent::getItems();
		
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