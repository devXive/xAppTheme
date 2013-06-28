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
		$show_menu_text = $menu_params->get('menu_text');
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
$templateHelper->addNewCssHead('file', 'skin5.css', 'xapptheme');
$templateHelper->addNewCssHead('file', 'chosen.css', 'xapptheme');
$templateHelper->addNewCssHead('file', '/devxive/jquery.gritter.bootstrap.css', 'xapptheme');
$templateHelper->addNewCssHead('file', '/devxive/alertify.bootstrap.css', 'xapptheme');
$templateHelper->addNewCssHead('file', 'custom.css', 'xapptheme');

// Added template specific scripts
$templateHelper->addNewJsBodyBottom('file', 'uncompressed/ace-elements.js', 'xapptheme', '1000');
$templateHelper->addNewJsBodyBottom('file', 'uncompressed/ace.js', 'xapptheme', '1001');
$templateHelper->addNewJsBodyBottom('file', 'devxive/template.js', 'xapptheme', '5000');
$templateHelper->addNewJsBodyBottom('file', 'devxive/alertify.js', 'xapptheme', '5000');

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
$templateHelper->addNewJsBodyBottom('file', '/devxive/jquery-ui-effects.js', 'xapptheme', '1009');

$componentCustomScript = '
//	jQuery(function() {
//		var oTable1 = $(\'#table_report\').dataTable( {
//			"aoColumns": [
//				{ "bSortable": false },
//				null, null, null, null, null, null,
//				{ "bSortable": false }
//			]
//		});
//
//		$(\'table th input:checkbox\').on(\'click\' , function(){
//			var that = this;
//			$(this).closest(\'table\').find(\'tr > td:first-child input:checkbox\')
//				.each(function(){
//					this.checked = that.checked;
//					$(this).closest(\'tr\').toggleClass(\'selected\');
//				});
//		
//		});
//	});

	jQuery(document).ready(function() {
		$("#contact_table_results").dataTable( {
			"bProcessing": true,
			"bPaginate": false,
			"aoColumnDefs": [
				{ "bSortable": false, "aTargets": [0] },
				{ "bSortable": false, "aTargets": [7] },
				{ "bSearchable": false, "aTargets": [0] },
				{ "bSearchable": false, "aTargets": [6] },
				{ "bSearchable": false, "aTargets": [7] }
			]
		});
	});

//	jQuery(document).ready(function() {
//		$("#table_test").dataTable( {
//			"bProcessing": true,
//			"bServerSide": true,
//			"bStateSave": true, // save the state of the table (i.e. you are on page 15, the icookieduration save this for 15 minutes)
//			"iCookieDuration": 60*15, // Used to save the state for 15 minutes (default 2 hours)
//			"sAjaxSource": "index.php?option=com_xiveirm&task=api.getlist&' . JFactory::getSession()->get('session.token') . '=1",
//			"aoColumns": [
//				{ "sTitle": "ID", "mData": "id" },
//				{ "sTitle": "Last Name", "mData": "last_name" },
//				{ "sTitle": "First Name", "mData": "first_name" },
//				{ "sTitle": "Gender", "mData": "gender" },
//				{ "sTitle": "Phone", "mData": "phone" },
//				{ "sTitle": "Remarks", "mData": "remarks" }
//			]
//		});
//	});

	jQuery(\'[data-rel=tooltip]\').tooltip();

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

	// Fix Dropdown input problem
	jQuery(function() {
		$(".dropdown-menu input, .dropdown-menu label").click(function(e) {
			e.stopPropagation();
		});
	});
';

$templateHelper->addNewJsBodyBottom('custom', $componentCustomScript, 'xapptheme', '2000');



?>