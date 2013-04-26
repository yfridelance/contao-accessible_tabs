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
 * Version 1.0.1
 *
 * Changelog
 *   - removed option slideOut -> Buggy (v1.0.1)
 *
 *
 * Based on the incredible jquery.tabs v1.5 by Dirk Ginader (ginader.de) at http://github.com/ginader/Accessible-Tabs
 *
 * ToDo: 
 * - Check intended Behaviour for Key-Listener (Bug in original Class?)
 * - original script did NOT make it possible to use selector as tabhead 
 * 
 *
*/

/*depending on mootoolsmore is no good idea, so we do this manually*/
if(!$defined(Element.show) && !$defined(Element.hide)) {
	Element.implement({
		show: function() {this.setStyle('display', ''); return this;},
		hide: function() {this.setStyle('display', 'none'); return this;}
	});
}

/*The Class itself*/
var AccessibleTabs = new Class({
	Implements: [Options, Events],
    // cursor key codes
    /*
    	backspace  	8
    	tab 	9
    	enter 	13
    	shift 	16
    	ctrl 	17
    	alt 	18
    	pause/break 	19
    	caps lock 	20
    	escape 	27
    	page up 	33
    	page down 	34
    	end 	35
    	home 	36
    	left arrow 	37
    	up arrow 	38
    	right arrow 	39
    	down arrow 	40
    	insert 	45
    	delete 	46
    */
    keyCodes : {
    	37 : -1, //LEFT
        38 : -1, //UP
        39 : +1, //RIGHT 
        40 : +1 //DOWN
    },
	/*Mooved out of the global namespace*/
	debug: function debug(msg){
        if(this.options.debug && window.console && window.console.log){
            window.console.log(msg);
        }
    },
	options: {
       wrapperClass: 'content', // Classname to apply to the div that is wrapped around the original Markup
       currentClass: 'current', // Classname to apply to the LI of the selected Tab
       tabhead: 'h4', // Tag or valid Query Selector of the Elements to Transform the Tabs-Navigation from (originals are removed)
       tabbody: '.tabbody', // Tag or valid Query Selector of the Elements to be treated as the Tab Body
       fx:'show', // can be "fadeIn", "slideDown", "show"
       fxspeed: 'normal', // speed (String|Number): "short", "normal", or "long") or the number of milliseconds to run the animation
       currentInfoText: 'current tab: ', // text to indicate for screenreaders which tab is the current one
       currentInfoPosition: 'prepend', // Definition where to insert the Info Text. Can be either "prepend" or "append"
       currentInfoClass: 'current-info', // Class to apply to the span wrapping the CurrentInfoText
       tabsListClass:'tabs-list', // Class to apply to the generated list of tabs above the content
       syncheights:false, // syncs the heights of the tab contents when the SyncHeight plugin is available http://blog.ginader.de/dev/jquery/syncheight/index.php
       syncHeightsClassName:'SyncHeight', // set the Method name of the plugin you want to use to sync the tab contents. Defaults to the SyncHeight plugin: http://github.com/ginader/syncHeight
       debug: true, //generate Debug Output to firebug console
       clearfixClass:'clearfix',
       onHideContent: $empty, //add your own hdie animations do other clean-up stuff, heck you could even make a ajax call
       onShowContent: $empty //add your own show animations do other clean-up stuff, heck you could even make a ajax call
	},
	getUniqueId: function(p){
            return p + new Date().getTime();
    },
	initialize: function(container, options){
		var $elements = this.elements = $$(container);
		this.setOptions(options);
		/*Eat your own doogfood: the fxoptions are implemented as events*/
		switch(options.fx) {
			case 'fadeIn': 
				this.addEvent('showContent', function(event) {
					event.preventDefault();
					event.contentElement.setStyle('opacity', 0).show().get('tween', {property: 'opacity', duration: this.options.fxspeed}).start(1);//tween('opacity', 1);
				});	
				break;
			case 'slideDown':
				/*Also MootoolsMore dependent, default to 'show'*/
				if($defined(Fx.Slide)) {
				//	this.addEvent('showContent', function(event){
						//alert('slide');
				//		event.preventDefault();
				//		event.contentElement.set('slide', {duration: this.options.fxspeed});
				//		event.contentElement.getParent().slide('hide');
				//		event.contentElement.getParent().slide('out');
				//	});
				}
				break;
		}
		/*just to cover multiple Tabs-Navigations in one instance*/
		$elements.each(function($el) {		
			this.makeElement($el);
		}, this)
		return this;
					
	},
	makeElement: function($el) {
			$el = document.id($el);
			var self = this,
				tabCount = 0,
				contentAnchor = self.getUniqueId('accessibletabscontent'),
				tabsAnchor = self.getUniqueId('accessibletabs'),
				$innerWrap = new Element('div', {'class': this.options.wrapperClass}),
				$$list = [],
				$currentSpan = new Element('span', {'class': this.options.currentInfoClass, 'text': this.options.currentInfoText}),
				$$containerChildren = $el.getChildren(),
				firstText,
				tabheadTagName;

			$innerWrap.inject($el, 'top');
			$innerWrap.adopt($$containerChildren);
			
			$el.getElements(self.options.tabhead).each(function($tabhead, index){
				var id = '';
				tabheadTagName = $tabhead.get('tag');
				$$list[index] = new Element('li').adopt(new Element('a',{'href': '#'+contentAnchor, 'text': $tabhead.get('text')}));
				if(index === 0){
					$$list[index].getFirst().set('id', tabsAnchor);
					firstText = $$list[index].getFirst().get('text');
				}
				$tabhead.dispose();
				tabCount++;
			});
			
			var $list = new Element('ul', {'class': self.options.clearfixClass+' '+self.options.tabsListClass+' tabamount'+tabCount}).adopt($$list);
			$list.inject($el, 'top');
			$el.getElements(self.options.tabbody).each(function(tabbody, index){
				if(index != 0) { tabbody.hide(); }
			});
			$innerWrap.grab(
				new Element(tabheadTagName).grab(
					new Element('a', {'tabindex': '0', 
								'class':'accessibletabsanchor', 
								'name':contentAnchor, 
								'id': contentAnchor, 
								'text': firstText}))
			, 'top');

			$el.getElement('ul').getChildren()[0].addClass(self.options.currentClass).getChildren('a')[0].grab($currentSpan, (self.options.currentInfoPosition == 'prepend') ? 'top' : 'bottom');
			var $contentAnchor = $(contentAnchor);
			
			
			if(self.options.syncheights && self.options.syncHeightsClassName) {
				new window[self.options.syncHeightsClassName]($el.getElements(self.options.tabbody));
			}
			

			$el.getElements('ul.'+self.options.tabsListClass+'>li>a').each(function($a, index){
				$a.addEvent('click', function(event) {
					var oldCurrent = 0;
					
					oldCurrent = $el.getElement('ul.'+self.options.tabsListClass+' li.'+self.options.currentClass).removeClass(self.options.currentClass).getAllPrevious().length

					$currentSpan.dispose();
					$a.blur();

					var customEvent = {
						contentElement: $el.getElements(self.options.tabbody)[oldCurrent],
						tabsElement: $el,
						pd: false,
						preventDefault: function() {this.pD = true;}
					};

					self.fireEvent('hideContent', customEvent);
					if(!customEvent.pd) {
						customEvent.contentElement.hide();
					}
					customEvent.pd = false;
					customEvent.contentElement = $el.getElements(self.options.tabbody)[index];					
					self.fireEvent('showContent', customEvent);
					if(!customEvent.pd) {
						customEvent.contentElement.show();
					}
					
					var keyEventFunc = function(event) {
							if(self.keyCodes[event.code]) {
								self.showAccessibleTab(index+self.keyCodes[event.code], $el);
								$contentAnchor.removeEvents('keyup');
								self.debug(index);
							}
						}
					$contentAnchor.set({'text': $a.get('text')});
					$contentAnchor.focus();
					$contentAnchor.addEvent('keyup', keyEventFunc);
					
					$a.grab($currentSpan, (self.options.currentInfoPosition == 'prepend') ? 'top' : 'bottom').getParent().addClass(self.options.currentClass);

					return false;
				});
				
				var keyUpFunc = function(event) {
					$(document).addEvent('keyup', function(event){
						if(self.keyCodes[event.code]) {
							self.showAccessibleTab(index+self.keyCodes[event.code], $el);
						}
					});
				}
				$a.addEvent('focus', keyUpFunc);
			
				$a.addEvent('blur', function(event) {
					$(document).removeEvents('keyup');
				});
			
			});
			
			return self;

	},
    showAccessibleTab: function(index, $el){
            $el = document.id($el);
            this.debug('showAccessibleTab');
            this.debug(index);
  			var $links = $el.getElements('ul.'+this.options.tabsListClass+' li a');
  			if(index < 0) {
  				$links[0].fireEvent('click');
  			} else if(index >= $links.length) {
  				$links[$links.length-1].fireEvent('click');
  			} else {
  				$links[index].fireEvent('click');
  			}
  			return this;
    }
});
