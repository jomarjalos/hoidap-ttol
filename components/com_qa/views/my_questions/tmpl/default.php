<?php 

?>

<h2>Câu hỏi của tôi</h2>

<?php foreach ($this->items as $item): ?>

<div class="je-questions">
	<a class="question-title" href="<?php echo JRoute::_(QAHelperRoute::getQuestionRoute($item->slug, $item->catid)); ?>">
		<?php echo $item->title; ?>
	</a>
	<div id="je-posted">
		<ul class="tags">
			<li>Tags: </li>
			<?php foreach ($item->tags as $tag): ?>
			<li>
				<a href=""><?php echo $tag; ?></a>
			</li>
			<?php endforeach; ?>
		</ul>
		<ul class="question-info">
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_qa&view=my_question&id=' . $item->id); ?>">
					Sửa lại câu hỏi
				</a>
			</li>
			<li><?php echo $item->created; ?></li>
			<li><?php echo $item->count_answers; ?> Trả lời</li>
		</ul>
	</div>

	<div class="clear"></div>
</div>

<?php endforeach; ?>