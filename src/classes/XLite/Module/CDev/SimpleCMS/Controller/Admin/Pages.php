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

namespace XLite\Module\CDev\SimpleCMS\Controller\Admin;

/**
 * Pages controller
 *
 * @see   ____class_see____
 * @since 1.0.0
 */
class Pages extends \XLite\Controller\Admin\AAdmin
{
    /**
     * FIXME- backward compatibility
     *
     * @var   array
     * @see   ____var_see____
     * @since 1.0.0
     */
    protected $params = array('target');

    /**
     * Check ACL permissions
     *
     * @return boolean
     * @see    ____func_see____
     * @since  1.0.17
     */
    public function checkACL()
    {
        return parent::checkACL()
            || \XLite\Core\Auth::getInstance()->isPermissionAllowed('manage custom pages');
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
        return static::t('Pages');
    }

    /**
     * Update list
     *
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function doActionUpdate()
    {
        $list = new \XLite\Module\CDev\SimpleCMS\View\ItemsList\Model\Page;
        $list->processQuick();
    }

    // {{{ Search

    /**
     * Get search condition parameter by name
     *
     * @param string $paramName Parameter name
     *
     * @return mixed
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getCondition($paramName)
    {
        $searchParams = $this->getConditions();

        return isset($searchParams[$paramName])
            ? $searchParams[$paramName]
            : null;
    }

    /**
     * Save search conditions
     *
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function doActionSearch()
    {
        $cellName = \XLite\Module\CDev\SimpleCMS\View\ItemsList\Model\Page::getSessionCellName();

        \XLite\Core\Session::getInstance()->$cellName = $this->getSearchParams();
    }

    /**
     * Return search parameters
     *
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getSearchParams()
    {
        $searchParams = $this->getConditions();

        foreach (
            \XLite\Module\CDev\SimpleCMS\View\ItemsList\Model\Page::getSearchParams() as $requestParam
        ) {
            if (isset(\XLite\Core\Request::getInstance()->$requestParam)) {
                $searchParams[$requestParam] = \XLite\Core\Request::getInstance()->$requestParam;
            }
        }

        return $searchParams;
    }

    /**
     * Get search conditions
     *
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getConditions()
    {
        $cellName = \XLite\Module\CDev\SimpleCMS\View\ItemsList\Model\Page::getSessionCellName();

        $searchParams = \XLite\Core\Session::getInstance()->$cellName;

        if (!is_array($searchParams)) {
            $searchParams = array();
        }

        return $searchParams;
    }

    // }}}

}
