<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package   fry_accessible_tabs
 * @author    Yves Fridelance <yves.fridelance@me.com>
 * @license   GNU/LGPL
 * @copyright Y. Fridelance 2014
 */

 /**
  * Config
  */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][]			= array('fry_at_tl_content', 'showJsLibraryHint');

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['accessible_tabs_start']       = '{type_legend},type;{accessible_tabs_start_legend},headline;{accessible_tabs_base_legend},accessible_tabs_tabhead,accessible_tabs_position,accessible_tabs_syncheights,accessible_tabs_save_state,accessible_tabs_auto_anchor,accessible_tabs_responsive,accessible_tabs_css_class_available,accessible_tabs_pagination;{accessible_tabs_fx_legend:hide},accessible_tabs_fx,accessible_tabs_fxspeed;{accessible_tabs_selectors_legend:hide},accessible_tabs_wrapper_class,accessible_tabs_current_class,accessible_tabs_current_info_position,accessible_tabs_tabhead_class,accessible_tabs_tabbody,accessible_tabs_list_class,accessible_tabs_first_nav_item_class,accessible_tabs_last_nav_item_class,accessible_tabs_responsive_toggler_class,accessible_tabs_clearfix_class;{expert_legend:hide},cssID,space;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['accessible_tabs_separator']   = '{type_legend},type;{accessible_tabs_separator_legend},accessible_tabs_title,accessible_tabs_anchor;{protected_legend:hide},protected;{expert_legend:hide},cssID,space;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['accessible_tabs_stop']        = '{type_legend},type;';


/**
 * Fields accessible_tabs_start
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_type'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_type'],
    'default'           => '',
    'exclude'           => true,
    'inputType'         => 'radio',
    'options'           => array('Start' ,'Separator', 'Stop'),
    'reference'		    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_type'],
    'eval'              => array('helpwizard'=>true, 'submitOnChange'=>true),
    'sql'               => "varchar(255) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_tabhead'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_tabhead'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_tabhead'],
    'exclude'           => true,
    'inputType'         => 'select',
    'options'           => array('h1' ,'h2', 'h3','h4','h5','h6'),
    'reference'		    => &$GLOBALS['TL_LANG']['tl_accessible_tabs'],
    'eval'              => array('tl_class'=>'w50', 'chosen'=>true, 'disabled'=>false, 'mandatory'=>true),
    'sql'               => "varchar(255) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_position'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_position'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_position'],
    'exclude'           => true,
    'inputType'         => 'select',
    'options'           => array('top' ,'bottom'),
    'reference'		    => &$GLOBALS['TL_LANG']['tl_accessible_tabs'],
    'eval'              => array('includeBlankOption'=>false, 'tl_class'=>'w50', 'chosen'=>false, 'disabled'=>false),
    'sql'               => "varchar(255) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_syncheights'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_syncheights'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_syncheights'],
    'exclude'           => true,
    'inputType'         => 'checkbox',
    'eval'              => array('tl_class'=>'w50'),
    'sql'               => "char(1) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_save_state'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_save_state'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_save_state'],
    'exclude'           => true,
    'inputType'         => 'checkbox',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>false),
    'sql'               => "char(1) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_auto_anchor'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_auto_anchor'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_auto_anchor'],
    'exclude'           => true,
    'inputType'         => 'checkbox',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>false),
    'sql'               => "char(1) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_responsive'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_responsive'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_responsive'],
    'exclude'           => true,
    'inputType'         => 'checkbox',
    'eval'              => array('tl_class'=>'w50'),
    'sql'               => "char(1) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_css_class_available'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_css_class_available'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_css_class_available'],
    'exclude'           => true,
    'inputType'         => 'checkbox',
    'eval'              => array('tl_class'=>'w50'),
    'sql'               => "char(1) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_pagination'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_pagination'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_pagination'],
    'exclude'           => true,
    'inputType'         => 'checkbox',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>false),
    'sql'               => "char(1) NULL",
);

/* FX */
$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_fx'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_fx'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_fx'],
    'exclude'           => true,
    'inputType'         => 'select',
    'options'           => array('show','fadeIn'),
    'reference'		    => &$GLOBALS['TL_LANG']['tl_content'],
    'eval'              => array('includeBlankOption'=>false, 'tl_class'=>'w50', 'chosen'=>true),
    'sql'               => "varchar(255) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_fxspeed'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_fxspeed'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_fxspeed'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50'),
    'sql'               => "varchar(255) NULL",
);

/* Classes */
$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_wrapper_class'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_wrapper_class'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_wrapper_class'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50'),
    'sql'               => "varchar(255) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_current_class'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_current_class'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_current_class'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50'),
    'sql'               => "varchar(255) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_current_info_position'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_current_info_position'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_current_info_position'],
    'exclude'           => true,
    'inputType'         => 'select',
    'options'           => array('prepend' ,'append'),
    'reference'		    => &$GLOBALS['TL_LANG']['tl_accessible_tabs'],
    'eval'              => array('includeBlankOption'=>false, 'tl_class'=>'w50', 'chosen'=>false, 'disabled'=>false),
    'sql'               => "varchar(255) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_tabhead_class'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_tabhead_class'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_tabhead_class'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50'),
    'sql'               => "varchar(255) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_tabbody'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_tabbody'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_tabbody'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50'),
    'sql'               => "varchar(255) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_tabs_list_class'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_tabs_list_class'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_tabs_list_class'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50'),
    'sql'               => "varchar(255) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_first_nav_item_class'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_first_nav_item_class'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_first_nav_item_class'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>false),
    'sql'               => "varchar(255) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_last_nav_item_class'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_last_nav_item_class'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_last_nav_item_class'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>false),
    'sql'               => "varchar(255) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_clearfix_class'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_clearfix_class'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_clearfix_class'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50'),
    'sql'               => "varchar(255) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_css_class_available'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_css_class_available'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_css_class_available'],
    'exclude'           => true,
    'inputType'         => 'checkbox',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>false),
    'sql'               => "char(1) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_wrap_inner_nav_links'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_wrap_inner_nav_links'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_wrap_inner_nav_links'],
    'exclude'           => true,
    'inputType'         => 'checkbox',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>false),
    'sql'               => "char(1) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_sync_height_method_name'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_sync_height_method_name'],
    'default'           => $GLOBALS['TL_CONFIG']['accessible_tabs_sync_height_method_name'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50'),
    'sql'               => "varchar(255) NULL",
);

/**
 * Fields accessible_tabs_separator
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_title'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_title'],
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50', 'mandatory'=>true),
    'sql'               => "varchar(255) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['accessible_tabs_anchor'] = array
(
    'label'			    => &$GLOBALS['TL_LANG']['tl_content']['accessible_tabs_anchor'],
    'load_callback'     => array(array('fry_at_tl_content','getUniqueTabID')),
    'exclude'           => true,
    'inputType'         => 'text',
    'eval'              => array('tl_class'=>'w50', 'disabled'=>false), 'mandatory'=>true,
    'sql'               => "varchar(255) NULL",
);

class fry_at_tl_content {

    public static function getUniqueTabID($uid)
    {

        if(!$uid) {
            $uid = uniqid('tab_',false);
        }
        return $uid;
    }
	
	/**
	 * Show a hint if a JavaScript library needs to be included in the page layout
	 * @param object
	 */
	public function showJsLibraryHint($dc)
	{
		if ($_POST || Input::get('act') != 'edit')
		{
			return;
		}


		// Return if the user cannot access the layout module (see #6190)
		Message::addInfo(sprintf($GLOBALS['TL_LANG']['tl_content']['includeTemplates'], 'moo_accessible_tabs', 'j_accessible_tabs'));
	}
}

