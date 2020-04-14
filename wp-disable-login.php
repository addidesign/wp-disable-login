<?php
/**
 * WP Disable Login
 *
 * Plugin Name: WP Disable Login
 * Plugin URI:  https://wordpress.org/plugins/classic-editor/
 * Description: Add options to disable the default WP login
 * Version:     1
 * Author:      Adam Ward
 * Author URI:  https://addidesign.com
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

if (! defined('ABSPATH')) {
    die('Invalid request.');
}

add_filter('login_message', 'disabled_login_message');
add_action('wp_login', 'disable_login', 10, 2);

function disabled_login_message($message)
{
    $message = '<div id="login_error">Login is temporarily disabled.</div>';
    return $message;
}

function disable_login()
{
    wp_clear_auth_cookie();
    return null;
}
