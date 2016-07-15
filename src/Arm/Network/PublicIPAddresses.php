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

use MicrosoftAzure\Common\Internal\Http\HttpClient as PhpHttpClient;
use MicrosoftAzure\Common\Internal\Resources as PhpResources;
use MicrosoftAzure\Common\Internal\Utilities as PhpUtilities;
use MicrosoftAzure\Common\Internal\Validate as PhpValidate;

/**
 * PublicIPAddresses for The Microsoft Azure Network management API provides a
 * RESTful set of web services that interact with Microsoft Azure Networks
 * service to manage your network resrources. The API has entities that
 * capture the relationship between an end user and the Microsoft Azure
 * Networks service.
 */
class PublicIPAddresses
{
    /**
     * The service client object for the operations.
     *
     * @var NetworkManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for PublicIPAddresses.
     *
     * @param NetworkManagementClient, Service client for PublicIPAddresses
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * The delete publicIpAddress operation deletes the specified publicIpAddress.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $publicIpAddressName The name of the subnet.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status NoContent(204).<br>
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status OK(200).<br>
     */
    public function delete($resourceGroupName, $publicIpAddressName, array $customHeaders = [])
    {
        $response = $this->begindeleteAsync($resourceGroupName, $publicIpAddressName, $customHeaders);

        if ($response->getStatusCode() !== PhpResources::STATUS_OK) {
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
     * The delete publicIpAddress operation deletes the specified publicIpAddress.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $publicIpAddressName The name of the subnet.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status NoContent(204).<br>
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status OK(200).<br>
     */
    public function beginDelete($resourceGroupName, $publicIpAddressName, array $customHeaders = [])
    {
        $response = $this->beginDeleteAsync($resourceGroupName, $publicIpAddressName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The delete publicIpAddress operation deletes the specified publicIpAddress.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $publicIpAddressName The name of the subnet.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginDeleteAsync($resourceGroupName, $publicIpAddressName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            PhpValidate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($publicIpAddressName == null) {
            PhpValidate::notNullOrEmpty($publicIpAddressName, '$publicIpAddressName');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/publicIPAddresses/{publicIpAddressName}';
        $statusCodes = [204, 202, 200];
        $method = 'DELETE';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{publicIpAddressName}' => $publicIpAddressName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[PhpResources::X_MS_REQUEST_ID] = PhpUtilities::getGuid();
        }

        $body = '';

        $response = PhpHttpClient::send(
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
     * The Get publicIpAddress operation retreives information about the specified
     * pubicIpAddress
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $publicIpAddressName The name of the subnet.
     * @param string $expand expand references resources.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'publicIPAllocationMethod' => 'Static|Dynamic',
     *       'publicIPAddressVersion' => 'IPv4|IPv6',
     *       'ipConfiguration' => [
     *          'properties' => [
     *             'privateIPAddress' => '',
     *             'privateIPAllocationMethod' => 'Static|Dynamic',
     *             'subnet' => [
     *                'properties' => ,
     *                'name' => '',
     *                'etag' => ''
     *             ],
     *             'publicIPAddress' => [
     *                'properties' => ,
     *                'etag' => ''
     *             ],
     *             'provisioningState' => ''
     *          ],
     *          'name' => '',
     *          'etag' => ''
     *       ],
     *       'dnsSettings' => [
     *          'domainNameLabel' => '',
     *          'fqdn' => '',
     *          'reverseFqdn' => ''
     *       ],
     *       'ipAddress' => '',
     *       'idleTimeoutInMinutes' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function get($resourceGroupName, $publicIpAddressName, $expand = null, array $customHeaders = [])
    {
        $response = $this->getAsync($resourceGroupName, $publicIpAddressName, $expand, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The Get publicIpAddress operation retreives information about the specified
     * pubicIpAddress
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $publicIpAddressName The name of the subnet.
     * @param string $expand expand references resources.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($resourceGroupName, $publicIpAddressName, $expand = null, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            PhpValidate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($publicIpAddressName == null) {
            PhpValidate::notNullOrEmpty($publicIpAddressName, '$publicIpAddressName');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/publicIPAddresses/{publicIpAddressName}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{publicIpAddressName}' => $publicIpAddressName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion(), '$expand' => $expand];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[PhpResources::X_MS_REQUEST_ID] = PhpUtilities::getGuid();
        }

        $body = '';

        $response = PhpHttpClient::send(
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
     * The Put PublicIPAddress operation creates/updates a stable/dynamic PublicIP
     * address
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $publicIpAddressName The name of the publicIpAddress.
     * @param array $parameters Parameters supplied to the create/update PublicIPAddress operation 
     * <pre>
     * [
     *    'properties' => [
     *       'publicIPAllocationMethod' => 'Static|Dynamic',
     *       'publicIPAddressVersion' => 'IPv4|IPv6',
     *       'ipConfiguration' => [
     *          'properties' => [
     *             'privateIPAddress' => '',
     *             'privateIPAllocationMethod' => 'Static|Dynamic',
     *             'subnet' => [
     *                'properties' => ,
     *                'name' => '',
     *                'etag' => ''
     *             ],
     *             'publicIPAddress' => [
     *                'properties' => ,
     *                'etag' => ''
     *             ],
     *             'provisioningState' => ''
     *          ],
     *          'name' => '',
     *          'etag' => ''
     *       ],
     *       'dnsSettings' => [
     *          'domainNameLabel' => '',
     *          'fqdn' => '',
     *          'reverseFqdn' => ''
     *       ],
     *       'ipAddress' => '',
     *       'idleTimeoutInMinutes' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'publicIPAllocationMethod' => 'Static|Dynamic',
     *       'publicIPAddressVersion' => 'IPv4|IPv6',
     *       'ipConfiguration' => [
     *          'properties' => [
     *             'privateIPAddress' => '',
     *             'privateIPAllocationMethod' => 'Static|Dynamic',
     *             'subnet' => [
     *                'properties' => ,
     *                'name' => '',
     *                'etag' => ''
     *             ],
     *             'publicIPAddress' => [
     *                'properties' => ,
     *                'etag' => ''
     *             ],
     *             'provisioningState' => ''
     *          ],
     *          'name' => '',
     *          'etag' => ''
     *       ],
     *       'dnsSettings' => [
     *          'domainNameLabel' => '',
     *          'fqdn' => '',
     *          'reverseFqdn' => ''
     *       ],
     *       'ipAddress' => '',
     *       'idleTimeoutInMinutes' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'publicIPAllocationMethod' => 'Static|Dynamic',
     *       'publicIPAddressVersion' => 'IPv4|IPv6',
     *       'ipConfiguration' => [
     *          'properties' => [
     *             'privateIPAddress' => '',
     *             'privateIPAllocationMethod' => 'Static|Dynamic',
     *             'subnet' => [
     *                'properties' => ,
     *                'name' => '',
     *                'etag' => ''
     *             ],
     *             'publicIPAddress' => [
     *                'properties' => ,
     *                'etag' => ''
     *             ],
     *             'provisioningState' => ''
     *          ],
     *          'name' => '',
     *          'etag' => ''
     *       ],
     *       'dnsSettings' => [
     *          'domainNameLabel' => '',
     *          'fqdn' => '',
     *          'reverseFqdn' => ''
     *       ],
     *       'ipAddress' => '',
     *       'idleTimeoutInMinutes' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function createOrUpdate($resourceGroupName, $publicIpAddressName, array $parameters, array $customHeaders = [])
    {
        $response = $this->begincreateOrUpdateAsync($resourceGroupName, $publicIpAddressName, $parameters, $customHeaders);

        if ($response->getStatusCode() !== PhpResources::STATUS_OK) {
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
     * The Put PublicIPAddress operation creates/updates a stable/dynamic PublicIP
     * address
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $publicIpAddressName The name of the publicIpAddress.
     * @param array $parameters Parameters supplied to the create/update PublicIPAddress operation 
     * <pre>
     * [
     *    'properties' => [
     *       'publicIPAllocationMethod' => 'Static|Dynamic',
     *       'publicIPAddressVersion' => 'IPv4|IPv6',
     *       'ipConfiguration' => [
     *          'properties' => [
     *             'privateIPAddress' => '',
     *             'privateIPAllocationMethod' => 'Static|Dynamic',
     *             'subnet' => [
     *                'properties' => ,
     *                'name' => '',
     *                'etag' => ''
     *             ],
     *             'publicIPAddress' => [
     *                'properties' => ,
     *                'etag' => ''
     *             ],
     *             'provisioningState' => ''
     *          ],
     *          'name' => '',
     *          'etag' => ''
     *       ],
     *       'dnsSettings' => [
     *          'domainNameLabel' => '',
     *          'fqdn' => '',
     *          'reverseFqdn' => ''
     *       ],
     *       'ipAddress' => '',
     *       'idleTimeoutInMinutes' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'publicIPAllocationMethod' => 'Static|Dynamic',
     *       'publicIPAddressVersion' => 'IPv4|IPv6',
     *       'ipConfiguration' => [
     *          'properties' => [
     *             'privateIPAddress' => '',
     *             'privateIPAllocationMethod' => 'Static|Dynamic',
     *             'subnet' => [
     *                'properties' => ,
     *                'name' => '',
     *                'etag' => ''
     *             ],
     *             'publicIPAddress' => [
     *                'properties' => ,
     *                'etag' => ''
     *             ],
     *             'provisioningState' => ''
     *          ],
     *          'name' => '',
     *          'etag' => ''
     *       ],
     *       'dnsSettings' => [
     *          'domainNameLabel' => '',
     *          'fqdn' => '',
     *          'reverseFqdn' => ''
     *       ],
     *       'ipAddress' => '',
     *       'idleTimeoutInMinutes' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'publicIPAllocationMethod' => 'Static|Dynamic',
     *       'publicIPAddressVersion' => 'IPv4|IPv6',
     *       'ipConfiguration' => [
     *          'properties' => [
     *             'privateIPAddress' => '',
     *             'privateIPAllocationMethod' => 'Static|Dynamic',
     *             'subnet' => [
     *                'properties' => ,
     *                'name' => '',
     *                'etag' => ''
     *             ],
     *             'publicIPAddress' => [
     *                'properties' => ,
     *                'etag' => ''
     *             ],
     *             'provisioningState' => ''
     *          ],
     *          'name' => '',
     *          'etag' => ''
     *       ],
     *       'dnsSettings' => [
     *          'domainNameLabel' => '',
     *          'fqdn' => '',
     *          'reverseFqdn' => ''
     *       ],
     *       'ipAddress' => '',
     *       'idleTimeoutInMinutes' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function beginCreateOrUpdate($resourceGroupName, $publicIpAddressName, array $parameters, array $customHeaders = [])
    {
        $response = $this->beginCreateOrUpdateAsync($resourceGroupName, $publicIpAddressName, $parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The Put PublicIPAddress operation creates/updates a stable/dynamic PublicIP
     * address
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $publicIpAddressName The name of the publicIpAddress.
     * @param array $parameters Parameters supplied to the create/update PublicIPAddress operation 
     * <pre>
     * [
     *    'properties' => [
     *       'publicIPAllocationMethod' => 'Static|Dynamic',
     *       'publicIPAddressVersion' => 'IPv4|IPv6',
     *       'ipConfiguration' => [
     *          'properties' => [
     *             'privateIPAddress' => '',
     *             'privateIPAllocationMethod' => 'Static|Dynamic',
     *             'subnet' => [
     *                'properties' => ,
     *                'name' => '',
     *                'etag' => ''
     *             ],
     *             'publicIPAddress' => [
     *                'properties' => ,
     *                'etag' => ''
     *             ],
     *             'provisioningState' => ''
     *          ],
     *          'name' => '',
     *          'etag' => ''
     *       ],
     *       'dnsSettings' => [
     *          'domainNameLabel' => '',
     *          'fqdn' => '',
     *          'reverseFqdn' => ''
     *       ],
     *       'ipAddress' => '',
     *       'idleTimeoutInMinutes' => '',
     *       'resourceGuid' => '',
     *       'provisioningState' => ''
     *    ],
     *    'etag' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginCreateOrUpdateAsync($resourceGroupName, $publicIpAddressName, array $parameters, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            PhpValidate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($publicIpAddressName == null) {
            PhpValidate::notNullOrEmpty($publicIpAddressName, '$publicIpAddressName');
        }
        if ($parameters == null) {
            PhpValidate::notNullOrEmpty($parameters, '$parameters');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/publicIPAddresses/{publicIpAddressName}';
        $statusCodes = [201, 200];
        $method = 'PUT';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{publicIpAddressName}' => $publicIpAddressName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[PhpResources::X_MS_REQUEST_ID] = PhpUtilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($parameters);

        $response = PhpHttpClient::send(
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
     * The List publicIpAddress opertion retrieves all the publicIpAddresses in a
     * subscription.
     *
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
    public function listAll(array $customHeaders = [])
    {
        $response = $this->listAllAsync($customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The List publicIpAddress opertion retrieves all the publicIpAddresses in a
     * subscription.
     *
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listAllAsync(array $customHeaders = [])
    {
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.Network/publicIPAddresses';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[PhpResources::X_MS_REQUEST_ID] = PhpUtilities::getGuid();
        }

        $body = '';

        $response = PhpHttpClient::send(
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
     * The List publicIpAddress opertion retrieves all the publicIpAddresses in a
     * resource group.
     *
     * @param string $resourceGroupName The name of the resource group.
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
    public function listOperation($resourceGroupName, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($resourceGroupName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The List publicIpAddress opertion retrieves all the publicIpAddresses in a
     * resource group.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync($resourceGroupName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            PhpValidate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/publicIPAddresses';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[PhpResources::X_MS_REQUEST_ID] = PhpUtilities::getGuid();
        }

        $body = '';

        $response = PhpHttpClient::send(
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
     * The List publicIpAddress opertion retrieves all the publicIpAddresses in a
     * subscription.
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
    public function listAllNext($nextPageLink, array $customHeaders = [])
    {
        $response = $this->listAllNextAsync($nextPageLink, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The List publicIpAddress opertion retrieves all the publicIpAddresses in a
     * subscription.
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listAllNextAsync($nextPageLink, array $customHeaders = [])
    {
        if ($nextPageLink == null) {
            PhpValidate::notNullOrEmpty($nextPageLink, '$nextPageLink');
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
            $headers[PhpResources::X_MS_REQUEST_ID] = PhpUtilities::getGuid();
        }

        $body = '';

        $response = PhpHttpClient::send(
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
     * The List publicIpAddress opertion retrieves all the publicIpAddresses in a
     * resource group.
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
     * The List publicIpAddress opertion retrieves all the publicIpAddresses in a
     * resource group.
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
            PhpValidate::notNullOrEmpty($nextPageLink, '$nextPageLink');
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
            $headers[PhpResources::X_MS_REQUEST_ID] = PhpUtilities::getGuid();
        }

        $body = '';

        $response = PhpHttpClient::send(
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
