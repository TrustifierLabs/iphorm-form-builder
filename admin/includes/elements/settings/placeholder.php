<?php if (!defined('IPHORM_VERSION')) exit; ?><tr valign="top">
    <th scope="row">
        <div class="ifb-tooltip"><div class="ifb-tooltip-content">
            <?php esc_html_e('The placeholder text will appear inside the field until the user starts to type.', 'iphorm'); ?>
        </div></div>
        <label for="placeholder_<?php echo $id; ?>"><?php esc_html_e('Placeholder', 'iphorm'); ?></label>
    </th>
    <td>
        <input type="text" id="placeholder_<?php echo $id; ?>" name="placeholder_<?php echo $id; ?>" value="<?php echo iphorm_escape($element['placeholder']); ?>" onkeyup="iPhorm.updatePlaceholder(iPhorm.getElementById(<?php echo $id; ?>));" onblur="iPhorm.updatePlaceholder(iPhorm.getElementById(<?php echo $id; ?>));" />
    </td>
</tr>