<?php

namespace CustomSimpleList\Inc;

function admin_menu() {
    add_menu_page(
        __(
            'Custom Items',
            'custom-simple-list'
        ), // Page title
        __(
            'Custom Items',
            'custom-simple-list'
        ), // Menu title
        'activate_plugins', // The capability required for this menu to be displayed to the user
        'custom-items', // Menu slug
        __NAMESPACE__ . '\list_page_handler' // The function to be called to output the content for this page
    );
    add_submenu_page(
        'custom-items', // Parent slug
        __(
            'Custom Items',
            'custom-simple-list'
        ), // Page title
        __(
            'Custom Items',
            'custom-simple-list'
        ), // Menu title
        'activate_plugins',  // The capability required for this menu to be displayed to the user
        'custom-items', // Menu slug
        __NAMESPACE__ . '\list_page_handler' // The function to be called to output the content for this page
    );
    add_submenu_page(
        'custom-items', // Parent slug
        __(
            'Add new',
            'custom-simple-list'
        ), // Page title
        __(
            'Add new',
            'custom-simple-list'
        ), // Menu title
        'activate_plugins',  // The capability required for this menu to be displayed to the user
        'custom-items-form', // Menu slug
        __NAMESPACE__ . '\form_page_handler' // The function to be called to output the content for this page
    );
}
add_action('admin_menu', __NAMESPACE__ . '\admin_menu');
