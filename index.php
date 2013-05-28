<?php
/**
 * @package     XAP.Site
 * @subpackage  Templates.xAppTheme
 *
 * @copyright   Copyright (C) 1997 - 2013 devXive - research and development. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
require_once(__DIR__ . '/config.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	<?php
	// Use of Google Font
	if ($this->params->get('googleFont'))
	{
	?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName');?>' rel='stylesheet' type='text/css' />
		<style type="text/css">
			h1,h2,h3,h4,h5,h6,.site-title{
				font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName'));?>', sans-serif;
			}
		</style>
	<?php
	}
	?>
	<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	<!--[if IE 7]>
		<link rel="stylesheet" href="<?php echo $this->baseurl . '/templates/' . $this->template; ?>/assets/css/font-awesome-ie7.min.css" />
	<![endif]-->
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo $this->baseurl . '/templates/' . $this->template; ?>/assets/css/ace-ie.min.css" />
		<script src="<?php echo $this->baseurl; ?>/media/jui/js/html5.js"></script>
	<![endif]-->
</head>

<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fixedLayout') ? ' navbar-fixed' : '');
?>">
		<div class="navbar navbar-inverse <?php echo ($params->get('fixedLayout') ? ' navbar-fixed-top' : ''); ?>">
		  <div class="navbar-inner">
		   <div class="container-fluid">

			  <a class="brand" href="<?php echo $this->baseurl; ?>"><small><i class="icon-cloud"></i> <?php echo $logo; ?></small> </a>
			  <ul class="nav ace-nav pull-right">
					<li class="grey">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-tasks icon-animated-wrench icon-only"></i>
							<span class="badge">4</span>
						</a>
						<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
							<li class="nav-header">
								<i class="icon-ok"></i> 4 Aufgaben zu erledigen
							</li>
							
							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">Keine Geburtsdaten</span>
										<span class="pull-right">65%</span>
									</div>
									<div class="progress progress-mini"><div class="bar" style="width:65%"></div></div>
								</a>
							</li>
							
							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">Adressen unvollst&auml;ndig</span>
										<span class="pull-right">35%</span>
									</div>
									<div class="progress progress-mini progress-danger"><div class="bar" style="width:35%"></div></div>
								</a>
							</li>
							
							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">Abrechnungsrelevanz</span>
										<span class="pull-right">15%</span>
									</div>
									<div class="progress progress-mini progress-warning"><div class="bar" style="width:15%"></div></div>
								</a>
							</li>
							
							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">Vorplanung</span>
										<span class="pull-right">90%</span>
									</div>
									<div class="progress progress-mini progress-success progress-striped active"><div class="bar" style="width:90%"></div></div>
								</a>
							</li>
							
							<li>
								<a href="#">
									Aufgabendetails anzeigen
									<i class="icon-arrow-right"></i>
								</a>
							</li>
						</ul>
					</li>


					<li class="purple">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-bell-alt icon-animated-bell icon-only"></i>
							<span class="badge badge-important">8</span>
						</a>
						<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
							<li class="nav-header">
								<i class="icon-warning-sign"></i> 8 Meldungen
							</li>
							
							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left"><i class="icon-comment btn btn-mini btn-pink"></i> Neue Kommentare</span>
										<span class="pull-right badge badge-info">+12</span>
									</div>
								</a>
							</li>
							
							<li>
								<a href="#">
									<i class="icon-user btn btn-mini btn-primary"></i> Thomas hat sich angemeldet ...
								</a>
							</li>
							
							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left"><i class="icon-shopping-cart btn btn-mini btn-success"></i> Neue Fahrauftr&auml;ge</span>
										<span class="pull-right badge badge-success">+8</span>
									</div>
								</a>
							</li>
							
							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left"><i class="icon-twitter btn btn-mini btn-info"></i> Fahrzeugupdates</span>
										<span class="pull-right badge badge-info">+4</span>
									</div>
								</a>
							</li>
																
							<li>
								<a href="#">
									Alle Mitteilungen anzeigen
									<i class="icon-arrow-right"></i>
								</a>
							</li>
						</ul>
					</li>


					<li class="green">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-envelope-alt icon-animated-vertical icon-only"></i>
							<span class="badge badge-success">5</span>
						</a>
						<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
							<li class="nav-header">
								<i class="icon-envelope"></i> 5 neue Nachrichten
							</li>
							
							<li>
								<a href="#">
									<img alt="Alex's Avatar" class="msg-photo" src="<?php echo $this->baseurl . '/templates/' . $this->template; ?>/assets/avatars/avatar.png" />
									<span class="msg-body">
										<span class="msg-title">
											<span class="blue">94/11:</span>
											Hi, Ich bin frei in Naumburg ...
										</span>
										<span class="msg-time">
											<i class="icon-time"></i> <span>vor einer Minute</span>
										</span>
									</span>
								</a>
							</li>
							
							<li>
								<a href="#">
									<img alt="Susan's Avatar" class="msg-photo" src="<?php echo $this->baseurl . '/templates/' . $this->template; ?>/assets/avatars/avatar3.png" />
									<span class="msg-body">
										<span class="msg-title">
											<span class="blue">DRK HU:</span>
											Morgen, k&ouml;nntet Ihr uns einen Patien ...
										</span>
										<span class="msg-time">
											<i class="icon-time"></i> <span>vor 20 Minuten</span>
										</span>
									</span>
								</a>
							</li>
							
							<li>
								<a href="#">
									<img alt="Bob's Avatar" class="msg-photo" src="<?php echo $this->baseurl . '/templates/' . $this->template; ?>/assets/avatars/avatar4.png" />
									<span class="msg-body">
										<span class="msg-title">
											<span class="blue">Uwe Walz:</span>
											Bitte an das Teammeeting nachher denken. Steht im Kal ...
										</span>
										<span class="msg-time">
											<i class="icon-time"></i> <span>15:12 Uhr</span>
										</span>
									</span>
								</a>
							</li>
							
							<li>
								<a href="#">
									Alle Nachrichten anzeigen
									<i class="icon-arrow-right"></i>
								</a>
							</li>									
	
						</ul>
					</li>


					<li class="user-profile">
						<jdoc:include type="modules" name="login" /><!--.login-->
					</li>




			  </ul><!--/.ace-nav-->

		   </div><!--/.container-fluid-->
		  </div><!--/.navbar-inner-->
		</div><!--/.navbar-->

		<div class="container-fluid" id="main-container">

			<a href="#" id="menu-toggler"><span></span></a><!-- menu toggler -->

			<div id="sidebar" class="<?php echo ($params->get('fixedLayout') ? ' fixed' : ''); ?>">
				
				<jdoc:include type="modules" name="sidebar-shortcuts" />
				<!-- #sidebar-shortcuts -->

<!-- #XAP START MODULE -->
				<jdoc:include type="modules" name="sidebar" />
<!-- #XAP END MODULE -->

				<div id="sidebar-collapse"><i class="icon-double-angle-left"></i></div>

			</div><!--/#sidebar-->

			<div id="main-content" class="clearfix">
					
					<div id="breadcrumbs">
						<jdoc:include type="modules" name="breadcrumbs" /><!--.breadcrumb-->

						<div id="nav-search">
							<form class="form-search">
									<span class="input-icon">
										<input autocomplete="off" id="nav-search-input" type="text" class="input-small search-query" placeholder="Suche ..." />
										<i id="nav-search-icon" class="icon-search"></i>
									</span>
							</form>
						</div><!--#nav-search-->
					</div><!--#breadcrumbs-->

					<div id="page-content" class="clearfix">


						<?php if($show_page_heading == 1) { ?>
							<div class="page-header position-relative">
								<h1><?php if($menu_anchor_icon): echo '<i class="' . $menu_anchor_icon . '"></i> '; endif; ?><?php echo $page_title; ?> <small><i class="icon-double-angle-right"></i> <?php echo $page_heading; ?></small></h1>
							</div><!--/page-header-->
						<?php } ?>



						<div id="content" class="row-fluid">
<!-- PAGE CONTENT BEGINS HERE -->

	<jdoc:include type="modules" name="main-top" style="xhtml" />
	<jdoc:include type="message" />
	<jdoc:include type="component" />
	<jdoc:include type="modules" name="main-bottom" style="none" />


<!-- PAGE CONTENT ENDS HERE -->
						 </div><!--/row-->
	
					</div><!--/#page-content-->
					  

<!--
					<div id="ace-settings-container">
						<div class="btn btn-app btn-mini btn-warning" id="ace-settings-btn">
							<i class="icon-cog"></i>
						</div>
						<div id="ace-settings-box">
							<div>
								<div class="pull-left">
									<select id="skin-colorpicker" class="hidden">
										<option data-class="default" value="#438EB9">#438EB9</option>
										<option data-class="skin-1" value="#222A2D">#222A2D</option>
										<option data-class="skin-2" value="#C6487E">#C6487E</option>
										<option data-class="skin-3" value="#D0D0D0">#D0D0D0</option>
									</select>
								</div>
								<span>&nbsp; Choose Skin</span>
							</div>
							<div><input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" /><label class="lbl" for="ace-settings-header"> Fixed Header</label></div>
							<div><input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" /><label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label></div>
						</div>
					</div><!--/#ace-settings-container-->

			</div><!-- #main-content -->

		</div><!--/.fluid-container#main-container-->

		<a href="#" id="btn-scroll-up" class="btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only"></i>
		</a>

<!-- Navigation -->
	<jdoc:include type="modules" name="position-1" style="none" />

<!-- Banner -->
	<jdoc:include type="modules" name="banner" style="xhtml" />

<!-- Nav Sidebar left-->
	<jdoc:include type="modules" name="position-7" style="well" />

	<!-- Footer -->
	<div class="footer">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">
			<hr />
			<jdoc:include type="modules" name="footer" style="none" />
		</div>
		<div class="container-fluid" style="text-align: right;">&copy; <?php echo $sitename; ?> <?php echo date('Y');?></div>
		<jdoc:include type="modules" name="debug" style="none" />
	</div>

	<?php $templateHelper->loadJsBodyBottom(); ?>
</body>
</html>
