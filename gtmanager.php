<?php
/*
Plugin Name: Google Tag Manager
Plugin URI: http://wordpress.org/extend/plugins/googleanalytics/
Description: Enables <a href="http://www.google.com/tagmanager/" target="_blank">Google Tag Manager</a> on all pages.
Version: 1.0.6
Author: Justin Rains
Author URI: https://justinrains.com/google-tag-manager-wordpress-plugin/
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_gt() {
  add_option('tag_id', 'GTM-xxxxxxxxx');
}

function deactive_gt() {
  delete_option('tag_id');
}

function admin_init_gtmanager() {
  register_setting('gtmanager', 'tag_id');
}

function admin_menu_gtmanager() {
  add_options_page('GT Manager', 'GT Manager', 'manage_options', 'gtmanager', 'options_page_gtmanager');
}

function options_page_gtmanager() {
  include(WP_PLUGIN_DIR.'/simple-google-tag-manager/options.php');  
}

function gtmanagerhead() {
  $tag_id = get_option('tag_id');
?>
<!-- GT Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-<?php echo $tag_id ?>');</script>
<!-- End GT Manager -->
<?php
}

function gtmanagerbody() {
  $tag_id = get_option('tag_id');
?>
<!-- GT Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-<?php echo $tag_id ?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End GTag Manager (noscript) -->
<?php
}

register_activation_hook(__FILE__, 'activate_gtmanager');
register_deactivation_hook(__FILE__, 'deactive_gtmanager');

if (is_admin()) {
  add_action('admin_init', 'admin_init_gtmanager');
  add_action('admin_menu', 'admin_menu_gtmanager');
}

add_action('body_open', 'gtmanagerbody');
add_action('wp_head', 'gtmanagerhead');
?>
