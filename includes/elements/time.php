<?php
if (!defined('IPHORM_VERSION')) exit;
$time1224 = $element->getTime1224();
$value = $element->getValue();
$minuteGranularity = $element->getMinuteGranularity();
$sh = $element->getStartHour();
$eh = $element->getEndHour();
?>
<div class="iphorm-element-wrap iphorm-element-wrap-time <?php echo $name; ?>-element-wrap iphorm-clearfix iphorm-labels-<?php echo $labelPlacement; ?> <?php echo ($element->getRequired()) ? 'iphorm-element-required' : 'iphorm-element-optional'; ?>" <?php echo $element->getCss('outer'); ?>>
    <div class="iphorm-element-spacer iphorm-element-spacer-time <?php echo $name; ?>-element-spacer">
        <?php echo $element->getLabelHtml($tooltipType, $tooltipEvent, $labelCss, false); ?>
        <div class="iphorm-input-wrap iphorm-input-wrap-date <?php echo $name; ?>-input-wrap" <?php echo $element->getCss('inner', $leftMarginCss); ?>>
            <select name="<?php echo $name; ?>[hour]" class="<?php echo $name; ?>-input-hour" <?php echo $element->getCss('timeHour'); ?>>
                <?php if ($element->getShowTimeHeadings()) : ?><option value=""><?php echo esc_html($element->getHhString()); ?></option><?php endif; ?>
                <?php if ($sh > $eh) : ?>
                    <?php for ($i = $sh; $i >= $eh; $i--) : ?>
                        <?php $i = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                        <option value="<?php echo $i; ?>" <?php selected($value['hour'], $i); ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                <?php else : ?>
                    <?php for ($i = $sh; $i <= $eh; $i++) : ?>
                        <?php $i = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                        <option value="<?php echo $i; ?>" <?php selected($value['hour'], $i); ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                <?php endif; ?>
            </select>
            <select name="<?php echo $name; ?>[minute]" class="<?php echo $name; ?>-input-minute" <?php echo $element->getCss('timeMinute'); ?>>
                <?php if ($element->getShowTimeHeadings()) : ?><option value=""><?php echo esc_html($element->getMmString()); ?></option><?php endif; ?>
                <?php foreach (range(0, 59) as $min) : ?>
                    <?php if ($min % $minuteGranularity == 0) : ?>
                        <?php $min = str_pad($min, 2, '0', STR_PAD_LEFT); ?>
                        <option value="<?php echo $min; ?>" <?php selected($value['minute'], $min); ?>><?php echo $min; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <?php if ($time1224 == '12') : ?>
            <select name="<?php echo $name; ?>[ampm]"  class="<?php echo $name; ?>-input-ampm" <?php echo $element->getCss('timeAmPm'); ?>>
                <?php if ($element->getShowTimeHeadings()) : ?><option value=""><?php echo esc_html($element->getAmpmString()); ?></option><?php endif; ?>
                <option value="am" <?php selected($value['ampm'], 'am'); ?>><?php echo esc_html($element->getAmString()); ?></option>
                <option value="pm" <?php selected($value['ampm'], 'pm'); ?>><?php echo esc_html($element->getPmString()); ?></option>
            </select>
            <?php else : ?>
                <input type="hidden" name="<?php echo $name; ?>[ampm]" value="" />
            <?php endif; ?>
            <?php include IPHORM_INCLUDES_DIR . '/elements/_description.php'; ?>
        </div>
        <?php include IPHORM_INCLUDES_DIR . '/elements/_errors.php'; ?>
    </div>
</div>