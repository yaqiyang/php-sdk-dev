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
 * @version     Release: 0.10.0_2016, API Version: 2016-04-01
 */

namespace MicrosoftAzure\Arm\Redis;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * PatchSchedules for REST API for Azure Redis Cache Service
 */
class PatchSchedules
{
    /**
     * The service client object for the operations.
     *
     * @var RedisManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for PatchSchedules.
     *
     * @param RedisManagementClient, Service client for PatchSchedules
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Create or replace the patching schedule for redis cache.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $name The name of the redis cache.
     * @param array $parameters Parameters to set patch schedules for redis cache. 
     * <pre>
     * [
     *    'properties' => [
     *       'scheduleEntries' => 'requiredScheduleEntriesProperty'
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'properties' => [
     *       'scheduleEntries' => ''
     *    ]
     * ];
     * </pre>
     */
    public function createOrUpdate($resourceGroupName, $name, array $parameters, array $customHeaders = [])
    {
        $response = $this->createOrUpdateAsync($resourceGroupName, $name, $parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Create or replace the patching schedule for redis cache.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $name The name of the redis cache.
     * @param array $parameters Parameters to set patch schedules for redis cache. 
     * <pre>
     * [
     *    'properties' => [
     *       'scheduleEntries' => 'requiredScheduleEntriesProperty'
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function createOrUpdateAsync($resourceGroupName, $name, array $parameters, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($name == null) {
            Validate::notNullOrEmpty($name, '$name');
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

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cache/Redis/{name}/patchSchedules/default';
        $statusCodes = [200];
        $method = 'PUT';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{name}' => $name, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * Deletes the patching schedule for redis cache.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $name The name of the redis cache.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     */
    public function delete($resourceGroupName, $name, array $customHeaders = [])
    {
        $response = $this->deleteAsync($resourceGroupName, $name, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Deletes the patching schedule for redis cache.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $name The name of the redis cache.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function deleteAsync($resourceGroupName, $name, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($name == null) {
            Validate::notNullOrEmpty($name, '$name');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cache/Redis/{name}/patchSchedules/default';
        $statusCodes = [200];
        $method = 'DELETE';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{name}' => $name, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * Gets the patching schedule for redis cache.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $name The name of the redis cache.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'properties' => [
     *       'scheduleEntries' => ''
     *    ]
     * ];
     * </pre>
     */
    public function get($resourceGroupName, $name, array $customHeaders = [])
    {
        $response = $this->getAsync($resourceGroupName, $name, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets the patching schedule for redis cache.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $name The name of the redis cache.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($resourceGroupName, $name, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($name == null) {
            Validate::notNullOrEmpty($name, '$name');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cache/Redis/{name}/patchSchedules/default';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{name}' => $name, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
}
