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
 * @version     Release: 0.10.0_2016, API Version: 2016-05-15
 */

namespace MicrosoftAzure\Arm\DevTestLabs;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * ArtifactSourceOperations for The DevTest Labs Client.
 */
class ArtifactSourceOperations
{
    /**
     * The service client object for the operations.
     *
     * @var DevTestLabsClient
     */
    private $_client;

    /**
     * Creates a new instance for ArtifactSourceOperations.
     *
     * @param DevTestLabsClient, Service client for ArtifactSourceOperations
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * List artifact sources in a given lab.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param array $filter The filter to apply on the operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'displayName' => '',
     *       'uri' => '',
     *       'sourceType' => 'VsoGit|GitHub',
     *       'folderPath' => '',
     *       'branchRef' => '',
     *       'securityToken' => '',
     *       'status' => 'Enabled|Disabled',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     * @param int $top The maximum number of resources to return from the
     * operation.
     * @param string $orderBy The ordering expression for the results, using OData
     * notation.
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
    public function listOperation($resourceGroupName, $labName, array $filter, $top = null, $orderBy = null, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($resourceGroupName, $labName, $filter, $top, $orderBy, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * List artifact sources in a given lab.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param array $filter The filter to apply on the operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'displayName' => '',
     *       'uri' => '',
     *       'sourceType' => 'VsoGit|GitHub',
     *       'folderPath' => '',
     *       'branchRef' => '',
     *       'securityToken' => '',
     *       'status' => 'Enabled|Disabled',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     * @param int $top The maximum number of resources to return from the
     * operation.
     * @param string $orderBy The ordering expression for the results, using OData
     * notation.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync($resourceGroupName, $labName, array $filter, $top = null, $orderBy = null, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($labName == null) {
            Validate::notNullOrEmpty($labName, '$labName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DevTestLab/labs/{labName}/artifactsources';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{labName}' => $labName]);
        $queryParams = ['$filter' => $filter, '$top' => $top, '$orderBy' => $orderBy, 'api-version' => $this->_client->getApiVersion()];
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
     * Get artifact source.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the artifact source.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'displayName' => '',
     *       'uri' => '',
     *       'sourceType' => 'VsoGit|GitHub',
     *       'folderPath' => '',
     *       'branchRef' => '',
     *       'securityToken' => '',
     *       'status' => 'Enabled|Disabled',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     */
    public function getResource($resourceGroupName, $labName, $name, array $customHeaders = [])
    {
        $response = $this->getResourceAsync($resourceGroupName, $labName, $name, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Get artifact source.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the artifact source.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getResourceAsync($resourceGroupName, $labName, $name, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($labName == null) {
            Validate::notNullOrEmpty($labName, '$labName');
        }
        if ($name == null) {
            Validate::notNullOrEmpty($name, '$name');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DevTestLab/labs/{labName}/artifactsources/{name}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{labName}' => $labName, '{name}' => $name]);
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
     * Create or replace an existing artifact source.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the artifact source.
     * @param array $artifactSource  
     * <pre>
     * [
     *    'properties' => [
     *       'displayName' => '',
     *       'uri' => '',
     *       'sourceType' => 'VsoGit|GitHub',
     *       'folderPath' => '',
     *       'branchRef' => '',
     *       'securityToken' => '',
     *       'status' => 'Enabled|Disabled',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
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
     *       'displayName' => '',
     *       'uri' => '',
     *       'sourceType' => 'VsoGit|GitHub',
     *       'folderPath' => '',
     *       'branchRef' => '',
     *       'securityToken' => '',
     *       'status' => 'Enabled|Disabled',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'displayName' => '',
     *       'uri' => '',
     *       'sourceType' => 'VsoGit|GitHub',
     *       'folderPath' => '',
     *       'branchRef' => '',
     *       'securityToken' => '',
     *       'status' => 'Enabled|Disabled',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     */
    public function createOrUpdateResource($resourceGroupName, $labName, $name, array $artifactSource, array $customHeaders = [])
    {
        $response = $this->createOrUpdateResourceAsync($resourceGroupName, $labName, $name, $artifactSource, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Create or replace an existing artifact source.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the artifact source.
     * @param array $artifactSource  
     * <pre>
     * [
     *    'properties' => [
     *       'displayName' => '',
     *       'uri' => '',
     *       'sourceType' => 'VsoGit|GitHub',
     *       'folderPath' => '',
     *       'branchRef' => '',
     *       'securityToken' => '',
     *       'status' => 'Enabled|Disabled',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function createOrUpdateResourceAsync($resourceGroupName, $labName, $name, array $artifactSource, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($labName == null) {
            Validate::notNullOrEmpty($labName, '$labName');
        }
        if ($name == null) {
            Validate::notNullOrEmpty($name, '$name');
        }
        if ($artifactSource == null) {
            Validate::notNullOrEmpty($artifactSource, '$artifactSource');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DevTestLab/labs/{labName}/artifactsources/{name}';
        $statusCodes = [200, 201];
        $method = 'PUT';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{labName}' => $labName, '{name}' => $name]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($artifactSource);

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
     * Delete artifact source.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the artifact source.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status OK(200).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function deleteResource($resourceGroupName, $labName, $name, array $customHeaders = [])
    {
        $response = $this->deleteResourceAsync($resourceGroupName, $labName, $name, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Delete artifact source.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the artifact source.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function deleteResourceAsync($resourceGroupName, $labName, $name, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($labName == null) {
            Validate::notNullOrEmpty($labName, '$labName');
        }
        if ($name == null) {
            Validate::notNullOrEmpty($name, '$name');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DevTestLab/labs/{labName}/artifactsources/{name}';
        $statusCodes = [200, 204];
        $method = 'DELETE';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{labName}' => $labName, '{name}' => $name]);
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
     * Modify properties of artifact sources.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the artifact source.
     * @param array $artifactSource  
     * <pre>
     * [
     *    'properties' => [
     *       'displayName' => '',
     *       'uri' => '',
     *       'sourceType' => 'VsoGit|GitHub',
     *       'folderPath' => '',
     *       'branchRef' => '',
     *       'securityToken' => '',
     *       'status' => 'Enabled|Disabled',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
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
     *       'displayName' => '',
     *       'uri' => '',
     *       'sourceType' => 'VsoGit|GitHub',
     *       'folderPath' => '',
     *       'branchRef' => '',
     *       'securityToken' => '',
     *       'status' => 'Enabled|Disabled',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     */
    public function patchResource($resourceGroupName, $labName, $name, array $artifactSource, array $customHeaders = [])
    {
        $response = $this->patchResourceAsync($resourceGroupName, $labName, $name, $artifactSource, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Modify properties of artifact sources.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $labName The name of the lab.
     * @param string $name The name of the artifact source.
     * @param array $artifactSource  
     * <pre>
     * [
     *    'properties' => [
     *       'displayName' => '',
     *       'uri' => '',
     *       'sourceType' => 'VsoGit|GitHub',
     *       'folderPath' => '',
     *       'branchRef' => '',
     *       'securityToken' => '',
     *       'status' => 'Enabled|Disabled',
     *       'provisioningState' => '',
     *       'uniqueIdentifier' => ''
     *    ],
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'location' => '',
     *    'tags' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function patchResourceAsync($resourceGroupName, $labName, $name, array $artifactSource, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($labName == null) {
            Validate::notNullOrEmpty($labName, '$labName');
        }
        if ($name == null) {
            Validate::notNullOrEmpty($name, '$name');
        }
        if ($artifactSource == null) {
            Validate::notNullOrEmpty($artifactSource, '$artifactSource');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DevTestLab/labs/{labName}/artifactsources/{name}';
        $statusCodes = [200];
        $method = 'PATCH';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{labName}' => $labName, '{name}' => $name]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($artifactSource);

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
     * List artifact sources in a given lab.
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
     * List artifact sources in a given lab.
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
