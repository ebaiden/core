<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * ____file_title____
 *  
 * @category   Lite Commerce
 * @package    Lite Commerce
 * @subpackage ____sub_package____
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2009 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @version    SVN: $Id$
 * @link       http://www.qtmsoft.com/
 * @since      3.0.0 EE
 */


/**
 * XLite_Core_Handler 
 * 
 * @package    Lite Commerce
 * @subpackage ____sub_package____
 * @since      3.0.0 EE
 */
class XLite_Core_Handler extends XLite_Base
{
	/**
     * Widget template filename
     * FIXME - should be moved to Viewers (lowest priority task)
     *
     * @var    string
     * @access protected
     * @since  3.0.0 EE
     */
    protected $template = null;

    /**
     * Validity flag
     * TODO - check where it's really needed
     * 
     * @var    bool
     * @access protected
     * @since  3.0.0 EE
     */
    protected $valid = true;

    /**
     * Handler parameters 
     * FIXME - backward compatibility
     * 
     * @var    array
     * @access protected
     * @since  3.0.0 EE
     */
    protected $params = array();


    /**
     * Set properties
     * FIXME - backward compatibility
     *
     * @param array $attrs params to set
     *
     * @return void
     * @access public
     * @since  3.0.0 EE
     */
    public function setAttributes(array $attrs)
    {
        foreach ($attrs as $name => $value) {
            // FIXME - mapping
            $this->$name = $value;
        }
    }

    /**
     * Check if handler is valid 
     * TODO - check where it's really needed
     * 
     * @return bool
     * @access public
     * @since  3.0.0 EE
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * Compose URL from target, action and additional params
     *
     * @param string $target page identifier
     * @param string $action action to perform
     * @param array  $params additional params
     *
     * @return string
     * @access public
     * @since  3.0
     */
    public function buildURL($target, $action = '', array $params = array())
    {
        return XLite_Core_Converter::buildURL($target, $action, $params);
    }

    /**
     * Compose URL path from target, action and additional params
     * FIXME - this method must be removed
     *
     * @param string $target page identifier
     * @param string $action action to perform
     * @param array  $params additional params
     *
     * @return string
     * @access public
     * @since  3.0
     */
    public function buildURLPath($target, $action = '', array $params = array())
    {
        $url = $this->buildURL($target, $action, $params);
        $parts = parse_url($url);

        return (!isset($parts['path']) || strlen($parts['path'])) ? './' : $parts['path'];
    }

    /**
     * Compose URL query arguments from target, action and additional params
     * FIXME - this method must be removed
     *
     * @param string $target page identifier
     * @param string $action action to perform
     * @param array  $params additional params
     *
     * @return array
     * @access public
     * @since  3.0
     */
    public function buildURLArguments($target, $action = '', array $params = array())
    {
        $url = $this->buildURL($target, $action, $params);
        $parts = parse_url($url);

        $args = array();
        if (isset($parts['query'])) {
            parse_str($parts['query'], $args);
        }

        return $args;
    }

    /**
     * Initialize widget
     * FIXME - backward compatibility; to delete
     *
     * @return void
     * @access public
     * @since  3.0.0 EE
     */
    public function init()
    {
        $this->setAttributes(XLite_Core_Request::getInstance()->getData());
        $this->fillForm();
    }

    /**
     * FIXME - backward compatibility; to delete
     * 
     * @param mixed $request ____param_comment____
     *  
     * @return void
     * @access public
     * @since  3.0.0 EE
     */
    public function mapRequest($request = null)
    {
    }

    /**
     * FIXME - backward compatibility; to delete 
     * 
     * @return void
     * @access public
     * @since  3.0.0 EE
     */
    public function fillForm()
    {
    }
}

