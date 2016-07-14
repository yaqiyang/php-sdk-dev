<?php

/**
 * @category    Microsoft
 *
 * @author      Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright   2016 Microsoft Corporation
 * @license     https://github.com/yaqiyang/php-sdk-dev/blob/master/LICENSE
 *
 * @link        https://github.com/Azure/azure-sdk-for-php
 *
 * @version     Release: 0.10.0_2016
 */

namespace MicrosoftAzure\Common\Internal\Filters;

use MicrosoftAzure\Common\Internal\IServiceFilter;

/**
 * Adds headers to the HTTP request headers.
 */
class HeadersFilter implements IServiceFilter
{
    /**
     * @var array The array of headers
     */
    private $_headers;

    /**
     * Constructor.
     *
     * @param array $headers static headers to be added.
     *
     * @return HeadersFilter
     */
    public function __construct($headers)
    {
        $this->_headers = $headers;
    }

    /**
     * Adds static header(s) to the HTTP request headers.
     *
     * @param HttpClient $request HTTP channel object.
     *
     * @return \HTTP_Request2
     */
    public function handleRequest($request)
    {
        foreach ($this->_headers as $key => $value) {
            $headers = $request->getHeaders();
            if (!array_key_exists($key, $headers)) {
                $request->setHeader($key, $value);
            }
        }

        return $request;
    }

    /**
     * Does nothing with the response.
     *
     * @param HttpClient              $request  HTTP channel object.
     * @param \HTTP_Request2_Response $response HTTP response object.
     *
     * @return \HTTP_Request2_Response
     */
    public function handleResponse($request, $response)
    {
        // Do nothing with the response.
        return $response;
    }
}
