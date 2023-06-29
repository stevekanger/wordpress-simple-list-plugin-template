<?php

namespace CustomSimpleList\lang;

use const CustomSimpleList\PLUGINROOT;

function language_support() {
    load_plugin_textdomain('template-simple-list-0.0.1', false, dirname(plugin_basename(PLUGINROOT)));
}
add_action('init', __NAMESPACE__ . '\language_support');
