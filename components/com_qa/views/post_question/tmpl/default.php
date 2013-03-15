<?php
defined('_JEXEC') or die;
?>

<h2>Gửi câu hỏi</h2>

<div class="guide">
	Hướng dẫn gửi câu hỏi
</div>

<form id="post-question" method="post" action="index.php">
	<p>Tiêu đề <span style="color: red;">*</span></p>
	<input type="text" name="title" id="title" class="tag" />
	<p>Nội dung <span style="color: red;">*</span></p>
	<input type="button" name="bold" value="B" onclick="javascript:addtag('contentArea','bold');" class="t">
	<input type="button" name="italic" value="I" onclick="javascript:addtag('contentArea','italic');" class="t">
	<input type="button" name="uline" value="U" onclick="javascript:addtag('contentArea','underline');" class="t">
	<input type="button" name="url" value="Url" onclick="javascript:addtag('contentArea','url');" class="t">
	<input type="button" name="img" value="Img" onclick="javascript:addtag('contentArea','img');" class="t">
	<input type="button" name="code" value="Code" onclick="javascript:addtag('contentArea','code');" class="t">
	<input type="button" name="quote" value="Quote" onclick="javascript:addtag('contentArea','quote');" class="t">
	<br/>
	<textarea id="contentArea" name="content" rows="20" cols="60"></textarea>
	<p>Tags <span style="color: red;">*</span></p>
	<input type="text" name="tags" id="tags" class="tag" />
	
	<div class="clear"></div>
	
	<button class="button float-right margin-5" type="button" style="width: 88px;" id="btn-send-question">Gửi</button>
	
	<input type="hidden" value="question.post" name="task" />
	<input type="hidden" value="com_qa" name="option" />
	<?php echo JHtml::_( 'form.token' ); ?>
</form>

<div class="clear"></div>

<script src="<?php echo JURI::base(); ?>sitelibs/html/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo JURI::base(); ?>sitelibs/html/js/sbbeditor.js" type="text/javascript"></script>

<script type="text/javascript">
	jQuery.noConflict();
	
	jQuery(function($){
		$('#btn-send-question').click(function(){
			var title = $('#title');
			var content = $('#contentArea');
			var tags = $('#tags');
			
			if ($.trim(title.val()) == '')
			{
				title.addClass('invalid');
				return false;
			}
			
			if ($.trim(content.val()) == '')
			{
				content.addClass('invalid');
				return false;
			}
			
			if ($.trim(tags.val()) == '')
			{
				tags.addClass('invalid');
				return false;
			}
			
			$('#post-question').submit();
			
			return true;
		});
	})
</script>
