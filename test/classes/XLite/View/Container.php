<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Template container
 *  
 * @category   Lite Commerce
 * @package    View
 * @subpackage ____sub_package____
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2009 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @version    SVN: $Id$
 * @link       http://www.qtmsoft.com/
 * @since      3.0.0 EE
 */


/**
 * Template container 
 * 
 * @package    View
 * @subpackage ____sub_package____
 * @since      3.0.0 EE
 */
abstract class XLite_View_Container extends XLite_View_Abstract
{
    /**
     * Widget body default template 
     * 
     * @var    string
     * @access protected
     * @since  3.0.0 EE
     */
    protected $body = 'body.tpl';

    /**
     * Targets this widget is allowed for 
     * TODO - we need to move this into the XLite_View_Abstract
     * 
     * @var    array
     * @access protected
     * @since  3.0.0 EE
     */
    protected $allowedTargets = array();


    /**
     * Return title 
     * 
     * @return string
     * @access protected
     * @since  3.0.0 EE
     */
    abstract protected function getHead();

    /**
     * Return templates directory name 
     * 
     * @return string
     * @access protected
     * @since  3.0.0 EE
     */
    abstract protected function getDir();


    /**
     * Return file name for the center part template 
     * 
     * @return string
     * @access protected
     * @since  3.0.0 EE
     */
    protected function getBody()
    {
        return $this->getDir() . LC_DS . $this->body;
    }

	/**
	 * Determines if need to display only a widget body
	 * 
	 * @return bool
	 * @access protected
	 * @since  3.0.0 EE
	 */
	protected function isWrapped()
	{
		return $this->attributes['showWrapper'] && !XLite_Core_CMSConnector::isCMSStarted();
	}

    /**
     * Check visibility according to the current target
     * TODO - we need to move this function into the XLite_View_Abstract 
     * 
     * @return void
     * @access protected
     * @since  3.0.0 EE
     */
    protected function checkTarget()
    {
        return empty($this->allowedTargets) || in_array(XLite_Core_Request::getInstance()->target, $this->allowedTargets);
    }


    /**
     * Check if widget is visible
     * TODO - we need to move this function into the XLite_View_Abstract (instead of the isDisplayRequired())
     *
     * @return bool
     * @access protected
     * @since  3.0.0 EE
     */
    public function isVisible()
    {
        return parent::isVisible() && $this->checkTarget();
    }


    /**
     * Check passed attributes
     * TODO - check if we need to move this function into the XLite_View_Abstract
     *
     * @param array $attrs attributes to check
     *
     * @return array errors list
     * @access public
     * @since  1.0.0
     */
    public function validateAttributes(array $attrs)
    {
        $messages = array();

        foreach ($this->widgetParams as $name => $param) {

            if (isset($attrs[$name])) {
                list($result, $widgetErrors) = $param->validate($attrs[$name]);
                if (false === $result) {
                    $messages[] = $param->label . ': ' . implode('<br />' . $param->label . ': ', $widgetErrors);
                }
            } else {
                $messages[] = $param->label . ': is not set';
            }
        }

        return parent::validateAttributes($attrs) + $messages;
    }

    /**
     * Set attributes and template (is needed)
     * 
     * @param array $attributes widget attributes
     *  
     * @return void
     * @access public
     * @since  3.0.0 EE
     */
    public function __construct(array $attributes = array())
    {
        $this->attributes['showWrapper'] = true;

        // FIXME - move this into the XLite_View_Abstract class
        foreach ($this->getWidgetParams() as $name => $param) {
            $this->attributes[$name] = $param->value;
        }

        parent::__construct($attributes);

        if (!$this->isWrapped()) {
            $this->template = $this->getDir() . LC_DS . $this->body;
        }
    }
}

