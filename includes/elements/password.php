<?php if (!defined('IPHORM_VERSION')) exit; ?><div class="iphorm-element-wrap iphorm-element-wrap-password <?php echo $name; ?>-element-wrap iphorm-clearfix iphorm-labels-<?php echo $labelPlacement; ?> <?php echo ($element->getRequired()) ? 'iphorm-element-required' : 'iphorm-element-optional'; ?>" <?php echo $element->getCss('outer'); ?>>
    <div class="iphorm-element-spacer iphorm-element-spacer-password <?php echo $name; ?>-element-spacer">
        <?php echo $element->getLabelHtml($tooltipType, $tooltipEvent, $labelCss); ?>
        <div class="iphorm-input-wrap iphorm-input-wrap-password <?php echo $name; ?>-input-wrap" <?php echo $element->getCss('inner', $leftMarginCss); ?>>
            <input class="iphorm-element-password <?php echo $tooltipInputClass; ?> <?php echo $name; ?>" id="<?php echo esc_attr($uniqueId); ?>" type="password" name="<?php echo $name; ?>"<?php echo strlen($placeholder = $element->getPlaceholder()) ? ' placeholder="' . iphorm_escape($placeholder) . '"' : ''; ?> <?php echo $tooltipTitle; ?> <?php echo $element->getCss('input'); ?> />
            <?php include IPHORM_INCLUDES_DIR . '/elements/_description.php'; ?>
        </div>
        <?php include IPHORM_INCLUDES_DIR . '/elements/_errors.php'; ?>
    </div>
</div>