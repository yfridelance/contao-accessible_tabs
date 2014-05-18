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
	
	protected $defaults = array
			  	(
			  		'wrapperClass'			=> 'content',
			  		'currentClass'			=> 'current',
			  		'tabhead'				=> 'h4',
			  		'tabheadClass'			=> 'tabhead',
			  		'tabbody'				=> '.tabbody',
			  		'fx'					=> 'fx',
			  		'fxspeed'				=> 'fxspeed',
			  		'currentInfoText'		=> 'current tab:',
			  		'currentInfoPosition'	=> 'prepend',
			  		'currentInfoClass'		=> 'current-info',
			  		'tabsListClass'			=> 'tabs-list',
			  		'syncheights'			=> false,
			  		'syncHeightMethodeName'	=> 'syncHeight',
			  		'cssClassAvailable'		=> false,
			  		'saveState'				=> false,
			  		'autoAnchor'			=> false,
			  		'pagination'			=> false,
			  		'position'				=> 'top',
			  		'wrapperInnerNavLinks'	=> '',
			  		'firstNavItemClass'		=> 'first',
			  		'lastNavItemClass'		=> 'last',
			  		'clearfixClass'			=> 'clearfix',
			  		'responsive'			=> false,
			  		'responsiveToggleClass'	=> 'open'
			  	);

    protected $strTemplate = 'ce_accessible_tabs_start';

    protected function compile() {

        if(TL_MODE == 'FE') {

            //Frontend
            $this->strTemplate = 'ce_accessible_tabs_start';
            $this->Template = new \FrontendTemplate($this->strTemplate);
            $this->Template->tabbody            = $this->accessible_tabs_tabbody;

            $data = array
		            (
		            
						'wrapperClass'			=> $this->accessible_tabs_wrapper_class,
				  		'currentClass'			=> $this->accessible_tabs_current_class,
				  		'tabhead'				=> $this->accessible_tabs_wrapper_class ? ".".$this->accessible_tabs_wrapper_class.">".$this->accessible_tabs_tabhead : $this->defaults['wrapperClass'].">".$this->accessible_tabs_tabhead,
				  		'tabheadClass'			=> $this->accessible_tabs_tabhead_class,
				  		'tabbody'				=> '.'.$this->accessible_tabs_tabbody,
				  		'fx'					=> $this->accessible_tabs_fx,
				  		'fxspeed'				=> $this->accessible_tabs_fxspeed,
				  		'currentInfoText'		=> $GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_current_info_text'],
				  		'currentInfoPosition'	=> $this->accessible_tabs_current_info_position,
				  		'currentInfoClass'		=> $this->accessible_tabs_current_info_class,
				  		'tabsListClass'			=> $this->accessible_tabs_tabs_list_class,
				  		'syncheights'			=> $this->accessible_tabs_syncheights,
				  		'syncHeightMethodeName'	=> $this->accessible_tabs_sync_height_method_name,
				  		'cssClassAvailable'		=> $this->accessible_tabs_css_class_available,
				  		'saveState'				=> $this->accessible_tabs_save_state,
				  		'autoAnchor'			=> $this->accessible_tabs_auto_anchor,
				  		'pagination'			=> $this->accessible_tabs_pagination,
				  		'position'				=> $this->accessible_tabs_position,
				  		'wrapperInnerNavLinks'	=> $this->accessible_tabs_wrap_inner_nav_links,
				  		'firstNavItemClass'		=> $this->accessible_tabs_first_nav_item_class,
				  		'lastNavItemClass'		=> $this->accessible_tabs_last_nav_item_class,
				  		'clearfixClass'			=> $this->accessible_tabs_clearfix_class,
				  		'responsive'			=> $this->accessible_tabs_responsive,
				  		'responsiveToggleClass'	=> $this->accessible_tabs_responsive_toggle_class,
		            );
			
			foreach($data as $k => $v) 
			{
				
				if($this->defaults[$k] == $v || $v == '') 
				{
					unset($data[$k]);
				}
				else
				{
					if(is_bool($this->defaults[$k])) 
					{
						$v == false ? $v = "false" : $v = "true";
					}
					
					$data[$k] = "data-".$k."='".htmlspecialchars($v)."'";	
				}
			}
			
            $this->Template->data = implode(" ",$data);

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