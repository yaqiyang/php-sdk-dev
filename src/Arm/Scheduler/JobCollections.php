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
 * @version     Release: 0.10.0_2016, API Version: 2016-03-01
 */

namespace MicrosoftAzure\Arm\Scheduler;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * JobCollections.
 */
class JobCollections
{
    /**
     * The service client object for the operations.
     *
     * @var SchedulerManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for JobCollections.
     *
     * @param SchedulerManagementClient, Service client for JobCollections
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Gets all job collections under specified subscription.
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
    public function listBySubscription(array $customHeaders = [])
    {
        $response = $this->listBySubscriptionAsync($customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets all job collections under specified subscription.
     *
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listBySubscriptionAsync(array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.Scheduler/jobCollections';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * Gets all job collections under specified resource group.
     *
     * @param string $resourceGroupName The resource group name.
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
    public function listByResourceGroup($resourceGroupName, array $customHeaders = [])
    {
        $response = $this->listByResourceGroupAsync($resourceGroupName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets all job collections under specified resource group.
     *
     * @param string $resourceGroupName The resource group name.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listByResourceGroupAsync($resourceGroupName, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Scheduler/jobCollections';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName]);
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
     * Gets a job collection.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $jobCollectionName The job collection name.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'id' => '',
     *    'type' => '',
     *    'name' => '',
     *    'location' => '',
     *    'tags' => '',
     *    'properties' => [
     *       'sku' => [
     *          'name' => 'Standard|Free|P10Premium|P20Premium'
     *       ],
     *       'state' => 'Enabled|Disabled|Suspended|Deleted',
     *       'quota' => [
     *          'maxJobCount' => '',
     *          'maxJobOccurrence' => '',
     *          'maxRecurrence' => [
     *             'frequency' => 'Minute|Hour|Day|Week|Month',
     *             'interval' => ''
     *          ]
     *       ]
     *    ]
     * ];
     * </pre>
     */
    public function get($resourceGroupName, $jobCollectionName, array $customHeaders = [])
    {
        $response = $this->getAsync($resourceGroupName, $jobCollectionName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets a job collection.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $jobCollectionName The job collection name.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($resourceGroupName, $jobCollectionName, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($jobCollectionName == null) {
            Validate::notNullOrEmpty($jobCollectionName, '$jobCollectionName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Scheduler/jobCollections/{jobCollectionName}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{jobCollectionName}' => $jobCollectionName]);
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
     * Provisions a new job collection or updates an existing job collection.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $jobCollectionName The job collection name.
     * @param array $jobCollection The job collection definition. 
     * <pre>
     * [
     *    'id' => '',
     *    'type' => '',
     *    'name' => '',
     *    'location' => '',
     *    'tags' => '',
     *    'properties' => [
     *       'sku' => [
     *          'name' => 'Standard|Free|P10Premium|P20Premium'
     *       ],
     *       'state' => 'Enabled|Disabled|Suspended|Deleted',
     *       'quota' => [
     *          'maxJobCount' => '',
     *          'maxJobOccurrence' => '',
     *          'maxRecurrence' => [
     *             'frequency' => 'Minute|Hour|Day|Week|Month',
     *             'interval' => ''
     *          ]
     *       ]
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
     *    'type' => '',
     *    'name' => '',
     *    'location' => '',
     *    'tags' => '',
     *    'properties' => [
     *       'sku' => [
     *          'name' => 'Standard|Free|P10Premium|P20Premium'
     *       ],
     *       'state' => 'Enabled|Disabled|Suspended|Deleted',
     *       'quota' => [
     *          'maxJobCount' => '',
     *          'maxJobOccurrence' => '',
     *          'maxRecurrence' => [
     *             'frequency' => 'Minute|Hour|Day|Week|Month',
     *             'interval' => ''
     *          ]
     *       ]
     *    ]
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'id' => '',
     *    'type' => '',
     *    'name' => '',
     *    'location' => '',
     *    'tags' => '',
     *    'properties' => [
     *       'sku' => [
     *          'name' => 'Standard|Free|P10Premium|P20Premium'
     *       ],
     *       'state' => 'Enabled|Disabled|Suspended|Deleted',
     *       'quota' => [
     *          'maxJobCount' => '',
     *          'maxJobOccurrence' => '',
     *          'maxRecurrence' => [
     *             'frequency' => 'Minute|Hour|Day|Week|Month',
     *             'interval' => ''
     *          ]
     *       ]
     *    ]
     * ];
     * </pre>
     */
    public function createOrUpdate($resourceGroupName, $jobCollectionName, array $jobCollection, array $customHeaders = [])
    {
        $response = $this->createOrUpdateAsync($resourceGroupName, $jobCollectionName, $jobCollection, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Provisions a new job collection or updates an existing job collection.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $jobCollectionName The job collection name.
     * @param array $jobCollection The job collection definition. 
     * <pre>
     * [
     *    'id' => '',
     *    'type' => '',
     *    'name' => '',
     *    'location' => '',
     *    'tags' => '',
     *    'properties' => [
     *       'sku' => [
     *          'name' => 'Standard|Free|P10Premium|P20Premium'
     *       ],
     *       'state' => 'Enabled|Disabled|Suspended|Deleted',
     *       'quota' => [
     *          'maxJobCount' => '',
     *          'maxJobOccurrence' => '',
     *          'maxRecurrence' => [
     *             'frequency' => 'Minute|Hour|Day|Week|Month',
     *             'interval' => ''
     *          ]
     *       ]
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function createOrUpdateAsync($resourceGroupName, $jobCollectionName, array $jobCollection, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($jobCollectionName == null) {
            Validate::notNullOrEmpty($jobCollectionName, '$jobCollectionName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($jobCollection == null) {
            Validate::notNullOrEmpty($jobCollection, '$jobCollection');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Scheduler/jobCollections/{jobCollectionName}';
        $statusCodes = [200, 201];
        $method = 'PUT';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{jobCollectionName}' => $jobCollectionName]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($jobCollection);

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
     * Patches an existing job collection.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $jobCollectionName The job collection name.
     * @param array $jobCollection The job collection definition. 
     * <pre>
     * [
     *    'id' => '',
     *    'type' => '',
     *    'name' => '',
     *    'location' => '',
     *    'tags' => '',
     *    'properties' => [
     *       'sku' => [
     *          'name' => 'Standard|Free|P10Premium|P20Premium'
     *       ],
     *       'state' => 'Enabled|Disabled|Suspended|Deleted',
     *       'quota' => [
     *          'maxJobCount' => '',
     *          'maxJobOccurrence' => '',
     *          'maxRecurrence' => [
     *             'frequency' => 'Minute|Hour|Day|Week|Month',
     *             'interval' => ''
     *          ]
     *       ]
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
     *    'type' => '',
     *    'name' => '',
     *    'location' => '',
     *    'tags' => '',
     *    'properties' => [
     *       'sku' => [
     *          'name' => 'Standard|Free|P10Premium|P20Premium'
     *       ],
     *       'state' => 'Enabled|Disabled|Suspended|Deleted',
     *       'quota' => [
     *          'maxJobCount' => '',
     *          'maxJobOccurrence' => '',
     *          'maxRecurrence' => [
     *             'frequency' => 'Minute|Hour|Day|Week|Month',
     *             'interval' => ''
     *          ]
     *       ]
     *    ]
     * ];
     * </pre>
     */
    public function patch($resourceGroupName, $jobCollectionName, array $jobCollection, array $customHeaders = [])
    {
        $response = $this->patchAsync($resourceGroupName, $jobCollectionName, $jobCollection, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Patches an existing job collection.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $jobCollectionName The job collection name.
     * @param array $jobCollection The job collection definition. 
     * <pre>
     * [
     *    'id' => '',
     *    'type' => '',
     *    'name' => '',
     *    'location' => '',
     *    'tags' => '',
     *    'properties' => [
     *       'sku' => [
     *          'name' => 'Standard|Free|P10Premium|P20Premium'
     *       ],
     *       'state' => 'Enabled|Disabled|Suspended|Deleted',
     *       'quota' => [
     *          'maxJobCount' => '',
     *          'maxJobOccurrence' => '',
     *          'maxRecurrence' => [
     *             'frequency' => 'Minute|Hour|Day|Week|Month',
     *             'interval' => ''
     *          ]
     *       ]
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function patchAsync($resourceGroupName, $jobCollectionName, array $jobCollection, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($jobCollectionName == null) {
            Validate::notNullOrEmpty($jobCollectionName, '$jobCollectionName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($jobCollection == null) {
            Validate::notNullOrEmpty($jobCollection, '$jobCollection');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Scheduler/jobCollections/{jobCollectionName}';
        $statusCodes = [200];
        $method = 'PATCH';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{jobCollectionName}' => $jobCollectionName]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($jobCollection);

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
     * Deletes a job collection.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $jobCollectionName The job collection name.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function delete($resourceGroupName, $jobCollectionName, array $customHeaders = [])
    {
        $response = $this->begindeleteAsync($resourceGroupName, $jobCollectionName, $customHeaders);

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
     * Deletes a job collection.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $jobCollectionName The job collection name.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function beginDelete($resourceGroupName, $jobCollectionName, array $customHeaders = [])
    {
        $response = $this->beginDeleteAsync($resourceGroupName, $jobCollectionName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Deletes a job collection.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $jobCollectionName The job collection name.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginDeleteAsync($resourceGroupName, $jobCollectionName, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($jobCollectionName == null) {
            Validate::notNullOrEmpty($jobCollectionName, '$jobCollectionName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Scheduler/jobCollections/{jobCollectionName}';
        $statusCodes = [200, 202];
        $method = 'DELETE';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{jobCollectionName}' => $jobCollectionName]);
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
     * Enables all of the jobs in the job collection.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $jobCollectionName The job collection name.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function enable($resourceGroupName, $jobCollectionName, array $customHeaders = [])
    {
        $response = $this->beginenableAsync($resourceGroupName, $jobCollectionName, $customHeaders);

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
     * Enables all of the jobs in the job collection.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $jobCollectionName The job collection name.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function beginEnable($resourceGroupName, $jobCollectionName, array $customHeaders = [])
    {
        $response = $this->beginEnableAsync($resourceGroupName, $jobCollectionName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Enables all of the jobs in the job collection.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $jobCollectionName The job collection name.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginEnableAsync($resourceGroupName, $jobCollectionName, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($jobCollectionName == null) {
            Validate::notNullOrEmpty($jobCollectionName, '$jobCollectionName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Scheduler/jobCollections/{jobCollectionName}/enable';
        $statusCodes = [200, 202];
        $method = 'POST';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{jobCollectionName}' => $jobCollectionName]);
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
     * Disables all of the jobs in the job collection.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $jobCollectionName The job collection name.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function disable($resourceGroupName, $jobCollectionName, array $customHeaders = [])
    {
        $response = $this->begindisableAsync($resourceGroupName, $jobCollectionName, $customHeaders);

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
     * Disables all of the jobs in the job collection.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $jobCollectionName The job collection name.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function beginDisable($resourceGroupName, $jobCollectionName, array $customHeaders = [])
    {
        $response = $this->beginDisableAsync($resourceGroupName, $jobCollectionName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Disables all of the jobs in the job collection.
     *
     * @param string $resourceGroupName The resource group name.
     * @param string $jobCollectionName The job collection name.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginDisableAsync($resourceGroupName, $jobCollectionName, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($jobCollectionName == null) {
            Validate::notNullOrEmpty($jobCollectionName, '$jobCollectionName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Scheduler/jobCollections/{jobCollectionName}/disable';
        $statusCodes = [200, 202];
        $method = 'POST';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{jobCollectionName}' => $jobCollectionName]);
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
     * Gets all job collections under specified subscription.
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
    public function listBySubscriptionNext($nextPageLink, array $customHeaders = [])
    {
        $response = $this->listBySubscriptionNextAsync($nextPageLink, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets all job collections under specified subscription.
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listBySubscriptionNextAsync($nextPageLink, array $customHeaders = [])
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

    /**
     * Gets all job collections under specified resource group.
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
    public function listByResourceGroupNext($nextPageLink, array $customHeaders = [])
    {
        $response = $this->listByResourceGroupNextAsync($nextPageLink, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets all job collections under specified resource group.
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listByResourceGroupNextAsync($nextPageLink, array $customHeaders = [])
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
