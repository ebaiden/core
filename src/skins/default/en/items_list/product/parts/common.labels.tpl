{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Labels list
 *
 * @author    Creative Development LLC <info@cdev.ru>
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.litecommerce.com/
 * @since     1.0.0
 *
 * @ListChild (list="itemsList.product.grid.customer.info", weight="998")
 * @ListChild (list="itemsList.product.list.customer.photo", weight="998")
 * @ListChild (list="itemsList.product.table.customer.columns", weight="25")
 *}
<ul class="labels" IF="getProductLabels(product)">
  <li FOREACH="getProductLabels(product),key,name" class="label-{key:h}"><div>{name}</div></li>
</ul>