<?php ?>

<div class="tabb" style="display: none;">
	<ul>
		<li>
			<a href="#">
				Latest Questions
			</a>
		</li>
		<li>
			<a href="#">
				Popular
			</a>
		</li>
		<li>
			<a href="#">
				Open
			</a>
		</li>
	</ul>
</div>

<?php foreach ($this->items as $item): ?>

<div class="je-questions">
	<a class="question-title" href="<?php echo JRoute::_(QAHelperRoute::getQuestionRoute($item->slug, $item->catid)); ?>">
		<?php echo $item->title; ?>
	</a>
	<div id="je-posted">
		<ul class="tags">
			<?php foreach ($item->tags as $tag): ?>
			<li>
				<a href=""><?php echo $tag; ?></a>
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