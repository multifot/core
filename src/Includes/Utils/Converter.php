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
 * @category   LiteCommerce
 * @package    XLite
 * @subpackage Includes_Utils
 * @author     Creative Development LLC <info@cdev.ru>
 * @copyright  Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      1.0.0
 */

namespace Includes\Utils;

/**
 * Converter
 *
 * @package    XLite
 * @see        ____class_see____
 * @since      1.0.0
 */
abstract class Converter extends \Includes\Utils\AUtils
{
    /**
     * File size suffixes.
     * Source: http://en.wikipedia.org/wiki/Template:Quantities_of_bytes
     * Source: http://physics.nist.gov/cuu/Units/binary.html
     *
     * @var   array
     * @see   ____var_see____
     * @since 1.0.0
     */
    protected static $byteMultipliers = array('b', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');


    /**
     * Generate query string
     *
     * @param array  $data      data to use
     * @param string $glue      string to add between param name and value
     * @param string $separator string to separate <name,value> pairs
     * @param string $quotes    char (string) to quote the value
     *
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function buildQuery(array $data, $glue = '=', $separator = '&', $quotes = '')
    {
        $result = array();

        foreach ($data as $name => $value) {
            $result[] = $name . $glue . $quotes . $value . $quotes;
        }

        return implode($separator, $result);
    }

    /**
     * Parse arguments array
     *
     * @param array  $args   Array to parse
     * @param string $glue   Char to agglutinate "name" and "value"
     * @param string $quotes Char to quote the "value" param
     *
     * @return array
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function parseArgs(array $args, $glue = '=', $quotes = '')
    {
        $result = array();

        foreach ($args as $part) {
            if (1 < count($tokens = explode($glue, trim($part)))) {
                $result[$tokens[0]] = trim($tokens[1], $quotes);
            }
        }

        return $result;
    }

    /**
     * Parse string into array
     *
     * @param string $query     Query
     * @param string $glue      Char to agglutinate "name" and "value"
     * @param string $separator Char to agglutinate <"name", "value"> pairs
     * @param string $quotes    Char to quote the "value" param
     *
     * @return array
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function parseQuery($query, $glue = '=', $separator = '&', $quotes = '')
    {
        return static::parseArgs(explode($separator, $query), $glue, $quotes);
    }

    /**
     * Remove leading characters from string
     *
     * @param string $string string to prepare
     * @param string $chars  charlist to remove
     *
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function trimLeadingChars($string, $chars)
    {
        return ltrim($string, $chars);
    }

    /**
     * Remove trailing characters from string
     *
     * @param string $string string to prepare
     * @param string $chars  charlist to remove
     *
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function trimTrailingChars($string, $chars)
    {
        return rtrim($string, $chars);
    }

    /**
     * Get formatted price
     *
     * @param float $price value to format
     *
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function formatPrice($price)
    {
        return sprintf('%.02f', round(doubleval($price), 2));
    }

    /**
     * Convert a string like "test_foo_bar" into the camel case (like "testFooBar")
     *
     * @param string $string String to convert
     *
     * @return string
     * @access public
     * @since  1.0.0
     */
    public static function convertToCamelCase($string)
    {
        return preg_replace('/(?:\A|_)([a-z])/ie', 'strtoupper(\'\\1\')', $string);
    }

    /**
     * Convert a string like "testFooBar" into the underline style (like "test_foo_bar")
     *
     * @param string $string String to convert
     *
     * @return string
     * @access public
     * @since  1.0.0
     */
    public static function convertFromCamelCase($string)
    {
        return preg_replace('/(?!:\A)([A-Z])/e', '\'_\' . strtolower(\'\\1\')', $string);
    }

    /**
     * Convert a string like "test_foo_bar" into the Pascal case (like "TestFooBar")
     *
     * @param string $string String to convert
     *
     * @return string
     * @access public
     * @since  1.0.0
     */
    public static function convertToPascalCase($string)
    {
        return ucfirst(static::convertToCamelCase($string));
    }

    /**
     * Get canonical form of class name
     *
     * @param string  $class    Class name to prepare
     * @param boolean $relative Flag to enclose class name with namespace separator
     *
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function prepareClassName($class, $relative = true)
    {
        return ($relative ? '' : '\\') . static::trimLeadingChars($class, '\\');
    }

    /**
     * Get file name by PHP class name
     *
     * @param string $class Class name
     *
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function getClassFile($class)
    {
        return str_replace('\\', LC_DS, static::trimLeadingChars($class, '\\')) . '.php';
    }

    /**
     * Get full version
     *
     * @param string $versionMajor Major version
     * @param string $versionMinor Minor version
     *
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function composeVersion($versionMajor, $versionMinor)
    {
        return $versionMajor . '.' . $versionMinor;
    }

    /**
     * Prepare human-readable output for file size
     *
     * @param integer $size      Size in bytes
     * @param string  $separator To return a string OPTIONAL
     *
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function formatFileSize($size, $separator = null)
    {
        $multiplier = 0;

        while (1000 < $size) {

            // http://en.wikipedia.org/wiki/Template:Quantities_of_bytes
            // http://physics.nist.gov/cuu/Units/binary.html
            $size /= 1000;

            $multiplier++;
        }

        // Do not display numbers after decimal point if size is in kilobytes.
        // When size is greater then display one number after decimal point.
        $result = array(number_format($size, $multiplier > 1 ? 1 : 0), static::$byteMultipliers[$multiplier]);

        return isset($separator) ? implode($separator, $result) : $result;
    }

    /**
     * Remove \r and \n chars from string (e.g to prevent CRLF injections)
     * 
     * @param string $value Input value
     *  
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function removeCRLF($value)
    {
        return trim(preg_replace('/[\r\n]+/', '', ((string)$value)));
    }
}
