<?php
/**
 * @package     XAP.Site
 * @subpackage  Templates.xAppTheme
 *
 * @copyright   Copyright (C) 1997 - 2013 devXive - research and development. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
require_once(__DIR__ . '/loader.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<title><?php echo $this->title; ?> <?php echo $this->error->getMessage();?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->language; ?>" />
	<?php echo $stylesheets; ?>
	<?php
		$debug = JFactory::getConfig()->get('debug_lang');
		if ((defined('JDEBUG') && JDEBUG) || $debug)
		{
	?>
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/media/cms/css/debug.css" type="text/css" />
	<?php
		}
	?>
	<?php
	// Use of Google Font
	if ($params->get('googleFont'))
	{
	?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $params->get('googleFontName');?>' rel='stylesheet' type='text/css' />
		<style type="text/css">
			h1,h2,h3,h4,h5,h6,.site-title{
				font-family: '<?php echo str_replace('+', ' ', $params->get('googleFontName'));?>', sans-serif;
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
	. ($params->get('fluidContainer') ? ' fluid' : '');
?>">



		<div class="navbar navbar-inverse navbar-fixed-top">
		  <div class="navbar-inner">
		   <div class="container-fluid">

			  <a class="brand" href="<?php echo $this->baseurl; ?>"><small><i class="icon-cloud"></i> <?php echo $logo; ?></small> </a>
			  <ul class="nav ace-nav pull-right">
					<li class="grey">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-tasks"></i>
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


					<li class="light-blue user-profile">
						<a class="user-menu dropdown-toggle" href="#" data-toggle="dropdown">
							<img alt="Jason's Photo" src="<?php echo $this->baseurl . '/templates/' . $this->template; ?>/assets/avatars/user.jpg" class="nav-user-photo" />
							<span id="user_info">
								<small>Hallo,</small> Flo
							</span>
							<i class="icon-caret-down"></i>
						</a>
						<ul id="user_menu" class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
							<li><a href="#"><i class="icon-cog"></i> Einstellungen</a></li>
							<li><a href="#"><i class="icon-user"></i> Profil</a></li>
							<li class="divider"></li>
							<li><a href="#"><i class="icon-off"></i> Abmelden</a></li>
						</ul>
					</li>




			  </ul><!--/.ace-nav-->

		   </div><!--/.container-fluid-->
		  </div><!--/.navbar-inner-->
		</div><!--/.navbar-->

		<div class="container-fluid" id="main-container">
			<a href="#" id="menu-toggler"><span></span></a><!-- menu toggler -->

			<div id="sidebar" class="fixed">
				
				<div id="sidebar-shortcuts">
					<div id="sidebar-shortcuts-large">
						<button class="btn btn-small btn-success"><i class="icon-ticket" title="Tickets"></i></button>
						<button class="btn btn-small btn-info"><i class="icon-group" title="Patient"></i></button>
						<button class="btn btn-small btn-warning"><i class="icon-user-md" title="Medicine Addressbook"></i></button>
						<button class="btn btn-small btn-danger"><i class="icon-ambulance" title="Quicky"></i></button>
					</div>
					<div id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>
						<span class="btn btn-info"></span>
						<span class="btn btn-warning"></span>
						<span class="btn btn-danger"></span>
					</div>
				</div><!-- #sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li>
					  <a href="/">
						<i class="icon-dashboard"></i>
						<span>Dashboard</span>
					  </a>
					</li>

					<li>
					  <a href="#">
						<i class="icon-group"></i>
						<span>Patienten</span>
					  </a>
					</li>

					<li class="active open">
					  <a href="#" class="dropdown-toggle" >
						<i class="icon-desktop"></i>
						<span>Leitstelle</span>
						<b class="arrow icon-angle-down"></b>
					  </a>
					  <ul class="submenu">
						<li class="active"><a href="#"><i class="icon-double-angle-right"></i> Auftragsannahme</a></li>
						<li><a href="#"><i class="icon-double-angle-right"></i> Vermittlung</a></li>
						<li><a href="#"><i class="icon-double-angle-right"></i> Serien</a></li>
						<li><a href="#"><i class="icon-double-angle-right"></i> Despatcher</a></li>
					  </ul>
					</li>

					<li>
					  <a href="#" class="dropdown-toggle" >
						<i class="icon-edit"></i>
						<span>Verwaltung</span>
						<b class="arrow icon-angle-down"></b>
					  </a>
					  <ul class="submenu">
						<li><a href="#"><i class="icon-double-angle-right"></i> DB-Abgleich</a></li>
						<li><a href="#"><i class="icon-double-angle-right"></i> DB-Transfer</a></li>
						<li><a href="#"><i class="icon-double-angle-right"></i> Preis-Tabellen</a></li>
						<li><a href="#"><i class="icon-double-angle-right"></i> Rechnungen</a></li>
					  </ul>
					</li>

					<li>
					  <a href="#">
						<i class="icon-file"></i>
						<span>XOffice</span>
					  </a>
					</li>

					<li>
					  <a href="#">
						<i class="icon-calendar"></i>
						<span>Kalender</span>
					  </a>
					</li>

					<li>
					  <a href="#">
						<i class="icon-globe"></i>
						<span>Maps</span>
					  </a>
					</li>

					<li>
					  <a href="#">
						<i class="icon-envelope"></i>
						<span>MessageHub</span>
					  </a>
					</li>

					<li>
					  <a href="#" class="dropdown-toggle" >
						<i class="icon-cogs"></i>
						<span>Management</span>
						<b class="arrow icon-angle-down"></b>
					  </a>
					  <ul class="submenu">
						<li><a href="#"><i class="icon-double-angle-right"></i> Benutzerliste</a></li>
						<li><a href="#"><i class="icon-double-angle-right"></i> POI's</a></li>
						<li><a href="#"><i class="icon-double-angle-right"></i> Fahrzeuge</a></li>
						<li><a href="#"><i class="icon-double-angle-right"></i> Schnittstellen</a></li>
					  </ul>
					</li>
				</ul><!--/.nav-list-->

				<div id="sidebar-collapse"><i class="icon-double-angle-left"></i></div>

			</div><!--/#sidebar-->

		
			<div id="main-content" class="clearfix">
					
					<div id="breadcrumbs">
						<ul class="breadcrumb">
							<li><i class="icon-home"></i> <a href="#">Home</a><span class="divider"><i class="icon-angle-right"></i></span></li>
							<li><a href="#">Leitstelle</a> <span class="divider"><i class="icon-angle-right"></i></span></li>
							<li class="active">Auftragsannahme</li>
						</ul><!--.breadcrumb-->

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
						

						<div class="row-fluid">
<!-- PAGE CONTENT BEGINS HERE -->


<div class="error-container">
	<div class="well">
		<h1 class="grey lighter smaller">
			<span class="blue bigger-125"><i class="icon-sitemap"></i> <?php echo $this->error->getCode(); ?></span> <?php echo $this->error->getMessage();?>
		</h1>
		<hr />
		<h3 class="lighter smaller">We looked everywhere but we couldn't find it!</h3>

		<div>
			<h4 class="smaller"><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></h4>
			<ul class="unstyled spaced inline bigger-110">
				<li><i class="icon-hand-up orange"></i> <?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
				<li><i class="icon-hand-up orange"></i> <?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
				<li><i class="icon-hand-up red"></i> <?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
				<li><i class="icon-hand-up red"></i> <?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
			</ul>
		</div>
		
		<div class="space"></div>

		<div>
			<?php if (JModuleHelper::getModule('search')) : ?>
				<p><strong><?php echo JText::_('JERROR_LAYOUT_SEARCH'); ?></strong></p>
				<p><?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?></p>
				<?php
					$module = JModuleHelper::getModule('search');
					echo JModuleHelper::renderModule($module);
				?>
			<?php endif; ?>
			
			<div class="space"></div>
			
			<h4 class="smaller">Try one of the following:</h4>
			<ul class="unstyled spaced inline bigger-110">
				<li><i class="icon-hand-right blue"></i> Re-check the url for typos</li>
				<li><i class="icon-hand-right blue"></i> Read the faq</li>
				<li><i class="icon-hand-right blue"></i> Tell us about it</li>
			</ul>
		</div>
		
		<hr />
		<div class="space"></div>
		
		<div class="row-fluid">
			<div class="center">
				<a href="#" onclick="top.history.back();" class="btn btn-grey"><i class="icon-arrow-left"></i> Go Back</a>
				<a href="<?php echo $this->baseurl; ?>/index.php" class="btn btn-primary"><i class="icon-home"></i> <?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a>
			</div>
		</div>
	</div>
</div>


<!-- PAGE CONTENT ENDS HERE -->
						 </div><!--/row-->
	
					</div><!--/#page-content-->
					  

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

		<!-- basic scripts -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript">
		window.jQuery || document.write("<script src='assets/js/jquery-1.9.1.min.js'>\x3C/script>");
		</script>
		
		<script src="<?php echo $this->baseurl . '/templates/' . $this->template; ?>/assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		
		<!-- ace scripts -->
		<script src="<?php echo $this->baseurl . '/templates/' . $this->template; ?>/assets/js/ace-elements.min.js"></script>
		<script src="<?php echo $this->baseurl . '/templates/' . $this->template; ?>/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			$(function() {
				
				
				
			})
		</script>






<!-- Navigation -->
	<jdoc:include type="modules" name="position-1" style="none" />

<!-- Banner -->
	<jdoc:include type="modules" name="banner" style="xhtml" />

<!-- Nav Sidebar right -->
	<jdoc:include type="modules" name="position-8" style="xhtml" />

<!-- Nav Sidebar left-->
	<jdoc:include type="modules" name="position-7" style="well" />

	<!-- Footer -->
	<div class="footer">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">
			<hr />
			<jdoc:include type="modules" name="footer" style="none" />
		</div>
		<div class="container right">&copy; <?php echo $sitename; ?> <?php echo date('Y');?></div>
		<jdoc:include type="modules" name="debug" style="none" />
	</div>
</body>
</html>