<?php if (!defined('IPHORM_VERSION')) exit; ?>
<tr valign="top">
    <th scope="row">
        <div class="ifb-tooltip"><div class="ifb-tooltip-content">
            <?php esc_html_e('The unique identifier, you may need this for advanced functions.', 'iphorm'); ?>
        </div></div>
        <label><?php esc_html_e('Unique ID', 'iphorm'); ?></label>
    </th>
    <td>
        <div class="ifb-hide-if-new-form ifb-unique-id-wrap">iphorm_<span class="ifb-update-form-id"><?php echo $form['id']; ?></span>_<?php echo $element['id']; ?></div>
        <div class="ifb-show-if-new-form">
            <div class="ifb-info-message"><span class="ifb-info-message-icon"></span><?php esc_html_e('Please save the form to see the unique element ID.', 'iphorm'); ?></div>
        </div>
    </td>
</tr>