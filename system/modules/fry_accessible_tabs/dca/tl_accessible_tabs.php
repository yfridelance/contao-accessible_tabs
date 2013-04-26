<?php

/**
 * @package AccessibleTabs
 * Copyright (C) 2013 Yves Fridelance
 *
 * Extension for:
 * Contao Open Source CMS
 * Copyright (C) 2005-2013 Leo Feyer
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


// is only mootools available?
$moo_only = DCA_TL_Accessible_Tabs::getInstance()->jqueryAvailable() ? false : true;

/**
 * DCA tl_accessible_tabs
 */
$GLOBALS['TL_DCA']['tl_accessible_tabs'] = array
(

    // Config
    'config' => array
    (
        'dataContainer'               => 'File_AccessibleTabs',
        'closed'                      => true,
        'onload_callback'             => array
        (
            array('DCA_TL_Accessible_Tabs','onload')
        ),
    ),

    'palettes'  => array(
        'default'   => '{accessible_tabs_settings_legend},accessible_tabs_load_settings,accessible_tabs_load_previous;
                        {accessible_tabs_base_legend},accessible_tabs_tabhead,accessible_tabs_position,accessible_tabs_sync_heights,accessible_tabs_save_state,accessible_tabs_auto_anchor,accessible_tabs_pagination;
                        {accessible_tabs_fx_legend},accessible_tabs_fx,accessible_tabs_fxspeed;
                        {accessible_tabs_selectors_legend},accessible_tabs_wrapper_class,accessible_tabs_current_class,accessible_tabs_tabhead_class,accessible_tabs_tabbody,accessible_tabs_tabs_list_class,accessible_tabs_first_nav_item_class,accessible_tabs_last_nav_item_class,accessible_tabs_clearfix_class;
                        {accessible_tabs_misc_legend},accessible_tabs_css_class_available,accessible_tabs_wrap_inner_nav_links,accessible_tabs_sync_height_method_name;'
    ),
    // meta pallettes
//    'metapalettes' => array
//    (
//        'default' => array
//        (
//            'accessible_tabs_settings'  => array('accessible_tabs_load_settings','accessible_tabs_load_previous'),
//            'accessible_tabs_base'      => array('accessible_tabs_tabhead', 'accessible_tabs_position', 'accessible_tabs_sync_heights', 'accessible_tabs_save_state', 'accessible_tabs_auto_anchor', 'accessible_tabs_pagination'),
//            'accessible_tabs_fx'        => array('accessible_tabs_fx','accessible_tabs_fxspeed'),
//            'accessible_tabs_selectors' => array('accessible_tabs_wrapper_class', 'accessible_tabs_current_class', 'accessible_tabs_tabhead_class', 'accessible_tabs_tabbody', 'accessible_tabs_tabs_list_class', 'accessible_tabs_first_nav_item_class', 'accessible_tabs_last_nav_item_class', 'accessible_tabs_clearfix_class'),
//            'accessible_tabs_misc'      => array('accessible_tabs_css_class_available','accessible_tabs_wrap_inner_nav_links', 'accessible_tabs_sync_height_method_name'),
//
//
//        )
//    ),

    // Fields
    'fields' => array
    (

        /* Settings */
        'accessible_tabs_load_settings'      => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_load_settings'],
            'inputType'               => 'select',
            'options'                 => array_keys($GLOBALS['TL_ACCESSIBLE_TABS_DEFAULTS']),
            'save_callback'           => array(array('DCA_TL_Accessible_Tabs', 'loadSettings')),
            'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50', 'chosen'=>true)
        ),
        'accessible_tabs_load_previous'      => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_load_previous'],
            'inputType'               => 'select',
            'options_callback'        => array('DCA_TL_Accessible_Tabs', 'previousOptions'),
            'save_callback'           => array(array('DCA_TL_Accessible_Tabs', 'loadPrevious')),
            'eval'                    => array('includeBlankOption'=>true,'tl_class'=>'w50', 'chosen'=>true)
        ),

        /* Base */
        'accessible_tabs_tabhead'            => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabhead'],
            'inputType'               => 'select',
            'options_callback'        => array('DCA_TL_Accessible_Tabs' ,'tabheadOptions'),
            'eval'                    => array('tl_class'=>'w50','chosen'=>true)
        ),
        'accessible_tabs_position'    => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_position'],
            'inputType'               => 'select',
            'options'                 => array('top', 'bottom'),
            'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50', 'chosen'=>false, 'disabled'=>$moo_only)
        ),
        'accessible_tabs_sync_heights'       => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_sync_heights'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50')
        ),
        'accessible_tabs_save_state'       => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_save_state'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50', 'disabled'=>$moo_only)
        ),
        'accessible_tabs_auto_anchor'       => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_auto_anchor'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50', 'disabled'=>$moo_only)
        ),
        'accessible_tabs_pagination'       => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_pagination'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50', 'disabled'=>$moo_only)
        ),

        /* fx */
        'accessible_tabs_fx'    => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_fx'],
            'inputType'               => 'select',
            'options_callback'        => array('DCA_TL_Accessible_Tabs','fxOptions'),
            'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50', 'chosen'=>true)
        ),
        'accessible_tabs_fxspeed'            => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_fxspeed'],
            'inputType'               => 'text',
            'eval'                    => array('tl_class'=>'w50')
        ),

        /* Classes */
        'accessible_tabs_wrapper_class'       => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_wrapper_class'],
            'inputType'               => 'text',
            'eval'                    => array('tl_class'=>'w50')
        ),
        'accessible_tabs_current_class'       => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_current_class'],
            'inputType'               => 'text',
            'eval'                    => array('tl_class'=>'w50')
        ),
        'accessible_tabs_tabhead_class'       => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabhead_class'],
            'inputType'               => 'text',
            'eval'                    => array('tl_class'=>'w50')
        ),
        'accessible_tabs_tabbody'           => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabbody'],
            'inputType'               => 'text',
            'eval'                    => array('tl_class'=>'w50')
        ),
        'accessible_tabs_tabs_list_class'    => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabs_list_class'],
            'inputType'               => 'text',
            'eval'                    => array('tl_class'=>'w50')
        ),
        'accessible_tabs_first_nav_item_class'    => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_first_nav_item_class'],
            'inputType'               => 'text',
            'eval'                    => array('tl_class'=>'w50', 'disabled'=>$moo_only)
        ),
        'accessible_tabs_last_nav_item_class'    => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_last_nav_item_class'],
            'inputType'               => 'text',
            'eval'                    => array('tl_class'=>'w50', 'disabled'=>$moo_only)
        ),
        'accessible_tabs_clearfix_class'    => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_clearfix_class'],
            'inputType'               => 'text',
            'eval'                    => array('tl_class'=>'w50')
        ),


        /* Misc */
        'accessible_tabs_css_class_available'       => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_css_class_available'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50', 'disabled'=>$moo_only)
        ),
        'accessible_tabs_wrap_inner_nav_links'       => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_wrap_inner_nav_links'],
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50', 'disabled'=>$moo_only)
        ),
        'accessible_tabs_sync_height_method_name'    => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_sync_height_method_name'],
            'inputType'               => 'text',
            'eval'                    => array('tl_class'=>'w50')
        ),

    )
);
