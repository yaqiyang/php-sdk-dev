<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal\Serialization;

/**
 * The serialization interface.
 *
 * @category  Microsoft: to add details
 */
interface ISerializer
{
    /**
     * Serialize an object into a XML.
     *
     * @param object $targetObject The target object to be serialized.
     * @param string $rootName     The name of the root.
     *
     * @return string
     */
    public static function objectSerialize($targetObject, $rootName);

    /**
     * Serializes given array. The array indices must be string to use them as
     * as element name.
     *
     * @param array $array      The object to serialize represented in array.
     * @param array $properties The used properties in the serialization process.
     *
     * @return string
     */
    public function serialize($array, $properties = null);

    /**
     * Unserializes given serialized string.
     *
     * @param string $serialized The serialized object in string representation.
     *
     * @return array
     */
    public function unserialize($serialized);
}
