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
 * @version     Release: 0.10.0_2016, API Version: 1.6
 */

namespace MicrosoftAzure\Arm\Graph;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * Applications for The Graph RBAC Management Client
 */
class Applications
{
    /**
     * The service client object for the operations.
     *
     * @var GraphRbacManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for Applications.
     *
     * @param GraphRbacManagementClient, Service client for Applications
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Create a new application. Reference:
     * http://msdn.microsoft.com/en-us/library/azure/hh974476.aspx
     *
     * @param array $parameters Parameters to create an application. 
     * <pre>
     * [
     *    'availableToOtherTenants' => 'false',
     *    'displayName' => 'requiredDisplayName',
     *    'homepage' => 'requiredHomepage',
     *    'identifierUris' => 'requiredIdentifierUris',
     *    'replyUrls' => '',
     *    'keyCredentials' => '',
     *    'passwordCredentials' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'objectId' => '',
     *    'objectType' => '',
     *    'appId' => '',
     *    'appPermissions' => '',
     *    'availableToOtherTenants' => 'false',
     *    'displayName' => '',
     *    'identifierUris' => '',
     *    'replyUrls' => '',
     *    'homepage' => ''
     * ];
     * </pre>
     */
    public function create(array $parameters, array $customHeaders = [])
    {
        $response = $this->createAsync($parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Create a new application. Reference:
     * http://msdn.microsoft.com/en-us/library/azure/hh974476.aspx
     *
     * @param array $parameters Parameters to create an application. 
     * <pre>
     * [
     *    'availableToOtherTenants' => 'false',
     *    'displayName' => 'requiredDisplayName',
     *    'homepage' => 'requiredHomepage',
     *    'identifierUris' => 'requiredIdentifierUris',
     *    'replyUrls' => '',
     *    'keyCredentials' => '',
     *    'passwordCredentials' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function createAsync(array $parameters, array $customHeaders = [])
    {
        if ($parameters == null) {
            Validate::notNullOrEmpty($parameters, '$parameters');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/applications';
        $statusCodes = [201];
        $method = 'POST';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
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
     * Lists applications by filter parameters. Reference:
     * http://msdn.microsoft.com/en-us/library/azure/hh974476.aspx
     *
     * @param array $filter The filters to apply on the operation 
     * <pre>
     * [
     *    'displayNameStartsWith' => '',
     *    'appId' => '',
     *    'identifierUri' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => ''
     * ];
     * </pre>
     */
    public function listOperation(array $filter, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($filter, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Lists applications by filter parameters. Reference:
     * http://msdn.microsoft.com/en-us/library/azure/hh974476.aspx
     *
     * @param array $filter The filters to apply on the operation 
     * <pre>
     * [
     *    'displayNameStartsWith' => '',
     *    'appId' => '',
     *    'identifierUri' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync(array $filter, array $customHeaders = [])
    {
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/applications';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
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

    /**
     * Delete an application. Reference:
     * http://msdn.microsoft.com/en-us/library/azure/hh974476.aspx
     *
     * @param string $applicationObjectId Application object id
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status NoContent(204).<br>
     */
    public function delete($applicationObjectId, array $customHeaders = [])
    {
        $response = $this->deleteAsync($applicationObjectId, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Delete an application. Reference:
     * http://msdn.microsoft.com/en-us/library/azure/hh974476.aspx
     *
     * @param string $applicationObjectId Application object id
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function deleteAsync($applicationObjectId, array $customHeaders = [])
    {
        if ($applicationObjectId == null) {
            Validate::notNullOrEmpty($applicationObjectId, '$applicationObjectId');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/applications/{applicationObjectId}';
        $statusCodes = [204];
        $method = 'DELETE';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
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
     * Get an application by object Id. Reference:
     * http://msdn.microsoft.com/en-us/library/azure/hh974476.aspx
     *
     * @param string $applicationObjectId Application object id
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'objectId' => '',
     *    'objectType' => '',
     *    'appId' => '',
     *    'appPermissions' => '',
     *    'availableToOtherTenants' => 'false',
     *    'displayName' => '',
     *    'identifierUris' => '',
     *    'replyUrls' => '',
     *    'homepage' => ''
     * ];
     * </pre>
     */
    public function get($applicationObjectId, array $customHeaders = [])
    {
        $response = $this->getAsync($applicationObjectId, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Get an application by object Id. Reference:
     * http://msdn.microsoft.com/en-us/library/azure/hh974476.aspx
     *
     * @param string $applicationObjectId Application object id
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($applicationObjectId, array $customHeaders = [])
    {
        if ($applicationObjectId == null) {
            Validate::notNullOrEmpty($applicationObjectId, '$applicationObjectId');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/applications/{applicationObjectId}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
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
     * Update existing application. Reference:
     * http://msdn.microsoft.com/en-us/library/azure/hh974476.aspx
     *
     * @param string $applicationObjectId Application object id
     * @param array $parameters Parameters to update an existing application. 
     * <pre>
     * [
     *    'displayName' => '',
     *    'homepage' => '',
     *    'identifierUris' => '',
     *    'replyUrls' => '',
     *    'keyCredentials' => '',
     *    'passwordCredentials' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status NoContent(204).<br>
     */
    public function patch($applicationObjectId, array $parameters, array $customHeaders = [])
    {
        $response = $this->patchAsync($applicationObjectId, $parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Update existing application. Reference:
     * http://msdn.microsoft.com/en-us/library/azure/hh974476.aspx
     *
     * @param string $applicationObjectId Application object id
     * @param array $parameters Parameters to update an existing application. 
     * <pre>
     * [
     *    'displayName' => '',
     *    'homepage' => '',
     *    'identifierUris' => '',
     *    'replyUrls' => '',
     *    'keyCredentials' => '',
     *    'passwordCredentials' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function patchAsync($applicationObjectId, array $parameters, array $customHeaders = [])
    {
        if ($applicationObjectId == null) {
            Validate::notNullOrEmpty($applicationObjectId, '$applicationObjectId');
        }
        if ($parameters == null) {
            Validate::notNullOrEmpty($parameters, '$parameters');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/applications/{applicationObjectId}';
        $statusCodes = [204];
        $method = 'PATCH';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
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
}
