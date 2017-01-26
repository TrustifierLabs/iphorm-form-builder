<?php

/**
 * iPhorm_Element_Groupstart
 *
 * The start of an element group
 *
 * @package iPhorm
 * @subpackage Element
 * @copyright Copyright (c) 2009-2011 ThemeCatcher (http://www.themecatcher.net)
 */
class iPhorm_Element_Groupstart extends iPhorm_Element
{
    /**
     * The name of the group for admin purposes
     * @var string
     */
    protected $_adminTitle = '';

    /**
     * The title of the group
     * @var string
     */
    protected $_title = '';

    /**
     * The number of columns
     * @var int
     */
    protected $_numberOfColumns = 1;

    /**
     * The alignment of the in the columns
     * @var string
     */
    protected $_columnAlignment = 'proportional';

    /**
     * The style of group, plain or bordered
     * @var string
     */
    protected $_groupStyle = 'plain';

    /**
     * The group border colour, an array of CSSRuleSet's
     * @var array
     */
    protected $_borderColour = null;

    /**
     * The group background colour, an array of CSSRuleSet's
     * @var array
     */
    protected $_backgroundColour = null;

    /**
     * Whether the group contains at least one non-empty child element, this will be processed and set when processing the form
     * @var boolean
     */
    protected $_hasNonEmptyChild = false;

    /**
     * Whether the group contains at least one conditionally visible child element, this will be processed and set when processing the form
     * @var boolean
     */
    protected $_hasVisibleChild = false;

    /**
     * Show the group name as a sub-heading in the notification email
     *
     * @var boolean
     */
    protected $_showNameInEmail = false;

    /**
     * Constructor
     *
     * @param array $config
     */
    public function __construct($config = null)
    {
        if (is_array($config)) {
            if (array_key_exists('admin_title', $config)) {
                $this->setAdminTitle($config['admin_title']);
                unset($config['admin_title']);
            }

            if (array_key_exists('show_name_in_email', $config)) {
                $this->setShowNameInEmail($config['show_name_in_email']);
                unset($config['show_name_in_email']);
            }

            if (array_key_exists('title', $config)) {
                $this->setTitle($config['title']);
                unset($config['title']);
            }

            if (array_key_exists('number_of_columns', $config)) {
                $this->setNumberOfColumns($config['number_of_columns']);
                unset($config['number_of_columns']);
            }

            if (array_key_exists('column_alignment', $config)) {
                $this->setColumnAlignment($config['column_alignment']);
                unset($config['column_alignment']);
            }

            if (array_key_exists('group_style', $config)) {
                $this->setGroupStyle($config['group_style']);
                unset($config['group_style']);
            }

            if (array_key_exists('border_colour', $config)) {
                $this->setBorderColour($config['border_colour']);
                unset($config['border_colour']);
            }

            if (array_key_exists('background_colour', $config)) {
                $this->setBackgroundColour($config['background_colour']);
                unset($config['background_colour']);
            }
        }

        parent::__construct($config);
    }

    /**
     * Set the admin title (name) of the group
     *
     * @param string $title
     */
    public function setAdminTitle($title)
    {
        $this->_adminTitle = $title;
    }

    /**
     * Get the admin title (name) of the group
     *
     * @return string
     */
    public function getAdminTitle()
    {
        return $this->_adminTitle;
    }

    /**
     * Set the title of the group
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * Get the title of the group
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * Set the number of columns
     *
     * @param int $numberOfColumns
     */
    public function setNumberOfColumns($numberOfColumns)
    {
        $this->_numberOfColumns = $numberOfColumns;
    }

    /**
     * Get the number of columns
     *
     * @return int
     */
    public function getNumberOfColumns()
    {
        return $this->_numberOfColumns;
    }

    /**
     * Set the column alignment
     *
     * @param string $columnAlignment
     */
    public function setColumnAlignment($columnAlignment)
    {
        $this->_columnAlignment = $columnAlignment;
    }

    /**
     * Get the column alignment
     *
     * @return string
     */
    public function getColumnAlignment()
    {
        return $this->_columnAlignment;
    }

    /**
     * Set the group style
     *
     * @param string $groupStyle
     */
    public function setGroupStyle($groupStyle)
    {
        $this->_groupStyle = $groupStyle;
    }

    /**
     * Get the group style
     *
     * @return string
     */
    public function getGroupStyle()
    {
        return $this->_groupStyle;
    }

    /**
     * Set the group border colour
     *
     * @param string $colour The CSS hex colour
     */
    public function setBorderColour($colour)
    {
        if ($colour) {
            $this->_borderColour = iPhorm::parseCss('border-color: ' . $colour . ';');
        } else {
            $this->_borderColour = null;
        }
    }

    /**
     * Get the group border colour, returns an
     * array of CSSRuleSet's
     *
     * @return array
     */
    public function getBorderColour()
    {
        return $this->_borderColour;
    }

    /**
     * Set the group background colour
     *
     * @param string $colour The CSS hex colour
     */
    public function setBackgroundColour($colour)
    {
        if ($colour) {
            $this->_backgroundColour = iPhorm::parseCss('background-color: ' . $colour . ';');
        } else {
            $this->_backgroundColour = null;
        }
    }

    /**
     * Get the group background colour, returns an array of
     * CSSRuleSet's
     *
     * @return array
     */
    public function getBackgroundColour()
    {
        return $this->_backgroundColour;
    }

    /**
     * Merge extra CSS and with current CSS styles
     *
     * @param string $which The name of the section
     * @param array $rules The array of existing rules
     */
    public function getExtraCss($which, $rules)
    {
        switch ($which) {
            case 'groupElements':
                if (($borderColour = $this->getBorderColour()) !== null) {
                    $rules = array_merge($rules, $borderColour);
                }
                if (($backgroundColour = $this->getBackgroundColour()) !== null) {
                    $rules = array_merge($rules, $backgroundColour);
                }
                break;

        }
        return $rules;
    }

    /**
     * Set whether the group contains at least one non-empty child element, this will be processed and set when processing the form
     *
     * @param boolean $flag
     */
    public function setHasNonEmptyChild($flag)
    {
        $this->_hasNonEmptyChild = (bool) $flag;
    }

    /**
     * Set whether the group contains at least one conditionally visible child element
     *
     * @param boolean $flag
     */
    public function setHasVisibleChild($flag)
    {
        $this->_hasVisibleChild = (bool) $flag;
    }

    /**
     * Get whether the group contains at least one conditionally visible child element
     *
     * @return boolean
     */
    public function getHasVisibleChild($flag)
    {
        return $this->_hasVisibleChild;
    }

    /**
     * Get whether the group is empty
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return !$this->_hasNonEmptyChild;
    }

    /**
     * Get whether the group is hidden
     *
     * @return boolean
     */
    public function isHidden()
    {
        if ($this->_isHidden || $this->isConditionallyHidden() || !$this->_hasVisibleChild) {
            return true;
        }

        return false;
    }

    /**
     * Set whether to show the group name as a sub-heading in the notification email
     *
     * @param boolean $flag
     */
    public function setShowNameInEmail($flag)
    {
        $this->_showNameInEmail = (bool) $flag;
    }

    /**
     * Get whether to show the group name as a sub-heading in the notification email
     *
     * @return boolean
     */
    public function getShowNameInEmail()
    {
        return $this->_showNameInEmail;
    }
}