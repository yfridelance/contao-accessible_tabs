<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package   fry_accessible_tabs
 * @author    Yves Fridelance <yves.fridelance@me.com>;
 * @license   GNU/LGPL
 * @copyright Y. Fridelance 2014
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
    'FRY',
));

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
    //'DC_File_AccessibleTabs'        => 'system/drivers/DC_File_AccessibleTabs.php',

    'FRY\ContentAccessibleTabsStart'        => 'system/modules/fry_accessible_tabs/elements/ContentAccessibleTabsStart.php',
    'FRY\ContentAccessibleTabsSeparator'    => 'system/modules/fry_accessible_tabs/elements/ContentAccessibleTabsSeparator.php',
    'FRY\ContentAccessibleTabsStop'         => 'system/modules/fry_accessible_tabs/elements/ContentAccessibleTabsStop.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    'ce_accessible_tabs_start'      => 'system/modules/fry_accessible_tabs/templates/elements',
    'ce_accessible_tabs_separator'  => 'system/modules/fry_accessible_tabs/templates/elements',
    'ce_accessible_tabs_stop'       => 'system/modules/fry_accessible_tabs/templates/elements',
    'j_accessible_tabs'             => 'system/modules/fry_accessible_tabs/templates/jquery',
    'moo_accessible_tabs'           => 'system/modules/fry_accessible_tabs/templates/mootools',
));
