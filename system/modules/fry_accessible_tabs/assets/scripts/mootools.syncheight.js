/**
 * Copyright (c) 2010, must art
 *All rights reserved.
 *
 *
 *This program is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @copyright  must art 2010
 * @author     Jan Philipp Pietrzyk <programming@must-art.de>
 * @package    
 * @license    LGPL
 *
 * Version 1.1
 *
 * CHANGELOG
 *		-v1.1 makes use of Element Measure from MooTools More
 *
 * Based on jquery.syncheight by Dirk Ginader (ginader.de) at http://blog.ginader.de/dev/syncheight/
 *
 * Just instantiate the Class with a goup of elements or a selector and submit as optional parameter
 * whether you want updates bases on window-resizing.
 * example: var resizer = new SyncHeight('div.columns', {updateOnResize: false});
 *
 * you can also initiate the update process by resizer.syncNow();
 *
 * WARNING: Every height attribute given as a inline style can be overridden, depending on the browser.
*/

var SyncHeight = new Class({
	Implements: [Options],
	browser_id: 0,
	property: [
				['min-height', '0px'],
				['height', '1%']
	],
	options: {
		updateOnResize: false	
	},
	initialize: function(elements ,options) {
		this.setOptions(options);
		this.elements = $$(elements);
		
		if(Browser.Engine.trident4) {
			this.browser_id =1;
		}

		this.syncNow();
		
		if(this.options.updateOnResize == true) {
			var boundResizer = function(){this.syncNow(); };
			boundResizer = boundResizer.bind(this);
			$(window).addEvent('resize', boundResizer);
		}
		return this;
	},
	syncNow: function() {
		//$$elements = $$(this.elements);
		var max=0;
		
		this.elements.each(function($el){
			$el.setStyle(this.property[this.browser_id][0], this.property[this.browser_id][1]);
			var val = $el.measure(function(){return this.getSize().y;});
			if(val > max) {
				max = val;
			}
		},this);
		this.elements.each(function($el) {
			$el.setStyle(this.property[this.browser_id][0], max+'px');
		}, this);
		
		return this;
	
	}
});