/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * ____file_title____
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 */

// Products list class
function ProductsList(cell, URLParams, URLAJAXParams)
{
  if (!cell) {
    return;
  }

  this.constructor.prototype.constructor(cell, URLParams, URLAJAXParams);
}

// Set new display mode
ItemsList.prototype.changeDisplayMode = function(handler)
{
  return this.constructor.prototype.process('displayMode', $(handler).attr('class'));
}

// Change sort criterion
ItemsList.prototype.changeSortByMode = function(handler)
{
  return this.process('sortBy', handler.options[handler.selectedIndex].value);
}

// Change sort order
ItemsList.prototype.changeSortOrder = function()
{
  return this.process('sortOrder', ('asc' == this.URLParams.sortOrder) ? 'desc' : 'asc');
}


ItemsList.prototype.listeners.displayModes = function(handler)
{
  $('.display-modes a', handler.container).click(
    function() {
      return !handler.changeDisplayMode(this);
    }
  );
}

ItemsList.prototype.listeners.sortByModes = function(handler)
{
  $('select.sort-crit', handler.container).change(
    function() {
      return !handler.changeSortByMode(this);
    }
  );
}

ItemsList.prototype.listeners.sortOrderModes = function(handler)
{
  $('a.sort-order', handler.container).click(
    function() {
      return !handler.changeSortOrder();
    }
  );
}

ItemsList.prototype.listeners.dragNDrop = function(handler)
{
  $('table.list-body-grid td.hproduct, table.list-body-list tr.info', handler.container).draggable({
    helper: function() {
      clone = $(this).clone();

      // TODO - check if there is more convinient way
      clone.css('width', $(this).css('width'));
      clone.css('height', $(this).css('height'));

      clone.css('opacity', 0.5);
      clone.css('z-index', 500);

      return clone;
    },
    start: function(event, ui) {
      $('div.cart-tray-box').show();
    },
    stop: function(event, ui) {
      $('div.cart-tray-box').hide();
    },
  });

  $('div.cart-tray-box').droppable({
    hoverClass: 'droppable',
    tolerance: 'pointer',
    // FIXME
    drop: function(event, ui) {
      handler.URLAJAXParams = [];

      handler.URLAJAXParams['target'] = 'cart';
      handler.URLAJAXParams['action'] = 'add';
      handler.URLAJAXParams['product_id'] = $(ui.draggable).attr('id');

      $.ajax({type: 'get', url: handler.buildURL(true), timeout: 15000});
    },
  });
}


ProductsList.prototype = new ItemsList();
ProductsList.prototype.constructor = ItemsList;

