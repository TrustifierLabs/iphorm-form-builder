<?php
if (!defined('IPHORM_VERSION')) exit;
$id = absint($element['id']);
$groupStartElement = iphorm_get_element_config($id - 1, $form);
$name = isset($groupStartElement['admin_title']) ? $groupStartElement['admin_title'] : __('New', 'iphorm');
?>
<div id="ifb-element-wrap-<?php echo $id; ?>" class="ifb-element-wrap ifb-element-wrap-groupend">
    <div class="ifb-top-element-wrap qfb-cf">
        <?php include IPHORM_ADMIN_INCLUDES_DIR . '/elements/_actions.php'; ?>
        <div class="ifb-element-preview ifb-element-preview-groupend">
            	<div class="ifb-group-end">
                    <span class="ifb-group-end-text"><?php printf(esc_html__('End of group: %s', 'iphorm'), '<span class="ifb-group-end-name">' . $name . '</span>'); ?></span>
                </div>
            <span class="ifb-handle"></span>
        </div>
    </div>
</div>