<?php
/*
 * Plugin Name: Quform
 * Plugin URI: http://www.quform.com
 * Description: The Quform form builder makes it easy to build forms in WordPress.
 * Version: 1.8.0
 * Author: ThemeCatcher
 * Author URI: http://www.themecatcher.net
 * Text Domain: iphorm
 */

defined('IPHORM_VERSION')
    || define('IPHORM_VERSION', '1.8.0');

defined('IPHORM_DB_VERSION')
    || define('IPHORM_DB_VERSION', 11);

defined('IPHORM_PLUGIN_NAME')
    || define('IPHORM_PLUGIN_NAME', basename(dirname(__FILE__)));

defined('IPHORM_PLUGIN_BASENAME')
    || define('IPHORM_PLUGIN_BASENAME', IPHORM_PLUGIN_NAME . '/' . basename(__FILE__));

defined('IPHORM_PLUGIN_DIR')
    || define('IPHORM_PLUGIN_DIR', untrailingslashit(plugin_dir_path(__FILE__)));

defined('IPHORM_INCLUDES_DIR')
    || define('IPHORM_INCLUDES_DIR', IPHORM_PLUGIN_DIR . '/includes');

defined('IPHORM_ADMIN_DIR')
    || define('IPHORM_ADMIN_DIR', IPHORM_PLUGIN_DIR . '/admin');

defined('IPHORM_ADMIN_INCLUDES_DIR')
    || define('IPHORM_ADMIN_INCLUDES_DIR', IPHORM_ADMIN_DIR . '/includes');

defined('IPHORM_API_URL')
    || define('IPHORM_API_URL', 'http://www.themecatcher.net/iphorm-form-builder/api/');

defined('IPHORM_LANGUAGE_FILES') || define('IPHORM_LANGUAGE_FILES', serialize(array(
    'iphorm-nl_NL.mo',
    'iphorm-nl_NL.po',
    'iphorm-de_DE.mo',
    'iphorm-de_DE.po',
    'iphorm-ru_RU.mo',
    'iphorm-ru_RU.po',
    'iphorm-uk.mo',
    'iphorm-uk.po',
    'iphorm-it_IT.mo',
    'iphorm-it_IT.po',
    'iphorm-bg_BG.mo',
    'iphorm-bg_BG.po',
    'iphorm-pt_BR.mo',
    'iphorm-pt_BR.po',
    'iphorm-fa_IR.po',
    'iphorm-fa_IR.mo',
    'iphorm-fr_FR.po',
    'iphorm-fr_FR.mo',
    'iphorm-hr.po',
    'iphorm-hr.mo',
    'iphorm-sv_SE.po',
    'iphorm-sv_SE.mo',
    'iphorm-hu_HU.po',
    'iphorm-hu_HU.mo',
    'iphorm-zh_CN.mo',
    'iphorm-zh_CN.po',
    'iphorm-es_ES.mo',
    'iphorm-es_ES.po',
    'iphorm-tr_TR.mo',
    'iphorm-tr_TR.po'
)));

require_once IPHORM_INCLUDES_DIR . '/common.php';