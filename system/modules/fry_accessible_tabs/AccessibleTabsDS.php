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
 * Class AccessibleTabsDS
 *
 * @copyright  Yves Fridelance 2013
 * @author     Yves Fridelance <yves@fridelance.ch>
 * @package    AccessibleTabs
 */
class AccessibleTabsDS 
{

    /**
     * Instance of AccessibleTabsDS (Singletone)
     * @var object
     */
    protected static $objInstance;

    /**
     * @var bool
     */
    protected $enableSyncHeight;

    /**
     * @var bool
     */
    protected $enableCookiePlugin;

    /**
     * @var array
     */
    protected $arrTabElementDS = array();

    /**
     * @var bool
     */
    protected $boolLook = false;

    /**
     * @var string
     */
    protected $strTabhead;



    public static function getInstance()
    {
        if(!self::$objInstance)
        {
            self::$objInstance = new AccessibleTabsDS();
        }
        return self::$objInstance;
    }

    /**
     * @return bool
     */
    public function getEnableSyncHeight()
    {
        return $this->enableSyncHeight;
    }

    /**
     * @param bool enableSyncHeight
     */
    public function setEnableSyncHeight($enableSyncHeight)
    {
        $this->enableSyncHeight = $enableSyncHeight;
    }

    /**
     * @return bool
     */
    public function getEnableCookiePlugin()
    {
        return $this->enableCookiePlugin;
    }

    /**
     * @param bool enableCookiePlugin
     */
    public function setEnableCookiePlugin($enableCookiePlugin)
    {
        $this->enableCookiePlugin = $enableCookiePlugin;
    }

    /**
     * @return AccessibleTabsElementDS
     */
    public function getTabElementDS()
    {
        if(!$this->boolLook)
        {
            array_unshift($this->arrTabElementDS, new AccessibleTabsElementDS());
        }

        $this->boolLook = true;
        return $this->arrTabElementDS[0];

    }


    /**
     * @return string
     */
    public function getTabhead()
    {
        return $this->strTabhead;
    }

    /**
     * @param string $strTabhead
     */
    public function setTabhead($strTabhead)
    {
        $this->strTabhead = $strTabhead;
    }

    /**
     * @return bool
     */
    public function isLook()
    {
        return $this->boolLook;
    }

    /**
     * void
     */
    public function unLook()
    {
        $this->boolLook = false;
    }

    /**
     * @param array $arrOptions
     * @return string
     */
    public function toString($arrOptions)
    {
        $strOptions = '';

        foreach($arrOptions as $k => $v)
        {
            if(is_bool($v) || $v == '0' || $v == '1')
            {
                $v = $v == true ? 'true' : 'false';
            }

            $k = substr($k,16,strlen($k));

            $arrKey = explode('_',$k);

            $i = 0;

            foreach($arrKey as $string)
            {
                if($i == 0)
                {
                    $k = $string;
                }
                else
                {
                    $k .= ucfirst($string);
                }
                $i++;
            }

            $strOptions .= "$k: '$v',\n";
        }
        return substr($strOptions,0,-2);
    }

    public function getJsTemplate($use_jquery = true)
    {
        $arrJsTemplate = array();

        if($use_jquery)
        {
            $jsLib = 'jquery';
        }
        else
        {
            $jsLib = 'mootools';
        }
        $defaults = $GLOBALS['TL_ACCESSIBLE_TABS_DEFAULTS'][$jsLib];

        foreach($this->arrTabElementDS as $ds)
        {
            $arrOptions = $ds->getData();
            foreach($arrOptions as $k => $v)
            {
                if($defaults[$k] == $v)
                {
                    unset($arrOptions[$k]);
                }
            }

            $arrJsTemplate[] = array(
                'id' => $ds->getId(),
                'data'  => $this->toString($arrOptions),
            );
        }

        $GLOBALS['TL_JAVASCRIPT'][] = '/system/modules/fry_accessible_tabs/assets/scripts/' . $jsLib . '.tabs.js';
        if($this->enableSyncHeight)
        {
            $GLOBALS['TL_JAVASCRIPT'][] = '/system/modules/fry_accessible_tabs/assets/scripts/' . $jsLib . '.syncheight.js';
        }
        if($this->enableCookiePlugin && $jsLib == 'jquery')
        {
            $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/fry_accessible_tabs/assets/scripts/' . $jsLib . '.cookie.js';
        }

        return $arrJsTemplate;
    }

}