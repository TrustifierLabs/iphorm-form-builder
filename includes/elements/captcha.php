<?php
if (!defined('IPHORM_VERSION')) exit;
$value = $element->getValue();
$captchaOptions = $element->getOptions();
$captchaConfig = array(
    'uniqId' => $formUniqueId,
    'tmpDir' => iphorm_get_temp_dir(),
    'options' => $captchaOptions
);
$captchaConfig = base64_encode(iphorm_json_encode($captchaConfig));
?>
<div class="iphorm-element-wrap iphorm-element-wrap-captcha <?php echo $name; ?>-element-wrap iphorm-clearfix iphorm-labels-<?php echo $labelPlacement; ?> <?php echo ($element->getRequired()) ? 'iphorm-element-required' : 'iphorm-element-optional'; ?>" <?php echo $element->getCss('outer'); ?>>
    <div class="iphorm-element-spacer iphorm-element-spacer-captcha <?php echo $name; ?>-element-spacer">
        <?php echo $element->getLabelHtml($tooltipType, $tooltipEvent, $labelCss); ?>
        <div class="iphorm-input-wrap iphorm-input-wrap-captcha <?php echo $name; ?>-input-wrap" <?php echo $element->getCss('inner', $leftMarginCss); ?>>
            <input class="iphorm-element-captcha <?php echo $tooltipInputClass; ?> <?php echo $name; ?>" id="<?php echo esc_attr($uniqueId); ?>" type="text" name="<?php echo $name; ?>" <?php echo $tooltipTitle; ?> value="<?php echo esc_attr($value); ?>"<?php echo strlen($placeholder = $element->getPlaceholder()) ? ' placeholder="' . iphorm_escape($placeholder) . '"' : ''; ?> <?php echo $element->getCss('input'); ?> />
            <?php include IPHORM_INCLUDES_DIR . '/elements/_description.php'; ?>
        </div>
        <div class="iphorm-captcha-image-wrap iphorm-clearfix <?php echo $name; ?>-captcha-image-wrap" <?php echo $element->getCss(null, $leftMarginCss); ?>>
            <div class="ifb-captcha-image-inner">
                <img width="<?php echo esc_attr($captchaOptions['width']); ?>" height="<?php echo esc_attr($captchaOptions['height']); ?>" id="iphorm-captcha-image-<?php echo esc_attr($uniqueId); ?>" class="iphorm-captcha-image" src="<?php echo iphorm_plugin_url() . '/includes/captcha.php?c=' . urlencode($captchaConfig) . '&amp;t=' . microtime(true); ?>" alt="CAPTCHA" />
            </div>
        </div>

        <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#iphorm-captcha-image-<?php echo esc_js($uniqueId); ?>').hover(function () {
                $(this).stop().fadeTo('slow', '0.3');
            }, function () {
                $(this).stop().fadeTo('slow', '1.0');
            }).click(function () {
                var newSrc = $(this).attr('src').replace(/&t=.+/, '&t=' + new Date().getTime());
                $(this).attr('src', newSrc);
            });
        });
        </script>
        <?php include IPHORM_INCLUDES_DIR . '/elements/_errors.php'; ?>
    </div>
</div>