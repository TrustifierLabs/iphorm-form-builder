<?php

/**
 * iPhorm_Validator_Captcha
 *
 * Validates the value against the saved CAPTCHA code
 *
 * @package iPhorm
 * @subpackage Validator
 * @copyright Copyright (c) 2009-2011 ThemeCatcher (http://www.themecatcher.net)
 */
class iPhorm_Validator_Captcha extends iPhorm_Validator_Abstract
{
    /**
     * Constructor
     *
     * @param array $options
     */
    public function __construct($options = null)
    {
        $this->_messageTemplates = array(
            'not_match' => __('The value does not match',  'iphorm')
        );

        if (is_array($options)) {
            if (array_key_exists('messages', $options)) {
                $this->setMessageTemplates($options['messages']);
            }
        }
    }

    /**
     * Compares the given value with the captcha value
     * saved in session. Also sets the error message.
     *
     * @param $value The value to check
     * @return boolean True if valid false otherwise
     */
    public function isValid($value)
    {
        if (isset($_POST['iphorm_uid'])) {
            $uniqId = (string) $_POST['iphorm_uid'];
            if (isset($_SESSION['iphorm-captcha-' . $uniqId]) && strtolower($_SESSION['iphorm-captcha-' . $uniqId]) == strtolower($value)) {
                return true;
            }
        }

        $message = sprintf($this->_messageTemplates['not_match'], $value);
        $this->addMessage($message);
        return false;
    }
}