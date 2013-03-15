<?php
defined('_JEXEC') or die;
?>

<h2>Câu hỏi</h2>

<?php if (JRequest::getString('tag')): ?>
<div class="tag-desc">
	Bạn đang xem với tag: <strong><?php echo JRequest::getString('tag'); ?></strong> [ <a href="<?php echo JRoute::_('index.php?Itemid='.QUESTION_CATEGORY_ITEMID, false); ?>">Xóa</a> ]
</div>
<?php endif; ?>

<?php foreach ($this->items as $item): ?>

<div class="je-questions">
	<a title="<?php echo $item->title; ?>" class="question-title" href="<?php echo JRoute::_(QAHelperRoute::getQuestionRoute($item->slug, $item->catid)); ?>">
		<?php echo $item->title; ?>
	</a>
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
</div>

<?php endforeach; ?>

<div class="pagination">
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>