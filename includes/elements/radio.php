<?php
if (!defined('IPHORM_VERSION')) exit;
$value = (array) $element->getValue();
?>
<div class="iphorm-element-wrap iphorm-element-wrap-radio <?php echo $name; ?>-element-wrap iphorm-clearfix iphorm-labels-<?php echo $labelPlacement; ?> <?php echo ($element->getRequired()) ? 'iphorm-element-required' : 'iphorm-element-optional'; ?>" <?php echo $element->getCss('outer'); ?>>
    <div class="iphorm-element-spacer iphorm-element-spacer-radio <?php echo $name; ?>-element-spacer">
        <?php echo $element->getLabelHtml($tooltipType, $tooltipEvent, $labelCss, false); ?>
        <div class="iphorm-input-wrap iphorm-input-wrap-radio <?php echo $name; ?>-input-wrap" <?php echo $element->getCss('inner', $leftMarginCss); ?>>
            <div class="iphorm-input-ul iphorm-input-radio-ul <?php echo $name; ?>-input-radio-ul iphorm-options-<?php echo $element->getOptionsLayout(); ?> iphorm-clearfix" <?php echo $element->getCss('optionUl'); ?>>
            <?php
                $i = 1;
                $options = $element->getOptions();
                foreach ($options as $option) : ?>
                <div class="iphorm-input-li iphorm-input-radio-li <?php echo $name; ?>-input-li" <?php echo $element->getCss('optionLi'); ?>>
                    <label <?php echo $element->getCss('optionLabel'); ?> class="<?php echo $name . '_' . $i . '_label'; ?>">
                        <input class="iphorm-element-radio <?php echo $name; ?> <?php echo $name . '_' . $i; ?>" type="radio" name="<?php echo $name; ?>" id="<?php echo esc_attr($uniqueId) . "_$i"; ?>" value="<?php echo _wp_specialchars($option['value'], ENT_COMPAT, false, true); ?>" <?php echo (in_array($option['value'], $value)) ? 'checked="checked"' : ''; ?> />
                        <?php echo $option['label']; ?>
                    </label>
                </div>
            <?php $i++; endforeach; ?>
            </div>
            <?php include IPHORM_INCLUDES_DIR . '/elements/_description.php'; ?>
        </div>
        <?php include IPHORM_INCLUDES_DIR . '/elements/_errors.php'; ?>
    </div>
</div>