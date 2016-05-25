<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal\Filters;

use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Filters\IServiceFilter;

/**
 * Adds authentication header to the http request object.
 *
 * @category  Microsoft: to add details
 */
class OAuthFilter implements IServiceFilter
{
    /**
     * @var WindowsAzure\Common\Internal\Authentication\OAuthScheme
     */
    private $_authenticationScheme;

    /**
     * Creates OAuthFilter with the passed scheme.
     *
     * @param OAuthScheme $authenticationScheme The authentication scheme.
     */
    public function __construct($authenticationScheme)
    {
        $this->_authenticationScheme = $authenticationScheme;
    }

    /**
     * Adds authentication header to the request headers.
     *
     * @param $request HTTP channel object.
     *
     * @return $request HTTP channel object.
     */
    public function handleRequest($request)
    {
        $signedKey = $this->_authenticationScheme->getAuthorizationHeader([], '',  '', '' );
        $request = $request->withHeader(Resources::AUTHENTICATION, $signedKey);

        return $request;
    }

    /**
     * Does nothing with the response.
     *
     * @param $request  HTTP channel object.
     * @param $response HTTP response object.
     *
     * @return $response HTTP channel object.
     */
    public function handleResponse($request, $response)
    {
        // Do nothing with the response.
        return $response;
    }
}
