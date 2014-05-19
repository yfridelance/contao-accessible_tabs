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
 * Class ContentAccessibleTabsSeparator
 *
 * Front end content element "accordion".
 * @copyright  Yves Fridelance 2014
 * @author     Yves Fridelance <yves.fridelance@me.com>
 * @package    fry_accessible_tabs
 */
class ContentAccessibleTabsSeparator extends \ContentElement {

    protected $strTemplate = 'ce_accessible_tabs_separator';

    public static $boolFirstItem    = false;
    public static $strTabhead       = '';
    public static $strTabbody       = '';

    protected function compile() {


        if(TL_MODE == 'FE') {

            $this->Template = new \FrontendTemplate($this->strTemplate);
            $this->Template->firstItem  = self::$boolFirstItem;
            $this->Template->tabhead    = self::$strTabhead;
            $this->Template->tabbody    = self::$strTabbody;
            $this->Template->tabtitle   = $this->accessible_tabs_title;
            $this->Template->id         = $this->accessible_tabs_anchor;

            if(self::$boolFirstItem)
                self::$boolFirstItem = false;

        } else {

            $this->strTemplate = 'be_wildcard';
            $this->Template = new \BackendTemplate($this->strTemplate);
            $this->Template->wildcard   = "> ".$this->accessible_tabs_title;

        }

    }

}