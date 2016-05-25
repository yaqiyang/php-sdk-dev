<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\StorageResourceProvider;

use MicrosoftAzure\Common\Internal\Authentication\OAuthScheme;
use MicrosoftAzure\Common\Internal\Filters\OAuthFilter;
use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\OAuthRestProxy;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Serialization\JsonSerializer;
use MicrosoftAzure\Common\Internal\ServiceRestProxy;
use MicrosoftAzure\Common\Internal\Utilities;

/**
 * This class constructs HTTP requests and receive HTTP responses for StorageResourceProvider.
 *
 * @category  Microsoft: to add details
 *
 */
class StorageResourceProviderProxy extends ServiceRestProxy
{
    // properites read from Swagger spec
    private $api_version = '2016-01-01';
    private $host = 'management.azure.com';
    private $schemes = ['https'];
    private $consumes = ['application/json', 'text/json'];
    private $produces = ['applicaton/json', 'text/json'];

    // properties for authentication
    private $oauthSettings;
    private $filters;

    /**
     * To add details
     *
     */
    public function __construct($oauthSettings)
    {
        parent::__construct(
            $oauthSettings->getOAuthEndpointUri(),
            $oauthSettings->getTenantId(),
            new JsonSerializer()
        );

        $this->oauthSettings = $oauthSettings;
        $oauthService = new OAuthRestProxy($oauthSettings);
        $authentification = new OAuthScheme($oauthService );
        $this->filters = [new OAuthFilter($authentification)];
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
                if (!is_array($values[$index])) //don't replace array parameters
                {
                    $params['{' . $param->name . '}'] = $values[$index];
                }
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

        $headers =array();
        $headers['Content-Type'] = $this->consumes[0];

        $params = [];
        $params['name'] = $accountName;
        $params['type'] = 'Microsoft.Storage/storageAccounts';
        $body = $this->dataSerializer->serialize($params);

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCode,
            $body,
            $this->filters
        );

        $parsed = $this->dataSerializer->unserialize($response->getBody()->getContents());
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
        $headers =array();
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

        $body = $this->dataSerializer->serialize($createParams);
        $headers['Content-Type'] = $this->consumes[0];
        $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCodes,
            $body,
            $this->filters
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
        $headers =array();
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
            $body,
            $this->filters
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

        $headers =array();
        $headers[Resources::X_MS_REQUEST_ID] = $requestId;
        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCodes,
            $body,
            $this->filters
        );

        return $response->getStatusCode();
    }

    /**
     * To add details
     *
     */
    public function UpdateStorageAccount($subscriptionId, $resourceGroupName, $accountName, array $updateParams = [])
    {
        // properites from Swagger spec
        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Storage/storageAccounts/{accountName}';

        $path = $this->getUrl($this->replaceParams($path, __CLASS__, __FUNCTION__, func_get_args()));
        $headers =array();
        $queryParams = [Resources::API_VERSION => $this->api_version];
        $postParams = array();
        $method = 'PATCH';
        $statusCodes = [Resources::STATUS_OK];

        if (count($updateParams) == 0) // sample changes
        {
            $updateParams['location'] = 'eastus';
            $updateParams['tags'] = ['key1' => 'value123', 'key2' => 'value321'];

            $customDomain = ['name' => '', 'useSubDomainName' => 'false'];
            $encrypotioin = ['services' => ['blob' => ['enabled' => 'false']], 'keySource' => 'Microsoft.Storage'];

            $updateParams['properties'] = ['customDomain' => $customDomain, 'encryption' => $encrypotioin, ];
            $updateParams['sku'] = ['name' => 'Standard_LRS'];
            $updateParams['kind'] = 'Storage';

            // "accessTier": "Cool" not valid?
        }

        $body = $this->dataSerializer->serialize($updateParams);
        $headers['Content-Type'] = $this->consumes[0];
        $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCodes,
            $body,
            $this->filters
        );

        return $response->getStatusCode();
    }
    /**
     * To add details
     *
     */
    public function GetStorageAccountProperties($subscriptionId, $resourceGroupName, $accountName)
    {
        // properites from Swagger spec
        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Storage/storageAccounts/{accountName}';

        $path = $this->getUrl($this->replaceParams($path, __CLASS__, __FUNCTION__, func_get_args()));
        $headers =array();
        $queryParams = [Resources::API_VERSION => $this->api_version];
        $postParams = array();
        $method = 'GET';
        $statusCodes = [Resources::STATUS_OK];

        $body = '';
        $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            $postParams,
            $path,
            $statusCodes,
            $body,
            $this->filters
        );

        return $response->getBody()->getContents();
    }

}
