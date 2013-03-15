<?php
defined('_JEXEC') or die;

$item = $this->item;

function only1br($string) 
{ 
    return preg_replace("/(\r\n)+|(\n|\r)+/", "<br />", $string); 
} 

?>

<script src="<?php echo JURI::root() . '/sitelibs/html/js/google-code-prettify/run_prettify.js'; ?>"></script>

<h2><?php echo $item->title; ?></h2>
<div id="je-posted">
	<ul class="tags">
		<li class="txt-tag">Tags: </li>
		<?php foreach ($item->tags as $tag): ?>
		<li>
			<a title="<?php echo $tag; ?>" href="<?php echo JRoute::_('index.php?option=com_qa&view=category&tag=' . $tag . '&Itemid=' . QUESTION_CATEGORY_ITEMID, false); ?>">
				<?php echo $tag; ?>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>
	<ul class="question-info">
		<li><?php echo ($item->author) ? $item->author : 'Anonymous'; ?></li>
		<li><?php echo $item->created; ?></li>
		<li><?php echo $item->count_answers; ?> Trả lời</li>
	</ul>
</div>

<div class="clear"></div>

<div class="question-content">
	<?php echo only1br($item->bbcode); ?>
</div>

<div class="clear"></div>

<div class="backcolor">
	Trả lời
</div>

<ul class="answers">
	<?php if (JFactory::getUser()->id): ?>
	<li>
		
		<form id="post-answer" method="post" action="index.php">
			<input type="button" name="bold" value="B" onclick="javascript:addtag('contentArea','bold');" class="t">
			<input type="button" name="italic" value="I" onclick="javascript:addtag('contentArea','italic');" class="t">
			<input type="button" name="uline" value="U" onclick="javascript:addtag('contentArea','underline');" class="t">
			<input type="button" name="url" value="Url" onclick="javascript:addtag('contentArea','url');" class="t">
			<input type="button" name="img" value="Img" onclick="javascript:addtag('contentArea','img');" class="t">
			<input type="button" name="code" value="Code" onclick="javascript:addtag('contentArea','code');" class="t">
			<input type="button" name="quote" value="Quote" onclick="javascript:addtag('contentArea','quote');" class="t">
			<br/>
			<textarea id="contentArea" name="content" rows="10" cols="60"></textarea>
			
			<div class="clear"></div>

			<button class="button float-right margin-5" type="button" style="width: 88px;" id="btn-send-question">Gửi</button>

			<input type="hidden" value="question.answer" name="task" />
			<input type="hidden" value="com_qa" name="option" />
			<input type="hidden" value="<?php echo $item->alias; ?>" name="question_alias" />
			<input type="hidden" value="<?php echo $item->id; ?>" name="question_id" />
			<?php echo JHtml::_( 'form.token' ); ?>
		</form>
		
		<div class="clear"></div>
	</li>
	<?php endif; ?>
	
	<?php foreach ($item->answers as $answer): ?>
	<li>
		<div class="ans">
			<?php echo only1br($answer->content); ?>
			
			<ul class="question-info">
				<li><?php echo ($answer->author) ? $answer->author : 'Anonymous'; ?></li>
				<li><?php echo $answer->created; ?></li>
				<li style="display: none;">Like</li>
			</ul>
			
			<div class="clear"></div>
		</div>
	</li>
	<?php endforeach; ?>
	
	<?php if (empty($item->answers)): ?>
	<li>
		Chưa có câu trả lời nào.
	</li>
	<?php endif; ?>
</ul>

<script src="<?php echo JURI::base(); ?>sitelibs/html/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo JURI::base(); ?>sitelibs/html/js/sbbeditor.js" type="text/javascript"></script>

<script type="text/javascript">
	jQuery.noConflict();
	
	jQuery(function($){
		$('#btn-send-question').click(function(){
			var content = $('#contentArea');
			
			if ($.trim(content.val()) == '')
			{
				content.addClass('invalid');
				return false;
			}
			
			$('#post-answer').submit();
			
			return true;
		});
	})
</script>