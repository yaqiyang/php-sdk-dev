<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal\Authentication;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\HttpFormatter;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Serialization\JsonSerializer;
use MicrosoftAzure\Common\Internal\Utilities;

/**
 * @category  Microsoft: to add details
 */
class AccessTokenAuthScheme
{

    protected $tenant_id;
    protected $client_id;
    protected $client_secret;
    protected $azure_resource;
    protected $grant_type;

    private $serializer;
    private $expires_on;

    /**
     * Constructor.
     *
     * @param string $accountName storage account name.
     * @param string $accountKey  storage account primary or secondary key.
     *
     * @return
     * MicrosoftAzure\Common\Internal\Authentication\SharedKeyAuthScheme
     */
    public function __construct($tenant_id, $client_id, $client_secret, $grant_type = 'client_credentials', $azure_resource = 'https://management.core.windows.net/' )
    {
        $this->tenant_id = $tenant_id;
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
        $this->azure_resource = $azure_resource;
        $this->grant_type = $grant_type;
        $this->serializer = new JsonSerializer();
        $this->expires_on = 0;
    }

    /**
     * Computes the authorization signature for blob and queue shared key.
     *
     * @param array  $headers     request headers.
     * @param string $url         reuqest url.
     * @param array  $queryParams query variables.
     * @param string $httpMethod  request http method.
     *
     * @see Blob and Queue Services (Shared Key Authentication) at
     *      http://msdn.microsoft.com/en-us/library/windowsazure/dd179428.aspx
     *
     * @return string
     */
    protected function getAccessToken()
    {
        $token_url = sprintf(Resources::ACCESS_TOKEN_URL, $this->tenant_id);
        $method = Resources::HTTP_POST;
        $headers = array();
        $queryParams = array();

        $postParams = [
             'grant_type' => $this->grant_type,
             'client_id' => $this->client_id,
             'client_secret' => $this->client_secret,
             'resource' => $this->azure_resource,
        ];


        $statusCode = Resources::STATUS_OK;


        $response = HttpClient::send(
                $method,
                $headers,
                $queryParams,
                $postParams,
                $token_url,
                $statusCode
        );

        $parsed = $this->serializer->unserialize($response->getBody()->getContents());
        $this->expires_on = $parsed['expires_on'];
        return $parsed[Resources::ACCESS_TOKEN];
    }

    /**
     * Add authorization header to be included in the request.
     *
     * @param array  $headers     request headers.
     *
     * @return array  $headers
     */
    public function addAuthorizationHeader(array $headers = [])
    {
        $headers[Resources::AUTHORIZATION] = 'Bearer '. $this->getAccessToken();
        return $headers;
    }

   public function getTokenExpiresOn()
   {
       return $this->expires_on;
   }

}
