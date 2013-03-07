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

$doc->addStyleSheet($this->baseurl . '/templates/system/css/system.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/style.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/nature.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/position.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/layout.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/accordionview.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/general_konqueror.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/print.css', $type = 'text/css', $media = 'print');

$files = JHtml::_('stylesheet', 'templates/' . $this->template . '/css/general.css', null, false, true);
if ($files):
	if (!is_array($files)):
		$files = array($files);
	endif;
	foreach ($files as $file):
		$doc->addStyleSheet($file);
	endforeach;
endif;

$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/accordionview.js', 'text/javascript');
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

	<body>

		<body id="jetweetsdemo-theme" class="wrapper-theme3" cz-shortcut-listen="true">
			<div id="jetweetsdemo-main-wrapper">
				<div>									
					<div id="all">
						<div id="back">
							<div id="header">
								<div class="logoheader">
									<h1 id="logo" style="float:left;">
										JEXTN Questions		                                        		                                        
										<span class="header1">
											Demo		                                        
										</span>
									</h1>

								</div><!-- end logoheader -->
								<ul class="skiplinks">
									<li><a href="http://www.joomla-question-and-answers-demo.jextn.com/index.php/en/#main" class="u2">Skip to content</a></li>
									<li><a href="http://www.joomla-question-and-answers-demo.jextn.com/index.php/en/#nav" class="u2">Jump to main navigation and login</a></li>
								</ul>
								<h2 class="unseen">Nav view search</h2>
								<h3 class="unseen">Navigation</h3>

								<div id="line">											

									<div id="fontsize"></div>
									<h3 class="unseen">Search</h3>

									<div id="jetweetspro-demo-menu" class="jetweetspro-demo-menu-theme3">

										<ul class="menu">
											<li id="item-464" class="current active"><a href="./Questions_files/Questions.htm">Home</a></li><li id="item-494"><a href="http://www.joomla-question-and-answers-demo.jextn.com/index.php/en/my-questions">My Questions</a></li></ul>
									</div>
								</div> <!-- end line -->


							</div><!-- end header -->
							<div id="contentarea">
								<div id="breadcrumbs">



								</div>


								<div id="wrapper2">

									<div id="main">



										<div id="je-questions">
											<div style="height:40px;">
												<ul style="margin:0px; padding:0px;">
													<li>
														<div class="check1">
															<div class="check2">
																<div class="check3">
																	<a href="http://www.joomla-question-and-answers-demo.jextn.com/index.php/en/component/jequestions/?view=questions">
																		<div class="jeques-questions">
																			<div class="image4">
																				Questions
																			</div>
																		</div>
																	</a>
																</div>
															</div>
														</div>
													</li>
													<li>
														<div class="image1">
															<div class="image2">
																<div class="image3">
																	<a href="http://www.joomla-question-and-answers-demo.jextn.com/index.php/en/component/jequestions/?view=tags">
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
														<div class="image1">
															<div class="image2">
																<div class="image3">
																	<a href="http://www.joomla-question-and-answers-demo.jextn.com/index.php/en/component/jequestions/?view=categories">
																		<div class="jeques-categories">
																			<div class="image4">
																				Category								
																			</div>
																		</div>
																	</a>
																</div>
															</div>
														</div>
													</li>
													<li>
														<div class="image1">
															<div class="image2">
																<div class="image3">
																	<a href="http://www.joomla-question-and-answers-demo.jextn.com/index.php/en/component/jequestions/?view=form">
																		<div class="jeques-addques">
																			<div class="image4">
																				Add Questions								
																			</div>
																		</div>
																	</a>
																</div>
															</div>
														</div>
													</li>
													<li>
													</li>
												</ul>
											</div>


											<form name="pagination" action="" method="post">
												<div id="wrapper1">
													<ol type="1">
														<div class="tabb">
															<ul>
																<li>
																	<a href="http://www.joomla-question-and-answers-demo.jextn.com/index.php/en/component/jequestions/?view=questions&condition=latest">
																		Latest Questions					</a>
																</li>
																<li>
																	<a href="http://www.joomla-question-and-answers-demo.jextn.com/index.php/en/component/jequestions/?view=questions&condition=votes">
																		Popular					</a>
																</li>
																<li>
																	<a href="http://www.joomla-question-and-answers-demo.jextn.com/index.php/en/component/jequestions/?view=questions&condition=unans">
																		Open					</a>
																</li>
															</ul>

															<input type="text" name="ques-srch" id="ques-search">
																<button id="que_srch"></button>
																<input type="hidden" name="task" value=""><br><br>

																			</div>

																			<div id="def_quessrch" style="display:block;"> 			<li>
																					<a style="text-decoration:none;" href="http://www.joomla-question-and-answers-demo.jextn.com/index.php/en/component/jequestions/?task=question.check&id=1">
																						<div class="ques-align">
																							What is the difference between SMTP and PHP mail functions ?					</div>
																					</a>
																					<div id="je-posted">
																						<ul>
																							<li class="ikon1">
																								<span title="Posted by" class="hasTip">
																									<span id="je-author">
																										<span class="je-padalign">
																											admin										</span>
																									</span>
																								</span>
																							</li>

																							<li class="ikon2">
																								<span title="Posted Date" class="hasTip">
																									<span id="je-date">
																										<span class="je-padalign">
																											12-Oct-2011										</span>
																									</span>
																								</span>
																							</li>

																							<li class="ikon3">
																								<span title="Category" class="hasTip">
																									<span id="je-cate">
																										<span class="je-padalign1">
																											Inform-Tech										</span>
																									</span>
																								</span>
																							</li>

																							<li class="ikon-exp">
																								<span title="Expires at" class="hasTip">
																									<span id="je-cate">
																										<span class="je-padalign1">
																											Expired										</span>
																									</span>
																								</span>
																							</li>

																							<li class="ikon-fav">
																							</li>

																						</ul>
																					</div>	<div id="totans">
																						<div class="lansw-top-ques">
																							<img style="margin-top: 17px;" src="./Questions_files/ansarrow.png">
																						</div>
																						<a style="text-decoration:none;" href="http://www.joomla-question-and-answers-demo.jextn.com/index.php/en/component/jequestions/?task=question.check&id=1">
																							<div class="lansw-topright">
																								<div class="ranswer-right">
																									<div class="ranswer-left">
																										<div class="ranswer-mid">
																											Answers(1)
																										</div>
																									</div>
																								</div>
																							</div></a>
																					</div>

																					<div id="lansw-questions">
																						123
																						<br>									<div id="lansw-bottom">
																								<div class="ans-left">
																									<ul style="padding:0px; margin:0px;">
																										<span id="je-aadmin">
																											<li class="auth-inn">
																												demo													</li>
																										</span>
																										<span id="je-adate">
																											<li class="date-inn">
																												2013-01-21 10:40:45													</li>
																										</span>
																									</ul>
																								</div>

																								<div class="ans-right">Review Status:											<span id="je-bad18">
																										<span class="editlinktip hasTip" title="Review : :: Bad">
																											<img src="./Questions_files/badicon.png">

																												<span id="rev-bad18">

																													0													</span>
																										</span>
																									</span>
																									<span id="je-good18">
																										<span class="editlinktip hasTip" title="Review : :: Good">
																											<img src="./Questions_files/goodicon.png">

																												<span id="rev-good18">

																													0													</span>
																										</span>
																									</span>
																									<span id="je-excellent18">
																										<span class="editlinktip hasTip" title="Review : :: Excellent">
																											<img src="./Questions_files/excellenticon.png">

																												<span id="rev-excellent18">
																													0													</span>
																										</span>
																									</span>
																								</div>
																							</div>
																							<span style="display:none; text-align:right;" id="al-bad18"></span>
																					</div>
																				</li>

																				<br>
																			</div></ol>
																			</div></form>

																			<input type="hidden" name="site_path" id="site_path" value="http://www.joomla-question-and-answers-demo.jextn.com/">
																				<!-- Area for pagination -->
																				<div id="jefaqpro-paginationarea" style="text-align : center;">
																					<!-- Limit Box Drop down -->
																					<div class="je-limitbox">
																						<label for="limit">
																							Display #		</label>
																						<select id="limit" name="limit" class="inputbox" size="1" onchange="this.form.submit()">
																							<option value="5">5</option>
																							<option value="10">10</option>
																							<option value="15">15</option>
																							<option value="20" selected="selected">20</option>
																							<option value="25">25</option>
																							<option value="30">30</option>
																							<option value="50">50</option>
																							<option value="100">100</option>
																							<option value="0">All</option>
																						</select>
																					</div>

																				</div>	



																				</div>
																				<div class="foot-jeque">
																					<div id="foot-jetxt">
																						<p class="copyright" style="text-align : right; font-size : 10px;">
																							jequestions&nbsp;1.0.1&nbsp;-&nbsp;<a href="http://www.jextn.com/" title="Joomla Extension" target="_blank">
																								Joomla Extension</a>			</p>
																					</div>
																				</div>


																				</div><!-- end main -->

																				</div><!-- end wrapper -->



																				<div class="left leftbigger" id="nav">

																					<div class="moduletable">
																						<h3><span class="backh"><span class="backh2"><span class="backh3">Login Form</span></span></span></h3>
																						<form action="./Questions_files/Questions.htm" method="post" id="login-form">
																							<fieldset class="userdata">
																								<p>
																									<strong>Username :</strong> demo&nbsp;&nbsp;<br><strong>Password :</strong> demo123	</p>
																								<p id="form-login-username">
																									<label for="modlgn-username">User Name</label>
																									<input id="modlgn-username" type="text" value="demo" name="username" class="inputbox" size="18">
																								</p>
																								<p id="form-login-password">
																									<label for="modlgn-passwd">Password</label>
																									<input id="modlgn-passwd" type="password" value="demo123" name="password" class="inputbox" size="18">
																								</p>
																								<p id="form-login-remember">
																									<label for="modlgn-remember">Remember Me</label>
																									<input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes">
																								</p>
																								<input type="submit" name="Submit" class="button" value="Log in">
																									<input type="hidden" name="option" value="com_users">
																										<input type="hidden" name="task" value="user.login">
																											<input type="hidden" name="return" value="aW5kZXgucGhwP0l0ZW1pZD00NjQ=">
																												<input type="hidden" name="3246358fe1d813aaca1096ec20451cad" value="1">	</fieldset>
																													<!--<ul>
																														<li>
																															<a href="/index.php/en/using-joomla/extensions/components/users-component/password-reset">
																															Forgot your password?</a>
																														</li>
																														<li>
																															<a href="/index.php/en/using-joomla/extensions/components/users-component/username-reminder">
																															Forgot your username?</a>
																														</li>
																																<li>
																															<a href="/index.php/en/using-joomla/extensions/components/users-component/registration-form">
																																Create an account</a>
																														</li>
																															</ul> -->
																													</form>
																													</div>





																													</div><!-- end navi -->

																													<div class="wrap"></div>

																													</div> <!-- end contentarea -->

																													</div><!-- back -->

																													</div><!-- all -->

																													<div id="footer-outer">

																														<div id="footer-sub">


																															<div id="footer">

																																<div class="footer1">Copyright © 2013 Joomla Questions Demo. All Rights Reserved.</div>



																															</div>
																															<!-- end footer -->

																														</div>

																													</div>

																													</div>
																													</div>
																													<jdoc:include type="modules" name="debug" />
																													</body>
																													</html>
