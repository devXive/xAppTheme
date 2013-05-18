<?php
/**
 * @package     XAP.Site
 * @subpackage  Templates.xAppTheme
 *
 * @copyright   Copyright (C) 1997 - 2013 devXive - research and development. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet('templates/'.$this->template.'/assets/css/bootstrap.min.css');
$doc->addStyleSheet('templates/'.$this->template.'/assets/css/bootstrap-responsive.min.css');
$doc->addStyleSheet('templates/'.$this->template.'/assets/css/font-awesome.min.css');
$doc->addStyleSheet('templates/'.$this->template.'/assets/css/ace.min.css');
$doc->addStyleSheet('templates/'.$this->template.'/assets/css/ace-responsive.min.css');
$doc->addStyleSheet('templates/'.$this->template.'/assets/css/ace-skins.min.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Add current user information
$user = JFactory::getUser();

// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span6";
}
elseif ($this->countModules('position-7') && !$this->countModules('position-8'))
{
	$span = "span9";
}
elseif (!$this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span9";
}
else
{
	$span = "span12";
}

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="'. JURI::root() . $this->params->get('logoFile') .'" alt="'. $sitename .'" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="'. $sitename .'">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
}
else
{
	$logo = '<span class="site-title" title="xAppTheme">xAppTheme by devXive</span>';
}
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





<div id="content" class="<?php echo $span;?>">
	<!-- Begin Content -->
	<jdoc:include type="modules" name="position-3" style="xhtml" />
	<jdoc:include type="message" />
	<jdoc:include type="component" />
	<jdoc:include type="modules" name="position-2" style="none" />
	<!-- End Content -->
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
