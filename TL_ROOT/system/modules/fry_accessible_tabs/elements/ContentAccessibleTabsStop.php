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
class ContentAccessibleTabsStop extends \ContentElement {

    protected $strTemplate = 'ce_accessible_tabs_stop';

    protected function compile() {

        if(TL_MODE == 'FE') {

            //Frontend
            $this->Template = new \FrontendTemplate($this->strTemplate);


        } else {

            $this->strTemplate = 'be_wildcard';
            $this->Template = new \BackendTemplate($this->strTemplate);
            $this->Template->wildcard   = strtoupper('### Accessible Tabs: Wrapper Stop ###');
        }


    }


}