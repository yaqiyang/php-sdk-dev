<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal;

/**
 * Base class for all REST proxies.
 *
 * @category  Microsoft: to add details
 */
class RestProxy
{
    /**
     * @var array
     */
    private $_filters;

    /**
     * @var MicrosoftAzure\Common\Internal\Serialization\ISerializer
     */
    protected $dataSerializer;

    /**
     * @var string
     */
    private $_uri;

    /**
     * Initializes new RestProxy object.
     *
     * @param ISerializer $dataSerializer The data serializer.
     * @param string      $uri            The uri of the service.
     */
    public function __construct($dataSerializer, $uri)
    {
        $this->_filters = array();
        $this->dataSerializer = $dataSerializer;
        $this->_uri = $uri;
    }

    /**
     * Gets HTTP filters that will process each request.
     *
     * @return array
     */
    public function getFilters()
    {
        return $this->_filters;
    }

    /**
     * Gets the Uri of the service.
     *
     * @return string
     */
    public function getUri()
    {
        return $this->_uri;
    }

    /**
     * Sets the Uri of the service.
     *
     * @param string $uri The URI of the request.
     *
     * @return none
     */
    public function setUri($uri)
    {
        $this->_uri = $uri;
    }

    /**
     * Adds new filter to new service rest proxy object and returns that object back.
     *
     * @param MicrosoftAzure\Common\Internal\Filters\IServiceFilter $filter Filter to add for
     *                                                                      the pipeline.
     *
     * @return RestProxy.
     */
    public function withFilter($filter)
    {
        $serviceProxyWithFilter = clone $this;
        $serviceProxyWithFilter->_filters[] = $filter;

        return $serviceProxyWithFilter;
    }

    /**
     * Adds optional query parameter.
     *
     * Doesn't add the value if it satisfies empty().
     *
     * @param array  &$queryParameters The query parameters.
     * @param string $key              The query variable name.
     * @param string $value            The query variable value.
     *
     * @return none
     */
    protected function addOptionalQueryParam(&$queryParameters, $key, $value)
    {
        Validate::isArray($queryParameters, 'queryParameters');
        Validate::isString($key, 'key');
        Validate::isString($value, 'value');

        if (!is_null($value) && Resources::EMPTY_STRING !== $value) {
            $queryParameters[$key] = $value;
        }
    }

    /**
     * Adds optional header.
     *
     * Doesn't add the value if it satisfies empty().
     *
     * @param array  &$headers The HTTP header parameters.
     * @param string $key      The HTTP header name.
     * @param string $value    The HTTP header value.
     *
     * @return none
     */
    protected function addOptionalHeader(&$headers, $key, $value)
    {
        Validate::isArray($headers, 'headers');
        Validate::isString($key, 'key');
        Validate::isString($value, 'value');

        if (!is_null($value) && Resources::EMPTY_STRING !== $value) {
            $headers[$key] = $value;
        }
    }
}
