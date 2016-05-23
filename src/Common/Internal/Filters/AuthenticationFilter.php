<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal\Filters;

use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\IServiceFilter;
use MicrosoftAzure\Common\Internal\HttpFormatter;

/**
 * Adds authentication header to the http request object.
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
class AuthenticationFilter implements IServiceFilter
{
    /**
     * @var MicrosoftAzure\Common\Internal\Authentication\StorageAuthScheme
     */
    private $_authenticationScheme;

    /**
     * Creates AuthenticationFilter with the passed scheme.
     *
     * @param StorageAuthScheme $authenticationScheme The authentication scheme.
     */
    public function __construct($authenticationScheme)
    {
        $this->_authenticationScheme = $authenticationScheme;
    }

    /**
     * Adds authentication header to the request headers.
     *
     * @param \GuzzleHttp\Psr7\Request $request HTTP request object.
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function handleRequest($request)
    {
        $requestHeaders = HttpFormatter::formatHeaders($request->getHeaders());

        $signedKey = $this->_authenticationScheme->getAuthorizationHeader(
            $requestHeaders, $request->getUri(),
            \GuzzleHttp\Psr7\parse_query($request->getUri()->getQuery()), $request->getMethod()
        );

        return $request->withHeader(Resources::AUTHENTICATION, $signedKey);
    }

    /**
     * Does nothing with the response.
     *
     * @param \GuzzleHttp\Psr7\Request  $request  HTTP request object.
     * @param \GuzzleHttp\Psr7\Response $response HTTP response object.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function handleResponse($request, $response)
    {
        // Do nothing with the response.
        return $response;
    }
}
