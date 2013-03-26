<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_qa
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

$jqueryFileUploadPath = JURI::root() . 'media/jquery-ui-upload/';
?>

<style>
</style>

<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'tip.cancel' || document.formvalidator.isValid(document.id('tip-form'))) {
			Joomla.submitform(task, document.getElementById('tip-form'));
		}
	}
</script>

<style type="text/css">
	#jform_content { width: 400px; }
	#jform_tags { font-size: 1.364em; }
</style>

<form action="<?php echo JRoute::_('index.php?option=com_qa&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="tip-form" class="form-validate" enctype="multipart/form-data">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo empty($this->item->id) ? JText::_('New') : JText::sprintf('Detail', $this->item->id); ?></legend>
			<ul class="adminformlist">
				<li><?php echo $this->form->getLabel('title'); ?>
				<?php echo $this->form->getInput('title'); ?></li>
				
				<li><?php echo $this->form->getLabel('tags'); ?>
				<?php echo $this->form->getInput('tags'); ?></li>
				
				<li><?php echo $this->form->getLabel('content'); ?>
					
				<input type="button" name="bold" value="B" onclick="javascript:addtag('jform_content','bold');" class="t">
				<input type="button" name="italic" value="I" onclick="javascript:addtag('jform_content','italic');" class="t">
				<input type="button" name="uline" value="U" onclick="javascript:addtag('jform_content','underline');" class="t">
				<input type="button" name="url" value="Url" onclick="javascript:addtag('jform_content','url');" class="t">
				<input type="button" name="img" value="Img" onclick="javascript:addtag('jform_content','img');" class="t">
				<input type="button" name="code" value="Code" onclick="javascript:addtag('jform_content','code');" class="t">
				<input type="button" name="quote" value="Quote" onclick="javascript:addtag('jform_content','quote');" class="t">	
				
				</li>
				
				<li>
					<label>&nbsp;</label>
					<?php echo $this->form->getInput('content'); ?>
				</li>
				
				<li><?php echo $this->form->getLabel('state'); ?>
				<?php echo $this->form->getInput('state'); ?></li>
				
				<?php /*
				<li>
					<?php echo $this->form->getLabel(''); ?>
					<?php echo $this->form->getInput(''); ?>
				</li>

				<li>
					<?php echo $this->form->getLabel(''); ?>
					<?php echo $this->form->getInput(''); ?>
				</li>
				 */ ?>

				<li><?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?></li>
			</ul>
			
			<div class="clr"> </div>
			
		</fieldset>
		
		<fieldset class="adminform">
			<legend>Answers</legend>
			
			<ul class="adminformlist">
				<?php $answers = $this->item->answers; ?>
				<li>
					<input type="button" name="bold" value="B" onclick="javascript:addtag('jform_answer','bold');" class="t">
					<input type="button" name="italic" value="I" onclick="javascript:addtag('jform_answer','italic');" class="t">
					<input type="button" name="uline" value="U" onclick="javascript:addtag('jform_answer','underline');" class="t">
					<input type="button" name="url" value="Url" onclick="javascript:addtag('jform_answer','url');" class="t">
					<input type="button" name="img" value="Img" onclick="javascript:addtag('jform_answer','img');" class="t">
					<input type="button" name="code" value="Code" onclick="javascript:addtag('jform_answer','code');" class="t">
					<input type="button" name="quote" value="Quote" onclick="javascript:addtag('jform_answer','quote');" class="t">
					<textarea style="width: 100%;" name="answer" rows="10" id="jform_answer"></textarea>
					<input type="checkbox" name="answer_state" value="1" checked="checked" /> 
					<span style="float: left; line-height: 23px;">Published</span>
					<div class="clr"></div>
				</li>
				
				<?php foreach ($answers as $answer): ?>
				<li style="margin: 5px 0;">
					<div style="margin: 2px 0; border-bottom: 1px dashed #CCC; width: 100%; padding-bottom: 2px; font-weight: bold;">
						<?php 
						if ($answer->state == 1)
							$str = '[v]';
						else
							$str = '[x]';
						
						echo $str . ' ' . $answer->content; 
						?>
					</div>
					<small>
						<?php 
						$str = $answer->author_name . ' / ' . $answer->created . ' / Action: '; 
						$str .= '<a href="">Publish</a> ';
						$str .= '<a href="">Unpublish</a> ';
						$str .= '<a href="">Delete</a>';
						
						echo $str;
						?>
					</small>
				</li>
				<?php endforeach; ?>
			</ul>
		</fieldset>
	</div>

<div class="width-40 fltrt">
	<?php echo JHtml::_('sliders.start', 'tip-sliders-'.$this->item->id, array('useCookie'=>1)); ?>

	<?php echo JHtml::_('sliders.panel', JText::_('Publishing'), 'publishing-details'); ?>
		<fieldset class="panelform">
		<ul class="adminformlist">
			<?php foreach($this->form->getFieldset('publish') as $field): ?>
				<li><?php echo $field->label; ?>
					<?php echo $field->input; ?></li>
			<?php endforeach; ?>
			</ul>
		</fieldset>

	<?php echo JHtml::_('sliders.panel', JText::_('JGLOBAL_FIELDSET_METADATA_OPTIONS'), 'metadata'); ?>
		<fieldset class="panelform">
			<ul class="adminformlist">
				<?php foreach($this->form->getFieldset('metadata') as $field): ?>
					<li><?php echo $field->label; ?>
						<?php echo $field->input; ?></li>
				<?php endforeach; ?>
			</ul>
		</fieldset>

	<?php echo JHtml::_('sliders.end'); ?>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</div>

<div class="clr"></div>
</form>
