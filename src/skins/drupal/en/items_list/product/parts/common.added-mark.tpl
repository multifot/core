{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Added-to-cart mark
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *
 * @ListChild (list="itemsList.product.grid.customer.info", weight="998")
 * @ListChild (list="itemsList.product.list.customer.photo", weight="998")
 *}
<div alt="Added to cart" class="added-to-cart{if:!isProductAdded(product)} hidden{end:}"></div>
