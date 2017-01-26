<?php

/**
 * iPhorm_Validator_Time
 *
 * Checks that the given value is a valid time
 *
 * @copyright Copyright (c) 2009-2015 ThemeCatcher (http://www.themecatcher.net)
 */
class iPhorm_Validator_Time extends iPhorm_Validator_Abstract
{
    /**
     * Is the time in 24 hour format?
     * @var boolean
     */
    protected $is24Hr = false;

    /**
     * @param array $options
     */
    public function __construct($options = null)
    {
        $this->_messageTemplates = array(
            'invalid' => __('This is not a valid time',  'iphorm'),
        );

        if (is_array($options)) {
            if (array_key_exists('messages', $options)) {
                $this->setMessageTemplates($options['messages']);
            }

            if (array_key_exists('is24Hr', $options)) {
                $this->is24Hr = $options['is24Hr'];
            }
        }
    }

    /**
     * Checks whether the given value is a valid time. Also sets
     * the error message if not.
     *
     * @param   array  $value  The value to check
     * @return  bool           True if valid false otherwise
     */
    public function isValid($value)
    {
        if (is_array($value) && isset($value['hour'], $value['minute'])
            && preg_match('/(2[0-3]|[01][0-9]):[0-5][0-9]/', $value['hour'].':'.$value['minute'])
            && ($this->is24Hr || isset($value['ampm']) && in_array($value['ampm'], array('am', 'pm')))
        ) {
            return true;
        }

        $this->addMessage($this->_messageTemplates['invalid']);

        return false;
    }
}
