<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package   fry_accessible_tabs
 * @author    Yves Fridelance <yves.fridelance@me.com>;
 * @license   GNU/LGPL
 * @copyright Y. Fridelance 2014
 */


/**
 * Fields start
 */
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabhead'][0]                   	= 'Header Tag';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabhead'][1]                   	= 'Tag of the Elements to Transform the Tabs-Navigation from (originals are removed).';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_position'][0]                  	= 'Positioning';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_position'][1]                  	= 'Can be \'top\' or \'bottom\'. Defines where the tabs list is inserted.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_syncheights'][0]               	= 'Sync heights';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_syncheights'][1]               	= 'syncs the heights of the tab contents when the SyncHeight plugin is available http://blog.ginader.de/dev/jquery/syncheight/index.php.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_save_state'][0]                	= 'Save state';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_save_state'][1]                	= 'Save the selected tab into a cookie so it stays selected after a reload. This requires that the wrapping div needs to have an ID (so we know which tab we\'re saving).';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_auto_anchor'][0]               	= 'Linkable';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_auto_anchor'][1]               	= 'will move over any existing id of a headline in tabs markup so it can be linked to it.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_pagination'][0]                	= 'Pagination';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_pagination'][1]                	= 'Adds buttons to each tab to switch to the next/previous tab.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_css_class_available'][0]       	= 'Enable individual css classes';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_css_class_available'][1]       	= 'Enable individual css classes for tabs. Gets the appropriate class name of a tabhead element and apply it to the tab list element. Boolean value.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_responsive'][0]       			= 'Is Responsive';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_responsive'][1]       			= 'Transform the Tabs in a Mobilefreinly Menu.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_fx'][0]                        	= 'Animation';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_fx'][1]                        	= 'can be "fadeIn", "slideDown", "show".';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_fxspeed'][0]                   	= 'Animation duration';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_fxspeed'][1]                   	= 'speed (String|Number): "slow", "normal", or "fast") or the number of milliseconds to run the animation.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_wrapper_class'][0]             	= 'Wrapper class';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_wrapper_class'][1]             	= 'Classname to apply to the div that is wrapped around the original Markup.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_current_class'][0]             	= 'Current class';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_current_class'][1]             	= 'Classname to apply to the LI of the selected Tab.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_current_info_position'][0]       = 'Info position';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_current_info_position'][1]       = 'Define the Position from the info message.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabhead_class'][0]             	= 'Tabhead class';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabhead_class'][1]             	= 'Classname to apply to the target heading element for each tab div.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabbody'][0]                   	= 'Tabbody';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabbody'][1]                   	= 'Tag or valid Query Selector of the Elements to be treated as the Tab Body.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabs_list_class'][0]           	= 'List class';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabs_list_class'][1]           	= 'Class to apply to the generated list of tabs above the content.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_first_nav_item_class'][0]      	= 'Class from the first item';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_first_nav_item_class'][1]      	= 'Defineiert die Klasse des ersten Tabs.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_last_nav_item_class'][0]       	= 'Class from the last item';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_last_nav_item_class'][1]       	= 'Classname of the first list item in the tab navigation.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_clearfix_class'][0]            	= 'Clearfix Klasse';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_clearfix_class'][1]            	= 'Classname of the last list item in the tab navigation.';

$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_css_class_available'][0]       	= 'Jedem Tab eine Klasse zuweisen';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_css_class_available'][1]       	= 'Weist jedem einzelnen Tab eine CSS Klasse zu.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_wrap_inner_nav_links'][0]      	= 'Wrap Inner Nav Links';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_wrap_inner_nav_links'][1]      	= 'Siehe JQuery Dokumentation.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_sync_height_method_name'][0]   	= 'Syncheight Methode';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_sync_height_method_name'][1]   	= 'Definiert die SyncHeight Methode.';
/**
 * Fields separator
 */
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_wrap_inner_nav_links'][0]      	= 'Wrap Inner Nav Links';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_wrap_inner_nav_links'][1]      	= 'inner wrap for a-tags in tab navigation. See http://api.jquery.com/wrapInner/ for further informations.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_sync_height_method_name'][0]   	= 'Syncheight Methode';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_sync_height_method_name'][1]   	= 'set the Method name of the plugin you want to use to sync the tab contents. Defaults to the SyncHeight plugin: http://github.com/ginader/syncHeight.';


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_start_legend']                 			= 'Heading';
$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_base_legend']                  			= 'Basic adjustments';
$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_fx_legend']                    			= 'Transotions';
$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_selectors_legend']             			= 'Selectors';
$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_misc_legend']                  			= 'Miscellanea';
$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_break_legend']                 			= 'Tab Titel and ID';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_current_info_text']               = 'Current tab:';