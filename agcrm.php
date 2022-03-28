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
 */
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
// вывод тела страницы
 function agcrm_show_content() {
     echo 'Hello';
 }