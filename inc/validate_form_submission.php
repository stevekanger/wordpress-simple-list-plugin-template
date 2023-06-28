<?php

namespace CustomSimpleList\Inc;

function validate_form_submission($item) {
    $messages = array();

    if (empty($item['title'])) $messages[] = __('Title is required', 'template-simple-list-0.0.1');
    if (empty($item['description'])) $messages[] = __('Description is required', 'template-simple-list-0.0.1');
    if (empty($messages)) return true;
    return implode('<br />', $messages);
}
