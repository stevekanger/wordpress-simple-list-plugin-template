<?php

namespace CustomSimpleList;

use function CustomSimpleList\utils\get_table_name;

function get_items() {
    global $wpdb;
    $table_name = get_table_name();

    $results = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name ORDER BY 'id' ASC"), ARRAY_A);
    return $results;
}
