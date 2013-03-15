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
	}
	
	public function getListQuery()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('*')
				->select('COUNT(id) FROM #__qa_question_answers qa WHERE qa.question_id = q.id')
				->from('#__qa_questions q')
				->where('q.state = 1')
				->order('q.id DESC')
			;
		
		$db->setQuery($query);
		$rs = $db->loadObjectList();
		
		return $rs;
	}
	
	
}