<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Models;

/**
 * Result from calling GetQueueProperties REST wrapper.
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
class GetServicePropertiesResult
{
    private $_serviceProperties;

    /**
     * Creates object from $parsedResponse.
     *
     * @param array $parsedResponse XML response parsed into array.
     *
     * @return MicrosoftAzure\Common\Models\GetServicePropertiesResult
     */
    public static function create($parsedResponse)
    {
        $result = new self();
        $result->_serviceProperties = ServiceProperties::create($parsedResponse);

        return $result;
    }

    /**
     * Gets service properties object.
     *
     * @return MicrosoftAzure\Common\Models\ServiceProperties
     */
    public function getValue()
    {
        return $this->_serviceProperties;
    }

    /**
     * Sets service properties object.
     *
     * @param ServiceProperties $serviceProperties object to use.
     *
     * @return none
     */
    public function setValue($serviceProperties)
    {
        $this->_serviceProperties = clone $serviceProperties;
    }
}
