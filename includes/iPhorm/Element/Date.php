<?php

/**
 * iPhorm_Element_Date
 *
 * Date element
 *
 * @package iPhorm
 * @subpackage Element
 * @copyright Copyright (c) 2009-2011 ThemeCatcher (http://www.themecatcher.net)
 */
class iPhorm_Element_Date extends iPhorm_Element
{
    /**
     * Show the date headings, such as Day Month Year
     * @var boolean
     */
    protected $_showDateHeadings = true;

    /**
     * Translated dropdown heading for Day
     * @var string
     */
    protected $_dayHeading = '';

    /**
     * Translated dropdown heading for Month
     * @var string
     */
    protected $_monthHeading = '';

    /**
     * Translated dropdown heading for Year
     * @var string
     */
    protected $_yearHeading = '';

    /**
     * The start year, may be a placeholder
     * @var string
     */
    protected $_startYear = '';

    /**
     * The end year, may be a placeholder
     * @var string
     */
    protected $_endYear = '';

    /**
     * The date() format of the date for display
     * @var string
     */
    protected $_dateFormat = 'l, jS F Y';

    /**
     * Whether to show the jQuery UI datepicker
     * @var string
     */
    protected $_showDatepicker = true;

    /**
     * Whether to display the months as numbers
     * @var boolean
     */
    protected $_monthsAsNumbers = false;

    /**
     * The ordering of the day/month fields, 'eu' or 'us'
     * @var string
     */
    protected $_fieldOrder = 'eu';

    /**
     * Translations of the month names
     * @var array
     */
    protected $_monthTranslations = array(
        1 => '',
        2 => '',
        3 => '',
        4 => '',
        5 => '',
        6 => '',
        7 => '',
        8 => '',
        9 => '',
        10 => '',
        11 => '',
        12 => ''
    );

    /**
     * Constructor
     *
     * @param array $config
     */
    public function __construct($config = null)
    {
        parent::__construct($config);

        $this->addValidator('date');

        if (is_array($config)) {
            if (array_key_exists('show_date_headings', $config)) {
                $this->setShowDateHeadings($config['show_date_headings']);
            }

            if (array_key_exists('day_heading', $config)) {
                $this->setDayHeading($config['day_heading']);
            }

            if (array_key_exists('month_heading', $config)) {
                $this->setMonthHeading($config['month_heading']);
            }

            if (array_key_exists('year_heading', $config)) {
                $this->setYearHeading($config['year_heading']);
            }

            if (array_key_exists('start_year', $config)) {
                $this->setStartYear($config['start_year']);
            }

            if (array_key_exists('end_year', $config)) {
                $this->setEndYear($config['end_year']);
            }

            if (array_key_exists('date_validator_message_invalid', $config)) {
                if (strlen($config['date_validator_message_invalid'])) {
                    $this->getValidator('date')->setMessageTemplate('invalid', $config['date_validator_message_invalid']);
                }
            }

            if (array_key_exists('date_format', $config)) {
                $this->setDateFormat($config['date_format']);
            }

            if (array_key_exists('show_datepicker', $config)) {
                $this->setShowDatepicker($config['show_datepicker']);
            }

            if (array_key_exists('months_as_numbers', $config)) {
                $this->setMonthsAsNumbers($config['months_as_numbers']);
            }

            if (array_key_exists('field_order', $config)) {
                $this->setFieldOrder($config['field_order']);
            }

            if (array_key_exists('month_translations', $config)) {
                $this->setMonthTranslations($config['month_translations']);
            }
        }
    }

    /**
     * Set whether or not to show the date headings such as
     * Day Month Year as the first element in each drop down menu
     *
     * @param boolean $flag
     */
    public function setShowDateHeadings($flag)
    {
        $this->_showDateHeadings = (bool) $flag;
    }

    /**
     * Get whether or not to show the date headings such as
     * Day Month Year as the first element in each drop down menu
     *
     * @return boolean
     */
    public function getShowDateHeadings()
    {
        return $this->_showDateHeadings;
    }

    /**
     * Set the translated dropdown heading for Day
     *
     * @param string $dayHeading
     */
    public function setDayHeading($dayHeading)
    {
        $this->_dayHeading = $dayHeading;
    }

    /**
     * Get the translated dropdown heading for Day
     *
     * @return string
     */
    public function getDayHeading()
    {
        return strlen($this->_dayHeading) ? $this->_dayHeading : _x('Day', 'select day of the month', 'iphorm');
    }

    /**
     * Set the translated dropdown heading for Month
     *
     * @param string $monthHeading
     */
    public function setMonthHeading($monthHeading)
    {
        $this->_monthHeading = $monthHeading;
    }

    /**
     * Get the translated dropdown heading for Month
     *
     * @return string
     */
    public function getMonthHeading()
    {
        return strlen($this->_monthHeading) ? $this->_monthHeading : _x('Month', 'select month', 'iphorm');
    }

    /**
     * Set the translated dropdown heading for Year
     *
     * @param string $yearHeading
     */
    public function setYearHeading($yearHeading)
    {
        $this->_yearHeading = $yearHeading;
    }

    /**
     * Get the translated dropdown heading for Year
     *
     * @return string
     */
    public function getYearHeading()
    {
        return strlen($this->_yearHeading) ? $this->_yearHeading : _x('Year', 'select year', 'iphorm');
    }

    /**
     * Set the start year
     *
     * May be a placeholder
     *
     * @param string $endYear
     */
    public function setStartYear($startYear)
    {
        $this->_startYear = $startYear;
    }

    /**
     * Get the start year
     *
     * Placeholder dates will be replaced
     *
     * @return int
     */
    public function getStartYear()
    {
        return iphorm_get_start_year($this->_startYear);
    }

    /**
     * Set the end year
     *
     * May be a placeholder
     *
     * @param string $endYear
     */
    public function setEndYear($endYear)
    {
        $this->_endYear = $endYear;
    }

    /**
     * Get the end year
     *
     * Placeholder dates will be replaced
     *
     * @return int
     */
    public function getEndYear()
    {
        return iphorm_get_end_year($this->_endYear);
    }

    /**
     * Set the date() format used to display the date
     *
     * @param string $dateFormat
     */
    public function setDateFormat($dateFormat)
    {
        $this->_dateFormat = $dateFormat;
    }

    /**
     * Get the date() format used to display the dat
     *
     * @return string
     */
    public function getDateFormat()
    {
        return $this->_dateFormat;
    }

    /**
     * Set whether to show the jQuery UI datepicker
     *
     * @param boolean $flag
     */
    public function setShowDatepicker($flag)
    {
        $this->_showDatepicker = (bool) $flag;
    }

    /**
     * Get whether to show the jQuery UI datepicker
     *
     * @return boolean
     */
    public function getShowDatepicker()
    {
        return $this->_showDatepicker;
    }

    /**
     * Set whether to show the months as numbers
     *
     * @param boolean $flag
     */
    public function setMonthsAsNumbers($flag)
    {
        $this->_monthsAsNumbers  = (bool) $flag;
    }

    /**
     * Get whether to show the months as numbers
     *
     * @return boolean
     */
    public function getMonthsAsNumbers()
    {
        return $this->_monthsAsNumbers;
    }

    /**
     * Set the ordering of the day/month fields, 'eu' or 'us'
     *
     * @param string $flag
     */
    public function setFieldOrder($fieldOrder)
    {
        $this->_fieldOrder = $fieldOrder;
    }

    /**
     * Get the ordering of the day/month fields, 'eu' or 'us'
     *
     * @return string
     */
    public function getFieldOrder()
    {
        return $this->_fieldOrder;
    }

    /**
     * Set the translations of the month names
     *
     * @param array $monthTranslations
     */
    public function setMonthTranslations($monthTranslations)
    {
        $this->_monthTranslations = $monthTranslations;
    }

    /**
     * Get the translations of the month names
     *
     * @return array
     */
    public function getMonthTranslations()
    {
        return $this->_monthTranslations;
    }

    /**
     * Get the label for the month with the given number
     *
     * @param   int     $key    The number of the month 1-12
     * @param   string  $month  The default name of the month
     * @return  string
     */
    public function getMonthLabel($key, $month)
    {
        if ($this->getMonthsAsNumbers()) {
            return $key;
        } else if (strlen($this->_monthTranslations[$key])) {
            return $this->_monthTranslations[$key];
        }

        return $month;
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

        if (is_array($v) && isset($v['day']) && isset($v['month']) && isset($v['year'])) {
            $day = (int) $v['day'];
            $month = (int) $v['month'];
            $year = (int) $v['year'];

            if (checkdate($month, $day, $year)) {
                $value = date_i18n($this->getDateFormat(), mktime(0, 0, 0, $month, $day, $year));
            }
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
            'day' => isset($parts[0]) ? absint($parts[0]) : '',
            'month' => isset($parts[1]) ? absint($parts[1]) : '',
            'year' => isset($parts[2]) ? absint($parts[2]) : ''
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
            && isset($v['day'], $v['month'], $v['year'])
            && ($v['day'] != '' && $v['month'] != '' && $v['year'] != '')) {
            return false;
        }
        return true;
    }
}