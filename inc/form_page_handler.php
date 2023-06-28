<?php

namespace CustomSimpleList\Inc;

use function CustomSimpleList\Utils\get_table_name;

function form_page_handler() {
    global $wpdb;
    $table_name = get_table_name();

    $message = '';
    $notice = '';

    // this is default $item which will be used for new records
    $default = array(
        'id' => 0,
        'title' => '',
        'description' => '',
    );

    // here we are verifying does this request is post back and have correct nonce
    if (isset($_REQUEST['nonce']) && wp_verify_nonce($_REQUEST['nonce'], basename(__FILE__))) {
        // combine our default item with request params
        $item = shortcode_atts($default, $_REQUEST);
        // validate data, and if all ok save item to database
        // if id is zero insert otherwise update
        $item_valid = validate_form_submission($item);
        if ($item_valid === true) {
            if ($item['id'] == 0) {
                $result = $wpdb->insert($table_name, $item);
                $item['id'] = $wpdb->insert_id;
                if ($result) {
                    $message = __('Item was successfully saved', 'template-simple-list-0.0.1');
                } else {
                    $notice = __('There was an error while saving item', 'template-simple-list-0.0.1');
                }
            } else {
                $result = $wpdb->update($table_name, $item, array('id' => $item['id']));
                if ($result) {
                    $message = __('Item was successfully updated', 'template-simple-list-0.0.1');
                } else {
                    $notice = __('There was an error while updating item', 'template-simple-list-0.0.1');
                }
            }
        } else {
            // if $item_valid not true it contains error message(s)
            $notice = $item_valid;
        }
    } else {
        // if this is not post back we load item to edit or give new one to create
        $item = $default;
        if (isset($_REQUEST['id'])) {
            $item = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $_REQUEST['id']), ARRAY_A);
            if (!$item) {
                $item = $default;
                $notice = __('Item not found', 'template-simple-list-0.0.1');
            }
        }
    }

    // here we adding our custom meta box
    add_meta_box(
        'template-simple-list-0.0.1-meta-box', // Meta box ID (used in the 'id' attribute for the meta box).
        'Custom List Item', // Title of the meta box
        __NAMESPACE__ . '\form_meta_box_handler', // Function that fills the box with the desired content. The function should echo its output.
        'custom-items', // screen id to show the meta box
        'normal', // The context within the screen where the box should display.
        'default' // The priority within the context where the box should show.
    );

?>
    <div class="wrap">
        <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
        <h2><?php _e('Custom Item', 'template-simple-list-0.0.1') ?> <a class="add-new-h2" href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=custom-items'); ?>"><?php _e('back to list', 'cltd_example') ?></a>
        </h2>

        <?php if (!empty($notice)) : ?>
            <div id="notice" class="error">
                <p><?php echo $notice ?></p>
            </div>
        <?php endif; ?>
        <?php if (!empty($message)) : ?>
            <div id="message" class="updated">
                <p><?php echo $message ?></p>
            </div>
        <?php endif; ?>

        <form id="form" method="POST">
            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__)) ?>" />
            <?php /* NOTICE: here we storing id to determine will be item added or updated */ ?>
            <input type="hidden" name="id" value="<?php echo $item['id'] ?>" />

            <div class="metabox-holder" id="poststuff">
                <div id="post-body">
                    <div id="post-body-content">
                        <?php /* And here we call our custom meta box */ ?>
                        <?php do_meta_boxes('custom-items', 'normal', $item); ?>
                        <input type="submit" value="<?php _e('Save', 'template-simple-list-0.0.1') ?>" id="submit" class="button-primary" name="submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php
}
