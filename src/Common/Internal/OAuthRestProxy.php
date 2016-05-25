<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\OAuthSettings;
use MicrosoftAzure\Common\Internal\Serialization\JsonSerializer;
use MicrosoftAzure\Common\Models\OAuthAccessToken;

/**
 * OAuth rest proxy.
 *
 * @category  Microsoft: to add details
 */
class OAuthRestProxy extends ServiceRestProxy
{
    /**
     * @var MicrosoftAzure\Common\Internal\OAuthSettings
     */
    protected $oauthSettings;

    /**
     * Initializes new OAuthRestProxy object.
     *
     * @param MicrosoftAzure\Common\Internal\OAuthSettings  $oauthSettings  oauthSettings.
     */
    public function __construct($oauthSettings)
    {
        $this->oauthSettings = $oauthSettings;

        parent::__construct(
            $oauthSettings->getOAuthEndpointUri(),
            $oauthSettings->getTenantId(),
            new JsonSerializer()
        );
    }

    /**
     * Get OAuth access token.
     *
     * @return WindowsAzure\Common\Internal\Models\OAuthAccessToken
     */
    public function getOAuthAccessToken()
    {
        $oath_url = $this->getUri();
        $method = Resources::HTTP_POST;
        $headers = array();
        $queryParams = array();
        $postParams = $this->oauthSettings->getOAuthParams();
        $statusCode = Resources::STATUS_OK;

        $response = HttpClient::send(
                $method,
                $headers,
                $queryParams,
                $postParams,
                $oath_url,
                $statusCode
        );

        $parsed = $this->dataSerializer->unserialize($response->getBody()->getContents());
        return OAuthAccessToken::create($parsed);
    }
}
