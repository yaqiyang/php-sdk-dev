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
 * @version     Release: 0.10.0_2016, API Version: 2015-07-01
 */

namespace MicrosoftAzure\Authorization;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * ProviderOperationsMetadataOperations.
 */
class ProviderOperationsMetadataOperations
{
    /**
     * The service client object for the operations.
     *
     * @var AuthorizationManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for ProviderOperationsMetadataOperations.
     *
     * @param AuthorizationManagementClient, Service client for ProviderOperationsMetadataOperations
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Gets provider operations metadata
     *
     * @param string $resourceProviderNamespace Namespace of the resource provider.
     * @param string $apiVersion
     * @param string $expand
     * @param array $customHeaders ['key' => 'value'] An array of custom headers that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'id' => '',
     *    'name' => '',
     *    'type' => '',
     *    'displayName' => '',
     *    'resourceTypes' => '',
     *    'operations' => ''
     * ];
     * </pre>
     */
    public function get($resourceProviderNamespace, $apiVersion, $expand = 'resourceTypes', array $customHeaders = [])
    {
        $response = $this->getAsync($resourceProviderNamespace, $apiVersion, $expand, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets provider operations metadata
     *
     * @param string $resourceProviderNamespace Namespace of the resource provider.
     * @param string $apiVersion
     * @param string $expand
     * @param array $customHeaders ['key' => 'value'] An array of custom headers
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($resourceProviderNamespace, $apiVersion, $expand = 'resourceTypes', array $customHeaders = [])
    {
        if ($resourceProviderNamespace == null) {
            Validate::notNullOrEmpty($resourceProviderNamespace, '$resourceProviderNamespace');
        }
        if ($apiVersion == null) {
            Validate::notNullOrEmpty($apiVersion, '$apiVersion');
        }

        $path = '/providers/Microsoft.Authorization/providerOperations/{resourceProviderNamespace}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceProviderNamespace}' => $resourceProviderNamespace]);
        $queryParams = ['api-version' => $apiVersion, '$expand' => $expand];
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
     * Gets provider operations metadata list
     *
     * @param string $apiVersion
     * @param string $expand
     * @param array $customHeaders ['key' => 'value'] An array of custom headers that will be added to
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
    public function listOperation($apiVersion, $expand = 'resourceTypes', array $customHeaders = [])
    {
        $response = $this->listOperationAsync($apiVersion, $expand, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets provider operations metadata list
     *
     * @param string $apiVersion
     * @param string $expand
     * @param array $customHeaders ['key' => 'value'] An array of custom headers
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync($apiVersion, $expand = 'resourceTypes', array $customHeaders = [])
    {
        if ($apiVersion == null) {
            Validate::notNullOrEmpty($apiVersion, '$apiVersion');
        }

        $path = '/providers/Microsoft.Authorization/providerOperations';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, []);
        $queryParams = ['api-version' => $apiVersion, '$expand' => $expand];
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
     * Gets provider operations metadata list
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders ['key' => 'value'] An array of custom headers that will be added to
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
     * Gets provider operations metadata list
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders ['key' => 'value'] An array of custom headers
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
