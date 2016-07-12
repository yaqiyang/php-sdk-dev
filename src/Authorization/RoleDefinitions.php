<?php

/**
 * Code generated by Microsoft (R) AutoRest Code Generator 0.17.0.0
 * Changes may cause incorrect behavior and will be lost if the code is
 * regenerated.
 *
 * PHP version: >=5.5
 *
 * @category    Microsoft
 *
 * @author      Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright   2016 Microsoft Corporation
 * @license     http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link        https://github.com/Azure/azure-sdk-for-php
 *
 * @version     Release: 0.10.0_2016-07, API Version: 2015-07-01
 */

namespace MicrosoftAzure\Authorization;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * RoleDefinitions.
 */
class RoleDefinitions
{
    private $_client;

    /**
     * Creates a new instance for RoleDefinitions.
     *
     * @param AuthorizationManagementClient, Service client for RoleDefinitions
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /*
     * Deletes the role definition.
     *
     * @param string $scope Scope
     * @param string $roleDefinitionId Role definition id.
     * @param array $customHeaders ['key' => 'value'] An array of custom headers that will be added to
     *  the HTTP request.
     *
     * @return array when the resposne status is OK 
     * [
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'properties' => [
     *       'roleName' => '',
     *       'description' => '',
     *       'type' => '',
     *       'permissions' => '',
     *       'assignableScopes' => ''
     *    ]
     * ];
     */
    public function delete($scope, $roleDefinitionId, array $customHeaders = [])
    {
        $response = $this->deleteAsync($scope, $roleDefinitionId, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->unserialize($contents);
            }
        }

        return [];
    }

    /*
     * Deletes the role definition.
     *
     * @param string $scope Scope
     * @param string $roleDefinitionId Role definition id.
     * @param array $customHeaders ['key' => 'value'] An array of custom headers
     * that will be added to the HTTP request.
     *
     * @return Guzzle Response object
     */
    public function deleteAsync($scope, $roleDefinitionId, array $customHeaders = [])
    {
        if ($scope == null) {
            Validate::notNullOrEmpty($scope, '$scope');
        }
        if ($roleDefinitionId == null) {
            Validate::notNullOrEmpty($roleDefinitionId, '$roleDefinitionId');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/{scope}/providers/Microsoft.Authorization/roleDefinitions/{roleDefinitionId}';
        $statusCodes = [200];
        $method = 'DELETE';

        $path = strtr($path, ['{roleDefinitionId}' => $roleDefinitionId]);
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

    /*
     * Get role definition by name (GUID).
     *
     * @param string $scope Scope
     * @param string $roleDefinitionId Role definition Id
     * @param array $customHeaders ['key' => 'value'] An array of custom headers that will be added to
     *  the HTTP request.
     *
     * @return array when the resposne status is OK 
     * [
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'properties' => [
     *       'roleName' => '',
     *       'description' => '',
     *       'type' => '',
     *       'permissions' => '',
     *       'assignableScopes' => ''
     *    ]
     * ];
     */
    public function get($scope, $roleDefinitionId, array $customHeaders = [])
    {
        $response = $this->getAsync($scope, $roleDefinitionId, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->unserialize($contents);
            }
        }

        return [];
    }

    /*
     * Get role definition by name (GUID).
     *
     * @param string $scope Scope
     * @param string $roleDefinitionId Role definition Id
     * @param array $customHeaders ['key' => 'value'] An array of custom headers
     * that will be added to the HTTP request.
     *
     * @return Guzzle Response object
     */
    public function getAsync($scope, $roleDefinitionId, array $customHeaders = [])
    {
        if ($scope == null) {
            Validate::notNullOrEmpty($scope, '$scope');
        }
        if ($roleDefinitionId == null) {
            Validate::notNullOrEmpty($roleDefinitionId, '$roleDefinitionId');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/{scope}/providers/Microsoft.Authorization/roleDefinitions/{roleDefinitionId}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{roleDefinitionId}' => $roleDefinitionId]);
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

    /*
     * Creates or updates a role definition.
     *
     * @param string $scope Scope
     * @param string $roleDefinitionId Role definition id.
     * @param array $roleDefinition Role definition. 
     * [
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'properties' => [
     *       'roleName' => '',
     *       'description' => '',
     *       'type' => '',
     *       'permissions' => '',
     *       'assignableScopes' => ''
     *    ]
     * ];
     * @param array $customHeaders ['key' => 'value'] An array of custom headers that will be added to
     *  the HTTP request.
     *
     * @return array when the resposne status is Created 
     * [
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'properties' => [
     *       'roleName' => '',
     *       'description' => '',
     *       'type' => '',
     *       'permissions' => '',
     *       'assignableScopes' => ''
     *    ]
     * ];
     */
    public function createOrUpdate($scope, $roleDefinitionId, array $roleDefinition, array $customHeaders = [])
    {
        $response = $this->createOrUpdateAsync($scope, $roleDefinitionId, $roleDefinition, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->unserialize($contents);
            }
        }

        return [];
    }

    /*
     * Creates or updates a role definition.
     *
     * @param string $scope Scope
     * @param string $roleDefinitionId Role definition id.
     * @param array $roleDefinition Role definition. 
     * [
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'properties' => [
     *       'roleName' => '',
     *       'description' => '',
     *       'type' => '',
     *       'permissions' => '',
     *       'assignableScopes' => ''
     *    ]
     * ];
     * @param array $customHeaders ['key' => 'value'] An array of custom headers
     * that will be added to the HTTP request.
     *
     * @return Guzzle Response object
     */
    public function createOrUpdateAsync($scope, $roleDefinitionId, array $roleDefinition, array $customHeaders = [])
    {
        if ($scope == null) {
            Validate::notNullOrEmpty($scope, '$scope');
        }
        if ($roleDefinitionId == null) {
            Validate::notNullOrEmpty($roleDefinitionId, '$roleDefinitionId');
        }
        if ($roleDefinition == null) {
            Validate::notNullOrEmpty($roleDefinition, '$roleDefinition');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/{scope}/providers/Microsoft.Authorization/roleDefinitions/{roleDefinitionId}';
        $statusCodes = [201];
        $method = 'PUT';

        $path = strtr($path, ['{roleDefinitionId}' => $roleDefinitionId]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($roleDefinition);

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

    /*
     * Get role definition by name (GUID).
     *
     * @param string $roleDefinitionId Fully qualified role definition Id
     * @param array $customHeaders ['key' => 'value'] An array of custom headers that will be added to
     *  the HTTP request.
     *
     * @return array when the resposne status is OK 
     * [
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'properties' => [
     *       'roleName' => '',
     *       'description' => '',
     *       'type' => '',
     *       'permissions' => '',
     *       'assignableScopes' => ''
     *    ]
     * ];
     */
    public function getById($roleDefinitionId, array $customHeaders = [])
    {
        $response = $this->getByIdAsync($roleDefinitionId, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->unserialize($contents);
            }
        }

        return [];
    }

    /*
     * Get role definition by name (GUID).
     *
     * @param string $roleDefinitionId Fully qualified role definition Id
     * @param array $customHeaders ['key' => 'value'] An array of custom headers
     * that will be added to the HTTP request.
     *
     * @return Guzzle Response object
     */
    public function getByIdAsync($roleDefinitionId, array $customHeaders = [])
    {
        if ($roleDefinitionId == null) {
            Validate::notNullOrEmpty($roleDefinitionId, '$roleDefinitionId');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/{roleDefinitionId}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, []);
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

    /*
     * Get all role definitions that are applicable at scope and above. Use
     * atScopeAndBelow filter to search below the given scope as well
     *
     * @param string $scope Scope
     * @param array $filter The filter to apply on the operation. 
     * [
     *    'roleName' => ''
     * ];
     * @param array $customHeaders ['key' => 'value'] An array of custom headers that will be added to
     *  the HTTP request.
     *
     * @return array when the resposne status is OK 
     * [
     *    'value' => ''
     * ];
     */
    public function listOperation($scope, array $filter, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($scope, $filter, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->unserialize($contents);
            }
        }

        return [];
    }

    /*
     * Get all role definitions that are applicable at scope and above. Use
     * atScopeAndBelow filter to search below the given scope as well
     *
     * @param string $scope Scope
     * @param array $filter The filter to apply on the operation. 
     * [
     *    'roleName' => ''
     * ];
     * @param array $customHeaders ['key' => 'value'] An array of custom headers
     * that will be added to the HTTP request.
     *
     * @return Guzzle Response object
     */
    public function listOperationAsync($scope, array $filter, array $customHeaders = [])
    {
        if ($scope == null) {
            Validate::notNullOrEmpty($scope, '$scope');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/{scope}/providers/Microsoft.Authorization/roleDefinitions';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, []);
        $queryParams = ['$filter' => $filter, 'api-version' => $this->_client->getApiVersion()];
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

    /*
     * Get all role definitions that are applicable at scope and above. Use
     * atScopeAndBelow filter to search below the given scope as well
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders ['key' => 'value'] An array of custom headers that will be added to
     *  the HTTP request.
     *
     * @return array when the resposne status is OK 
     * [
     *    'value' => ''
     * ];
     */
    public function listNext($nextPageLink, array $customHeaders = [])
    {
        $response = $this->listNextAsync($nextPageLink, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->unserialize($contents);
            }
        }

        return [];
    }

    /*
     * Get all role definitions that are applicable at scope and above. Use
     * atScopeAndBelow filter to search below the given scope as well
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders ['key' => 'value'] An array of custom headers
     * that will be added to the HTTP request.
     *
     * @return Guzzle Response object
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
