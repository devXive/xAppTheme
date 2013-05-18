<?php
/**
 * @package     XAP.Site
 * @subpackage  Templates.xAppTheme
 *
 * @copyright   Copyright (C) 1997 - 2013 devXive - research and development. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Getting language and direction
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Detecting active variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

// Getting params from template
$params = $app->getTemplate(true)->params;

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Declare Stylesheets
$css_bootstrap 		= 'templates/'.$this->template.'/assets/css/bootstrap.css';
$css_bootstrap_responsive 	= 'templates/'.$this->template.'/assets/css/bootstrap-responsive.css';
$css_font_awesome		= 'templates/'.$this->template.'/assets/css/font-awesome.css';
$css_ace 			= 'templates/'.$this->template.'/assets/css/ace.css';
$css_ace_responsive 		= 'templates/'.$this->template.'/assets/css/ace-responsive.css';
$css_ace_skins 		= 'templates/'.$this->template.'/assets/css/ace-skins.css';

// Added Stylesheets
$doc->addStyleSheet($css_bootstrap);
$doc->addStyleSheet($css_bootstrap_responsive);
$doc->addStyleSheet($css_font_awesome);
$doc->addStyleSheet($css_ace);
$doc->addStyleSheet($css_ace_responsive);
$doc->addStyleSheet($css_ace_skins);

if (isset($this->error))
{
	$stylesheets = '
		<link rel="stylesheet" href="' . $this->baseurl . $css_bootstrap . '" type="text/css" />
		<link rel="stylesheet" href="' . $this->baseurl . $css_bootstrap_responsive . '" type="text/css" />
		<link rel="stylesheet" href="' . $this->baseurl . $css_font_awesome . '" type="text/css" />
		<link rel="stylesheet" href="' . $this->baseurl . $css_ace . '" type="text/css" />
		<link rel="stylesheet" href="' . $this->baseurl . $css_ace_responsive . '" type="text/css" />
		<link rel="stylesheet" href="' . $this->baseurl . $css_ace_skins . '" type="text/css" />
	';
}

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Add current user information
$user = JFactory::getUser();

// Logo file or site title param
if ($params->get('logoFile'))
{
	$logo = '<img src="'. JURI::root() . $this->params->get('logoFile') .'" alt="'. $sitename .'" />';
}
elseif ($params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="'. $sitename .'">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
}
else
{
	$logo = '<span class="site-title" title="xAppTheme">xAppTheme by devXive</span>';
}

// Logo file or site title param
if ($app->getCfg('offline_image'))
{
	$offlinelogo = '<img src="' . $app->getCfg('offline_image') . '" alt="' . htmlspecialchars($app->getCfg('sitename')) . '" />';
}
elseif ($this->params->get('logoFile'))
{
	$offlinelogo = '<span class="site-title" title="'. $sitename .'">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
}
else
{
	$offlinelogo = '<h1><i class="icon-cloud green"></i> <span class="red">xAppTheme</span> <small class="white">by devXive</small></h1>';
}

// Adjusting content width
// if ($this->countModules('position-7') && $this->countModules('position-8'))
// {
// 	$span = "span6";
// }
// elseif ($this->countModules('position-7') && !$this->countModules('position-8'))
// {
// 	$span = "span9";
// }
// elseif (!$this->countModules('position-7') && $this->countModules('position-8'))
// {
// 	$span = "span9";
// }
// else
// {
// 	$span = "span12";
// }

/*
 *
 * CHECK IF WE REALLY NEED THIS !!!
 *
 */
// Setting Width
if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}
?>