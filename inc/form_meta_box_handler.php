<?php

namespace CustomSimpleList\inc;

function form_meta_box_handler($item) {
?>

    <table cellspacing="2" cellpadding="5" style="width: 100%;" class="form-table">
        <tbody>
            <tr class="form-field">
                <th valign="top" scope="row">
                    <label for="name"><?php _e('Title', 'template-simple-list-0.0.1') ?></label>
                </th>
                <td>
                    <input id="title" name="title" type="text" style="width: 95%" value="<?php echo esc_attr($item['title']) ?>" size="50" class="code" placeholder="<?php _e('Title', 'template-simple-list-0.0.1') ?>" required>
                </td>
            </tr>
            <tr class="form-field">
                <th valign="top" scope="row">

                    <label for="description"><?php _e('Description', 'template-simple-list-0.0.1') ?></label>
                </th>
                <td>
                    <textarea id="description" name="description" style="width: 95%; min-height: 10rem" placeholder="<?php _e('Description', 'template-simple-list-0.0.1') ?>" required><?php echo $item['description']; ?></textarea>
                </td>
            </tr>
        </tbody>
    </table>
<?php
}
