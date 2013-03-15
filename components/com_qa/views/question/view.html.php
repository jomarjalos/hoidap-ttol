<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_qa
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * HTML View class for the Content component
 *
 * @package		Joomla.Site
 * @subpackage	com_qa
 * @since 1.5
 */
class QAViewQuestion extends JViewLegacy
{
	protected $item;
	protected $category;
	protected $state;
	protected $params;
	
	function display($tpl = null)
	{		
		$item		= $this->get('Item');
//		$category	= $this->get('Category');
		$this->state	= $this->get('State');
		$this->params	= $this->state->get('params');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		// Compute the article slugs and prepare introtext (runs content plugins).
		$item->slug = $item->alias ? ($item->id . ':' . $item->alias) : $item->id;
		
		$this->item = $item;

		$this->_prepareDocument();

		parent::display($tpl);
	}

	/**
	 * Prepares the document
	 */
	protected function _prepareDocument()
	{
		$app		= JFactory::getApplication();
		$menus		= $app->getMenu();
		$pathway	= $app->getPathway();
		$title		= $this->item->title;
		
		$items = $pathway->get('_pathway');
		
//		$arrPathway = array();
		
//		foreach ($items as $item)
//		{
//			$obj = new stdClass();
//			
//			$obj->name = $item->name;
//			$obj->link = '';
//			
//			$arrPathway[] = $obj;
//			
//			unset($obj);
//		}
//		
//		$obj = new stdClass();
//			
//		$obj->name = $title;
//		$obj->link = '';
//		
//		$arrPathway[] = $obj;
			
		$pathway->addItem($title);
		
//		$pathway->setPathway($arrPathway);

		$this->document->setTitle($title);
		
		$output = str_replace(array("\r\n", "\r"), "\n", strip_tags($this->item->bbcode));
		$lines = explode("\n", $output);
		$new_lines = array();

		foreach ($lines as $i => $line) {
			if(!empty($line))
				$new_lines[] = trim($line);
		}
		
		$desc = implode($new_lines);

		if ($this->item->metadesc)
		{
			$this->document->setDescription($this->item->metadesc);
		}
		else
			$this->document->setDescription($desc);

		if ($this->item->metakey)
		{
			$this->document->setMetadata('keywords', $this->item->metakey);
		}
	}
}
