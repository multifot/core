{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Invoice totals : modifiers
 *
 * @author    Creative Development LLC <info@cdev.ru>
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.litecommerce.com/
 * @since     1.0.8
 * @ListChild (list="invoice.base.totals", weight="200")
 *}
<tr FOREACH="order.getSurchargeTotals(),type,surcharge" class="{type}-modifier">
  {if:surcharge.count=#1#}
    <td class="title">{surcharge.lastName}:</td>
  {else:}
    <td class="title list-owner">{surcharge.name}:</td>
  {end:}
  <td class="value">
    {if:surcharge.available}
      {formatPrice(surcharge.cost,order.getCurrency()):h}
    {else:}
      {t(#n/a#)}
    {end:}
    {displayViewListContent(#invoice.base.totals.modifier#,_ARRAY_(#surcharge#^surcharge,#type#^type,#order#^order))}
  </td>
</tr>
