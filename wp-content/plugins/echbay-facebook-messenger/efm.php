<?php
/**
* Plugin Name: EchBay Facebook Messenger
* Description: Add Facebook messenger box or another widget chat to your website (tawk.to, subiz.vn). Easily custom your style for chat box.
* Plugin URI: https://www.facebook.com/groups/wordpresseb
* Plugin Facebook page: https://www.facebook.com/webgiare.org
* Author: Dao Quoc Dai
* Author URI: https://www.facebook.com/ech.bay/
* Version: 1.1.5
* Text Domain: echbayefm
* Domain Path: /languages/
* License: GPLv2 or later
*/
if (! defined ( 'ABSPATH' )) {
exit ();
}
define ( 'EFM_DF_VERSION', '1.1.5' );
define ( 'EFM_DF_DIR', dirname ( __FILE__ ) . '/' );
define ( 'EFM_THIS_PLUGIN_NAME', 'EchBay Facebook Messenger' );
if ( ! defined ( 'EBP_GLOBAL_PLUGINS_SLUG_NAME' ) ) {
define ( 'EBP_GLOBAL_PLUGINS_SLUG_NAME', 'echbay-plugins-menu' );
define ( 'EBP_GLOBAL_PLUGINS_MENU_NAME', 'Webgiare Plugins' );
define ( 'EFM_ADD_TO_SUB_MENU', false );
}
else {
define ( 'EFM_ADD_TO_SUB_MENU', true );
}
/*
* class.php
*/
if (! class_exists ( 'EFM_Actions_Module' )) {
class EFM_Actions_Module {
/*
* config
*/
var $default_setting = array (
'license' => '',
'hide_powered' => 1,
'delay_time' => 3000,
'widget_width' => 320,
'header_bg' => '#0084FF',
'header_text' => '#FFFFFF',
'widget_position' => 'br',
'fb_link' => '',
'fb_app_id' => '',
'zalo_id' => '',
'zalo_hello' => 'Rất vui khi được hỗ trợ bạn!',
'subiz_id' => '',
'tawk_id' => '',
'uhchat_id' => '',
'widget_title' => 'Support Online',
'widget_mobile_title' => 'Chat',
'custom_style' => '/* Custom CSS */',
'desktop_theme' => 'full',
'mobile_theme' => 'full',
'show_bubble' => 'no',
'bubble_bg_colors' => '#669900',
'bubble_colors' => '#FFFFFF',
'bubble_content' => 'Chat live with an agent now!',
'time_show' => 'box',
'time_out' => 'show',
'mon_time_am' => '',
'mon_time_am' => '',
'tue_time_am' => '',
'tue_time_pm' => '',
'wed_time_am' => '',
'wed_time_pm' => '',
'thu_time_am' => '',
'thu_time_pm' => '',
'fri_time_am' => '',
'fri_time_pm' => '',
'sat_time_am' => '',
'sat_time_pm' => '',
'sun_time_am' => '',
'sun_time_pm' => '',
'fbchat_content' => 'facebook'
);
var $custom_setting = array ();
var $eb_plugin_media_version = EFM_DF_VERSION;
var $eb_plugin_prefix_option = '___efm___';
var $eb_plugin_root_dir = '';
var $eb_plugin_url = '';
var $eb_plugin_nonce = '';
var $eb_plugin_admin_dir = 'wp-admin';
var $web_link = '';
/*
* begin
*/
function load() {
/*
* test in localhost
*/
/*
if ( $_SERVER['HTTP_HOST'] == 'localhost:8888' ) {
$this->eb_plugin_media_version = time();
}
*/
/*
* Check and set config value
*/
$this->eb_plugin_root_dir = basename ( EFM_DF_DIR );
$this->eb_plugin_media_version = filemtime( EFM_DF_DIR . 'style.css' );
$this->eb_plugin_url = plugins_url () . '/' . $this->eb_plugin_root_dir . '/';
$this->eb_plugin_nonce = $this->eb_plugin_root_dir . EFM_DF_VERSION;
$this->default_setting ['widget_height'] = $this->default_setting ['widget_width'];
if ( defined ( 'WP_ADMIN_DIR' ) ) {
$this->eb_plugin_admin_dir = WP_ADMIN_DIR;
}
/*
* Load custom value
*/
$this->get_op ();
}
function get_op() {
global $wpdb;
$pref = $this->eb_plugin_prefix_option;
$sql = $wpdb->get_results ( "SELECT option_name, option_value
FROM
`" . $wpdb->options . "`
WHERE
option_name LIKE '{$pref}%'
ORDER BY
option_id", OBJECT );
foreach ( $sql as $v ) {
$this->custom_setting [str_replace ( $this->eb_plugin_prefix_option, '', $v->option_name )] = $v->option_value;
}
/*
* https://codex.wordpress.org/Validating_Sanitizing_and_Escaping_User_Data
*/
foreach ( $this->default_setting as $k => $v ) {
if (! isset ( $this->custom_setting [$k] )
|| $this->custom_setting [$k] == ''
|| $this->custom_setting [$k] == '0') {
$this->custom_setting [$k] = $v;
}
}
foreach ( $this->custom_setting as $k => $v ) {
if ( $k == 'custom_style' ) {
$v = esc_textarea( $v );
}
else if ( $k == 'fb_link' ) {
$v = esc_url( $v );
}
else {
$v = esc_html( $v );
}
$this->custom_setting [$k] = $v;
}
if ( $this->custom_setting['fb_link'] == '' ) {
}
}
function ck($v1, $v2, $e = ' checked') {
if ($v1 == $v2) {
return $e;
}
return '';
}
function get_web_link () {
if ( $this->web_link != '' ) {
return $this->web_link;
}
if ( defined('WP_SITEURL') ) {
$this->web_link = WP_SITEURL;
}
else if ( defined('WP_HOME') ) {
$this->web_link = WP_HOME;
}
else {
$this->web_link = get_option ( 'siteurl' );
}
$this->web_link = explode( '/', $this->web_link );
$this->web_link[2] = $_SERVER['HTTP_HOST'];
$this->web_link = implode( '/', $this->web_link );
if ( substr( $this->web_link, -1 ) == '/' ) {
$this->web_link = substr( $this->web_link, 0, -1 );
}
return $this->web_link;
}
function update() {
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset( $_POST['_ebnonce'] )) {
if( ! wp_verify_nonce( $_POST['_ebnonce'], $this->eb_plugin_nonce ) ) {
wp_die('404 not found!');
}
foreach ( $_POST as $k => $v ) {
if (substr ( $k, 0, 5 ) == '_efm_') {
$key = $this->eb_plugin_prefix_option . substr ( $k, 5 );
delete_option ( $key );
if ( $k == '_efm_widget_width'
|| $k == '_efm_widget_height' ) {
$v = (int) $v;
}
else {
$v = stripslashes ( stripslashes ( stripslashes ( $v ) ) );
$v = strip_tags( $v );
$v = sanitize_text_field( $v );
}
add_option( $key, $v, '', 'no' );
}
}
die ( '<script>
alert("Update done!");
</script>' );
} // end if POST
}
function admin() {
$arr_position = array (
"tr" => 'Top Right',
"tl" => 'Top Left',
"br" => 'Bottom Right',
"bl" => 'Bottom Left'
);
$str_position = '';
foreach ( $arr_position as $k => $v ) {
$str_position .= '<option value="' . $k . '"' . $this->ck ( $this->custom_setting ['widget_position'], $k, ' selected' ) . '>' . $v . '</option>';
}
$this->eb_plugin_media_version = time();
$this->get_web_link();
$main = file_get_contents ( EFM_DF_DIR . 'admin.html', 1 );
$main = $this->template ( $main, $this->custom_setting + array (
'_ebnonce' => wp_create_nonce( $this->eb_plugin_nonce ),
'str_position' => $str_position,
'min_desktop_widget' => $this->ck ( $this->custom_setting ['desktop_theme'], 'min' ),
'full_desktop_widget' => $this->ck ( $this->custom_setting ['desktop_theme'], 'full' ),
'min_mobile_widget' => $this->ck ( $this->custom_setting ['mobile_theme'], 'min' ),
'full_mobile_widget' => $this->ck ( $this->custom_setting ['mobile_theme'], 'full' ),
'check_show_bubble' => $this->ck ( $this->custom_setting ['show_bubble'], 'no' ),
'box_time_show' => $this->ck ( $this->custom_setting ['time_show'], 'box' ),
'time_time_show' => $this->ck ( $this->custom_setting ['time_show'], 'time' ),
'form_time_show' => $this->ck ( $this->custom_setting ['time_show'], 'form' ),
'show_time_out' => $this->ck ( $this->custom_setting ['time_out'], 'show' ),
'hide_time_out' => $this->ck ( $this->custom_setting ['time_out'], 'hide' ),
'efm_plugin_url' => $this->eb_plugin_url,
'efm_plugin_version' => $this->eb_plugin_media_version,
) );
$main = $this->template ( $main, $this->default_setting, 'aaa' );
echo $main;
echo '<p>* Other <a href="' . $this->web_link . '/' . $this->eb_plugin_admin_dir . '/plugin-install.php?s=itvn9online&tab=search&type=author" target="_blank">WordPress Plugins</a> written by the same author. Thanks for choose us!</p>';
}
function deline ( $str, $reg = "/\r\n|\n\r|\n|\r|\t/i", $re = "" ) {
$a = explode( "\n", $str );
$str = '';
foreach ( $a as $v ) {
$v = trim( $v );
if ( $v != '' ) {
if ( strstr( $v, '//' ) == true ) {
$v .= "\n";
}
$str .= $v;
}
}
return $str;
return preg_replace( $reg, $re, $str );
}
function time_delay ( $str, $script_name = '', $script_var = '' ) {
echo $this->deline( trim( '
<!-- Start of ' . $script_name . ' Script (by ' . EFM_THIS_PLUGIN_NAME . ') -->
<script>var EFM_time_for_delay=' . $this->custom_setting ['delay_time'] . ';</script>
<script src="' . $this->eb_plugin_url . $str . '.js?v=' . $this->eb_plugin_media_version . '" async></script>
<!-- End of ' . $script_name . ' Script -->
' ) );
}
function guest() {
if ( $this->custom_setting ['zalo_id'] != '' ) {
$autopopup = ceil( $this->custom_setting ['delay_time']/ 1000 );
echo '<div class="zalo-chat-widget" data-oaid="' . $this->custom_setting ['zalo_id'] . '" data-welcome-message="' . $this->custom_setting['zalo_hello'] . '" data-autopopup="' . $autopopup . '" data-width="' . $this->custom_setting['widget_width'] . '" data-height="' . $this->custom_setting['widget_height'] . '"></div>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>';
return true;
}
else if ( $this->custom_setting ['subiz_id'] != '' ) {
echo '<script>var EFM_subiz_account_id="' . $this->custom_setting ['subiz_id'] . '";</script>';
$this->time_delay( 'js_subiz', 'SuBiz.com' );
return true;
}
else if ( $this->custom_setting ['tawk_id'] != '' ) {
echo '<script>var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(), EFM_tawk_account_id="' . $this->custom_setting ['tawk_id'] . '";</script>';
$this->time_delay( 'js_tawk', 'Tawk.to', '' );
return true;
}
else if ( $this->custom_setting ['uhchat_id'] != '' ) {
echo '<script src="https://uhchat.net/code.php?f=' . $this->custom_setting ['uhchat_id'] . '">';
return true;
}
else if ( $this->custom_setting['fb_link'] == '' ) {
echo '<!-- ' . EFM_THIS_PLUGIN_NAME . ' has been active, but URL facebook page is NULL -->';
return false;
}
$efm_custom_css = str_replace( ';}', '}', $this->deline( trim ( '
#echbay_fb_ms,
#echbay_fb_ms .echbay-fbchat-2title {
/* max-width: ' . $this->custom_setting ['widget_width'] . 'px; */
width: ' . $this->custom_setting ['widget_width'] . 'px;
}
#echbay_fb_ms .echbay-fbchat-text-title,
#echbay_fb_ms .echbay-fbchat-mobile-title {
background-color: ' . $this->custom_setting ['header_bg'] . ';
color: ' . $this->custom_setting ['header_text'] . ';
}
#echbay_fb_ms .eb-facebook-square,
#echbay_fb_ms .eb-chat-square {
color: ' . $this->custom_setting ['header_bg'] . ';
background-color: ' . $this->custom_setting ['header_text'] . ';
}
#echbay_fb_ms.echbay-fbchat-active .echbay-fbchat-content {
height: ' . $this->custom_setting ['widget_height'] . 'px;
}
' ) ) ) .
trim ( $this->custom_setting ['custom_style'] );
$main = file_get_contents ( EFM_DF_DIR . 'guest.html', 1 );
$form = file_get_contents ( EFM_DF_DIR . $this->custom_setting['fbchat_content'] . '.html', 1 );
$main = $this->template ( $main, array (
'html_fbchat_content' => $form,
) );
echo '<script>var EFM_custom_fb_app_id="' . $this->custom_setting['fb_app_id'] . '";</script>';
echo $this->template ( $main, $this->custom_setting + array (
'bloginfo_name' => get_bloginfo( 'name' ),
'efm_custom_css' => '<style type="text/css">' . $efm_custom_css . '</style>',
'efm_plugin_url' => $this->eb_plugin_url,
'efm_plugin_version' => $this->eb_plugin_media_version,
) );
}
function template($temp, $val = array(), $tmp = 'tmp') {
foreach ( $val as $k => $v ) {
$temp = str_replace ( '{' . $tmp . '.' . $k . '}', $v, $temp );
}
return $temp;
}
} // end my class
} // end check class exist
/*
* Show in admin
*/
function EFM_show_setting_form_in_admin() {
global $EFM_func;
$EFM_func->update ();
$EFM_func->admin ();
}
function EFM_add_menu_setting_to_admin_menu() {
if ( ! current_user_can('manage_options') )  {
return false;
}
$a = EFM_THIS_PLUGIN_NAME;
if ( EFM_ADD_TO_SUB_MENU == false ) {
add_menu_page( $a, EBP_GLOBAL_PLUGINS_MENU_NAME, 'manage_options', EBP_GLOBAL_PLUGINS_SLUG_NAME, 'EFM_show_setting_form_in_admin', NULL, 99 );
}
add_submenu_page( EBP_GLOBAL_PLUGINS_SLUG_NAME, $a, trim( str_replace( 'EchBay', '', $a ) ), 'manage_options', strtolower( str_replace( ' ', '-', $a ) ), 'EFM_show_setting_form_in_admin' );
}
/*
* Show in theme
*/
function EFM_show_facebook_messenger_box_in_site() {
global $EFM_func;
$EFM_func->guest ();
}
function EFM_plugin_settings_link ($links) {
$settings_link = '<a href="admin.php?page=' . strtolower( str_replace( ' ', '-', EFM_THIS_PLUGIN_NAME ) ) . '">Settings</a>';
array_unshift($links, $settings_link);
return $links;
}
$EFM_func = new EFM_Actions_Module ();
$EFM_func->load ();
if (is_admin ()) {
add_action ( 'admin_menu', 'EFM_add_menu_setting_to_admin_menu' );
if ( strstr( $_SERVER['REQUEST_URI'], 'plugins.php' ) == true ) {
$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'EFM_plugin_settings_link' );
}
}
else {
add_action ( 'wp_footer', 'EFM_show_facebook_messenger_box_in_site' );
}