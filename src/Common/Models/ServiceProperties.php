<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Models;

use MicrosoftAzure\Common\Internal\Serialization\XmlSerializer;

/**
 * Encapsulates service properties.
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
class ServiceProperties
{
    private $_logging;
    private $_metrics;
    public static $xmlRootName = 'StorageServiceProperties';

    /**
     * Creates ServiceProperties object from parsed XML response.
     *
     * @param array $parsedResponse XML response parsed into array.
     *
     * @return MicrosoftAzure\Common\Models\ServiceProperties.
     */
    public static function create($parsedResponse)
    {
        $result = new self();
        $result->setLogging(Logging::create($parsedResponse['Logging']));
        $result->setMetrics(Metrics::create($parsedResponse['HourMetrics']));

        return $result;
    }

    /**
     * Gets logging element.
     *
     * @return MicrosoftAzure\Common\Models\Logging.
     */
    public function getLogging()
    {
        return $this->_logging;
    }

    /**
     * Sets logging element.
     *
     * @param MicrosoftAzure\Common\Models\Logging $logging new element.
     *
     * @return none.
     */
    public function setLogging($logging)
    {
        $this->_logging = clone $logging;
    }

    /**
     * Gets metrics element.
     *
     * @return MicrosoftAzure\Common\Models\Metrics.
     */
    public function getMetrics()
    {
        return $this->_metrics;
    }

    /**
     * Sets metrics element.
     *
     * @param MicrosoftAzure\Common\Models\Metrics $metrics new element.
     *
     * @return none.
     */
    public function setMetrics($metrics)
    {
        $this->_metrics = clone $metrics;
    }

    /**
     * Converts this object to array with XML tags.
     *
     * @return array.
     */
    public function toArray()
    {
        return array(
            'Logging' => !empty($this->_logging) ? $this->_logging->toArray() : null,
            'HourMetrics' => !empty($this->_metrics) ? $this->_metrics->toArray() : null,
        );
    }

    /**
     * Converts this current object to XML representation.
     *
     * @param XmlSerializer $xmlSerializer The XML serializer.
     *
     * @return string
     */
    public function toXml($xmlSerializer)
    {
        $properties = array(XmlSerializer::ROOT_NAME => self::$xmlRootName);

        return $xmlSerializer->serialize($this->toArray(), $properties);
    }
}
