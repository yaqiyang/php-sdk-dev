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
 * SecurityRules for The Microsoft Azure Network management API provides a
 * RESTful set of web services that interact with Microsoft Azure Networks
 * service to manage your network resrources. The API has entities that
 * capture the relationship between an end user and the Microsoft Azure
 * Networks service.
 */
class SecurityRules
{
    /**
     * The service client object for the operations.
     *
     * @var NetworkManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for SecurityRules.
     *
     * @param NetworkManagementClient, Service client for SecurityRules
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * The delete network security rule operation deletes the specified network
     * security rule.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param string $securityRuleName The name of the security rule.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status NoContent(204).<br>
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status OK(200).<br>
     */
    public function delete($resourceGroupName, $networkSecurityGroupName, $securityRuleName, array $customHeaders = [])
    {
        $response = $this->begindeleteAsync($resourceGroupName, $networkSecurityGroupName, $securityRuleName, $customHeaders);

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
     * The delete network security rule operation deletes the specified network
     * security rule.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param string $securityRuleName The name of the security rule.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status NoContent(204).<br>
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status OK(200).<br>
     */
    public function beginDelete($resourceGroupName, $networkSecurityGroupName, $securityRuleName, array $customHeaders = [])
    {
        $response = $this->beginDeleteAsync($resourceGroupName, $networkSecurityGroupName, $securityRuleName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The delete network security rule operation deletes the specified network
     * security rule.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param string $securityRuleName The name of the security rule.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginDeleteAsync($resourceGroupName, $networkSecurityGroupName, $securityRuleName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($networkSecurityGroupName == null) {
            Validate::notNullOrEmpty($networkSecurityGroupName, '$networkSecurityGroupName');
        }
        if ($securityRuleName == null) {
            Validate::notNullOrEmpty($securityRuleName, '$securityRuleName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkSecurityGroups/{networkSecurityGroupName}/securityRules/{securityRuleName}';
        $statusCodes = [204, 202, 200];
        $method = 'DELETE';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{networkSecurityGroupName}' => $networkSecurityGroupName, '{securityRuleName}' => $securityRuleName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * The Get NetworkSecurityRule operation retreives information about the
     * specified network security rule.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param string $securityRuleName The name of the security rule.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'description' => '',
     *       'protocol' => 'Tcp|Udp|*',
     *       'sourcePortRange' => '',
     *       'destinationPortRange' => '',
     *       'sourceAddressPrefix' => '',
     *       'destinationAddressPrefix' => '',
     *       'access' => 'Allow|Deny',
     *       'priority' => '',
     *       'direction' => 'Inbound|Outbound',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function get($resourceGroupName, $networkSecurityGroupName, $securityRuleName, array $customHeaders = [])
    {
        $response = $this->getAsync($resourceGroupName, $networkSecurityGroupName, $securityRuleName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The Get NetworkSecurityRule operation retreives information about the
     * specified network security rule.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param string $securityRuleName The name of the security rule.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($resourceGroupName, $networkSecurityGroupName, $securityRuleName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($networkSecurityGroupName == null) {
            Validate::notNullOrEmpty($networkSecurityGroupName, '$networkSecurityGroupName');
        }
        if ($securityRuleName == null) {
            Validate::notNullOrEmpty($securityRuleName, '$securityRuleName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkSecurityGroups/{networkSecurityGroupName}/securityRules/{securityRuleName}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{networkSecurityGroupName}' => $networkSecurityGroupName, '{securityRuleName}' => $securityRuleName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * The Put network security rule operation creates/updates a security rule in
     * the specified network security group
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param string $securityRuleName The name of the security rule.
     * @param array $securityRuleParameters Parameters supplied to the create/update network security
     *  rule operation 
     * <pre>
     * [
     *    'properties' => [
     *       'description' => '',
     *       'protocol' => 'Tcp|Udp|*',
     *       'sourcePortRange' => '',
     *       'destinationPortRange' => '',
     *       'sourceAddressPrefix' => '',
     *       'destinationAddressPrefix' => '',
     *       'access' => 'Allow|Deny',
     *       'priority' => '',
     *       'direction' => 'Inbound|Outbound',
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
     *       'description' => '',
     *       'protocol' => 'Tcp|Udp|*',
     *       'sourcePortRange' => '',
     *       'destinationPortRange' => '',
     *       'sourceAddressPrefix' => '',
     *       'destinationAddressPrefix' => '',
     *       'access' => 'Allow|Deny',
     *       'priority' => '',
     *       'direction' => 'Inbound|Outbound',
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
     *       'description' => '',
     *       'protocol' => 'Tcp|Udp|*',
     *       'sourcePortRange' => '',
     *       'destinationPortRange' => '',
     *       'sourceAddressPrefix' => '',
     *       'destinationAddressPrefix' => '',
     *       'access' => 'Allow|Deny',
     *       'priority' => '',
     *       'direction' => 'Inbound|Outbound',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function createOrUpdate($resourceGroupName, $networkSecurityGroupName, $securityRuleName, array $securityRuleParameters, array $customHeaders = [])
    {
        $response = $this->begincreateOrUpdateAsync($resourceGroupName, $networkSecurityGroupName, $securityRuleName, $securityRuleParameters, $customHeaders);

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
     * The Put network security rule operation creates/updates a security rule in
     * the specified network security group
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param string $securityRuleName The name of the security rule.
     * @param array $securityRuleParameters Parameters supplied to the create/update network security
     *  rule operation 
     * <pre>
     * [
     *    'properties' => [
     *       'description' => '',
     *       'protocol' => 'Tcp|Udp|*',
     *       'sourcePortRange' => '',
     *       'destinationPortRange' => '',
     *       'sourceAddressPrefix' => '',
     *       'destinationAddressPrefix' => '',
     *       'access' => 'Allow|Deny',
     *       'priority' => '',
     *       'direction' => 'Inbound|Outbound',
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
     *       'description' => '',
     *       'protocol' => 'Tcp|Udp|*',
     *       'sourcePortRange' => '',
     *       'destinationPortRange' => '',
     *       'sourceAddressPrefix' => '',
     *       'destinationAddressPrefix' => '',
     *       'access' => 'Allow|Deny',
     *       'priority' => '',
     *       'direction' => 'Inbound|Outbound',
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
     *       'description' => '',
     *       'protocol' => 'Tcp|Udp|*',
     *       'sourcePortRange' => '',
     *       'destinationPortRange' => '',
     *       'sourceAddressPrefix' => '',
     *       'destinationAddressPrefix' => '',
     *       'access' => 'Allow|Deny',
     *       'priority' => '',
     *       'direction' => 'Inbound|Outbound',
     *       'provisioningState' => ''
     *    ],
     *    'name' => '',
     *    'etag' => ''
     * ];
     * </pre>
     */
    public function beginCreateOrUpdate($resourceGroupName, $networkSecurityGroupName, $securityRuleName, array $securityRuleParameters, array $customHeaders = [])
    {
        $response = $this->beginCreateOrUpdateAsync($resourceGroupName, $networkSecurityGroupName, $securityRuleName, $securityRuleParameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The Put network security rule operation creates/updates a security rule in
     * the specified network security group
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param string $securityRuleName The name of the security rule.
     * @param array $securityRuleParameters Parameters supplied to the create/update network security
     *  rule operation 
     * <pre>
     * [
     *    'properties' => [
     *       'description' => '',
     *       'protocol' => 'Tcp|Udp|*',
     *       'sourcePortRange' => '',
     *       'destinationPortRange' => '',
     *       'sourceAddressPrefix' => '',
     *       'destinationAddressPrefix' => '',
     *       'access' => 'Allow|Deny',
     *       'priority' => '',
     *       'direction' => 'Inbound|Outbound',
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
    public function beginCreateOrUpdateAsync($resourceGroupName, $networkSecurityGroupName, $securityRuleName, array $securityRuleParameters, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($networkSecurityGroupName == null) {
            Validate::notNullOrEmpty($networkSecurityGroupName, '$networkSecurityGroupName');
        }
        if ($securityRuleName == null) {
            Validate::notNullOrEmpty($securityRuleName, '$securityRuleName');
        }
        if ($securityRuleParameters == null) {
            Validate::notNullOrEmpty($securityRuleParameters, '$securityRuleParameters');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkSecurityGroups/{networkSecurityGroupName}/securityRules/{securityRuleName}';
        $statusCodes = [200, 201];
        $method = 'PUT';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{networkSecurityGroupName}' => $networkSecurityGroupName, '{securityRuleName}' => $securityRuleName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($securityRuleParameters);

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
     * The List network security rule opertion retrieves all the security rules in
     * a network security group.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
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
    public function listOperation($resourceGroupName, $networkSecurityGroupName, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($resourceGroupName, $networkSecurityGroupName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The List network security rule opertion retrieves all the security rules in
     * a network security group.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $networkSecurityGroupName The name of the network security
     * group.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync($resourceGroupName, $networkSecurityGroupName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($networkSecurityGroupName == null) {
            Validate::notNullOrEmpty($networkSecurityGroupName, '$networkSecurityGroupName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkSecurityGroups/{networkSecurityGroupName}/securityRules';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{networkSecurityGroupName}' => $networkSecurityGroupName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * The List network security rule opertion retrieves all the security rules in
     * a network security group.
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
     * The List network security rule opertion retrieves all the security rules in
     * a network security group.
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
