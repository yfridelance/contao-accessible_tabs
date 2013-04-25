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

/**
 * Class AccessibleTabsContent
 *
 * @copyright  Yves Fridelance 2013
 * @author     Yves Fridelance <yves@fridelance.ch>
 * @package    AccessibleTabs
 */
class AccessibleTabsContent extends ContentElement
{

    /**
     * @var string
     */
    protected $strTemplate = 'ce_accessible_tabs';

    /**
     * Compile the content element
     */
    protected function compile()
    {

        $this->import('AccessibleTabsDS','DS');

        if($this->accessible_tabs_type == 'Start')
        {
            if(TL_MODE == 'FE')
            {
                if($this->DS->isLook()) echo 'gesperrt';

                $id = 'group_' . $this->id;

                if($this->accessible_tabs_sync_heights) { $this->DS->setEnableSyncHeight(true); }
                if($this->accessible_tabs_save_state || $this->accessible_tabs_auto_anchor) { $this->DS->setEnableCookiePlugin(true); }

                $tabDS = $this->DS->getTabElementDS();
                $tabDS->setId($id);

                $tabDS->setData('accessible_tabs_tabhead',                 $this->accessible_tabs_tabhead);
                $tabDS->setData('accessible_tabs_position',                $this->accessible_tabs_position);
                $tabDS->setData('accessible_tabs_sync_heights',            $this->accessible_tabs_sync_heights);
                $tabDS->setData('accessible_tabs_save_state',              $this->accessible_tabs_save_state);
                $tabDS->setData('accessible_tabs_auto_anchor',             $this->accessible_tabs_auto_anchor);
                $tabDS->setData('accessible_tabs_pagination',              $this->accessible_tabs_pagination);
                $tabDS->setData('accessible_tabs_fx',                      $this->accessible_tabs_fx);
                $tabDS->setData('accessible_tabs_fxspeed',                 $this->accessible_tabs_fxspeed);
                $tabDS->setData('accessible_tabs_wrapper_class',           $this->accessible_tabs_wrapper_class);
                $tabDS->setData('accessible_tabs_current_class',           $this->accessible_tabs_current_class);
                $tabDS->setData('accessible_tabs_tabhead_class',           $this->accessible_tabs_tabhead_class);
                $tabDS->setData('accessible_tabs_tabbody',                 $this->accessible_tabs_tabbody);
                $tabDS->setData('accessible_tabs_tabs_list_class',         $this->accessible_tabs_tabs_list_class);
                $tabDS->setData('accessible_tabs_first_nav_item_class',    $this->accessible_tabs_first_nav_item_class);
                $tabDS->setData('accessible_tabs_last_nav_item_class',     $this->accessible_tabs_last_nav_item_class);
                $tabDS->setData('accessible_tabs_clearfix_class',          $this->accessible_tabs_clearfix_class);
                $tabDS->setData('accessible_tabs_css_class_available',     $this->accessible_tabs_css_class_available);
                $tabDS->setData('accessible_tabs_wrap_inner_nav_links',    $this->accessible_tabs_wrap_inner_nav_links);
                $tabDS->setData('accessible_tabs_sync_height_method_name', $this->accessible_tabs_sync_height_method_name);

                $this->Template       = new FrontendTemplate($this->strTemplate . '_wrapper');
                $this->Template->mode = 'start';
                $this->Template->id   = $id;

                //print_r($this->DS->getJsTemplate());
            }
            else
            {
                $this->Template             = new BackendTemplate('be_wildcard');
                $this->Template->title      = $this->headline;
                $this->Template->wildcard   = strtoupper('### Accessible Tabs: Wrapper Start ###');
            }
        }
        elseif($this->accessible_tabs_type == 'Add')
        {
            if(TL_MODE == 'FE')
            {
                $this->Template = new FrontendTemplate($this->strTemplate);
                $tabDS = $this->DS->getTabElementDS();

                $this->Template->first   = $tabDS->isFirstItem();
                $this->Template->tabhead = $tabDS->getData('accessible_tabs_tabhead');
                $this->Template->tabbody = substr($tabDS->getData('accessible_tabs_tabbody'),1);
                $this->Template->title   = $this->accessible_tabs_title;
                $this->Template->anchor  = $this->accessible_tabs_anchor;

                $tabDS->setThisFirst(false);
            }
            else
            {
                $this->Template           = new \BackendTemplate('be_wildcard');
                $this->Template->wildcard = strtoupper('### Accessible Tabs - Tab Name:'.$this->accessible_tabs_title.' ###');
            }
        }
        else
        {
            if(TL_MODE == 'FE')
            {

                $this->DS->unLook();
                $this->Template       = new FrontendTemplate($this->strTemplate . '_wrapper');
                $this->Template->mode = 'end';

            }
            else
            {
                $this->Template           = new BackendTemplate('be_wildcard');
                $this->Template->wildcard = strtoupper('### Accessible Tabs: Wrapper Stop ###');
            }
        }
    }
}