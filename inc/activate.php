<?php

namespace CustomSimpleList\inc;

use function CustomSimpleList\utils\get_table_name;
use const CustomSimpleList\PLUGINROOT;

function activate() {
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  $new_table = get_table_name();

  $sql = "CREATE TABLE " . $new_table . " (
      id int(11) NOT NULL AUTO_INCREMENT,
      title tinytext NOT NULL,
      description text NOT NULL,
      status tinytext NOT NULL,
      PRIMARY KEY  (id)
    );";

  maybe_create_table($new_table, $sql);
}

register_activation_hook(PLUGINROOT, __NAMESPACE__ . '\activate');
