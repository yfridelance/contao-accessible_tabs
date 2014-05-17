Accessible Tabs for Contao
==========================

About
-----

Accessible Tabs uses a very simple and flexible HTML markup as it's base to build upon.
All it needs it's a wrapper containing Headlines and content elements one after the
other. This provides a nice non-javascript fallback that does not look like something is
missing or broken.

**So, why is this Tabs-Script more accessible than others?**

The main thing this Script does better than the others is providing a click feedback for
Screenreader Users. When the user clicks on one of the tabs there's actually a navigation
going on on the page.

 * english article: http://blog.ginader.de/archives/2009/02/07/jQuery-Accessible-Tabs-How-to-make-tabs-REALLY-accessible.php
 * german article: http://blog.ginader.de/archives/2009/02/07/jQuery-Accessible-Tabs-Wie-man-Tabs-WIRKLICH-zugaenglich-macht.php

Use Accessible Tabs
-------------------

 * Configure the default Settings in the Accessible Tabs Module (System/Accessible Tabs). You can Load predefined configuration sets. Alternate is it possible to configure each class manual. Please note. If you not use JQUERY then you can not access all settings.
 * Generate a new Content Element from the type 'Umschlag (Beginn)'.
 * Generate for each Tab a new Content Element from the type 'neues Tab'.
 * Last but not least generate a new Content Element from the type 'Umschlag (End)'.


System Compatibility
--------------------

 * Contao 3.0.6
 * Mootools / JQuery


Update from a older Version
----------------------------

Its important to run the install tool after manual updates! the fry_accessible_tabs folder will be removed automatically...


Thanks
------

 * Dirk Ginader: ginader.de
 * Dirk Jesse: yaml.de
 * Must Art