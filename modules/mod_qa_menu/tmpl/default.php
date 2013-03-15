<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_stats
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>

<ul style="margin:0px; padding:0px;">
	<li>
		<?php 
		$active = $linkHome['active'] ? 'check' : 'image';
		?>
		<div class="<?php echo $active; ?>1">
			<div class="<?php echo $active; ?>2">
				<div class="<?php echo $active; ?>3">
					<a href="<?php echo JURI::base(); ?>">
						<div class="jeques-questions-home">
							<div class="image4">
								Laptrinh.Pro.vn
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</li>
	<li>
		<?php 
		$active = 'image'; # $linkTags['active'] ? 'check' : 'image';
		?>
		<div class="<?php echo $active; ?>1">
			<div class="<?php echo $active; ?>2">
				<div class="<?php echo $active; ?>3">
					<a href="<?php echo '#'; # $linkTags['url']; ?>">
						<div class="jeques-tags">
							<div class="image4">
								Tags						
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</li>
	<li>
		<?php 
		$active = $linkAddQuestion['active'] ? 'check' : 'image';
		?>
		<div class="<?php echo $active; ?>1">
			<div class="<?php echo $active; ?>2">
				<div class="<?php echo $active; ?>3">
					<a href="<?php echo $linkAddQuestion['url']; ?>">
						<div class="jeques-questions">
							<div class="image4">
								Gửi câu hỏi					
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</li>
</ul>