<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal;

/**
 * Holder for default connection string sources used in CloudConfigurationManager.
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
class ConnectionStringSource
{
    /**
     * The list of all sources which comes as default.
     *
     * @var type
     */
    private static $_defaultSources;

    /**
     * @var bool
     */
    private static $_isInitialized;

    /**
     * Environment variable source name.
     */
    const ENVIRONMENT_SOURCE = 'environment_source';

    /**
     * Initializes the default sources.
     *
     * @return none
     */
    private static function _init()
    {
        if (!self::$_isInitialized) {
            self::$_defaultSources = array(
                self::ENVIRONMENT_SOURCE => array(__CLASS__, 'environmentSource'),
            );
            self::$_isInitialized = true;
        }
    }

    /**
     * Gets a connection string value from the system environment.
     *
     * @param string $key The connection string name.
     *
     * @return string
     */
    public static function environmentSource($key)
    {
        Validate::isString($key, 'key');

        return getenv($key);
    }

    /**
     * Gets list of default sources.
     *
     * @return array
     */
    public static function getDefaultSources()
    {
        self::_init();

        return self::$_defaultSources;
    }
}
