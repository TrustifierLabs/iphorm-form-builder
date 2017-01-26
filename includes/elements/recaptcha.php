<?php
if (!defined('IPHORM_VERSION')) exit;
$siteKey = get_option('iphorm_recaptcha_site_key');
$secretKey = get_option('iphorm_recaptcha_secret_key');
wp_enqueue_script('iphorm-recaptcha', 'https://www.google.com/recaptcha/api.js?onload=iPhormRecaptchaLoaded&render=explicit&hl=' . $element->getRecaptchaLang(), array(), false, true);
?>
<div class="iphorm-element-wrap iphorm-element-wrap-recaptcha <?php echo $name; ?>-element-wrap iphorm-clearfix iphorm-labels-<?php echo $labelPlacement; ?> <?php echo ($element->getRequired()) ? 'iphorm-element-required' : 'iphorm-element-optional'; ?>" <?php echo $element->getCss('outer'); ?>>
    <div class="iphorm-element-spacer iphorm-element-spacer-captcha <?php echo $name; ?>-element-spacer">
        <?php echo $element->getLabelHtml($tooltipType, $tooltipEvent, $labelCss, false); ?>
        <div class="iphorm-input-wrap iphorm-input-wrap-recaptcha <?php echo $name; ?>-input-wrap" <?php echo $element->getCss('inner', $leftMarginCss); ?>>
            <?php if (!strlen($siteKey) || !strlen($secretKey)) : ?>
                <?php esc_html_e('To use reCAPTCHA you must enter your API keys in the Quform settings page.', 'iphorm'); ?>
            <?php else : ?>
                <div id="<?php echo esc_attr($uniqueId); ?>" class="iphorm-recaptcha" data-unique-id="<?php echo esc_attr($uniqueId); ?>" data-config="<?php echo _wp_specialchars(iphorm_json_encode($element->getRecaptchaConfig()), ENT_QUOTES, false, true); ?>"></div>
                <noscript>
                  <div style="width: 302px; height: 352px;">
                    <div style="width: 302px; height: 352px; position: relative;">
                      <div style="width: 302px; height: 352px; position: absolute;">
                        <iframe src="https://www.google.com/recaptcha/api/fallback?k=<?php echo esc_attr($siteKey); ?>"
                                frameborder="0" scrolling="no"
                                style="width: 302px; height:352px; border-style: none;">
                        </iframe>
                      </div>
                      <div style="width: 250px; height: 80px; position: absolute; border-style: none;
                                  bottom: 21px; left: 25px; margin: 0px; padding: 0px; right: 25px;">
                        <textarea name="<?php echo $name; ?>" class="<?php echo $name; ?>"
                                  style="width: 250px; height: 80px; border: 1px solid #c1c1c1;
                                         margin: 0px; padding: 0px; resize: none;"></textarea>
                      </div>
                    </div>
                  </div>
                </noscript>
            <?php endif; ?>
            <?php include IPHORM_INCLUDES_DIR . '/elements/_description.php'; ?>
        </div>
        <?php include IPHORM_INCLUDES_DIR . '/elements/_errors.php'; ?>
    </div>
</div>