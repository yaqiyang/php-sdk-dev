<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\StorageResourceProvider;

use MicrosoftAzure\Common\Internal\Authentication\AccessTokenAuthScheme;
use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Serialization\JsonSerializer;
use MicrosoftAzure\Common\Internal\Utilities;

/**
 * This class constructs HTTP requests and receive HTTP responses for StorageResourceProvider.
 *
 * @category  Microsoft: to add details
 *
 */
class StorageResourceProviderProxy
{
    // properites read from Swagger spec
    private $api_version = '2016-01-01';
    private $host = 'management.azure.com';
    private $schemes = ['https'];
    private $consumes = ['application/json', 'text/json'];
    private $produces = ['applicaton/json', 'text/json'];

    // properties for authentication
    private $tenant_id;
    private $client_id;
    private $client_secret;

    // other properites
    private $serializer;
    private $authScheme;
    private $auth_header;

    /**
     * To add details
     *
     */
    public function __construct($tenant_id, $client_id, $client_secret)
    {
        $this->tenant_id = $tenant_id;
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;

        $this->serializer = new JsonSerializer();
    }

    /**
     * To add details
     *
     */
    private function getAuthToken()
    {
        $this->authScheme = new AccessTokenAuthScheme($this->tenant_id, $this->client_id, $this->client_secret);
    }

    /**
     * To add details
     *
     */
    public function getAuthHeaders()
    {
        // check if the access_token is still valid, if not, get a new one
        if ( is_null($this->authScheme) || strtotime("now") > $this->authScheme->getTokenExpiresOn())
        {
            $this->getAuthToken();
            $this->auth_header = $this->authScheme->addAuthorizationHeader();
        }

        return $this->auth_header;
    }

    /**
     * To add details
     *
     */
    private function getUrl($path)
    {
        // this needs to be more robust
        return $this->schemes[0] . '://' . $this->host . $path;
    }

    /**
     * To add details
     *
     */
    private function replaceParams($target, $class, $function, $values)
    {
        $method = new \ReflectionMethod($class, $function);
        $params = array();

        foreach ($method->getParameters() as  $index => $param)
        {
            if (array_key_exists($index, $values))
            {
                $params['{' . $param->name . '}'] = $values[$index];
            }
        }

        return strtr($target, $params);
    }

    /**
     * To add details
     *
     */
    public function checkNameAvailability($subscriptionId, $accountName)
    {
        // properites from Swagger spec
        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.Storage/checkNameAvailability';

        $path = $this->getUrl($this->replaceParams($path, __CLASS__, __FUNCTION__, func_get_args()));
        $queryParams = [Resources::API_VERSION => $this->api_version];
        $postParams = array();
        $method = Resources::HTTP_POST;
        $statusCode = Resources::STATUS_OK;

        $headers = $this->getAuthHeaders();
        $headers['Content-Type'] = $this->consumes[0];

        $params = [];
        $params['name'] = $accountName;
        $params['type'] = 'Microsoft.Storage/storageAccounts';
        $body = $this->serializer->serialize($params);

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode,
            $body
        );

        $parsed = $this->serializer->unserialize($response->getBody()->getContents());
        return $parsed['nameAvailable'];
    }

    /**
     * To add details
     *
     */
    public function CreateStorageAccount($subscriptionId, $resourceGroupName, $accountName, array $createParams = [])
    {
        // properites from Swagger spec
        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Storage/storageAccounts/{accountName}';

        $path = $this->getUrl($this->replaceParams($path, __CLASS__, __FUNCTION__, func_get_args()));
        $headers = $this->getAuthHeaders();
        $queryParams = [Resources::API_VERSION => $this->api_version];
        $postParams = array();
        $method = Resources::HTTP_PUT;
        $statusCodes = [Resources::STATUS_ACCEPTED, Resources::STATUS_OK];

        if (count($createParams) == 0)
        {
            $createParams['location'] = 'eastus';
            $createParams['tags'] = ['key1' => 'value1', 'key2' => 'value2'];

            $customDomain = ['name' => '', 'useSubDomainName' => 'false'];
            $encrypotioin = ['services' => ['blob' => ['enabled' => 'false']], 'keySource' => 'Microsoft.Storage'];

            $createParams['properties'] = ['customDomain' => $customDomain, 'encryption' => $encrypotioin, ];
            $createParams['sku'] = ['name' => 'Standard_LRS'];
            $createParams['kind'] = 'Storage';

            // "accessTier": "Cool" not valid?
        }

        $body = $this->serializer->serialize($createParams);
        $headers['Content-Type'] = $this->consumes[0];
        $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCodes,
            $body
        );

        if ($response->getStatusCode() == Resources::STATUS_OK)
        {
            return Resources::STATUS_OK; // storage account already created
        }
        else
        {
            $locations = $response->getHeaders()['Location'];
            $requestIds = $response->getHeaders()[Resources::X_MS_REQUEST_ID];
            return [$locations[0], $requestIds[0]];
        }
    }

    /**
     * To add details
     *
     */
    public function DeleteStorageAccount($subscriptionId, $resourceGroupName, $accountName)
    {
        // properites from Swagger spec
        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Storage/storageAccounts/{accountName}';

        $path = $this->getUrl($this->replaceParams($path, __CLASS__, __FUNCTION__, func_get_args()));
        $headers = $this->getAuthHeaders();
        $queryParams = [Resources::API_VERSION => $this->api_version];

        $postParams = array();
        $method = Resources::HTTP_DELETE;
        $statusCodes = [Resources::STATUS_OK, Resources::STATUS_NO_CONTENT];
        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCodes,
            $body
        );

        return $response->getStatusCode();
    }

    /**
     * To add details
     *
     */
    public function pollAsyncStorageOperation($path, $requestId)
    {
        $queryParams = [Resources::API_VERSION => $this->api_version, 'monitor' => 'true'];
        $postParams = array();
        $method = Resources::HTTP_GET;
        $statusCodes = [Resources::STATUS_OK, Resources::STATUS_ACCEPTED];

        $headers = $this->getAuthHeaders();
        $headers[Resources::X_MS_REQUEST_ID] = $requestId;
        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCodes,
            $body
        );

        return $response->getStatusCode();
    }

}
