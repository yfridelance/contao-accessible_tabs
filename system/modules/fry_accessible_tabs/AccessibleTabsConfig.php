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
 * Class AccessibleTabsConfig
 *
 * @copyright  Yves Fridelance 2013
 * @author     Yves Fridelance <yves@fridelance.ch>
 * @package    AccessibleTabs
 */
class AccessibleTabsConfig extends Config
{

    /**
     * Current object instance (Singleton)
     * @var object
     */
    protected static $objInstance;

    /**
     * The config object
     * @var Config
     */
    protected $Config;

    /**
     * Modified
     * @var bool
     */
    protected $blnAccessibleTabsIsModified = false;

    /**
     * @var string
     */
    protected $strAccessibleTabsTop;

    /**
     * @var string
     */
    protected $strAccessibleTabsBottom;

    /**
     * @var array
     */
    protected $arrAccessibleTabsData;


    /**
     * Prevent direct instantiation (Singleton)
     */
    protected function __construct()
    {
        $this->Config = Config::getInstance();
    }

    /**
     * Save the local configuration
     */
    public function __destruct()
    {
        if(!$this->blnAccessibleTabsIsModified)
        {
            return;
        }
        $this->save();
    }

    /**
     * Return the current object instance (Singleton)
     * @return AccessibleTabsConfig
     */
    public static function getInstance()
    {
        if(!self::$objInstance)
        {
            self::$objInstance = new AccessibleTabsConfig();
            self::$objInstance->initialize();
        }
        return self::$objInstance;
    }

    /**
     * Load accessible tabs configuration file
     */
    protected function initialize()
    {
        $strFile = TL_ROOT . '/system/config/accessible_tabs.php';

        /**
         * On new installations, the config file does not exists!
         */
        if(!is_file($strFile))
        {
            return;
        }

        // Read the accessible tabs configuration file
        $strMode = 'top';
        $resFile = fopen($strFile, 'rb');

        while(!feof($resFile))
        {
            $strLine = fgets($resFile);
            $strTrim = trim($strLine);

            if ($strTrim == '?>') continue;

            if ($strTrim == '### INSTALL SCRIPT START ###')
            {
                $strMode = 'data';
                continue;
            }

            if ($strTrim == '### INSTALL SCRIPT STOP ###')
            {
                $strMode = 'bottom';
                continue;
            }

            if ($strMode == 'top')
            {
                $this->strAccessibleTabsTop .= $strLine;
            }
            elseif ($strMode == 'bottom')
            {
                $this->strAccessibleTabsBottom .= $strLine;
            }
            elseif ($strTrim != '')
            {
                $arrChunks = array_map('trim', explode('=', $strLine, 2));
                $this->arrAccessibleTabsData[$arrChunks[0]] = $arrChunks[1];

                // unescape values
                if (preg_match('#^\$GLOBALS\[\'TL_CONFIG\'\]\[\'(accessible_tabs_[^\']+)\'\]$#', $arrChunks[0], $m))
                {
                    $GLOBALS['TL_CONFIG'][$m[1]] = $this->unescape($GLOBALS['TL_CONFIG'][$m[1]]);
                }
            }
        }

        fclose($resFile);
    }

    /**
     * Save the local configuration file
     */
    public function save()
    {
        $this->strAccessibleTabsTop     = trim($this->strAccessibleTabsTop);
        $this->strAccessibleTabsBottom  = trim($this->strAccessibleTabsBottom);

        if(!$this->strAccessibleTabsTop)    $this->strAccessibleTabsTop = '<?php';
        if(!$this->strAccessibleTabsBottom) $this->strAccessibleTabsBottom = '';

        $strFile  = $this->strAccessibleTabsTop . "\n\n";
        $strFile .= "### INSTALL SCRIPT START ###\n";

        foreach($this->arrAccessibleTabsData as $k=>$v)
        {
            $strFile .= "$k = $v\n";
        }
        $strFile .= "### INSTALL SCRIPT STOP ###\n\n";

        if($this->strAccessibleTabsBottom != '') $strFile .= $this->strAccessibleTabsBottom . "\n\n";

        $strTemp = md5(uniqid(mt_rand(), true));

        // write first to a temp file
        $objFile = fopen(TL_ROOT . '/system/tmp/' . $strTemp, 'wb');
        fputs($objFile,$strFile);
        fclose($objFile);

        // Move current file
        $strFile = 'system/config/accessible_tabs.php';
        if (file_exists(TL_ROOT . '/' . $strFile)) {
            $objFile = new File($strFile);
            $this->Files->rename($strFile, 'system/config/accessible_tabs.' . $objFile->mtime . '.php');
        }

        // Then move the file to its final destination
        $this->Files->rename('system/tmp/' . $strTemp, 'system/config/accessible_tabs.php');


    }

    public function get($strKey)
    {
        if (preg_match('#^\$GLOBALS\[\'TL_CONFIG\'\]\[\'accessible_tabs_[^\']+\'\]$#', $strKey))
        {
            return $this->arrAccessibleTabsData[$strKey];
        }
        else
        {
            return $this->Config->get($strKey);
        }
    }

    /**
     * Add a configuration variable to the local configuration file
     * @param string $strKey
     * @param mixed $varValue
     */
    public function add($strKey, $varValue)
    {
        if (preg_match('#^\$GLOBALS\[\'TL_CONFIG\'\]\[\'accessible_tabs_[^\']+\'\]$#', $strKey))
        {
            $this->blnAccessibleTabsIsModified = true;
            $this->Files = Files::getInstance(); // Required in the destructor

            if(is_bool($varValue))
            {
                $this->arrAccessibleTabsData[$strKey] = $varValue ? true . ';' : 0 . ';';
            }
            else
            {
                $this->arrAccessibleTabsData[$strKey] = $this->escape($varValue) . ';';
            }

        }
        else
        {
            $this->Config->add($strKey, $varValue);
        }
    }

    /**
     * Delete a configuration variable from the local configuration file
     * @param string $strKey
     */
    public function delete($strKey)
    {
        if (preg_match('#^\$GLOBALS\[\'TL_CONFIG\'\]\[\'accessible_tabs_[^\']+\'\]$#', $strKey))
        {
            $this->blnAccessibleTabsIsModified = true;
            $this->Files = Files::getInstance(); // Required in the destructor
            unset($this->arrAccessibleTabsData[$strKey]);
        }
        else
        {
            $this->Config->delete($strKey);
        }
    }

    /**
     * escape
     * @param mixed $varValue
     * @return mixed
     */
    public function escape($varValue)
    {
        return parent::escape(str_replace(array("\n", "\t"), array('\\n', '\\t'), $varValue));
    }

    /**
     * unescape
     * @param $varValue
     * @return mixed
     */
    public function unescape($varValue)
    {
        return str_replace(array('\\n', '\\t'), array("\n", "\t"), $varValue);
    }
}