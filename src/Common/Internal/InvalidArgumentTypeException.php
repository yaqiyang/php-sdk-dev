<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal;

/**
 * Exception thrown if an argument type does not match with the expected type.
 *
 * @category  Microsoft: to add details
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
