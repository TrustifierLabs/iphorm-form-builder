<?php

/**
 * iPhorm_Element_Checkbox
 *
 * Checkbox element
 *
 * @package iPhorm
 * @subpackage Element
 * @copyright Copyright (c) 2009-2011 ThemeCatcher (http://www.themecatcher.net)
 */
class iPhorm_Element_Checkbox extends iPhorm_Element_Multi
{
    /**
     * Constructor
     *
     * @param array $config
     */
    public function __construct($config = null)
    {
        parent::__construct($config);

        if (is_array($config)) {
            if (array_key_exists('options', $config) && is_array($config['options'])) {
                $this->addOptions($config['options']);
            }
        }
    }

    /**
     * Prepare the dynamic default value
     *
     * @param string $value
     */
    public function prepareDynamicValue($value)
    {
        return explode(',', $value);
    }

    /**
     * Does this element have the given value?
     *
     * @param mixed $value
     * @return boolean
     */
    public function hasValue($value)
    {
        return is_array($this->_value) && in_array($value, $this->_value);
    }
}