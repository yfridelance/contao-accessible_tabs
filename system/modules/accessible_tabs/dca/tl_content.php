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
 * DCA tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][]      = array('DCA_TL_Accessible_Tabs','onload');

$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][]       = 'accessible_tabs_type';

$GLOBALS['TL_DCA']['tl_content']['palettes']['accessible_tabs']      = '{type_legend},type,accessible_tabs_type;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['accessible_tabsStart'] = '{type_legend},type,accessible_tabs_type;{accessible_tabs_start_legend},headline;{accessible_tabs_base_legend},accessible_tabs_tabhead,accessible_tabs_position,accessible_tabs_sync_heights,accessible_tabs_save_state,accessible_tabs_auto_anchor,accessible_tabs_pagination;{accessible_tabs_fx_legend:hide},accessible_tabs_fx,accessible_tabs_fxspeed;{accessible_tabs_selectors_legend:hide},accessible_tabs_wrapper_class,accessible_tabs_current_class,accessible_tabs_tabhead_class,accessible_tabs_tabbody,accessible_tabs_list_class,accessible_tabs_first_nav_item_class,accessible_tabs_last_nav_item_class,accessible_tabs_clearfix_class;{accessible_tabs_misc_legend},accessible_tabs_css_class_available,accessible_tabs_wrap_inner_nav_links,accessible_tabs_sync_height_method_name;{expert_legend:hide},cssID,space;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['accessible_tabsAdd']   = '{type_legend},type,accessible_tabs_type;{accessible_tabs_break_legend},accessible_tabs_title,accessible_tabs_anchor;{protected_legend:hide},protected;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['accessible_tabsStop']  = '{type_legend},type,accessible_tabs_type;';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_type'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_type'],
    'default'           => '',
    'exclude'           => true,
    'inputType'         => 'radio',
    'options'           => array('Start' ,'Add', 'Stop'),
    'reference'		    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_type'],
    'eval'              => array('helpwizard'=>true, 'submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_tabhead'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabhead'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_tabhead'],
    'exclude'           => true,
    'inputType'         => 'select',
    'options_callback'  => array('DCA_TL_Accessible_Tabs' ,'tabheadOptions'),
    'reference'		    => &$GLOBALS['TL_LANG']['tl_accessible_tabs'],
    'eval'              => array('tl_class'=>'w50', 'chosen'=>true, 'disabled'=>$moo_only)
);

/* Base */
$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_position'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_position'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_position'],
    'exclude'           => true,
    'inputType'         => 'select',
    'options'           => array('top' ,'bottom'),
    'reference'		    => &$GLOBALS['TL_LANG']['tl_accessible_tabs'],
    'eval'              => array('includeBlankOption'=>true, 'tl_class'=>'w50', 'chosen'=>false, 'disabled'=>$moo_only)
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_sync_heights'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_sync_heights'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_sync_heights'],
    'exclude'           => true,
    'inputType'         => 'checkbox',
    'eval'              => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_save_state'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_save_state'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_save_state'],
    'exclude'           => true,
    'inputType'         => 'checkbox',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>$moo_only)
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_auto_anchor'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_auto_anchor'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_auto_anchor'],
    'exclude'           => true,
    'inputType'         => 'checkbox',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>$moo_only)
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_pagination'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_pagination'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_pagination'],
    'exclude'           => true,
    'inputType'         => 'checkbox',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>$moo_only)
);

/* FX */
$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_fx'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_fx'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_fx'],
    'exclude'           => true,
    'inputType'         => 'select',
    'options_callback'  => array('DCA_TL_Accessible_Tabs','fxOptions'),
    'reference'		    => &$GLOBALS['TL_LANG']['tl_accessible_tabs'],
    'eval'              => array('includeBlankOption'=>true, 'tl_class'=>'w50', 'chosen'=>true)
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_fxspeed'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_fxspeed'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_fxspeed'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50')
);

/* Classes */
$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_wrapper_class'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_wrapper_class'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_wrapper_class'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_current_class'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_current_class'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_current_class'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_tabhead_class'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabhead_class'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_tabhead_class'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_tabbody'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabbody'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_tabbody'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_tabs_list_class'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabs_list_class'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_tabs_list_class'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_first_nav_item_class'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_first_nav_item_class'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_first_nav_item_class'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>$moo_only)
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_last_nav_item_class'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_last_nav_item_class'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_last_nav_item_class'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>$moo_only)
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_clearfix_class'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_clearfix_class'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_clearfix_class'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>$moo_only)
);

/* Misc */
$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_css_class_available'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_css_class_available'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_css_class_available'],
    'exclude'           => true,
    'inputType'         => 'checkbox',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>$moo_only)
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_wrap_inner_nav_links'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_wrap_inner_nav_links'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_wrap_inner_nav_links'],
    'exclude'           => true,
    'inputType'         => 'checkbox',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>$moo_only)
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_sync_height_method_name'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_sync_height_method_name'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_sync_height_method_name'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50')
);

/**
 * Section Add
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_title'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_title'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_anchor'] = array(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_anchor'],
    'load_callback'     => array(array('DCA_TL_Accessible_Tabs','getUniqueTabID')),
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>$moo_only)
);