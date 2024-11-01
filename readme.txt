=== Manager for Google Tags ===
Contributors: justinrains
Tags: javascript, tagmanager, analytics
Donate link: https://paypal.me/justinrains
Requires at least: 2.7
Tested up to: 5.7.1
Stable tag: 1.0.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Enables Manager for Google Tags on all pages.

== Description ==

This plugin adds the required javascript for Manager for Google Tags.

==For more information visit==

[Manager for Google Tags](http://portalplanet.net/wordpress-themes-plugins/google-tag-manager/)

== Installation ==

1. Upload the `simple-google-tag-manager` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the tag ID from Manager for Google Tags (GTM-XXXXXX) to the settings (Admin > Settings > Google Tag Manager)

To get this to work one final step is required. Edit where your theme creates the <body> tag and right after that place this code:
<?php do_action( 'body_open' ); ?>

Mine was in header.php

== Screenshots ==

1. Modified settings panel with GT.
2. Manager for Google Tags page.

== Frequently Asked Questions ==
=Is there a page on the authors site for this plugin? =
Yes there is please go [here](http://portalplanet.net/wordpress-themes-plugins/google-tag-manager/)
= How do I get started using Manager for Google Tags? =
Go to [Manager for Google Tags](http://www.google.com/tagmanager)

