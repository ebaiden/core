<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * LiteCommerce
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to licensing@litecommerce.com so we can send you a copy immediately.
 * 
 * PHP version 5.3.0
 * 
 * @category  LiteCommerce
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.litecommerce.com/
 * @see       ____file_see____
 * @since     1.0.0
 */

namespace XLite\Module\CDev\SimpleTaxes\Controller\Admin;

/**
 * Taxes controller
 * 
 * @see   ____class_see____
 * @since 1.0.0
 */
class Taxes extends \XLite\Controller\Admin\AAdmin
{
    /**
     * FIXME- backward compatibility
     *
     * @var   array
     * @see   ____var_see____
     * @since 1.0.0
     */
    protected $params = array('target', 'page', 'backURL');

    /**
     * Get pages sections
     *
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getPages()
    {
        $taxes = \XLite\Core\Database::getRepo('XLite\Module\CDev\SimpleTaxes\Model\Tax')->findAll();

        $pages = array();
        foreach ($taxes as $tax) {
            $pages[$tax->getId()] = $tax->getName();
        }

        return $pages;
    }

    /**
     * Get pages templates
     *
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getPageTemplates()
    {
        $list = array(
            'default' => 'modules/CDev/SimpleTaxes/edit.tpl',
        );

        foreach (array_keys($this->getPages()) as $key) {
            $list[$key] = 'modules/CDev/SimpleTaxes/edit.tpl';
        }

        return $list;
    }

    /**
     * Return the current page title (for the content area)
     *
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getTitle()
    {
        return 'Taxes';
    }

    /**
     * Common method to determine current location
     *
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getLocation()
    {
        return 'Taxes';
    }

    // {{{ Widget-specific getters

    /**
     * Get tax 
     * 
     * @return \XLite\Module\CDev\SimpleTaxes\Model\Tax
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getTax()
    {
        $page = \XLite\Core\Request::getInstance()->page;

        if (!$page) {
            $pages = $this->getPages();
            $page = key($pages);
        }

        return \XLite\Core\Database::getRepo('XLite\Module\CDev\SimpleTaxes\Model\Tax')->find($page);
    }

    /**
     * Check - current tax is vat or not
     * 
     * @return boolean
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function isVAT()
    {
        return $this->getTax()->getIncluded();
    }

    // }}}
}
