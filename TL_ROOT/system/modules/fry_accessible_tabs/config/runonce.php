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

namespace FRY;
/**
 * Class FryAccessibleTabsRunonceJob
 *
 * Front end content element "AccessibleTabs".
 * @copyright  Yves Fridelance 2014
 * @author     Yves Fridelance <yves.fridelance@me.com>
 * @package    fry_accessible_tabs
 */
class FryAccessibleTabsRunonceJob extends \Controller {

    public function _construct()
    {
        parent::__construct();

    }

    public function run()
    {
        if(version_compare(VERSION, '2.8', '>'))
        {

            $this->import('Database');
            if($this->Database->tableExists('tl_content'))
            {

                if($this->Database->fieldExists('accessible_tabs_type','tl_content'))
                {

                    $this->Database->prepare("UPDATE `tl_content` SET type=? WHERE accessible_tabs_type=?")
                                   ->execute('accessible_tabs_start','Start');
                    $this->Database->prepare("UPDATE `tl_content` SET type=? WHERE accessible_tabs_type=?")
                                   ->execute('accessible_tabs_stop','Stop');
                    $this->Database->prepare("UPDATE `tl_content` SET type=? WHERE accessible_tabs_type=?")
                                   ->execute('accessible_tabs_separator','Add');
                }

                if($this->Database->fieldExists('accessible_tabs_tabbody','tl_content'))
                {
                    $objDS = $this->Database->prepare("SELECT id,accessible_tabs_tabbody FROM tl_content WHERE accessible_tabs_tabbody <>''")->execute();

                    while($objDS->next())
                    {
                        if($objDS->accessible_tabs_tabbody)
                        {
                            $tabbody = str_replace('.','',$objDS->accessible_tabs_tabbody);
                            $this->Database->prepare("UPDATE `tl_content` SET accessible_tabs_tabbody=? WHERE id=?")->execute($tabbody, $objDS->id);
                        }
                    }
                }
            }
        }
    }
}
$objFryAccessibleTabsRunonceJob = new FryAccessibleTabsRunonceJob();
$objFryAccessibleTabsRunonceJob->run();