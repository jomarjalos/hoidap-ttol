<?php
/**
 * @package                Joomla.Site
 * @subpackage	Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access.
defined('_JEXEC') or die;

// get params
$app = JFactory::getApplication();
$doc = JFactory::getDocument();

$doc->addStyleSheet(JURI::base() . '/templates/system/css/system.css');
$doc->addStyleSheet(JURI::base() . '/templates/' . $this->template . '/css/position.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet(JURI::base() . '/templates/' . $this->template . '/css/layout.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet(JURI::base() . '/templates/' . $this->template . '/css/style.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet(JURI::base() . '/templates/' . $this->template . '/css/nature.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet(JURI::base() . '/templates/' . $this->template . '/css/accordionview.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet(JURI::base() . '/templates/' . $this->template . '/css/general_konqueror.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet(JURI::base() . '/templates/' . $this->template . '/css/print.css', $type = 'text/css', $media = 'print');

$files = JHtml::_('stylesheet', 'templates/' . $this->template . '/css/general.css', null, false, true);
if ($files):
	if (!is_array($files)):
		$files = array($files);
	endif;
	foreach ($files as $file):
		$doc->addStyleSheet($file);
	endforeach;
endif;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
	<head>
		<jdoc:include type="head" />

		<style media="screen" type="text/css">
			html,
			body {
				margin:0;
				padding:0;
				height:100%;
			}
		</style>



		<!--[if lte IE 6]>
		<style media="screen" type="text/css">
			html,
			body {
				margin:0;
				padding:0;
				height:100%;
			}
		</style>
		<![endif]-->

	</head>

	<body id="jetweetsdemo-theme" class="wrapper-theme3" cz-shortcut-listen="true">
		<div id="jetweetsdemo-main-wrapper">
			<div>									
				<div id="all">
					<div id="back">
						<div id="header">
							<div class="logoheader">
								<h1 id="logo" style="float:left;">
									<span class="question-logo"></span>
									Laptrinh.Pro.VN
									<span class="header1">Cùng chia sẻ</span>
								</h1>

							</div>
							<!-- end logoheader -->

							<div id="line">											

							</div> <!-- end line -->
						</div><!-- end header -->
						<div id="contentarea">
							<div id="breadcrumbs">
								<jdoc:include type="modules" name="position-2" />
							</div>
							<div id="wrapper2">

								<div id="main">
									<div id="je-questions">
										<div style="height:40px;">
											<jdoc:include type="modules" name="qa-menu" />
										</div>

										<div id="wrapper1">
											<div id="def_quessrch" style="display:block;"> 	
												<ol>
													<li class="container">
														<div id="content-area">
															<jdoc:include type="message" />
															<jdoc:include type="component" />
														</div>
													</li>
												</ol>
											</div>	
										</div>											
									</div>

								</div><!-- end main -->					
							</div><!-- end wrapper -->
							<div class="left leftbigger" id="nav">
								<div class="moduletable">
									<h3>Thành viên</h3>
									<jdoc:include type="modules" name="right" />
								</div>
							</div> <!-- end contentarea -->
						</div><!-- back -->
					</div><!-- all -->

					<div id="footer-outer">
						<div id="footer-sub">
							<div id="footer">
								<div class="footer1">
									Copyright © <?php echo date('Y'); ?> laptrinh.pro.vn. All Rights Reserved.
								</div>
							</div>
							<!-- end footer -->
						</div>							
					</div>						
				</div>					
			</div>
		</div>
		<jdoc:include type="modules" name="debug" />
	</body>
</html>
