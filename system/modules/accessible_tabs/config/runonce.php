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
 * Class runonce
 *
 * @copyright  Yves Fridelance 2013
 * @author     Yves Fridelance <yves@fridelance.ch>
 * @package    AccessibleTabs
 */
class AccessibleTabsRunonce extends Controller
{

    protected $Database;
    protected $Config;

    public function __construct()
    {

        parent::__construct();

        //$this->import('Database');
        $this->Database = Database::getInstance();
        $this->Config = Config::getInstance();
    }

    public function run()
    {
        /**
         * Key mapping
         */
        if(in_array('fry_accessible_tabs', $this->Config->getActiveModules()))
        {

            // Config File
            $GLOBALS['TL_ACCESSIBLE_TABS_DEFAULTS']['custom'] = array(

                'accessible_tabs_tabhead'                   => $GLOBALS['TL_CONFIG']['fry_headerTag'],
                'accessible_tabs_position'                  => $GLOBALS['TL_CONFIG']['fry_tabPosition'],
                'accessible_tabs_sync_heights'              => $GLOBALS['TL_CONFIG']['fry_syncHeights'],
                'accessible_tabs_save_state'                => $GLOBALS['TL_CONFIG']['fry_saveState'],
                'accessible_tabs_auto_anchor'               => $GLOBALS['TL_CONFIG']['fry_autoAnchor'],
                'accessible_tabs_fx'                        => $GLOBALS['TL_CONFIG']['fry_fx'],
                'accessible_tabs_fxspeed'                   => $GLOBALS['TL_CONFIG']['fry_fxSpeed'],
                'accessible_tabs_wrapper_class'             => $GLOBALS['TL_CONFIG']['fry_wrapperClass'],
                'accessible_tabs_current_class'             => $GLOBALS['TL_CONFIG']['fry_currentClass'],
                'accessible_tabs_tabhead_class'             => $GLOBALS['TL_CONFIG']['fry_tabheadClass'],
                'accessible_tabs_tabbody'                   => '.' . $GLOBALS['TL_CONFIG']['fry_tabbodyClass'],
                'accessible_tabs_tabs_list_class'           => $GLOBALS['TL_CONFIG']['fry_tabsListClass'],
                'accessible_tabs_clearfix_class'            => 'clearfix',
                'accessible_tabs_css_class_available'       => null,
                'accessible_tabs_sync_height_method_name'   => null,
                'accessible_tabs_wrap_inner_nav_links'      => null,
            );

            // Write Config
            $this->import('DCA_TL_Accessible_Tabs')->loadSettings('custom');

            // Database
            if (version_compare(VERSION, '2.8', '>'))
            {
                if($this->Database->fieldExists('fry_headerTag','tl_content'))
                {
                    $sql = 'SELECT fry_headerTag,fry_tabPosition,fry_syncHeights,fry_saveState,fry_autoAnchor,fry_fx,fry_fxSpeed,fry_wrapperClass,fry_currentClass,fry_tabheadClass,fry_tabbodyClass,fry_tabsListClass';
                    $stmt = $this->Database->prepare($sql);
                    $stmt->execute();
                }
            }

        }
    }
}