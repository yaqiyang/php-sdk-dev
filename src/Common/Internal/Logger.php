<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal;

/**
 * Logger class for debugging purpose.
 *
 * @category  Microsoft
 *
 * @author    Azure Storage PHP SDK <dmsh@microsoft.com>
 * @copyright 2016 Microsoft Corporation
 * @license   https://github.com/azure/azure-storage-php/LICENSE
 *
 * @version   Release: 0.10.0
 *
 * @link      https://github.com/azure/azure-storage-php
 */
class Logger
{
    /**
     * @var string
     */
    private static $_filePath;

    /**
     * Logs $var to file.
     *
     * @param mix    $var The data to log.
     * @param string $tip The help message.
     *
     * @static
     *
     * @return none
     */
    public static function log($var, $tip = Resources::EMPTY_STRING)
    {
        if (!empty($tip)) {
            error_log($tip."\n", 3, self::$_filePath);
        }

        if (is_array($var) || is_object($var)) {
            error_log(print_r($var, true), 3, self::$_filePath);
        } else {
            error_log($var."\n", 3, self::$_filePath);
        }
    }

    /**
     * Sets file path to use.
     *
     * @param string $filePath The log file path.
     *
     * @static
     *
     * @return none
     */
    public static function setLogFile($filePath)
    {
        self::$_filePath = $filePath;
    }
}
