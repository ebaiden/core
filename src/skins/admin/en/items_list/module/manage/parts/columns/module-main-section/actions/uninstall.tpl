{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Modules actions list
 *
 * @author    Creative Development LLC <info@cdev.ru>
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.litecommerce.com/
 * @since     1.0.0
 *}

<a
  class="uninstall"
  href="{buildURL(#addons_list_installed#,#uninstall#,_ARRAY_(#moduleId#^module.getModuleId()))}"
  onclick="javascript: return confirm(confirmNote('uninstall', '{module.getModuleId()}'));">
  <img src="images/spacer.gif" alt="{t(#Uninstall#)}" />
</a>
