{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Product details buttons block
 *
 * @author    Creative Development LLC <info@cdev.ru>
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}
<div class="product-buttons" IF="!isProductAdded()">
  {displayViewListContent(#product.details.page.info.buttons#)}
</div>
<div class="product-buttons product-buttons-added" IF="isProductAdded()">
  {displayViewListContent(#product.details.page.info.buttons-added#)}
</div>
