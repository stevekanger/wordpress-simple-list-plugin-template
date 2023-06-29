<?php

namespace CustomSimpleList\inc;

function list_page_handler() {
    $table = new List_Table();
    $table->prepare_items();

    $message = '';
    if ('delete' === $table->current_action()) {
        $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Items deleted: %d', 'template-simple-list-0.0.1'), count($_REQUEST['id'])) . '</p></div>';
    }
?>
    <div class="wrap">
        <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
        <h2><?php _e('Custom Items', 'template-simple-list-0.0.1') ?> <a class="add-new-h2" href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=custom-items-form'); ?>"><?php _e('Add new', 'template-simple-list-0.0.1') ?></a>
        </h2>
        <?php echo $message; ?>

        <form id="custom-items-table" method="GET">
            <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
            <?php $table->display() ?>
        </form>
    </div>
<?php
}
