<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal\Authentication;

use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * Provides authentication scheme for OAuth.
 *
 * @category  Microsoft: to add details
 */
class OAuthScheme implements IAuthScheme
{
    /**
     * @var MicrosoftAzure\Common\Internal\OAuthRestProxy
     */
    protected $oauthService;

    /**
     * @var MicrosoftAzure\Common\Models\OAuthAccessToken
     */
    protected $oauthAccessToken;

    /**
     * Constructor.
     *
    * @param WindowsAzure\Common\Internal\OAuthRestProxy $oauthService oauthService
     *
     */
    public function __construct($oauthService)
    {
        Validate::notNull($oauthService, 'oauthService');
        $this->oauthService = $oauthService;
    }

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
    public function getAuthorizationHeader($headers, $url, $queryParams, $httpMethod)
    {
        if (($this->oauthAccessToken == null) || ($this->oauthAccessToken->getExpiresOn() > strtotime("now")))
        {
            $this->oauthAccessToken = $this->oauthService->getOAuthAccessToken();
        }

        return Resources::OAUTH_ACCESS_TOKEN_PREFIX . $this->oauthAccessToken->getAccessToken();
    }
}
