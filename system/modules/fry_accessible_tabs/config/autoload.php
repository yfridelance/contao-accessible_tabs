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
 * Register the classes
 */

if(version_compare(VERSION < '3.1')) {
    ClassLoader::addClasses(array
    (
        'DC_File_AccessibleTabs'        => 'system/drivers/DC_File_AccessibleTabs.php',
        'DCA_TL_Accessible_Tabs'        => 'system/modules/fry_accessible_tabs/DCA_TL_Accessible_Tabs.php',
        'AccessibleTabsConfig'          => 'system/modules/fry_accessible_tabs/AccessibleTabsConfig.php',
        'AccessibleTabsContent'         => 'system/modules/fry_accessible_tabs/AccessibleTabsContent.php',
        'AccessibleTabsDS'              => 'system/modules/fry_accessible_tabs/AccessibleTabsDS.php',
        'AccessibleTabsElementDS'       => 'system/modules/fry_accessible_tabs/AccessibleTabsElementDS.php',
    ));
} else {
    ClassLoader::addClasses(array
    (
        'DC_File_AccessibleTabs'        => 'system/drivers/DC_File_AccessibleTabs.php',
        'DCA_TL_Accessible_Tabs'        => 'system/modules/fry_accessible_tabs/DCA_TL_Accessible_Tabs.php',
        'AccessibleTabsConfig'          => 'system/modules/fry_accessible_tabs/classes/AccessibleTabsConfig.php',
        'AccessibleTabsContent'         => 'system/modules/fry_accessible_tabs/AccessibleTabsContent.php',
        'AccessibleTabsDS'              => 'system/modules/fry_accessible_tabs/AccessibleTabsDS.php',
        'AccessibleTabsElementDS'       => 'system/modules/fry_accessible_tabs/AccessibleTabsElementDS.php',
    ));
}


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    'ce_accessible_tabs'            => 'system/modules/fry_accessible_tabs/templates',
    'ce_accessible_tabs_wrapper'    => 'system/modules/fry_accessible_tabs/templates',

    // JS Templates
    'j_accessible_tabs'             => 'system/modules/fry_accessible_tabs/templates',
    'moo_accessible_tabs'           => 'system/modules/fry_accessible_tabs/templates',
));
