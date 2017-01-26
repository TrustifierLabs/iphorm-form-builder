<?php
if (!defined('IPHORM_VERSION')) exit;
$id = absint($element['id']);

if (!isset($element['label'])) $element['label'] = __('Time', 'iphorm');
if (!isset($element['description'])) $element['description'] = '';
if (!isset($element['required'])) $element['required'] = false;
if (!isset($element['time_12_24'])) $element['time_12_24'] = '12';
if (!isset($element['default_value'])) $element['default_value'] = array('hour' => '', 'minute' => '', 'ampm' => '');
if (!isset($element['minute_granularity'])) $element['minute_granularity'] = 1;
if (!isset($element['start_hour'])) $element['start_hour'] = '';
if (!isset($element['end_hour'])) $element['end_hour'] = '';
if (!isset($element['show_time_headings'])) $element['show_time_headings'] = true;
if (!isset($element['hh_string'])) $element['hh_string'] = '';
if (!isset($element['mm_string'])) $element['mm_string'] = '';
if (!isset($element['ampm_string'])) $element['ampm_string'] = '';
if (!isset($element['am_string'])) $element['am_string'] = '';
if (!isset($element['pm_string'])) $element['pm_string'] = '';

$hhString = strlen($element['hh_string']) ? $element['hh_string'] : _x('HH', 'select hour', 'iphorm');
$mmString = strlen($element['mm_string']) ? $element['mm_string'] : _x('MM', 'select minute', 'iphorm');
$ampmString = strlen($element['ampm_string']) ? $element['ampm_string'] : _x('am/pm', 'select morning/afternoon', 'iphorm');
$amString = strlen($element['am_string']) ? $element['am_string'] : _x('am', 'time, morning', 'iphorm');
$pmString = strlen($element['pm_string']) ? $element['pm_string'] : _x('pm', 'time, evening', 'iphorm');

$sh = is_numeric($element['start_hour']) ? $element['start_hour'] : $element['time_12_24'] == '12' ? 1 : 0;
$eh = is_numeric($element['end_hour']) ? $element['end_hour'] : $element['time_12_24'] == '12' ? 12 : 23;

$helpUrl = iphorm_help_link('element-time');
?>
<div id="ifb-element-wrap-<?php echo $id; ?>" class="ifb-element-wrap ifb-element-wrap-time <?php if (!$element['required']) echo 'ifb-element-optional'; ?> <?php echo "ifb-label-placement-{$form['label_placement']}"; ?>">
	<div class="ifb-top-element-wrap qfb-cf">
        <?php include IPHORM_ADMIN_INCLUDES_DIR . '/elements/_actions.php'; ?>
        <div class="ifb-element-preview ifb-element-preview-time">
            <label class="ifb-preview-label <?php echo ($element['label']) ? '' : 'ifb-hidden' ?>" for="ifb_element_<?php echo $id; ?>"><span class="ifb-preview-label-content"><?php echo $element['label']; ?></span><span class="ifb-required"><?php echo esc_html($form['required_text']); ?></span></label>
            <div class="ifb-preview-input">
                <select id="ifb_element_<?php echo $id; ?>_hour" name="ifb_element_<?php echo $id; ?>[hour]" disabled="disabled">
                    <?php if ($element['show_time_headings']) : ?><option value=""><?php echo esc_html($hhString); ?></option><?php endif; ?>
                    <?php if ($sh > $eh) : ?>
                        <?php for ($i = $sh; $i >= $eh; $i--) : ?>
                            <?php $i = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                            <option value="<?php echo $i; ?>" <?php selected($element['default_value']['hour'], $i); ?>><?php echo $i; ?></option>
                        <?php endfor; ?>
                    <?php else : ?>
                        <?php for ($i = $sh; $i <= $eh; $i++) : ?>
                            <?php $i = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                            <option value="<?php echo $i; ?>" <?php selected($element['default_value']['hour'], $i); ?>><?php echo $i; ?></option>
                        <?php endfor; ?>
                    <?php endif; ?>
                </select>
                <select id="ifb_element_<?php echo $id; ?>_minute" name="ifb_element_<?php echo $id; ?>[minute]" disabled="disabled">
                    <?php if ($element['show_time_headings']) : ?><option value=""><?php echo esc_html($mmString); ?></option><?php endif; ?>
                    <?php foreach (range(0, 59) as $min) : ?>
                        <?php if ($min % $element['minute_granularity'] == 0) : ?>
                            <?php $min = str_pad($min, 2, '0', STR_PAD_LEFT); ?>
                            <option value="<?php echo $min; ?>" <?php selected($element['default_value']['minute'], $min); ?>><?php echo $min; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <select id="ifb_element_<?php echo $id; ?>_ampm" name="ifb_element_<?php echo $id; ?>[ampm]" <?php if ($element['time_12_24'] == '24') echo 'class="ifb-hidden"'; ?> disabled="disabled">
                    <?php if ($element['show_time_headings']) : ?><option value=""><?php echo esc_html($ampmString); ?></option><?php endif; ?>
                    <option value="am" <?php selected($element['default_value']['ampm'], 'am'); ?>><?php echo esc_html($amString); ?></option>
                    <option value="pm" <?php selected($element['default_value']['ampm'], 'pm'); ?>><?php echo esc_html($pmString); ?></option>
                </select>
                <p class="ifb-preview-description <?php if (!strlen($element['description'])) echo 'ifb-hidden'; ?>"><?php echo $element['description']; ?></p>
            </div>
            <span class="ifb-handle"></span>
        </div>
    </div>
    <div class="ifb-element-settings ifb-element-settings-time">
        <div class="ifb-element-settings-tabs" id="ifb-element-settings-tabs-<?php echo $id; ?>">
            <ul class="ifb-tabs-nav">
                <li><a href="#ifb-element-settings-tab-settings-<?php echo $id; ?>"><?php esc_html_e('Settings', 'iphorm'); ?></a></li>
                <li><a href="#ifb-element-settings-tab-more-<?php echo $id; ?>"><?php esc_html_e('Optional', 'iphorm'); ?></a></li>
                <li><a href="#ifb-element-settings-tab-advanced-<?php echo $id; ?>"><?php esc_html_e('Advanced', 'iphorm'); ?></a></li>
            </ul>
            <div class="ifb-tabs-panel" id="ifb-element-settings-tab-settings-<?php echo $id; ?>">
                <div class="ifb-element-settings-inner">
                    <table class="ifb-form-table ifb-element-settings-form-table ifb-element-settings-settings-form-table">
                        <?php include 'settings/label.php'; ?>
                        <?php include 'settings/description.php'; ?>
                        <?php include 'settings/required.php'; ?>
                        <?php include 'settings/tooltip.php'; ?>
                        <?php include '_save.php'; ?>
                    </table>
                </div>
            </div>
            <div class="ifb-tabs-panel" id="ifb-element-settings-tab-more-<?php echo $id; ?>">
                <div class="ifb-element-settings-inner">
                    <table class="ifb-form-table ifb-element-settings-form-table ifb-element-settings-more-form-table">
                        <?php include 'settings/admin-label.php'; ?>
                        <?php include 'settings/required-message.php'; ?>
                        <?php include 'settings/hide-from-email.php'; ?>
                        <?php include 'settings/save-to-database.php'; ?>
                        <?php include 'settings/label-placement.php'; ?>
                        <tr valign="top">
                            <th scope="row"><label for="time_12_24_<?php echo $id; ?>"><?php esc_html_e('12/24 hour time', 'iphorm'); ?></label></th>
                            <td>
                                <select id="time_12_24_<?php echo $id; ?>" name="time_12_24_<?php echo $id; ?>" onchange="iPhorm.updateTimePreview(iPhorm.getElementById(<?php echo $id; ?>));">
                                    <option value="12" <?php selected($element['time_12_24'], '12'); ?>><?php esc_html_e('12 hour', 'iphorm'); ?></option>
                                    <option value="24" <?php selected($element['time_12_24'], '24'); ?>><?php esc_html_e('24 hour', 'iphorm'); ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">
                                <div class="ifb-tooltip"><div class="ifb-tooltip-content">
                                    <?php esc_html_e('Shows the headings for HH, MM and am/pm as the first options in the dropdown menus.', 'iphorm'); ?>
                                </div></div>
                                <label for="show_time_headings_<?php echo $id; ?>"><?php esc_html_e('Show time headings', 'iphorm'); ?></label></th>
                            <td>
                                <input type="checkbox" id="show_time_headings_<?php echo $id; ?>" name="show_time_headings_<?php echo $id; ?>" <?php checked(true, $element['show_time_headings']); ?> onclick="iPhorm.showTimeHeadings(this.checked, iPhorm.getElementById(<?php echo $id; ?>));" />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">
                                <div class="ifb-tooltip"><div class="ifb-tooltip-content">
                                    <?php esc_html_e('The start hour will be the first hour in the hour dropdown and every hour from the start hour to the end hour will be displayed.', 'iphorm'); ?>
                                </div></div>
                                <label for="start_hour_<?php echo $id; ?>"><?php esc_html_e('Start hour', 'iphorm'); ?></label></th>
                            <td>
                                <input type="text" id="start_hour_<?php echo $id; ?>" name="start_hour_<?php echo $id; ?>" value="<?php echo esc_attr($element['start_hour']); ?>" class="ifb-halfwidth-input" />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">
                                <div class="ifb-tooltip"><div class="ifb-tooltip-content">
                                    <?php esc_html_e('The end hour will be the last hour in the hour dropdown and every hour from the start hour to the end hour will be displayed.', 'iphorm'); ?>
                                </div></div>
                                <label for="end_hour_<?php echo $id; ?>"><?php esc_html_e('End hour', 'iphorm'); ?></label></th>
                            <td>
                                <input type="text" id="end_hour_<?php echo $id; ?>" name="end_hour_<?php echo $id; ?>" value="<?php echo esc_attr($element['end_hour']); ?>" class="ifb-halfwidth-input" />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><label><?php esc_html_e('Default value', 'iphorm'); ?></label></th>
                            <td>
                                <select id="default_value_<?php echo $id; ?>_hour" name="default_value_<?php echo $id; ?>[hour]" onchange="iPhorm.updateTimePreview(iPhorm.getElementById(<?php echo $id; ?>));">
                                    <?php if ($element['show_time_headings']) : ?><option value=""><?php echo esc_html($hhString); ?></option><?php endif; ?>
                                    <?php if ($sh > $eh) : ?>
                                        <?php for ($i = $sh; $i >= $eh; $i--) : ?>
                                            <?php $i = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                                            <option value="<?php echo $i; ?>" <?php selected($element['default_value']['hour'], $i); ?>><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                    <?php else : ?>
                                        <?php for ($i = $sh; $i <= $eh; $i++) : ?>
                                            <?php $i = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                                            <option value="<?php echo $i; ?>" <?php selected($element['default_value']['hour'], $i); ?>><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </select>
                                <select id="default_value_<?php echo $id; ?>_minute" name="default_value_<?php echo $id; ?>[minute]" onchange="iPhorm.updateTimePreview(iPhorm.getElementById(<?php echo $id; ?>));">
                                    <?php if ($element['show_time_headings']) : ?><option value=""><?php echo esc_html($mmString); ?></option><?php endif; ?>
                                    <?php foreach (range(0, 59) as $min) : ?>
                                        <?php if ($min % $element['minute_granularity'] == 0) : ?>
                                            <?php $min = str_pad($min, 2, '0', STR_PAD_LEFT); ?>
                                            <option value="<?php echo $min; ?>" <?php selected($element['default_value']['minute'], $min); ?>><?php echo $min; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <select id="default_value_<?php echo $id; ?>_ampm" name="default_value_<?php echo $id; ?>[ampm]" onchange="iPhorm.updateTimePreview(iPhorm.getElementById(<?php echo $id; ?>));" <?php if ($element['time_12_24'] == '24') echo 'class="ifb-hidden"'; ?>>
                                    <?php if ($element['show_time_headings']) : ?><option value=""><?php echo esc_html($ampmString); ?></option><?php endif; ?>
                                    <option value="am" <?php selected($element['default_value']['ampm'], 'am'); ?>><?php echo esc_html($amString); ?></option>
                                    <option value="pm" <?php selected($element['default_value']['ampm'], 'pm'); ?>><?php echo esc_html($pmString); ?></option>
                                </select>
                                <span class="ifb-refresh-default-value ifb-simple-tooltip" onclick="iPhorm.updateTimePreview(iPhorm.getElementById(<?php echo $id; ?>));" title="<?php esc_attr_e('Updates the default value options with your changes to other settings', 'iphorm'); ?>"><?php esc_html_e('Sync with changes', 'iphorm'); ?></span>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">
                                <div class="ifb-tooltip"><div class="ifb-tooltip-content">
                                    <?php esc_html_e('Determines how many minutes to show per hour. 1 will show all 60 minutes, 5 will show minutes at 5 minute intervals, 10 at 10 minute intervals and so on.', 'iphorm'); ?>
                                </div></div>
                                <label for="minute_granularity_<?php echo $id; ?>"><?php esc_html_e('Minute granularity', 'iphorm'); ?></label>
                            </th>
                            <td>
                                <select id="minute_granularity_<?php echo $id; ?>" name="minute_granularity_<?php echo $id; ?>" onchange="iPhorm.updateTimePreview(iPhorm.getElementById(<?php echo $id; ?>));">
                                    <option value="1" <?php selected($element['minute_granularity'], 1); ?>>1</option>
                                    <option value="5" <?php selected($element['minute_granularity'], 5); ?>>5</option>
                                    <option value="10" <?php selected($element['minute_granularity'], 10); ?>>10</option>
                                    <option value="15" <?php selected($element['minute_granularity'], 15); ?>>15</option>
                                    <option value="20" <?php selected($element['minute_granularity'], 20); ?>>20</option>
                                    <option value="30" <?php selected($element['minute_granularity'], 30); ?>>30</option>
                                </select>
                            </td>
                        </tr>
                        <?php
                            if (!isset($element['time_format'])) $element['time_format'] = 'g:i a';
                            $timeFormats = iphorm_get_time_formats();
                        ?>
                        <tr valign="top">
                            <th scope="row"><label for="time_format_<?php echo $id; ?>"><?php esc_html_e('Time format', 'iphorm'); ?></label></th>
                            <td>
                                <select id="time_format_<?php echo $id; ?>" name="time_format_<?php echo $id; ?>">
                                    <?php foreach ($timeFormats as $format => $example) : ?>
                                        <option value="<?php echo $format; ?>" <?php selected($element['time_format'], $format); ?>><?php echo esc_html($example); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p class="description"><?php esc_html_e('The format of the time when displayed in the notification email and when viewing entries', 'iphorm'); ?></p>
                            </td>
                        </tr>
                        <?php $timeValidator = new iPhorm_Validator_Time();
                        if (!isset($element['time_validator_message_invalid'])) $element['time_validator_message_invalid'] = ''; ?>
                        <tr valign="top">
                            <th scope="row"><label for="time_validator_message_invalid_<?php echo $id; ?>"><?php esc_html_e('Error message if invalid time', 'iphorm'); ?></label></th>
                            <td>
                                <input type="text" id="time_validator_message_invalid_<?php echo $id; ?>" name="time_validator_message_invalid_<?php echo $id; ?>" value="<?php echo esc_attr($element['time_validator_message_invalid']); ?>" />
                                <p class="description"><?php printf(esc_html__('Translate or override the error message shown if the time is not valid. The default is "%s".', 'iphorm'), '<span class="ifb-bold">' . $timeValidator->getMessageTemplate('invalid') . '</span>'); ?></p>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><label><?php esc_html_e('Translations', 'iphorm'); ?></label></th>
                            <td>
                                <table class="ifb-form-table ifb-form-subtable">
                                    <tr>
                                        <th scope="row"><?php echo esc_html(_x('HH', 'select hour', 'iphorm')); ?></th>
                                        <td><input type="text" id="hh_string_<?php echo $id; ?>" name="hh_string_<?php echo $id; ?>" value="<?php echo esc_attr($element['hh_string']); ?>" class="ifb-smallish-input" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php echo esc_html(_x('MM', 'select minute', 'iphorm')); ?></th>
                                        <td><input type="text" id="mm_string_<?php echo $id; ?>" name="mm_string_<?php echo $id; ?>" value="<?php echo esc_attr($element['mm_string']); ?>" class="ifb-smallish-input" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php echo esc_html(_x('am/pm', 'select morning/afternoon', 'iphorm')); ?></th>
                                        <td><input type="text" id="ampm_string_<?php echo $id; ?>" name="ampm_string_<?php echo $id; ?>" value="<?php echo esc_attr($element['ampm_string']); ?>" class="ifb-smallish-input" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php echo esc_html(_x('am', 'time, morning', 'iphorm')); ?></th>
                                        <td><input type="text" id="am_string_<?php echo $id; ?>" name="am_string_<?php echo $id; ?>" value="<?php echo esc_attr($element['am_string']); ?>" class="ifb-smallish-input" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php echo esc_html(_x('pm', 'time, evening', 'iphorm')); ?></th>
                                        <td><input type="text" id="pm_string_<?php echo $id; ?>" name="pm_string_<?php echo $id; ?>" value="<?php echo esc_attr($element['pm_string']); ?>" class="ifb-smallish-input" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <?php include 'settings/tooltip-type.php'; ?>
                        <?php include 'settings/prevent-duplicates.php'; ?>
                        <?php include 'settings/conditional-logic.php'; ?>
                        <?php include 'settings/dynamic-default-value.php'; ?>
                        <?php include '_save.php'; ?>
                    </table>
                </div>
            </div>
            <div class="ifb-tabs-panel" id="ifb-element-settings-tab-advanced-<?php echo $id; ?>">
                <div class="ifb-element-settings-inner">
                    <table class="ifb-form-table ifb-element-settings-form-table ifb-element-settings-advanced-form-table">
                        <?php include 'settings/styles.php'; ?>
                        <?php include 'settings/unique-id.php'; ?>
                        <?php include 'settings/selectors.php'; ?>
                        <?php include '_save.php'; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>