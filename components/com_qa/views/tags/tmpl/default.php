<?php
defined('_JEXEC') or die;

$items = $this->items;
?>

<h2>Tags</h2>

<div class="je-questions-tags">
	
	<ul class="tags">
		<?php foreach ($items as $item): ?>
		<li>
			<a title="<?php echo $item->tag; ?>" href="<?php echo JRoute::_('index.php?option=com_qa&view=category&tag=' . $item->tag . '&Itemid=' . QUESTION_CATEGORY_ITEMID, false); ?>">
				<?php echo $item->tag; ?> (<?php echo $item->count; ?>)
			</a>
		</li>
		<?php endforeach; ?>
	</ul>

	<div class="clear"></div>
</div>

<div class="pagination">
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>