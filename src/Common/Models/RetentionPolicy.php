<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Models;

use MicrosoftAzure\Common\Internal\Utilities;

/**
 * Holds elements of queue properties retention policy field.
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
class RetentionPolicy
{
    /**
     * Indicates whether a retention policy is enabled for the storage service.
     *
     * @var bool.
     */
    private $_enabled;

    /**
     * If $_enabled is true then this field indicates the number of days that metrics
     * or logging data should be retained. All data older than this value will be
     * deleted. The minimum value you can specify is 1;
     * the largest value is 365 (one year).
     *
     * @var int
     */
    private $_days;

    /**
     * Creates object from $parsedResponse.
     *
     * @param array $parsedResponse XML response parsed into array.
     *
     * @return MicrosoftAzure\Common\Models\RetentionPolicy
     */
    public static function create($parsedResponse)
    {
        $result = new self();
        $result->setEnabled(Utilities::toBoolean($parsedResponse['Enabled']));
        if ($result->getEnabled()) {
            $result->setDays(intval($parsedResponse['Days']));
        }

        return $result;
    }

    /**
     * Gets enabled.
     *
     * @return bool.
     */
    public function getEnabled()
    {
        return $this->_enabled;
    }

    /**
     * Sets enabled.
     *
     * @param bool $enabled value to use.
     *
     * @return none.
     */
    public function setEnabled($enabled)
    {
        $this->_enabled = $enabled;
    }

    /**
     * Gets days field.
     *
     * @return int
     */
    public function getDays()
    {
        return $this->_days;
    }

    /**
     * Sets days field.
     *
     * @param int $days value to use.
     *
     * @return none
     */
    public function setDays($days)
    {
        $this->_days = $days;
    }

    /**
     * Converts this object to array with XML tags.
     *
     * @return array.
     */
    public function toArray()
    {
        $array = array('Enabled' => Utilities::booleanToString($this->_enabled));
        if (isset($this->_days)) {
            $array['Days'] = strval($this->_days);
        }

        return $array;
    }
}
