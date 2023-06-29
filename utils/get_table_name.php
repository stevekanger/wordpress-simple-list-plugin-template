<?php

namespace CustomSimpleList\utils;

function get_table_name() {
    global $wpdb;
    return $wpdb->prefix . 'template_simple_list';
}
