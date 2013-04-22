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
 * Class AccessibleTabsSingleTabGroup
 *
 * @copyright  Yves Fridelance 2013
 * @author     Yves Fridelance <yves@fridelance.ch>
 * @package    AccessibleTabs
 */
class AccessibleTabsElementDS
{

    /**
     * @var string strId
     */
    protected $strId;

    /**
     * @var array arrData
     */
    protected $arrData;


    protected $firstItem = true;


    /**
     * @return string
     */
    public function getId()
    {
        return $this->strId;
    }

    /**
     * @param string $strId
     */
    public function setId($strId)
    {
        $this->strId = $strId;
    }

    /**
     * @param null $strKey
     * @return string || array
     */
    public function getData($strKey = null)
    {
        if($strKey)
        {
            return $this->arrData[$strKey];
        }
        return $this->arrData;
    }

    /**
     * @param $strKey
     * @param $varValue
     */
    public function setData($strKey,$varValue)
    {
        $this->arrData[$strKey] = $varValue;
    }

    public function isFirstItem()
    {
        return $this->firstItem;
    }

    public function setThisFirst($bool)
    {
        $this->firstItem = $bool;
    }

}