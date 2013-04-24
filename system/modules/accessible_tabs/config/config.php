<?php

/**
 * @package AccessibleTabs
 * Copyright (C) 2013 Yves Fridelance
 *
 * Extension for:
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Yves Fridelance 2013
 * @author     Yves Fridelance <yves@fridelance.ch>
 * @package    AccessibleTabs
 * @license    LGPL
 * @filesource
 */


/**
 * Include accessible tabs config file.
 */
if (file_exists(TL_ROOT . '/system/config/accessible_tabs.php')) {
    include(TL_ROOT . '/system/config/accessible_tabs.php');
}

/**
 * Back end modules
 */
$GLOBALS['BE_MOD']['system']['accessible_tabs'] = array
(
    'tables' => array('tl_accessible_tabs'),
    'icon'   => 'system/modules/accessible_tabs/assets/images/icon.png',
);

/**
 * Register Content Element
 */
$GLOBALS['TL_CTE']['texts']['accessible_tabs'] = 'AccessibleTabsContent';


/**
 * Accessible Tabs Defaults
 */

// Allowed tabhead tags
//$GLOBALS['TL_ACCESSIBLE_TABS_ALLOWED']['accessible_tabs_tabhead'] = array('h2','h3','h4','h5');

// Default Set JQUERY
$GLOBALS['TL_ACCESSIBLE_TABS_DEFAULTS']['jquery'] = array(

    'accessible_tabs_tabhead'                   => 'h4',
    'accessible_tabs_position'                  => top,
    'accessible_tabs_sync_heights'              => false,
    'accessible_tabs_save_state'                => false,
    'accessible_tabs_auto_anchor'               => false,
    'accessible_tabs_pagination'                => false,
    'accessible_tabs_fx'                        => 'show',
    'accessible_tabs_fxspeed'                   => 'normal',
    'accessible_tabs_wrapper_class'             => 'content',
    'accessible_tabs_current_class'             => 'current',
    'accessible_tabs_tabhead_class'             => 'tabhead',
    'accessible_tabs_tabbody'                   => '.tabbody',
    'accessible_tabs_tabs_list_class'           => 'tabs-list',
    'accessible_tabs_first_nav_item_class'      => 'first',
    'accessible_tabs_last_nav_item_class'       => 'last',
    'accessible_tabs_clearfix_class'            => 'clearfix',
    'accessible_tabs_css_class_available'       => false,
    'accessible_tabs_wrap_inner_nav_links'      => false,
    'accessible_tabs_sync_height_method_name'   => 'syncHeight',


);


// Default Set MOOTOOLS
$GLOBALS['TL_ACCESSIBLE_TABS_DEFAULTS']['mootools'] = array(

    'accessible_tabs_tabhead'                   => 'h4',
    'accessible_tabs_position'                  => '',
    'accessible_tabs_sync_heights'              => false,
    'accessible_tabs_save_state'                => false,
    'accessible_tabs_auto_anchor'               => false,
    'accessible_tabs_pagination'                => false,
    'accessible_tabs_fx'                        => 'show',
    'accessible_tabs_fxspeed'                   => 'normal',
    'accessible_tabs_wrapper_class'             => 'content',
    'accessible_tabs_current_class'             => 'current',
    'accessible_tabs_tabhead_class'             => 'tabhead',
    'accessible_tabs_tabbody'                   => '.tabbody',
    'accessible_tabs_tabs_list_class'           => 'tabs-list',
    'accessible_tabs_first_nav_item_class'      => '',
    'accessible_tabs_last_nav_item_class'       => '',
    'accessible_tabs_clearfix_class'            => '',
    'accessible_tabs_css_class_available'       => false,
    'accessible_tabs_wrap_inner_nav_links'      => false,
    'accessible_tabs_sync_height_method_name'   => 'SyncHeight',
);

