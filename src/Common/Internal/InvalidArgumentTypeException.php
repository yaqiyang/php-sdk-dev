<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal;

/**
 * Exception thrown if an argument type does not match with the expected type.
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
class InvalidArgumentTypeException extends \InvalidArgumentException
{
    /**
     * Constructor.
     *
     * @param string $validType The valid type that should be provided by the user.
     * @param string $name      The parameter name.
     *
     * @return MicrosoftAzure\Common\Internal\InvalidArgumentTypeException
     */
    public function __construct($validType, $name = null)
    {
        parent::__construct(
            sprintf(Resources::INVALID_PARAM_MSG, $name, $validType)
        );
    }
}
