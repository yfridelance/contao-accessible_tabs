<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package   fry_accessible_tabs
 * @author    Yves Fridelance <yves.fridelance@me.com>
 * @license   GNU/LGPL
 * @copyright Yves Fridelance 2014
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace FRY;

/**
 * Class ContentAccessibleTabs
 *
 * Front end content element "accordion".
 * @copyright  Yves Fridelance 2014
 * @author     Yves Fridelance <yves.fridelance@me.com>
 * @package    fry_accessible_tabs
 */
class ContentAccessibleTabsStart extends \ContentElement {

    protected $strTemplate = 'ce_accessible_tabs_start';

    protected function compile() {

        if(TL_MODE == 'FE') {

            //Frontend
            $this->strTemplate = 'ce_accessible_tabs_start';
            $this->Template = new \FrontendTemplate($this->strTemplate);
            $this->Template->tabbody            = $this->accessible_tabs_tabbody;

            $data = array(
                'data-tabhead'                  => $this->accessible_tabs_wrapper_class ? ".".$this->accessible_tabs_wrapper_class.">".$this->accessible_tabs_tabhead : $this->accessible_tabs_tabhead,
                'data-position'                 => $this->accessible_tabs_position,
                'data-sync-heights'             => $this->accessible_tabs_syncheights               == false        ? "false" : "true",
                'data-save-state'               => $this->accessible_tabs_save_state                == false        ? "false" : "true",
                'data-auto-anchor'              => $this->accessible_tabs_auto_anchor               == false        ? "false" : "true",
                'data-pagination'               => $this->accessible_tabs_pagination                == false        ? "false" : "true",
                'data-fx'                       => $this->accessible_tabs_fx,
                'data-fxspeed'                  => $this->accessible_tabs_fxspeed,
                'data-wrapper-class'            => $this->accessible_tabs_wrapper_class,
                'data-current-class'            => $this->accessible_tabs_current_class,
                'data-current-info-position'    => $this->accessible_tabs_current_info_position,
                'data-current-info-text'        => $GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_current_info_text'],
                'data-tabhead-class'            => $this->accessible_tabs_tabhead_class,
                'data-tabbody'                  => '.'.$this->accessible_tabs_tabbody,
                'data-tabs-list-class'          => $this->accessible_tabs_tabs_list_class,
                'data-first-nav-item-class'     => $this->accessible_tabs_first_nav_item_class,
                'data-last-nav-item-class'      => $this->accessible_tabs_last_nav_item_class,
                'data-clearfix-class'           => $this->accessible_tabs_clearfix_class,
                'data-css-class-available'      => $this->accessible_tabs_css_class_available       ==  false       ? "false" : "true",
                'data-wrap-inner-nav-links'     => $this->accessible_tabs_wrap_inner_nav_links,
                'data-sync-height-method-name'  => $this->accessible_tabs_sync_height_method_name,
            );
            foreach($data as $k=>$v) {
                //if($v !== false && $v != '') {
                    $filtered_datas[] = $k.'="'.$v.'"';
                //}
            }
            $this->Template->data = implode(" ",$filtered_datas);

            \ContentAccessibleTabsSeparator::$strTabhead     = $this->accessible_tabs_tabhead;
            \ContentAccessibleTabsSeparator::$strTabbody     = $this->accessible_tabs_tabbody;
            \ContentAccessibleTabsSeparator::$boolFirstItem  = true;

        } else {

            $this->strTemplate = 'be_wildcard';
            $this->Template = new \BackendTemplate($this->strTemplate);
            $this->Template->title = $this->headline;
            $this->Template->wildcard   = strtoupper('### Accessible Tabs: Wrapper Start ###');
        }


    }


}