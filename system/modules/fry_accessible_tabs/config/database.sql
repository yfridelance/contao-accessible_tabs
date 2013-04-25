CREATE TABLE `tl_content` (
	`accessible_tabs_type` varchar(32) NOT NULL default '',
	`accessible_tabs_tabhead` varchar(2) NULL default '',
	`accessible_tabs_position` varchar(32) NULL default '',
	`accessible_tabs_sync_heights` char(1) NULL default '',
	`accessible_tabs_save_state` char(1) NULL default '',
	`accessible_tabs_auto_anchor` char(1) NULL default '',
	`accessible_tabs_pagination` char(1) NULL default '',
	`accessible_tabs_fx` varchar(32) NULL default '',
	`accessible_tabs_fxspeed` varchar(32) NULL default '',
	`accessible_tabs_wrapper_class` varchar(32) NULL default '',
	`accessible_tabs_current_class` varchar(32) NULL default '',
	`accessible_tabs_tabhead_class` varchar(32) NULL default '',
	`accessible_tabs_tabbody` varchar(32) NULL default '',
	`accessible_tabs_tabs_list_class` varchar(32) NULL default '',
	`accessible_tabs_first_nav_item_class` varchar(32) NULL default '',
	`accessible_tabs_last_nav_item_class` varchar(32) NULL default '',
	`accessible_tabs_clearfix_class` varchar(32) NULL default '',
	`accessible_tabs_title` varchar(255) NULL default '',
	`accessible_tabs_anchor` varchar(255) NULL default '',
	`accessible_tabs_css_class_available` char(1) NULL default '',
	`accessible_tabs_wrap_inner_nav_links` char(1) NULL default '',
	`accessible_tabs_sync_height_method_name` varchar(32) NULL default '',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;