<?php if (!defined('IPHORM_VERSION')) exit; ?><div class="wrap">
	<div class="iphorm-top-right">
        <div class="iphorm-information">
        	<span class="iphorm-copyright"><a href="http://www.themecatcher.net" onclick="window.open(this.href); return false;">www.themecatcher.net</a> &copy; <?php echo date('Y'); ?></span>
        	<span class="iphorm-bug-link"><a href="http://www.themecatcher.net/support.php" onclick="window.open(this.href); return false;"><?php esc_html_e('Report a bug', 'iphorm'); ?></a></span>
        	<span class="iphorm-help-link"><a href="<?php echo iphorm_help_link(); ?>" onclick="window.open(this.href); return false;"><?php esc_html_e('Help', 'iphorm'); ?></a></span>
        </div>
    </div>
    <div class="ifb-form-icon"></div>
    <h2 class="ifb-main-title"><span class="ifb-iphorm-title"><?php echo esc_html(iphorm_get_plugin_name()); ?></span><?php esc_html_e('Settings', 'iphorm'); ?></h2>

    <?php iphorm_global_nav('settings'); ?>

    <?php if (isset($_POST['iphorm_settings'])) : ?>
        <?php
            $savedSmtpSettings = get_option('iphorm_smtp_settings');
            update_option('iphorm_recaptcha_site_key', sanitize_text_field(stripslashes($_POST['recaptcha_site_key'])));
            update_option('iphorm_recaptcha_secret_key', sanitize_text_field(stripslashes($_POST['recaptcha_secret_key'])));
            update_option('iphorm_email_sending_method', $_POST['global_email_sending_method']);
            update_option('iphorm_smtp_settings', array(
                'host' => stripslashes($_POST['smtp_host']),
                'port' => stripslashes($_POST['smtp_port']),
                'encryption' => $_POST['smtp_encryption'],
                'username' => stripslashes($_POST['smtp_username']),
                'password' => isset($_POST['smtp_password']) ? stripslashes($_POST['smtp_password']) : $savedSmtpSettings['password']
            ));
            update_option('iphorm_email_returnpath', sanitize_text_field(stripslashes($_POST['email_returnpath'])));
            update_option('iphorm_disable_fancybox_output', isset($_POST['disable_fancybox_output']) && $_POST['disable_fancybox_output'] == 1);
            update_option('iphorm_disable_qtip_output', isset($_POST['disable_qtip_output']) && $_POST['disable_qtip_output'] == 1);
            update_option('iphorm_disable_infieldlabels_output', isset($_POST['disable_infieldlabels_output']) && $_POST['disable_infieldlabels_output'] == 1);
            update_option('iphorm_disable_smoothscroll_output', isset($_POST['disable_smoothscroll_output']) && $_POST['disable_smoothscroll_output'] == 1);
            update_option('iphorm_disable_jqueryui_output', isset($_POST['disable_jqueryui_output']) && $_POST['disable_jqueryui_output'] == 1);
            update_option('iphorm_disable_uniform_output', isset($_POST['disable_uniform_output']) && $_POST['disable_uniform_output'] == 1);
            update_option('iphorm_disable_swfupload_output', isset($_POST['disable_swfupload_output']) && $_POST['disable_swfupload_output'] == 1);
            update_option('iphorm_disable_raw_detection', isset($_POST['disable_raw_detection']) && $_POST['disable_raw_detection'] == 1);
            update_option('iphorm_fancybox_requested', isset($_POST['fancybox_requested']) && $_POST['fancybox_requested'] == 1);

            if (isset($_POST['iphorm_update']) && $_POST['iphorm_update'] == '1') {
                iphorm_update_active_themes();
            }
        ?>
        <div class="updated below-h2" id="message">
            <p><?php esc_html_e('Settings saved.', 'iphorm'); ?></p>
        </div>
    <?php endif; ?>
    <form method="post" action="">
        <h3 class="ifb-sub-head"><span><?php esc_html_e('Product license', 'iphorm'); ?></span></h3>
        <p><?php printf(esc_html__('A valid license key entitles you to support and enables automatic upgrades. %3$sA
        license key may only be used for one installation of WordPress at a time%4$s, if you have previously verified a license key
        for another website, and use it again here, the Quform plugin will become unlicensed on the other website. Please enter your
        CodeCanyon Quform license key, you can find your key by following the instructions on %1$sthis page%2$s.', 'iphorm'), '<a onclick="window.open(this.href); return false;" href="http://support.themecatcher.net/quform-wordpress/faq/license/how-do-i-find-my-license-key-and-activate-quform">', '</a>', '<span class="ifb-bold">', '</span>'); ?></p>
        <table class="form-table iphorm-purchase-settings">
            <tr>
                <th scope="row"><?php esc_html_e('License status', 'iphorm'); ?></th>
                <td>
                    <?php $valid = (strlen(get_option('iphorm_licence_key'))) ? true : false; ?>
                    <div class="iphorm-valid-licence-wrap <?php if (!$valid) echo 'ifb-hidden'; ?>"><span class="iphorm-valid-licence"><?php esc_html_e('Valid license key', 'iphorm'); ?></span></div>
                    <div class="iphorm-invalid-licence-wrap <?php if ($valid) echo 'ifb-hidden'; ?>"><span class="iphorm-invalid-licence"><?php esc_html_e('Unlicensed product', 'iphorm'); ?></span></div>
                </td>
            </tr>
            <tr id="ifb-verify-purchase-code-row">
                <th scope="row"><?php esc_html_e('Enter license key', 'iphorm'); ?></th>
                <td><div class="iphorm-verify-purchase-code-wrap qfb-cf"><input id="purchase_code" type="text" name="purchase_code" class="iphorm-recaptcha-key-input" value="" /> <button class="ifb-button" id="verify-purchase-code"><?php esc_html_e('Verify', 'iphorm'); ?></button> <span class="iphorm-verify-loading"></span> </div></td>
            </tr>
            <tr id="ifb-manual-update-check-row">
                <th scope="row"><?php esc_html_e('Check for updates', 'iphorm'); ?></th>
                <td>
                    <div class="ifb-update-check-wrap qfb-cf"><span class="ifb-update-check-current ifb-floated-text-beside-button"><?php printf(esc_html__('You are using version %s', 'iphorm'), IPHORM_VERSION); ?></span> <button class="ifb-button" id="ifb-check-for-updates"><?php esc_html_e('Check for updates', 'iphorm'); ?></button> <span class="iphorm-update-check-loading"></span></div>
                </td>
            </tr>
        </table>
    </form>
    <form method="post" action="">
        <input type="password" class="ifb-hidden"><!-- Stop Chrome 34+ autofilling -->
        <h3 class="ifb-sub-head"><span><?php esc_html_e('reCAPTCHA settings', 'iphorm'); ?></span></h3>
        <p><?php printf(esc_html__('In order to use the reCAPTCHA element in your form you must %ssign up%s
        for a free account to get your set of API keys. Once you have your Site and Secret keys, enter them below.', 'iphorm'),
        '<a href="https://www.google.com/recaptcha/admin#createsite?app=quform" target="_blank">', '</a>'); ?></p>
        <table class="form-table iphorm-recaptcha-settings">
            <tr>
                <th scope="row"><?php esc_html_e('reCAPTCHA Site key', 'iphorm'); ?></th>
                <td><input type="text" name="recaptcha_site_key" class="iphorm-recaptcha-key-input" value="<?php echo esc_attr(get_option('iphorm_recaptcha_site_key')); ?>" /></td>
            </tr>
            <tr>
                <th scope="row"><?php esc_html_e('reCAPTCHA Secret key', 'iphorm'); ?></th>
                <td><input type="text" name="recaptcha_secret_key" class="iphorm-recaptcha-key-input" value="<?php echo esc_attr(get_option('iphorm_recaptcha_secret_key')); ?>" /></td>
            </tr>
        </table>
        <h3 class="ifb-sub-head"><span><?php esc_html_e('Email sending settings', 'iphorm'); ?></span></h3>
        <p><?php esc_html_e('The settings here will determine the default email sending settings for all your forms
        you can also override these settings for each form at Form Builder &rarr; Settings &rarr; Email.', 'iphorm'); ?></p>
        <table class="form-table iphorm-email-settings">
            <?php
                $emailSendingMethod = get_option('iphorm_email_sending_method');
                $smtpSettings = get_option('iphorm_smtp_settings');
            ?>
            <tr valign="top">
                <th scope="row"><label for="global_email_sending_method"><?php esc_html_e('Email sending method', 'iphorm'); ?></label></th>
                <td>
                    <select id="global_email_sending_method" name="global_email_sending_method">
                        <option value="mail" <?php selected($emailSendingMethod, 'mail'); ?>><?php esc_html_e('PHP mail() (default)', 'iphorm'); ?></option>
                        <option value="smtp" <?php selected($emailSendingMethod, 'smtp'); ?>><?php esc_html_e('SMTP', 'iphorm'); ?></option>
                    </select>
                </td>
            </tr>
            <tr valign="top" class="<?php if ($emailSendingMethod !== 'smtp') echo 'ifb-hidden'; ?> iphorm-show-if-smtp-on">
                <th scope="row"><label for="smtp_host"><?php esc_html_e('SMTP host', 'iphorm'); ?></label></th>
                <td>
                    <input type="text" name="smtp_host" id="smtp_host" value="<?php echo esc_attr($smtpSettings['host']); ?>" />
                </td>
            </tr>
            <tr valign="top" class="<?php if ($emailSendingMethod !== 'smtp') echo 'ifb-hidden'; ?> iphorm-show-if-smtp-on">
                <th scope="row"><label for="smtp_port"><?php esc_html_e('SMTP port', 'iphorm'); ?></label></th>
                <td>
                    <input type="text" name="smtp_port" id="smtp_port" value="<?php echo esc_attr($smtpSettings['port']); ?>" />
                </td>
            </tr>
            <tr valign="top" class="<?php if ($emailSendingMethod !== 'smtp') echo 'ifb-hidden'; ?> iphorm-show-if-smtp-on">
                <th scope="row"><label for="smtp_encryption"><?php esc_html_e('SMTP encryption', 'iphorm'); ?></label></th>
                <td>
                    <select id="smtp_encryption" name="smtp_encryption">
                        <option value="" <?php selected($smtpSettings['encryption'], ''); ?>><?php esc_html_e('None', 'iphorm'); ?></option>
                        <option value="tls" <?php selected($smtpSettings['encryption'], 'tls'); ?>><?php esc_html_e('TLS', 'iphorm'); ?></option>
                        <option value="ssl" <?php selected($smtpSettings['encryption'], 'ssl'); ?>><?php esc_html_e('SSL', 'iphorm'); ?></option>
                    </select>
                </td>
            </tr>
            <tr valign="top" class="<?php if ($emailSendingMethod !== 'smtp') echo 'ifb-hidden'; ?> iphorm-show-if-smtp-on">
                <th scope="row"><label for="smtp_username"><?php esc_html_e('SMTP username', 'iphorm'); ?></label></th>
                <td>
                    <input type="text" name="smtp_username" id="smtp_username" value="<?php echo esc_attr($smtpSettings['username']); ?>" />
                </td>
            </tr>
            <tr valign="top" class="<?php if ($emailSendingMethod !== 'smtp') echo 'ifb-hidden'; ?> iphorm-show-if-smtp-on">
                <th scope="row"><label for="smtp_password"><?php esc_html_e('SMTP password', 'iphorm'); ?></label></th>
                <td>
                    <?php if (strlen($smtpSettings['password'])) : ?>
                        <span id="ifb-saved-smtp-password-message" class="ifb-floated-text-beside-button"><?php esc_html_e('A password is saved but hidden for security reasons.', 'iphorm'); ?></span><div class="ifb-button" id="ifb-set-new-smtp-password"><?php esc_html_e('Change password', 'iphorm'); ?></div>
                    <?php else : ?>
                        <input type="password" name="smtp_password" id="smtp_password">
                    <?php endif; ?>
                </td>
            </tr>
            <?php $emailReturnPath = get_option('iphorm_email_returnpath'); ?>
            <tr valign="top">
                <th scope="row"><?php esc_html_e('Email "Return-Path" address', 'iphorm'); ?></th>
                <td><input type="text" name="email_returnpath" value="<?php echo esc_attr($emailReturnPath); ?>" /></td>
            </tr>
        </table>
        <h3 class="ifb-sub-head"><span><?php esc_html_e('Update active themes cache', 'iphorm'); ?></span></h3>
        <p><?php esc_html_e('If you have added or removed a form from the database directly, e.g. via phpMyAdmin then you should tick
        the box below and Save Changes to make sure the correct themes are being loaded for all your active forms.', 'iphorm'); ?></p>
        <p><label class="ifb-bold"><input type="checkbox" value="1" name="iphorm_update" id="iphorm_update" /> <?php esc_html_e('Update active themes cache', 'iphorm'); ?></label></p>

        <h3 class="ifb-sub-head"><span><?php esc_html_e('Disable script output', 'iphorm'); ?></span></h3>
        <p><?php esc_html_e('You can disable the output of the scripts used by the Quform plugin below by ticking the boxes below. This will disable both the CSS and JavaScript for the script.', 'iphorm'); ?></p>
        <p><label class="ifb-bold"><input type="checkbox" value="1" name="disable_fancybox_output" id="disable_fancybox_output" <?php checked(true, get_option('iphorm_disable_fancybox_output')); ?> /> <?php esc_html_e('Disable Fancybox output', 'iphorm'); ?></label></p>
        <p><label class="ifb-bold"><input type="checkbox" value="1" name="disable_qtip_output" id="disable_qtip_output" <?php checked(true, get_option('iphorm_disable_qtip_output')); ?> /> <?php esc_html_e('Disable qTip2 output', 'iphorm'); ?></label></p>
        <p><label class="ifb-bold"><input type="checkbox" value="1" name="disable_infieldlabels_output" id="disable_infieldlabels_output" <?php checked(true, get_option('iphorm_disable_infieldlabels_output')); ?> /> <?php esc_html_e('Disable Infield Labels output', 'iphorm'); ?></label></p>
        <p><label class="ifb-bold"><input type="checkbox" value="1" name="disable_smoothscroll_output" id="disable_smoothscroll_output" <?php checked(true, get_option('iphorm_disable_smoothscroll_output')); ?> /> <?php esc_html_e('Disable Smooth Scroll output', 'iphorm'); ?></label></p>
        <p><label class="ifb-bold"><input type="checkbox" value="1" name="disable_jqueryui_output" id="disable_jqueryui_output" <?php checked(true, get_option('iphorm_disable_jqueryui_output')); ?> /> <?php esc_html_e('Disable jQuery UI output', 'iphorm'); ?></label></p>
        <p><label class="ifb-bold"><input type="checkbox" value="1" name="disable_uniform_output" id="disable_uniform_output" <?php checked(true, get_option('iphorm_disable_uniform_output')); ?> /> <?php esc_html_e('Disable Uniform output', 'iphorm'); ?></label></p>
        <p><label class="ifb-bold"><input type="checkbox" value="1" name="disable_swfupload_output" id="disable_swfupload_output" <?php checked(true, get_option('iphorm_disable_swfupload_output')); ?> /> <?php esc_html_e('Disable SWFUpload output', 'iphorm'); ?></label></p>

        <h3 class="ifb-sub-head"><span><?php esc_html_e('Disable [raw] tag detection', 'iphorm'); ?></span></h3>
        <p><?php esc_html_e('The plugin detects if the theme supports [raw] tags to help with form display issues. You can turn this off here to potentially fix conflicts with some themes.', 'iphorm'); ?></p>
        <p><label class="ifb-bold"><input type="checkbox" value="1" name="disable_raw_detection" id="disable_raw_detection" <?php checked(true, get_option('iphorm_disable_raw_detection')); ?> /> <?php esc_html_e('Disable [raw] tag detection', 'iphorm'); ?></label></p>

        <h3 class="ifb-sub-head"><span><?php esc_html_e('Enable lightbox script (Fancybox)', 'iphorm'); ?></span></h3>
        <p><?php esc_html_e('This option is enabled automatically when you add a form
        in a popup to a post / page or when you add a Quform Popup widget. If this does not happen for some reason
        you can tick this option to manually enable the Fancybox script. If you have disabled Fancybox output in the above settings
        the script output will still be disabled.', 'iphorm'); ?></p>
        <p><label class="ifb-bold"><input type="checkbox" value="1" name="fancybox_requested" id="fancybox_requested" <?php checked(true, get_option('iphorm_fancybox_requested')); ?> /> <?php esc_html_e('Enable Fancybox', 'iphorm'); ?></label></p>

        <h3 class="ifb-sub-head"><span><?php esc_html_e('Server compatibility', 'iphorm'); ?></span></h3>
        <table class="form-table iphorm-server-compat">
            <?php
            $phpVersion = phpversion();
            $phpVersionGood = version_compare($phpVersion, '5.0.0', '>=');
            ?>
            <tr valign="top">
                <th scope="row"><label><?php esc_html_e('PHP Version', 'iphorm'); ?></label></th>
                <td class="iphorm-server-compat-col2"><?php echo $phpVersion; ?></td>
                <td class="iphorm-server-compat-col3"><?php echo $phpVersionGood ? '<img src="'.iphorm_admin_url().'/images/iphorm-success.png" alt="" />' : '<img src="'.iphorm_admin_url().'/images/iphorm-warning.png" alt="" />'; ?></td>
                <td><?php if (!$phpVersionGood) echo '<span class="ifb-compat-error">' . esc_html__('The plugin requires PHP version 5 or later.', 'iphorm') . '</span>'; ?></td>
            </tr>
            <?php
            global $wpdb;
            $mysqlVersion = $wpdb->db_version();
            $mysqlVersionGood = version_compare($mysqlVersion, '5.0.0', '>=');
            ?>
            <tr valign="top">
                <th scope="row"><label><?php esc_html_e('MySQL Version', 'iphorm'); ?></label></th>
                <td><?php echo $mysqlVersion; ?></td>
                <td><?php echo $mysqlVersionGood ? '<img src="'.iphorm_admin_url().'/images/iphorm-success.png" alt="" />' : '<img src="'.iphorm_admin_url().'/images/iphorm-warning.png" alt="" />'; ?></td>
                <td><?php if (!$mysqlVersionGood) echo '<span class="ifb-compat-error">' . esc_html__('The plugin requires MySQL version 5 or later.', 'iphorm') . '</span>'; ?></td>
            </tr>
            <?php
            $wordpressVersion = get_bloginfo('version');
            $wordpressVersionGood = version_compare($wordpressVersion, '3.1', '>=');
            ?>
            <tr valign="top">
                <th scope="row"><label><?php esc_html_e('WordPress Version', 'iphorm'); ?></label></th>
                <td><?php echo $wordpressVersion; ?></td>
                <td><?php echo $wordpressVersionGood ? '<img src="'.iphorm_admin_url().'/images/iphorm-success.png" alt="" />' : '<img src="'.iphorm_admin_url().'/images/iphorm-warning.png" alt="" />'; ?></td>
                <td><?php if (!$wordpressVersionGood) echo '<span class="ifb-compat-error">' . esc_html__('The plugin requires WordPress version 3.1 or later.', 'iphorm') . '</span>'; ?></td>
            </tr>
            <?php
            $gdImageLibaryGood = function_exists('imagecreate');
            ?>
            <tr valign="top">
                <th scope="row"><label><?php esc_html_e('GD Image Library', 'iphorm'); ?></label></th>
                <td><?php echo $gdImageLibaryGood ? __('Available', 'iphorm') : __('Unavailable', 'iphorm'); ?></td>
                <td><?php echo $gdImageLibaryGood ? '<img src="'.iphorm_admin_url().'/images/iphorm-success.png" alt="" />' : '<img src="'.iphorm_admin_url().'/images/iphorm-warning.png" alt="" />'; ?></td>
                <td><?php if (!$gdImageLibaryGood) echo '<span class="ifb-compat-error">' . esc_html__('The plugin requires the GD image library for the CAPTCHA element, please ask your host to install it.', 'iphorm') . '</span>'; ?></td>
            </tr>
            <?php
            $ftLibaryGood = function_exists('imagettftext');
            ?>
            <tr valign="top">
                <th scope="row"><label><?php esc_html_e('FreeType Library', 'iphorm'); ?></label></th>
                <td><?php echo $ftLibaryGood ? __('Available', 'iphorm') : __('Unavailable', 'iphorm'); ?></td>
                <td><?php echo $ftLibaryGood ? '<img src="'.iphorm_admin_url().'/images/iphorm-success.png" alt="" />' : '<img src="'.iphorm_admin_url().'/images/iphorm-warning.png" alt="" />'; ?></td>
                <td><?php if (!$ftLibaryGood) echo '<span class="ifb-compat-error">' . esc_html__('The plugin requires the FreeType library for the CAPTCHA element, please ask your host to install it.', 'iphorm') . '</span>'; ?></td>
            </tr>
            <?php
            $mbStringGood = extension_loaded('mbstring');
            ?>
            <tr valign="top">
                <th scope="row"><label><?php esc_html_e('mbstring Extension', 'iphorm'); ?></label></th>
                <td><?php echo $mbStringGood ? __('Available', 'iphorm') : __('Unavailable', 'iphorm'); ?></td>
                <td><?php echo $mbStringGood ? '<img src="'.iphorm_admin_url().'/images/iphorm-success.png" alt="" />' : '<img src="'.iphorm_admin_url().'/images/iphorm-warning.png" alt="" />'; ?></td>
                <td><?php if (!$mbStringGood) echo '<span class="ifb-compat-error">' . esc_html__('The plugin requires the mbstring PHP extension for the CSS system, please ask your host to install it.', 'iphorm') . '</span>'; ?></td>
            </tr>
            <?php
            $tempDir = iphorm_get_temp_dir();
            $tempDirGood = is_writeable($tempDir);
            ?>
            <tr valign="top">
                <th scope="row"><label><?php esc_html_e('Temporary Directory', 'iphorm'); ?></label></th>
                <td><?php echo $tempDir; ?></td>
                <td><?php echo $tempDirGood ? '<img src="'.iphorm_admin_url().'/images/iphorm-success.png" alt="" />' : '<img src="'.iphorm_admin_url().'/images/iphorm-warning.png" alt="" />'; ?></td>
                <td><?php if (!$tempDirGood) echo '<span class="ifb-compat-error">' . sprintf(esc_html__('The plugin requires a writeable temporary directory for file uploading. You can set a custom temporary directory path in your wp-config.php file by using the code %1$sdefine("WP_TEMP_DIR", "/path/to/tmp/dir");%2$s', 'iphorm'), '<code>', '</code>') . '</span>'; ?></td>
            </tr>
        </table>

        <p class="submit iphorm-save-settings"><input type="submit" value="<?php esc_attr_e('Save Changes', 'iphorm'); ?>" class="button-primary" name="iphorm_settings" /></p>
    </form>
</div>
