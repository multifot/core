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

namespace XLite\View\FormField\Select;

/**
 * Form abstract selector
 *
 * @see   ____class_see____
 * @since 1.0.0
 */
abstract class ASelect extends \XLite\View\FormField\AFormField
{
    /**
     * Widget param names
     */

    const PARAM_OPTIONS = 'options';


    /**
     * Return default options list
     *
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    abstract protected function getDefaultOptions();


    /**
     * Return field type
     *
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getFieldType()
    {
        return self::FIELD_TYPE_SELECT;
    }


    /**
     * Return field template
     *
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getFieldTemplate()
    {
        return 'select.tpl';
    }

    /**
     * getOptions
     *
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getOptions()
    {
        return $this->getParam(self::PARAM_OPTIONS);
    }

    /**
     * Checks if the list is empty
     *
     * @return boolean
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function isListEmpty()
    {
        return 0 >= count($this->getOptions());
    }

    /**
     * Define widget params
     *
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function defineWidgetParams()
    {
        parent::defineWidgetParams();

        $this->widgetParams += array(
            self::PARAM_OPTIONS => new \XLite\Model\WidgetParam\Collection(
                'Options', $this->getDefaultOptions(), false
            ),
        );
    }

    /**
     * Check - current value is selected or not
     * 
     * @param mixed $value Value
     *  
     * @return boolean
     * @see    ____func_see____
     * @since  1.0.13
     */
    protected function isOptionSelected($value)
    {
        return $value == $this->getValue();
    }
}
