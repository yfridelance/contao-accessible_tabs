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
 * Class DCA_TL_Accessible_Tabs
 *
 * @copyright  Yves Fridelance 2013
 * @author     Yves Fridelance <yves@fridelance.ch>
 * @package    AccessibleTabs
 */
class DCA_TL_Accessible_Tabs extends Backend
{

    /**
     * DCA_TL_Accessible_Tabs Instance (Singletone)
     * @var object
     */
    protected static $objInstance;


    protected function __construct()
    {
        $this->import('AccessibleTabsConfig', 'Config');
    }

    /**
     * @return void
     */
    public function onload()
    {
        $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/accessible_tabs/assets/scripts/be.js';
    }


    /**
     * @return DCA_TL_Accessible_Tabs|object
     */
    public static function getInstance()
    {
        if(!self::$objInstance)
        {
            self::$objInstance = new DCA_TL_Accessible_Tabs();
        }
        return self::$objInstance;
    }


    /**
     * JQuery available
     * @return bool
     */
    public function jqueryAvailable()
    {
        if(version_compare(VERSION,'3','<'))
        {
            if(!in_array('usejquery', $this->Config->getActiveModules()))
            {
                return false;
            }
        }
        return true;
    }


    /**
     * Load settings
     */
    public function loadSettings($strPresets,$reload = true)
    {
        if (isset($GLOBALS['TL_ACCESSIBLE_TABS_DEFAULTS'][$strPresets]))
        {
            $this->import('AccessibleTabsConfig', 'Config', true);

            foreach ($GLOBALS['TL_ACCESSIBLE_TABS_DEFAULTS'][$strPresets] as $k=>$v)
            {
                if (preg_match('#^accessible_tabs_#', $k))
                {
                    $strKey = sprintf("\$GLOBALS['TL_CONFIG']['%s']", $k);
                    $this->Config->update($strKey, is_array($v) ? serialize($v) : $v);
                }
            }
            $_SESSION['TL_INFO'][] = sprintf($GLOBALS['TL_LANG']['tl_accessible_tabs']['loadSettings'], $strPresets);
            if($reload) $this->reload();
        }
    }

    /**
     * @return array
     */
    public function previousOptions()
    {
        $arrOptions = array();
        $objIterator = new RegexIterator(new DirectoryIterator(TL_ROOT . '/system/config'), '#^accessible_tabs\.\d+\.php$#');
        foreach ($objIterator as $strFile)
        {
            $intTime = intval(substr($strFile, 16, -4));
            $arrOptions[$intTime] = $this->parseDate('d.m.Y - H:i:s', $intTime);
        }
        krsort($arrOptions);
        return $arrOptions;
    }

    /**
     * Load previous version
     */
    public function loadPrevious($intPrevious)
    {
        $strFile = 'system/config/accessible_tabs.' . $intPrevious . '.php';
        if (file_exists(TL_ROOT . '/' . $strFile))
        {
            $this->import('Files');

            // Move current file
            $objFile = new File('system/config/accessible_tabs.php');
            $this->Files->rename('system/config/accessible_tabs.php', 'system/config/accessible_tabs.' . $objFile->mtime . '.php');

            // Copy previous file
            $this->Files->copy($strFile, 'system/config/accessible_tabs.php');

            $_SESSION['TL_INFO'][] = sprintf($GLOBALS['TL_LANG']['tl_accessible_tabs']['loadPrevious'], $this->parseDate('d.m.Y - H:i:s', $intPrevious));

            $this->reload();
        }
    }

    /**
     * @return array fxOptions
     */
    public function fxOptions()
    {
        $arrOptions = array('show');
        if($this->jqueryAvailable())
        {
            $arrOptions[] = 'fadeIn';
            $arrOptions[] = 'slideDown';
        }
        return $arrOptions;
    }

    /**
     * @param string varValue
     * @param DataContainer $dc
     * @return string varValue
     */
    public function getUniqueTabID($varValue, DataContainer $dc)
    {
        if($varValue == null)
        {
            $varValue = uniqid('tab_');
        }
        return $varValue;
    }

    public function tabheadOptions()
    {
        if($GLOBALS['TL_ACCESSIBLE_TABS_ALLOWED']['accessible_tabs_tabhead'])
        {
            return $GLOBALS['TL_ACCESSIBLE_TABS_ALLOWED']['accessible_tabs_tabhead'];
        }
        return array('h1','h2','h3','h4','h5','h6');
    }


}