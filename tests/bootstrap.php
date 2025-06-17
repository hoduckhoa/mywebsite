<?php
if (!function_exists('add_shortcode')) {
    function add_shortcode($tag, $callback) {}
}
if (!function_exists('add_filter')) {
    function add_filter($tag, $callback, $priority = 10, $accepted_args = 1) {}
}
require_once __DIR__ . '/../wp-content/plugins/qk-custom-functions/custom-functions.php';

