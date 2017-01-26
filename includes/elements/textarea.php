<?php if (!defined('IPHORM_VERSION')) exit; ?><div class="iphorm-element-wrap iphorm-element-wrap-textarea <?php echo $name; ?>-element-wrap iphorm-clearfix iphorm-labels-<?php echo $labelPlacement; ?> <?php echo ($element->getRequired()) ? 'iphorm-element-required' : 'iphorm-element-optional'; ?>" <?php echo $element->getCss('outer'); ?>>
    <div class="iphorm-element-spacer iphorm-element-spacer-textarea <?php echo $name; ?>-element-spacer">
        <?php echo $element->getLabelHtml($tooltipType, $tooltipEvent, $labelCss); ?>
        <div class="iphorm-input-wrap iphorm-input-wrap-textarea <?php echo $name; ?>-input-wrap" <?php echo $element->getCss('inner', $leftMarginCss); ?>>
            <textarea class="iphorm-element-textarea <?php echo $tooltipInputClass; ?> <?php echo $name; ?>" id="<?php echo esc_attr($uniqueId); ?>" name="<?php echo $name; ?>" <?php echo $tooltipTitle; ?> <?php echo $element->getCss('textarea'); ?> rows="5" cols="25"<?php echo strlen($placeholder = $element->getPlaceholder()) ? ' placeholder="' . iphorm_escape($placeholder) . '"' : ''; ?>><?php echo esc_html($element->getValue()); ?></textarea>
            <?php include IPHORM_INCLUDES_DIR . '/elements/_description.php'; ?>
        </div>
        <?php include IPHORM_INCLUDES_DIR . '/elements/_errors.php'; ?>
    </div>
    <?php include IPHORM_INCLUDES_DIR . '/elements/_clear-default-value.php'; ?>
</div>