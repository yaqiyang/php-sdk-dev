<?php

/**
 * Code generated by Microsoft (R) AutoRest Code Generator 0.17.0.0
 * Changes may cause incorrect behavior and will be lost if the code is
 * regenerated.
 *
 * PHP version: 5.5
 *
 * @category    Microsoft
 *
 * @author      Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright   2016 Microsoft Corporation
 * @license     https://github.com/yaqiyang/php-sdk-dev/blob/master/LICENSE
 *
 * @link        https://github.com/Azure/azure-sdk-for-php
 *
 * @version     Release: 0.10.0_2016, API Version: 2016-02-01
 */

namespace MicrosoftAzure\Arm\Resources;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * ResourcesModel.
 */
class ResourcesModel
{
    /**
     * The service client object for the operations.
     *
     * @var ResourceManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for ResourcesModel.
     *
     * @param ResourceManagementClient, Service client for ResourcesModel
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Move resources from one resource group to another. The resources being
     * moved should all be in the same resource group.
     *
     * @param string $sourceResourceGroupName Source resource group name.
     * @param array $parameters move resources' parameters. 
     * <pre>
     * [
     *    'resources' => '',
     *    'targetResourceGroup' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function moveResources($sourceResourceGroupName, array $parameters, array $customHeaders = [])
    {
        $response = $this->beginmoveResourcesAsync($sourceResourceGroupName, $parameters, $customHeaders);

        if ($response->getStatusCode() !== Resources::STATUS_OK) {
            $this->_client->awaitAsync($response);
        }

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Move resources from one resource group to another. The resources being
     * moved should all be in the same resource group.
     *
     * @param string $sourceResourceGroupName Source resource group name.
     * @param array $parameters move resources' parameters. 
     * <pre>
     * [
     *    'resources' => '',
     *    'targetResourceGroup' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function beginMoveResources($sourceResourceGroupName, array $parameters, array $customHeaders = [])
    {
        $response = $this->beginMoveResourcesAsync($sourceResourceGroupName, $parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Move resources from one resource group to another. The resources being
     * moved should all be in the same resource group.
     *
     * @param string $sourceResourceGroupName Source resource group name.
     * @param array $parameters move resources' parameters. 
     * <pre>
     * [
     *    'resources' => '',
     *    'targetResourceGroup' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginMoveResourcesAsync($sourceResourceGroupName, array $parameters, array $customHeaders = [])
    {
        if ($sourceResourceGroupName == null) {
            Validate::notNullOrEmpty($sourceResourceGroupName, '$sourceResourceGroupName');
        }
        if ($parameters == null) {
            Validate::notNullOrEmpty($parameters, '$parameters');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{sourceResourceGroupName}/moveResources';
        $statusCodes = [202, 204];
        $method = 'POST';

        $path = strtr($path, ['{sourceResourceGroupName}' => $sourceResourceGroupName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($parameters);

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Get all of the resources under a subscription.
     *
     * @param array $filter The filter to apply on the operation. 
     * <pre>
     * [
     *    'resourceType' => '',
     *    'tagname' => '',
     *    'tagvalue' => '',
     *    'expand' => ''
     * ];
     * </pre>
     * @param int $top Query parameters. If null is passed returns all resource
     * groups.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => '',
     *    'nextLink' => 'requiredNextLink'
     * ];
     * </pre>
     */
    public function listOperation(array $filter, $top = null, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($filter, $top, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Get all of the resources under a subscription.
     *
     * @param array $filter The filter to apply on the operation. 
     * <pre>
     * [
     *    'resourceType' => '',
     *    'tagname' => '',
     *    'tagvalue' => '',
     *    'expand' => ''
     * ];
     * </pre>
     * @param int $top Query parameters. If null is passed returns all resource
     * groups.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync(array $filter, $top = null, array $customHeaders = [])
    {
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resources';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['$filter' => $filter, '$top' => $top, 'api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Checks whether resource exists.
     *
     * @param string $resourceGroupName The name of the resource group. The name
     * is case insensitive.
     * @param string $resourceProviderNamespace Resource identity.
     * @param string $parentResourcePath Resource identity.
     * @param string $resourceType Resource identity.
     * @param string $resourceName Resource identity.
     * @param string $apiVersion
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status NoContent(204).<br>
     * Empty array with resposne status NotFound(404).<br>
     */
    public function checkExistence($resourceGroupName, $resourceProviderNamespace, $parentResourcePath, $resourceType, $resourceName, $apiVersion, array $customHeaders = [])
    {
        $response = $this->checkExistenceAsync($resourceGroupName, $resourceProviderNamespace, $parentResourcePath, $resourceType, $resourceName, $apiVersion, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Checks whether resource exists.
     *
     * @param string $resourceGroupName The name of the resource group. The name
     * is case insensitive.
     * @param string $resourceProviderNamespace Resource identity.
     * @param string $parentResourcePath Resource identity.
     * @param string $resourceType Resource identity.
     * @param string $resourceName Resource identity.
     * @param string $apiVersion
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function checkExistenceAsync($resourceGroupName, $resourceProviderNamespace, $parentResourcePath, $resourceType, $resourceName, $apiVersion, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($resourceProviderNamespace == null) {
            Validate::notNullOrEmpty($resourceProviderNamespace, '$resourceProviderNamespace');
        }
        if ($parentResourcePath == null) {
            Validate::notNullOrEmpty($parentResourcePath, '$parentResourcePath');
        }
        if ($resourceType == null) {
            Validate::notNullOrEmpty($resourceType, '$resourceType');
        }
        if ($resourceName == null) {
            Validate::notNullOrEmpty($resourceName, '$resourceName');
        }
        if ($apiVersion == null) {
            Validate::notNullOrEmpty($apiVersion, '$apiVersion');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/{resourceProviderNamespace}/{parentResourcePath}/{resourceType}/{resourceName}';
        $statusCodes = [204, 404];
        $method = 'HEAD';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{resourceProviderNamespace}' => $resourceProviderNamespace, '{resourceName}' => $resourceName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $apiVersion];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Delete resource and all of its resources.
     *
     * @param string $resourceGroupName The name of the resource group. The name
     * is case insensitive.
     * @param string $resourceProviderNamespace Resource identity.
     * @param string $parentResourcePath Resource identity.
     * @param string $resourceType Resource identity.
     * @param string $resourceName Resource identity.
     * @param string $apiVersion
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status NoContent(204).<br>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function delete($resourceGroupName, $resourceProviderNamespace, $parentResourcePath, $resourceType, $resourceName, $apiVersion, array $customHeaders = [])
    {
        $response = $this->deleteAsync($resourceGroupName, $resourceProviderNamespace, $parentResourcePath, $resourceType, $resourceName, $apiVersion, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Delete resource and all of its resources.
     *
     * @param string $resourceGroupName The name of the resource group. The name
     * is case insensitive.
     * @param string $resourceProviderNamespace Resource identity.
     * @param string $parentResourcePath Resource identity.
     * @param string $resourceType Resource identity.
     * @param string $resourceName Resource identity.
     * @param string $apiVersion
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function deleteAsync($resourceGroupName, $resourceProviderNamespace, $parentResourcePath, $resourceType, $resourceName, $apiVersion, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($resourceProviderNamespace == null) {
            Validate::notNullOrEmpty($resourceProviderNamespace, '$resourceProviderNamespace');
        }
        if ($parentResourcePath == null) {
            Validate::notNullOrEmpty($parentResourcePath, '$parentResourcePath');
        }
        if ($resourceType == null) {
            Validate::notNullOrEmpty($resourceType, '$resourceType');
        }
        if ($resourceName == null) {
            Validate::notNullOrEmpty($resourceName, '$resourceName');
        }
        if ($apiVersion == null) {
            Validate::notNullOrEmpty($apiVersion, '$apiVersion');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/{resourceProviderNamespace}/{parentResourcePath}/{resourceType}/{resourceName}';
        $statusCodes = [200, 204, 202];
        $method = 'DELETE';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{resourceProviderNamespace}' => $resourceProviderNamespace, '{resourceName}' => $resourceName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $apiVersion];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Create a resource.
     *
     * @param string $resourceGroupName The name of the resource group. The name
     * is case insensitive.
     * @param string $resourceProviderNamespace Resource identity.
     * @param string $parentResourcePath Resource identity.
     * @param string $resourceType Resource identity.
     * @param string $resourceName Resource identity.
     * @param string $apiVersion
     * @param array $parameters Create or update resource parameters. 
     * <pre>
     * [
     *    'plan' => [
     *       'name' => '',
     *       'publisher' => '',
     *       'product' => '',
     *       'promotionCode' => ''
     *    ],
     *    'properties' => '',
     *    'kind' => '',
     *    'managedBy' => '',
     *    'sku' => [
     *       'name' => '',
     *       'tier' => '',
     *       'size' => '',
     *       'family' => '',
     *       'model' => '',
     *       'capacity' => ''
     *    ],
     *    'identity' => [
     *       'principalId' => '',
     *       'tenantId' => '',
     *       'type' => 'SystemAssigned'
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'plan' => [
     *       'name' => '',
     *       'publisher' => '',
     *       'product' => '',
     *       'promotionCode' => ''
     *    ],
     *    'properties' => '',
     *    'kind' => '',
     *    'managedBy' => '',
     *    'sku' => [
     *       'name' => '',
     *       'tier' => '',
     *       'size' => '',
     *       'family' => '',
     *       'model' => '',
     *       'capacity' => ''
     *    ],
     *    'identity' => [
     *       'principalId' => '',
     *       'tenantId' => '',
     *       'type' => 'SystemAssigned'
     *    ]
     * ];
     * </pre>
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'plan' => [
     *       'name' => '',
     *       'publisher' => '',
     *       'product' => '',
     *       'promotionCode' => ''
     *    ],
     *    'properties' => '',
     *    'kind' => '',
     *    'managedBy' => '',
     *    'sku' => [
     *       'name' => '',
     *       'tier' => '',
     *       'size' => '',
     *       'family' => '',
     *       'model' => '',
     *       'capacity' => ''
     *    ],
     *    'identity' => [
     *       'principalId' => '',
     *       'tenantId' => '',
     *       'type' => 'SystemAssigned'
     *    ]
     * ];
     * </pre>
     */
    public function createOrUpdate($resourceGroupName, $resourceProviderNamespace, $parentResourcePath, $resourceType, $resourceName, $apiVersion, array $parameters, array $customHeaders = [])
    {
        $response = $this->createOrUpdateAsync($resourceGroupName, $resourceProviderNamespace, $parentResourcePath, $resourceType, $resourceName, $apiVersion, $parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Create a resource.
     *
     * @param string $resourceGroupName The name of the resource group. The name
     * is case insensitive.
     * @param string $resourceProviderNamespace Resource identity.
     * @param string $parentResourcePath Resource identity.
     * @param string $resourceType Resource identity.
     * @param string $resourceName Resource identity.
     * @param string $apiVersion
     * @param array $parameters Create or update resource parameters. 
     * <pre>
     * [
     *    'plan' => [
     *       'name' => '',
     *       'publisher' => '',
     *       'product' => '',
     *       'promotionCode' => ''
     *    ],
     *    'properties' => '',
     *    'kind' => '',
     *    'managedBy' => '',
     *    'sku' => [
     *       'name' => '',
     *       'tier' => '',
     *       'size' => '',
     *       'family' => '',
     *       'model' => '',
     *       'capacity' => ''
     *    ],
     *    'identity' => [
     *       'principalId' => '',
     *       'tenantId' => '',
     *       'type' => 'SystemAssigned'
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function createOrUpdateAsync($resourceGroupName, $resourceProviderNamespace, $parentResourcePath, $resourceType, $resourceName, $apiVersion, array $parameters, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($resourceProviderNamespace == null) {
            Validate::notNullOrEmpty($resourceProviderNamespace, '$resourceProviderNamespace');
        }
        if ($parentResourcePath == null) {
            Validate::notNullOrEmpty($parentResourcePath, '$parentResourcePath');
        }
        if ($resourceType == null) {
            Validate::notNullOrEmpty($resourceType, '$resourceType');
        }
        if ($resourceName == null) {
            Validate::notNullOrEmpty($resourceName, '$resourceName');
        }
        if ($apiVersion == null) {
            Validate::notNullOrEmpty($apiVersion, '$apiVersion');
        }
        if ($parameters == null) {
            Validate::notNullOrEmpty($parameters, '$parameters');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/{resourceProviderNamespace}/{parentResourcePath}/{resourceType}/{resourceName}';
        $statusCodes = [201, 200];
        $method = 'PUT';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{resourceProviderNamespace}' => $resourceProviderNamespace, '{resourceName}' => $resourceName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $apiVersion];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($parameters);

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Returns a resource belonging to a resource group.
     *
     * @param string $resourceGroupName The name of the resource group. The name
     * is case insensitive.
     * @param string $resourceProviderNamespace Resource identity.
     * @param string $parentResourcePath Resource identity.
     * @param string $resourceType Resource identity.
     * @param string $resourceName Resource identity.
     * @param string $apiVersion
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'plan' => [
     *       'name' => '',
     *       'publisher' => '',
     *       'product' => '',
     *       'promotionCode' => ''
     *    ],
     *    'properties' => '',
     *    'kind' => '',
     *    'managedBy' => '',
     *    'sku' => [
     *       'name' => '',
     *       'tier' => '',
     *       'size' => '',
     *       'family' => '',
     *       'model' => '',
     *       'capacity' => ''
     *    ],
     *    'identity' => [
     *       'principalId' => '',
     *       'tenantId' => '',
     *       'type' => 'SystemAssigned'
     *    ]
     * ];
     * </pre>
     */
    public function get($resourceGroupName, $resourceProviderNamespace, $parentResourcePath, $resourceType, $resourceName, $apiVersion, array $customHeaders = [])
    {
        $response = $this->getAsync($resourceGroupName, $resourceProviderNamespace, $parentResourcePath, $resourceType, $resourceName, $apiVersion, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Returns a resource belonging to a resource group.
     *
     * @param string $resourceGroupName The name of the resource group. The name
     * is case insensitive.
     * @param string $resourceProviderNamespace Resource identity.
     * @param string $parentResourcePath Resource identity.
     * @param string $resourceType Resource identity.
     * @param string $resourceName Resource identity.
     * @param string $apiVersion
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($resourceGroupName, $resourceProviderNamespace, $parentResourcePath, $resourceType, $resourceName, $apiVersion, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($resourceProviderNamespace == null) {
            Validate::notNullOrEmpty($resourceProviderNamespace, '$resourceProviderNamespace');
        }
        if ($parentResourcePath == null) {
            Validate::notNullOrEmpty($parentResourcePath, '$parentResourcePath');
        }
        if ($resourceType == null) {
            Validate::notNullOrEmpty($resourceType, '$resourceType');
        }
        if ($resourceName == null) {
            Validate::notNullOrEmpty($resourceName, '$resourceName');
        }
        if ($apiVersion == null) {
            Validate::notNullOrEmpty($apiVersion, '$apiVersion');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/{resourceProviderNamespace}/{parentResourcePath}/{resourceType}/{resourceName}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{resourceProviderNamespace}' => $resourceProviderNamespace, '{resourceName}' => $resourceName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $apiVersion];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }

    /**
     * Get all of the resources under a subscription.
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => '',
     *    'nextLink' => 'requiredNextLink'
     * ];
     * </pre>
     */
    public function listNext($nextPageLink, array $customHeaders = [])
    {
        $response = $this->listNextAsync($nextPageLink, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Get all of the resources under a subscription.
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listNextAsync($nextPageLink, array $customHeaders = [])
    {
        if ($nextPageLink == null) {
            Validate::notNullOrEmpty($nextPageLink, '$nextPageLink');
        }

        $path = '{nextLink}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, []);
        $queryParams = [];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $this->_client->getUrl($path),
            $statusCodes,
            $body,
            $this->_client->getFilters()
        );

        return $response;
    }
}
