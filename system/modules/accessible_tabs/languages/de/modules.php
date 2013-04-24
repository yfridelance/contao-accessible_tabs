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
 * Back end modules
 */
$GLOBALS['TL_LANG']['MOD']['accessible_tabs'] = array('Accessible Tabs', 'Zugängliche Tabs');

/**
 * general
 */
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabhead'][0]                   = 'Header Tag';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabhead'][1]                   = 'Wählen sie das korespondierende Header Tag aus.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_position'][0]                  = 'Positionierung';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_position'][1]                  = 'Legen sie die Position des Listen-Elementes im Markup fest.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_sync_heights'][0]              = 'Höhe Synchronisieren';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_sync_heights'][1]              = 'Aktiviert das SyncHeights Plugin.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_save_state'][0]                = 'Zustand Speichern';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_save_state'][1]                = 'Zustand wird in einem Cookie gespeichert.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_auto_anchor'][0]               = 'Verlinkbare Tabs';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_auto_anchor'][1]               = 'Ermöglicht das direkte anspringen eines Tabs über einen Link.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_pagination'][0]                = 'Umbruch';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_pagination'][1]                = 'Aktiviert das Pagination Plugin.';

/**
 * Fx
 */
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_fx'][0]                        = 'Animation';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_fx'][1]                        = 'Übergangsefekt.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_fxspeed'][0]                   = 'Animationsdauer';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_fxspeed'][1]                   = 'Dauer der Animation.';

/**
 * Selectors
 */
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_wrapper_class'][0]             = 'Wrapper Class';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_wrapper_class'][1]             = 'Css Klasse: wrapperClass.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_current_class'][0]             = 'Current Class';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_current_class'][1]             = 'Css Klasse: currentClass.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabhead_class'][0]             = 'Tabhead Class';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabhead_class'][1]             = 'Css Klasse: tabheadClass.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabbody'][0]                   = 'Tabbody Selektor';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabbody'][1]                   = 'Jegliche gültigen css selektoren sind erlaubt.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabs_list_class'][0]           = 'Listen Klasse';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_tabs_list_class'][1]           = 'Klasse des dynamisch generierten UL Tags.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_first_nav_item_class'][0]      = 'Klasse des ersten Tabs';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_first_nav_item_class'][1]      = 'Defineiert die Klasse des ersten Tabs.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_last_nav_item_class'][0]       = 'Klasse des letzten Tabs';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_last_nav_item_class'][1]       = 'Defineiert die Klasse des letzten Tabs.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_clearfix_class'][0]            = 'Clearfix Klasse';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_clearfix_class'][1]            = 'Definiert die clearfix Klasse.';

/**
 * Misc
 */
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_css_class_available'][0]       = 'Jedem Tab eine Klasse zuweisen';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_css_class_available'][1]       = 'Weist jedem einzelnen Tab eine CSS Klasse zu.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_wrap_inner_nav_links'][0]      = 'Wrap Inner Nav Links';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_wrap_inner_nav_links'][1]      = 'Siehe JQuery Dokumentation.';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_sync_height_method_name'][0]   = 'Syncheight Methode';
$GLOBALS['TL_LANG']['tl_accessible_tabs']['accessible_tabs_sync_height_method_name'][1]   = 'Definiert die SyncHeight Methode.';

 
