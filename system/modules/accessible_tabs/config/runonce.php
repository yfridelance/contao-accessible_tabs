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

    protected $DB;
    protected $Config;

    public function __construct()
    {

        parent::__construct();

        $this->DB = Database::getInstance();
        $this->Config = Config::getInstance();
    }

    public function run()
    {
        // If Version > 2.8
        if(version_compare(VERSION,'2,8','>'))
        {
            if ($this->DB->fieldExists('fry_tabsType', 'tl_content') && !$this->DB->fieldExists('accessible_tabs_type', 'tl_content'))
            {
                // Config file migration
                $c    = $GLOBALS['TL_CONFIG'];
                $d    = $GLOBALS['TL_ACCESSIBLE_TABS_DEFAULTS']['jquery'];
                $name = 'runonce';

                $this->prepareConfig($name,$c,$d);

                DCA_TL_Accessible_Tabs::getInstance()->loadSettings($name);

                // migrate Database
                $this->migrateDatabase();
            }

        }

//
//
//        // Remove settings from localconf
//        $options = array('fry_headerTag','fry_tabPosition','fry_syncHeights','fry_saveState','fry_autoAnchor',
//            'fry_pagination','fry_fx','fry_fxSpeed','fry_wrapperClass','fry_currentClass','fry_tabheadClass',
//            'fry_tabbodyClass','fry_tabsListClass','fry_firstNavItemClass','fry_lastNavItemClass','fry_clearFix',
//            'fry_cssClassAvailable','fry_wrapInnerNavLinks','fry_syncHeightsMethodName'
//        );
//        //$this->Config->delete('fry_headerTag');
//        foreach($options as $opt)
//        {
//            if($this->Config->get($opt))
//            {
//                $this->Config->delete($opt);
//            }
//        }
//
//
//
    }

    protected function prepareConfig($name,$c,$d)
    {
        $GLOBALS['TL_ACCESSIBLE_TABS_DEFAULTS'][$name] = array(

            'accessible_tabs_tabhead'                   => $c['fry_headerTag']             ? $c['fry_headerTag']              : $d['accessible_tabs_tabhead'],
            'accessible_tabs_position'                  => $c['fry_tabPosition']           ? $c['fry_tabPosition']            : $d['accessible_tabs_position'],
            'accessible_tabs_sync_heights'              => $c['fry_syncHeights']           ? $c['fry_syncHeights']            : $d['accessible_tabs_sync_heights'],
            'accessible_tabs_save_state'                => $c['fry_saveState']             ? $c['fry_saveState']              : $d['accessible_tabs_save_state'],
            'accessible_tabs_auto_anchor'               => $c['fry_autoAnchor']            ? $c['fry_autoAnchor']             : $d['accessible_tabs_auto_anchor'],
            'accessible_tabs_pagination'                => $c['fry_pagination']            ? $c['fry_pagination']             : $d['accessible_tabs_pagination'],
            'accessible_tabs_fx'                        => $c['fry_fx']                    ? $c['fry_fx']                     : $d['accessible_tabs_fx'],
            'accessible_tabs_fxspeed'                   => $c['fry_fxSpeed']               ? $c['fry_fxSpeed']                : $d['accessible_tabs_fx_speed'],
            'accessible_tabs_wrapper_class'             => $c['fry_wrapperClass']          ? $c['fry_wrapperClass']           : $d['accessible_tabs_wrapper_class'],
            'accessible_tabs_current_class'             => $c['fry_currentClass']          ? $c['fry_currentClass']           : $d['accessible_tabs_current_class'],
            'accessible_tabs_tabhead_class'             => $c['fry_tabheadClass']          ? $c['fry_tabheadClass']           : $d['accessible_tabs_tabhead_class'],
            'accessible_tabs_tabbody'                   => $c['fry_tabbodyClass']          ? '.' . $c['fry_tabbodyClass']     : $d['accessible_tabs_tabbody'],
            'accessible_tabs_tabs_list_class'           => $c['fry_tabsListClass']         ? $c['fry_tabsListClass']          : $d['accessible_tabs_tabs_list_class'],
            'accessible_tabs_first_nav_item_class'      => $c['fry_firstNavItemClass']     ? $c['fry_firstNavItemClass']      : $d['accessible_tabs_first_nav_item_class'],
            'accessible_tabs_last_nav_item_class'       => $c['fry_lastNavItemClass']      ? $c['fry_lastNavItemClass']       : $d['accessible_tabs_last_nav_item_class'],
            'accessible_tabs_clearfix_class'            => $c['fry_clearFix']              ? $c['fry_clearFix']               : $d['accessible_tabs_clearfix'],
            'accessible_tabs_css_class_available'       => $c['fry_cssClassAvailable']     ? $c['fry_cssClassAvailable']      : $d['accessible_tabs_css_class_available'],
            'accessible_tabs_wrap_inner_nav_links'      => $c['fry_wrapInnerNavLinks']     ? $c['fry_wrapInnerNavLinks']      : $d['accessible_tabs_wrap_inner_nav_links'],
            'accessible_tabs_sync_height_method_name'   => $c['fry_syncHeightsMethodName'] ? $c['fry_syncHeightsMethodName']  : $d['accessible_tabs_sync_height_method_name'],
        );
    }

    protected function migrateDatabase()
    {

        //Add Fields
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_type` varchar(32) NOT NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_tabhead` varchar(2) NOT NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_position` varchar(32) NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_sync_heights` char(1) NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_save_state` char(1) NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_auto_anchor` char(1) NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_pagination` char(1) NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_fx` varchar(32) NOT NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_fxspeed` varchar(32) NOT NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_wrapper_class` varchar(32) NOT NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_current_class` varchar(32) NOT NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_tabhead_class` varchar(32) NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_tabbody` varchar(32) NOT NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_tabs_list_class` varchar(32) NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_first_nav_item_class` varchar(32) NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_last_nav_item_class` varchar(32) NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_clearfix_class` varchar(32) NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_title` varchar(255) NOT NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_anchor` varchar(255) NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_css_class_available` char(1) NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_wrap_inner_nav_links` char(1) NULL default '';");
        $this->DB->execute("ALTER TABLE `tl_content` ADD `accessible_tabs_sync_height_method_name` varchar(32) NOT NULL default '';");

        if ($this->DB->fieldExists('accessible_tabs_type', 'tl_content'))
        {
            $query = 'SELECT * FROM tl_content WHERE fry_tabsType <> ?';
            $rs = $this->DB->prepare($query)->execute('');
            if($rs)
            {
                while($rs->next())
                {
                    $query = "UPDATE tl_content SET %s WHERE id=?;";
                    $set = array(
                        'accessible_tabs_type'                      => $rs->fry_tabsType, //
                        'accessible_tabs_tabhead'                   => $rs->fry_headerTag, //
                        'accessible_tabs_position'                  => $rs->fry_tabsType == 'Start' ? $GLOBALS['TL_CONFIG']['accessible_tabs_position'] : null,
                        'accessible_tabs_sync_heights'              => $rs->fry_syncHeights, //
                        'accessible_tabs_save_state'                => $rs->fry_saveState,  //
                        'accessible_tabs_auto_anchor'               => $rs->fry_autoAnchor, //
                        'accessible_tabs_pagination'                => $rs->fry_tabsType == 'Start' ? $GLOBALS['TL_CONFIG']['accessible_tabs_pagination'] : null,
                        'accessible_tabs_fx'                        => $rs->fry_fx, //
                        'accessible_tabs_fxspeed'                   => $rs->fry_fxSpeed, //
                        'accessible_tabs_wrapper_class'             => $rs->fry_wrapperClass, //
                        'accessible_tabs_current_class'             => $rs->fry_currentClass, //
                        'accessible_tabs_tabhead_class'             => $rs->fry_tabsType == 'Start' ? $GLOBALS['TL_CONFIG']['accessible_tabs_tabhead_class'] : null,
                        'accessible_tabs_tabbody'                   => $rs->fry_tabbodyClass, //
                        'accessible_tabs_tabs_list_class'           => $rs->fry_tabsListClass, //
                        'accessible_tabs_first_nav_item_class'      => $rs->fry_tabsType == 'Start' ? $GLOBALS['TL_CONFIG']['accessible_tabs_first_nav_item_class'] : null,
                        'accessible_tabs_last_nav_item_class'       => $rs->fry_tabsType == 'Start' ? $GLOBALS['TL_CONFIG']['accessible_tabs_last_nav_item_class'] : null,
                        'accessible_tabs_clearfix_class'            => $rs->fry_tabsType == 'Start' ? $GLOBALS['TL_CONFIG']['accessible_tabs_clearfix'] : null,
                        'accessible_tabs_title'                     => $rs->fry_tabTitle, //
                        'accessible_tabs_anchor'                    => $rs->fry_tabAnchor, //
                        'accessible_tabs_css_class_available'       => $rs->fry_tabsType == 'Start' ? $GLOBALS['TL_CONFIG']['accessible_tabs_css_class_available'] : null,
                        'accessible_tabs_wrap_inner_nav_links'      => $rs->fry_tabsType == 'Start' ? $GLOBALS['TL_CONFIG']['accessible_tabs_wrap_inner_nav_links'] : null,
                        'accessible_tabs_sync_height_method_name'   => $rs->fry_tabsType == 'Start' ? $GLOBALS['TL_CONFIG']['accessible_tabs_sync_height_method_name'] : null,
                    );

                    $this->DB->prepare($query)->set($set)->execute($rs->id);
                }
            }
        }
    }

}

$runonce = new AccessibleTabsRunonce();
$runonce->run();