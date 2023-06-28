<?php

namespace CustomSimpleList;

/**
 * @package template-simple-list-0.0.1
 * 
 * Plugin Name: Template Simple List
 * Plugin URI: http://stevekanger.com
 * Description: Simple plugin for a custom list of items
 * Version: 0.0.1
 * Author: Steve Kanger
 * Author URI: https://stevekanger.com
 * License: GPLv2 or later
 * Text Domain: template-simple-list-0.0.1
 * 
 * */


const PLUGINROOT = __FILE__;

// Utils
require 'utils/write_log.php';
require 'utils/get_table_name.php';
require 'utils/get_items.php';

// Includes
require 'inc/activate.php';
require 'inc/list_table.php';
require 'inc/admin_menu.php';
require 'inc/list_page_handler.php';
require 'inc/form_page_handler.php';
require 'inc/form_meta_box_handler.php';
require 'inc/validate_form_submission.php';

// Language support
require 'lang/language_support.php';
