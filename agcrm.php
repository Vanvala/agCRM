<?php
/** 
 *Plugin name: Ag CRM
 * Plugin URI:        https://agbuda.by/agcrm/
 * Description:       Плагин для организации предприятия.
 * Version:           1.0
 * Requires at least: 5.9.2
 * Requires PHP:      7.3
 * Author:            Igor Shtyk
 * Author URI:        https://vanvala.wordpress.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       agcrm
 * Domain Path:       /lang
 * 
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

 if (! defined('ABSPATH')){
     die;
 }
# defined('ABSPATH') || exit;

# Вывод пункта меню
 function agcrm_show_nav_item(){
    add_menu_page( 
        esc_html__( 'Wellcome to plugin page', 'agcrm' ),
        esc_html__('AgCRM options','agcrm'),
        'manage_options',
        'agcrm-options',
        'agcrm_show_content',
        'dashicons-groups',
        11
    );
 }
 
 add_action('admin_menu', 'agcrm_show_nav_item');
// подгрузка языковых пакетов
function agcrm_load_plugin_textdomain(){
    load_plugin_textdomain('agcrm', FALSE, basename( dirname(__FILE__)) .'/lang/' );
}
add_action('plugin_loaded', 'agcrm_load_plugin_textdomain');

// вывод тела страницы
 function agcrm_show_content() {
     _e( 'Hello', 'agcrm'); # translation

     echo '<br>' . esc_html__('First', 'agcrm');
 }

 // регистрация скриптов
function agcrm_register_assets(){
    wp_register_style( 'agcrm_styles', plugins_url( 'assets/css/admin.css', __FILE__ ));
    wp_register_script( 'agcrm_scripts', plugins_url( 'assets/js/admin.js', __FILE__ ));
}
add_action('admin_enqueue_scripts', 'agcrm_register_assets');
 // подключение скриптов и стилей
 function agcrm_load_assets($hook){

     if($hook != 'toplevel_page_agcrm-options'){
         return;
     }

     wp_enqueue_style( 'agcrm_styles' );
     wp_enqueue_script( 'agcrm_scripts' );
 }
 add_action('admin_enqueue_scripts', 'agcrm_load_assets');