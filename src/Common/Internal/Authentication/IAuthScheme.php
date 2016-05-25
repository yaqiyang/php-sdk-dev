<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal\Authentication;

/**
 * Interface for azure authentication schemes.
 *
 * @category  Microsoft: to add details
 */
interface IAuthScheme
{
    /**
     * Returns authorization header to be included in a request.
     *
     * @param array  $headers     request headers.
     * @param string $url         reuqest url.
     * @param array  $queryParams query variables.
     * @param string $httpMethod  request http method.
     *
     * @return string
     */
    public function getAuthorizationHeader($headers, $url, $queryParams, $httpMethod);
}
