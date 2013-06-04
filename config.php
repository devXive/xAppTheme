<?php
/**
 * @package     XAP.Site
 * @subpackage  Templates.xAppTheme
 *
 * @copyright   Copyright (C) 1997 - 2013 devXive - research and development. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Load the major core variables
 */
$app = JFactory::getApplication();
	// Getting template param
	$params = $app->getTemplate(true)->params;
	// Getting menu/site params
	$siteparams = $app->getParams();

	// Detecting active variables
	$option   = $app->input->getCmd('option', '');
	$view     = $app->input->getCmd('view', '');
	$layout   = $app->input->getCmd('layout', '');
	$task     = $app->input->getCmd('task', '');
	$itemid   = $app->input->getCmd('Itemid', '');
	$sitename = $app->getCfg('sitename');

	// Getting menu info
	$menu = $app->getMenu();
	if(isset($menu->getActive()->id)) {
		$menu_id = $menu->getActive()->id;
		$page_title = $menu->getActive()->title;
		$menu_params = $menu->getParams($menu_id);
		$show_page_heading = $menu_params->get('show_page_heading');
		$page_heading = $menu_params->get('page_heading');
		$menu_anchor_icon = $menu_params->get('menu-anchor_css');
	} else if($app->input->getCmd('Itemid', '')) {
		$menu_id = $app->input->getCmd('Itemid', '');
	} else {
	}

$doc = JFactory::getDocument(); 
	// Getting language and direction
	$this->language = $doc->language;
	$this->direction = $doc->direction;

/**
 * Load the minor core variables
 */
$user = JFactory::getUser();


/**
 * Load framework dependencies
 */
nawala_import('helper.ntemplatehelper', 'once');
$templateHelper = new NTemplateHelper();

// Load framework without jQuery.noConflict();
$templateHelper->loadFramework('nawala', false);

// $templateHelper->addNewJsHead();

// load only as fallback if jquery can't be load from a CDN!!
// $templateHelper->addNewJsBodyBottom('custom', 'window.jQuery || document.write("<script src="assets/js/jquery.min.js">\x3C/script>")', 'xapptheme', '4');

$templateHelper->addNewCssHead('file', 'bootstrap.min.css', 'framework');
$templateHelper->addNewCssHead('file', 'bootstrap-responsive.min.css', 'framework');
$templateHelper->addNewCssHead('file', 'font-awesome.css', 'framework');
$templateHelper->addNewCssHead('file', 'nfw-icon-animation.css', 'framework');

/**
 * Load and perform template based settings
 */
// remove unused scripts, styles and tags
// $templateHelper->removeScript('mootools-core.js,caption.js');
// $templateHelper->removeStyle('');
$templateHelper->removeGenerator();
$templateHelper->forceIeChromeFrame();

// Added template specific styles
$templateHelper->addNewCssHead('file', 'ace.css', 'xapptheme');
$templateHelper->addNewCssHead('file', 'ace-responsive.css', 'xapptheme');
$templateHelper->addNewCssHead('file', 'ace-skins.css', 'xapptheme');
$templateHelper->addNewCssHead('file', 'chosen.css', 'xapptheme');
$templateHelper->addNewCssHead('file', 'jquery.gritter.css', 'xapptheme');
$templateHelper->addNewCssHead('file', 'custom.css', 'xapptheme');

// Added template specific scripts
$templateHelper->addNewJsBodyBottom('file', 'uncompressed/ace-elements.js', 'xapptheme', '1000');
$templateHelper->addNewJsBodyBottom('file', 'uncompressed/ace.js', 'xapptheme', '1001');

// Getting page class suffix and template path
// $pageclass = $params->get('pageclass_sfx');
// $tpath = $this->baseurl.'/templates/'.$this->template;

// Logo file or site title param
if ($params->get('logoFile'))
{
	$logo = '<img src="'. JURI::root() . $params->get('logoFile') .'" alt="'. $sitename .'" />';
}
elseif ($params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="'. $sitename .'">'. htmlspecialchars($params->get('sitetitle')) .'</span>';
}
else
{
	$logo = '<span class="site-title" title="xAppTheme">xAppTheme by devXive</span>';
}







/**
 * used in /components/com_xiveirm/views/irmmasterdatas/tmpl/default.php
 */
$templateHelper->addNewJsBodyBottom('file', 'jquery.dataTables.min.js', 'xapptheme', '1002');
$templateHelper->addNewJsBodyBottom('file', 'jquery.dataTables.bootstrap.js', 'xapptheme', '1003');
$templateHelper->addNewJsBodyBottom('file', 'chosen.jquery.min.js', 'xapptheme', '1004');
$templateHelper->addNewJsBodyBottom('file', 'jquery.autosize-min.js', 'xapptheme', '1005');
$templateHelper->addNewJsBodyBottom('file', 'jquery.inputlimiter.1.3.1.min.js', 'xapptheme', '1006');
$templateHelper->addNewJsBodyBottom('file', '/devxive/jquery.gritter.bootstrap.js', 'xapptheme', '1007');
$templateHelper->addNewJsBodyBottom('file', 'jquery.timeago.js', 'xapptheme', '1008');

$componentCustomScript = '
	jQuery(function() {
		var oTable1 = $(\'#table_report\').dataTable( {
			"aoColumns": [
				{ "bSortable": false },
				null, null, null, null, null, null,
				{ "bSortable": false }
			]
		});

		$(\'table th input:checkbox\').on(\'click\' , function(){
			var that = this;
			$(this).closest(\'table\').find(\'tr > td:first-child input:checkbox\')
			.each(function(){
			this.checked = that.checked;
			$(this).closest(\'tr\').toggleClass(\'selected\');
		});
		
	});

	jQuery(\'[data-rel=tooltip]\').tooltip();
	})

	jQuery(".chzn-select").chosen();
	jQuery(".chzn-select-deselect").chosen({allow_single_deselect:true});

	jQuery(".ace-tooltip").tooltip();

	jQuery(".ace-popover").popover();
			
	jQuery("textarea[class*=autosize]").autosize({append: "\n"});
	jQuery("textarea[class*=limited]").each(function() {
		var limit = parseInt($(this).attr("data-maxlength")) || 100;
		$(this).inputlimiter({
			"limit": limit,
			remText: "%n character%s remaining...",
			limitText: "max allowed : %n."
		});
	});

	jQuery("#loading-btn").on("click", function () {
		$("#loading-btn").addClass("btn-warning");
		var btn = $(this);
		btn.button("loading")
		setTimeout(function () {
			$("#loading-btn").removeClass("btn-warning"),
			btn.button("reset")
		}, 5000)
	});

	// TimeAgoScript
	jQuery("abbr.timeago").timeago();
';

$templateHelper->addNewJsBodyBottom('custom', $componentCustomScript, 'xapptheme', '2000');



?>