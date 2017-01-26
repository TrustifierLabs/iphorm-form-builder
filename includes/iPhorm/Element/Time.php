<?php

/**
 * iPhorm_Element_Time
 *
 * Time element
 *
 * @package iPhorm
 * @subpackage Element
 * @copyright Copyright (c) 2009-2011 ThemeCatcher (http://www.themecatcher.net)
 */
class iPhorm_Element_Time extends iPhorm_Element
{
    /**
     * The time display mode 12 or 24 hour
     * @var string
     */
    protected $_time1224 = '12';

    /**
     * Determines the gap between minutes
     * @var int
     */
    protected $_minuteGranularity = 1;

    /**
     * The date() format to display the time
     * @var string
     */
    protected $_timeFormat = 'g:i a';

    /**
     * Show the HH/MM headings as the first options
     * @var boolean
     */
    protected $_showTimeHeadings = true;

    /**
     * The start hour of the hour dropdown
     * @var integer
     */
    protected $_startHour = 1;

    /**
     * The end hour of the hour dropdown
     * @var integer
     */
    protected $_endHour = 12;

    /**
     * Translated 'HH'
     * @var string
     */
    protected $_hhString = '';

    /**
     * Translated 'MM'
     * @var string
     */
    protected $_mmString = '';

        /**
     * Translated 'ap/pm'
     * @var string
     */
    protected $_ampmString = '';

    /**
     * Translated 'am'
     * @var string
     */
    protected $_amString = '';

    /**
     * Translated 'pm'
     * @var string
     */
    protected $_pmString = '';

    /**
     * Constructor
     *
     * @param array $config
     */
    public function __construct(array $config = array())
    {
        parent::__construct($config);

        if (array_key_exists('time_12_24', $config)) {
            $this->setTime1224($config['time_12_24']);
        }

        $this->addValidator('time', array('is24Hr' => $this->getTime1224() == '24'));

        if (array_key_exists('minute_granularity', $config)) {
            $this->setMinuteGranularity($config['minute_granularity']);
        }

        if (array_key_exists('time_format', $config)) {
            $this->setTimeFormat($config['time_format']);
        }

        if (array_key_exists('show_time_headings', $config)) {
            $this->setShowTimeHeadings($config['show_time_headings']);
        }

        if (array_key_exists('start_hour', $config)) {
            $this->setStartHour($config['start_hour']);
        }

        if (array_key_exists('end_hour', $config)) {
            $this->setEndHour($config['end_hour']);
        }

        if (array_key_exists('time_validator_message_invalid', $config)) {
            if (strlen($config['time_validator_message_invalid'])) {
                $this->getValidator('time')->setMessageTemplate('invalid', $config['time_validator_message_invalid']);
            }
        }

        if (array_key_exists('hh_string', $config)) {
            $this->setHhString($config['hh_string']);
        }

        if (array_key_exists('mm_string', $config)) {
            $this->setMmString($config['mm_string']);
        }

        if (array_key_exists('ampm_string', $config)) {
            $this->setAmpmString($config['ampm_string']);
        }

        if (array_key_exists('am_string', $config)) {
            $this->setAmString($config['am_string']);
        }

        if (array_key_exists('pm_string', $config)) {
            $this->setPmString($config['pm_string']);
        }
    }

    /**
     * Sets 12 hour or 24 hour display mode
     *
     * '12' for 12 hour
     * '24' for 24 hour
     *
     * @param string $time1224
     */
    public function setTime1224($time1224)
    {
        $this->_time1224 = $time1224;
    }

    /**
     * Get the display mode, 12 or 24 hour
     *
     * @return string
     */
    public function getTime1224()
    {
        return $this->_time1224;
    }

    /**
     * Get whether to show the time headings
     *
     * @param boolean $flag
     */
    public function setShowTimeHeadings($flag)
    {
        $this->_showTimeHeadings = (bool) $flag;
    }

    /**
     * Set whether to show the time headings
     *
     * @return boolean
     */
    public function getShowTimeHeadings()
    {
        return $this->_showTimeHeadings;
    }

    /**
     * Set the start hour of the hour dropdown
     *
     * @param integer $startHour
     */
    public function setStartHour($startHour)
    {
        $this->_startHour = $startHour;
    }

    /**
     * Get the start hour of the hour dropdown
     *
     * @return integer
     */
    public function getStartHour()
    {
        $startHour = strlen($this->_startHour) ? absint($this->_startHour) : ($this->getTime1224() == '24' ? 0 : 1);
        return apply_filters('iphorm_start_hour_' . $this->getName(), $startHour);
    }

    /**
     * Set the end hour of the hour dropdown
     *
     * @param integer $endHour
     */
    public function setEndHour($endHour)
    {
        $this->_endHour = $endHour;
    }

    /**
     * Get the end hour of the hour dropdown
     *
     * @return integer
     */
    public function getEndHour()
    {
        $endHour = strlen($this->_endHour) ? absint($this->_endHour) : ($this->getTime1224() == '24' ? 23 : 12);
        return apply_filters('iphorm_end_hour_' . $this->getName(), $endHour);
    }

    /**
     * Set the minute granularity which determines the gap
     * between minutes
     *
     * @param int $minuteGranularity
     */
    public function setMinuteGranularity($minuteGranularity)
    {
        $this->_minuteGranularity = $minuteGranularity;
    }

    /**
     * Get the minute granularity which determines the gap
     * between minutes
     *
     * @return int
     */
    public function getMinuteGranularity()
    {
        return $this->_minuteGranularity;
    }

    /**
     * Set the date() format for displaying the time
     *
     * @param string $timeFormat
     */
    public function setTimeFormat($timeFormat)
    {
        $this->_timeFormat = $timeFormat;
    }

    /**
     * Get the date() format for displaying the time
     *
     * @return string
     */
    public function getTimeFormat()
    {
        return $this->_timeFormat;
    }

    /**
     * Set the 'HH' string
     *
     * @param string $hhString
     */
    public function setHhString($hhString)
    {
        $this->_hhString = $hhString;
    }

    /**
     * Get the 'HH' string
     *
     * @param string $hhString
     */
    public function getHhString()
    {
        return strlen($this->_hhString) ? $this->_hhString : _x('HH', 'select hour', 'iphorm');
    }

    /**
     * Set the 'MM' string
     *
     * @param string $mmString
     */
    public function setMmString($mmString)
    {
        $this->_mmString = $mmString;
    }

    /**
     * Get the 'MM' string
     *
     * @param string $mmString
     */
    public function getMmString()
    {
        return strlen($this->_mmString) ? $this->_mmString : _x('MM', 'select minute', 'iphorm');
    }

    /**
     * Set the 'am/pm' string
     *
     * @param string $ampmString
     */
    public function setAmpmString($ampmString)
    {
        $this->_ampmString = $ampmString;
    }

    /**
     * Get the 'am/pm' string
     *
     * @param string $ampmString
     */
    public function getAmpmString()
    {
        return strlen($this->_ampmString) ? $this->_ampmString : _x('am/pm', 'select morning/afternoon', 'iphorm');
    }

    /**
     * Set the 'am' string
     *
     * @param string $amString
     */
    public function setAmString($amString)
    {
        $this->_amString = $amString;
    }

    /**
     * Get the 'am' string
     *
     * @param string $amString
     */
    public function getAmString()
    {
        return strlen($this->_amString) ? $this->_amString : _x('am', 'time, morning', 'iphorm');
    }

    /**
     * Set the 'pm' string
     *
     * @param string $pmString
     */
    public function setPmString($pmString)
    {
        $this->_pmString = $pmString;
    }

    /**
     * Get the 'pm' string
     *
     * @param string $amString
     */
    public function getPmString()
    {
        return strlen($this->_pmString) ? $this->_pmString : _x('pm', 'time, evening', 'iphorm');
    }

    /**
     * Get the value formatted in HTML
     *
     * @return string
     */
    public function getValueHtml($separator = '<br />')
    {
        return esc_html($this->getValuePlain($separator));
    }

    /**
     * Get the value formatted in plain text
     *
     * @return string
     */
    public function getValuePlain($separator = ', ')
    {
        $v = $this->getValue();
        $value = '';

        if (!$this->isEmpty()) {
            if ($this->getTime1224() == '12') {
                $time = strtotime($v['hour'].':'.$v['minute'].' '.$v['ampm']);
            } else {
                $time = strtotime($v['hour'].':'.$v['minute']);
            }

            $value = date_i18n($this->getTimeFormat(), $time);
        }

        return $value;
    }

    /**
     * Get the value as string
     *
     * @return string
     * @deprecated 1.4.2 Use getValuePlain() instead
     */
    public function getValueAsString($separator = ', ')
    {
        return $this->getValuePlain($separator);
    }

    /**
     * Prepare the dynamic default value
     *
     * @param string $value
     */
    public function prepareDynamicValue($value)
    {
        $parts = explode(',', $value);

        return array(
            'hour' => isset($parts[0]) ? $parts[0] : '',
            'minute' => isset($parts[1]) ? $parts[1] : '',
            'ampm' => isset($parts[2]) ? $parts[2] : ''
        );
    }

    /**
     * Does this element have an empty value?
     *
     * @return boolean
     */
    public function isEmpty()
    {
        $v = $this->getValue();

        if (is_array($v)
            && isset($v['hour'], $v['minute'])
            && (is_numeric($v['hour']) && is_numeric($v['minute']))
        ) {
            if ($this->getTime1224() == '12') {
                if (isset($v['ampm']) && in_array($v['ampm'], array('am', 'pm'))) {
                    return false;
                }
            } else {
                return false;
            }
        }

        return true;
    }
}