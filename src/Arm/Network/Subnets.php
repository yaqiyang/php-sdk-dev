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
 * @version     Release: 0.10.0_2016, API Version: 2016-06-01
 */

namespace MicrosoftAzure\Arm\Network;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * Subnets for The Microsoft Azure Network management API provides a RESTful
 * set of web services that interact with Microsoft Azure Networks service to
 * manage your network resrources. The API has entities that capture the
 * relationship between an end user and the Microsoft Azure Networks service.
 */
class Subnets
{
    /**
     * The service client object for the operations.
     *
     * @var NetworkManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for Subnets.
     *
     * @param NetworkManagementClient, Service client for Subnets
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * The delete subnet operation deletes the specified subnet.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $subnetName The name of the subnet.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status NoContent(204).<br>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function delete($resourceGroupName, $virtualNetworkName, $subnetName, array $customHeaders = [])
    {
        $response = $this->begindeleteAsync($resourceGroupName, $virtualNetworkName, $subnetName, $customHeaders);

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
     * The delete subnet operation deletes the specified subnet.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $subnetName The name of the subnet.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status NoContent(204).<br>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function beginDelete($resourceGroupName, $virtualNetworkName, $subnetName, array $customHeaders = [])
    {
        $response = $this->beginDeleteAsync($resourceGroupName, $virtualNetworkName, $subnetName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The delete subnet operation deletes the specified subnet.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $subnetName The name of the subnet.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginDeleteAsync($resourceGroupName, $virtualNetworkName, $subnetName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($virtualNetworkName == null) {
            Validate::notNullOrEmpty($virtualNetworkName, '$virtualNetworkName');
        }
        if ($subnetName == null) {
            Validate::notNullOrEmpty($subnetName, '$subnetName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks/{virtualNetworkName}/subnets/{subnetName}';
        $statusCodes = [200, 204, 202];
        $method = 'DELETE';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{virtualNetworkName}' => $virtualNetworkName, '{subnetName}' => $subnetName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
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
     * The Get subnet operation retreives information about the specified subnet.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $subnetName The name of the subnet.
     * @param string $expand expand references resources.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'addressPrefix' => '',
     *       'networkSecurityGroup' => [
     *          'properties' => [
     *             'securityRules' => '',
     *             'defaultSecurityRules' => '',
     *             'networkInterfaces' => '',
     *             'subnets' => '',
     *             'resourceGuid' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'routeTable' => [
     *          'properties' => [
     *             'routes' => '',
     *             'subnets' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'ipConfigurations' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function get($resourceGroupName, $virtualNetworkName, $subnetName, $expand = null, array $customHeaders = [])
    {
        $response = $this->getAsync($resourceGroupName, $virtualNetworkName, $subnetName, $expand, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The Get subnet operation retreives information about the specified subnet.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $subnetName The name of the subnet.
     * @param string $expand expand references resources.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($resourceGroupName, $virtualNetworkName, $subnetName, $expand = null, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($virtualNetworkName == null) {
            Validate::notNullOrEmpty($virtualNetworkName, '$virtualNetworkName');
        }
        if ($subnetName == null) {
            Validate::notNullOrEmpty($subnetName, '$subnetName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks/{virtualNetworkName}/subnets/{subnetName}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{virtualNetworkName}' => $virtualNetworkName, '{subnetName}' => $subnetName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion(), '$expand' => $expand];
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
     * The Put Subnet operation creates/updates a subnet in thespecified virtual
     * network
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $subnetName The name of the subnet.
     * @param array $subnetParameters Parameters supplied to the create/update Subnet operation 
     * <pre>
     * [
     *    'properties' => [
     *       'addressPrefix' => '',
     *       'networkSecurityGroup' => [
     *          'properties' => [
     *             'securityRules' => '',
     *             'defaultSecurityRules' => '',
     *             'networkInterfaces' => '',
     *             'subnets' => '',
     *             'resourceGuid' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'routeTable' => [
     *          'properties' => [
     *             'routes' => '',
     *             'subnets' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'ipConfigurations' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'addressPrefix' => '',
     *       'networkSecurityGroup' => [
     *          'properties' => [
     *             'securityRules' => '',
     *             'defaultSecurityRules' => '',
     *             'networkInterfaces' => '',
     *             'subnets' => '',
     *             'resourceGuid' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'routeTable' => [
     *          'properties' => [
     *             'routes' => '',
     *             'subnets' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'ipConfigurations' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'addressPrefix' => '',
     *       'networkSecurityGroup' => [
     *          'properties' => [
     *             'securityRules' => '',
     *             'defaultSecurityRules' => '',
     *             'networkInterfaces' => '',
     *             'subnets' => '',
     *             'resourceGuid' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'routeTable' => [
     *          'properties' => [
     *             'routes' => '',
     *             'subnets' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'ipConfigurations' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function createOrUpdate($resourceGroupName, $virtualNetworkName, $subnetName, array $subnetParameters, array $customHeaders = [])
    {
        $response = $this->begincreateOrUpdateAsync($resourceGroupName, $virtualNetworkName, $subnetName, $subnetParameters, $customHeaders);

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
     * The Put Subnet operation creates/updates a subnet in thespecified virtual
     * network
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $subnetName The name of the subnet.
     * @param array $subnetParameters Parameters supplied to the create/update Subnet operation 
     * <pre>
     * [
     *    'properties' => [
     *       'addressPrefix' => '',
     *       'networkSecurityGroup' => [
     *          'properties' => [
     *             'securityRules' => '',
     *             'defaultSecurityRules' => '',
     *             'networkInterfaces' => '',
     *             'subnets' => '',
     *             'resourceGuid' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'routeTable' => [
     *          'properties' => [
     *             'routes' => '',
     *             'subnets' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'ipConfigurations' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'addressPrefix' => '',
     *       'networkSecurityGroup' => [
     *          'properties' => [
     *             'securityRules' => '',
     *             'defaultSecurityRules' => '',
     *             'networkInterfaces' => '',
     *             'subnets' => '',
     *             'resourceGuid' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'routeTable' => [
     *          'properties' => [
     *             'routes' => '',
     *             'subnets' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'ipConfigurations' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'addressPrefix' => '',
     *       'networkSecurityGroup' => [
     *          'properties' => [
     *             'securityRules' => '',
     *             'defaultSecurityRules' => '',
     *             'networkInterfaces' => '',
     *             'subnets' => '',
     *             'resourceGuid' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'routeTable' => [
     *          'properties' => [
     *             'routes' => '',
     *             'subnets' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'ipConfigurations' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function beginCreateOrUpdate($resourceGroupName, $virtualNetworkName, $subnetName, array $subnetParameters, array $customHeaders = [])
    {
        $response = $this->beginCreateOrUpdateAsync($resourceGroupName, $virtualNetworkName, $subnetName, $subnetParameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The Put Subnet operation creates/updates a subnet in thespecified virtual
     * network
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param string $subnetName The name of the subnet.
     * @param array $subnetParameters Parameters supplied to the create/update Subnet operation 
     * <pre>
     * [
     *    'properties' => [
     *       'addressPrefix' => '',
     *       'networkSecurityGroup' => [
     *          'properties' => [
     *             'securityRules' => '',
     *             'defaultSecurityRules' => '',
     *             'networkInterfaces' => '',
     *             'subnets' => '',
     *             'resourceGuid' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'routeTable' => [
     *          'properties' => [
     *             'routes' => '',
     *             'subnets' => '',
     *             'provisioningState' => ''
     *          ],
     *          'etag' => ''
     *       ],
     *       'ipConfigurations' => '',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginCreateOrUpdateAsync($resourceGroupName, $virtualNetworkName, $subnetName, array $subnetParameters, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($virtualNetworkName == null) {
            Validate::notNullOrEmpty($virtualNetworkName, '$virtualNetworkName');
        }
        if ($subnetName == null) {
            Validate::notNullOrEmpty($subnetName, '$subnetName');
        }
        if ($subnetParameters == null) {
            Validate::notNullOrEmpty($subnetParameters, '$subnetParameters');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks/{virtualNetworkName}/subnets/{subnetName}';
        $statusCodes = [200, 201];
        $method = 'PUT';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{virtualNetworkName}' => $virtualNetworkName, '{subnetName}' => $subnetName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($subnetParameters);

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
     * The List subnets opertion retrieves all the subnets in a virtual network.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => '',
     *    'nextLink' => ''
     * ];
     * </pre>
     */
    public function listOperation($resourceGroupName, $virtualNetworkName, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($resourceGroupName, $virtualNetworkName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The List subnets opertion retrieves all the subnets in a virtual network.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $virtualNetworkName The name of the virtual network.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync($resourceGroupName, $virtualNetworkName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($virtualNetworkName == null) {
            Validate::notNullOrEmpty($virtualNetworkName, '$virtualNetworkName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks/{virtualNetworkName}/subnets';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{virtualNetworkName}' => $virtualNetworkName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
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
     * The List subnets opertion retrieves all the subnets in a virtual network.
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
     *    'nextLink' => ''
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
     * The List subnets opertion retrieves all the subnets in a virtual network.
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
