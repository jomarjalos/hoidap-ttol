<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

class QAModelTags extends JModelList
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
		
		$this->setState('list.limit', 200);
		$this->setState('list.start', JRequest::getUInt('limitstart', 0));
	}
	
	public function getListQuery()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('*')
				->from('#__qa_tags')
				->order('count DESC')
			;
		
		return $query;
	}	
}