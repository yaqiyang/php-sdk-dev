<?php

/**
 * Code generated by Microsoft (R) AutoRest Code Generator 0.17.0.0
 * Changes may cause incorrect behavior and will be lost if the code is
 * regenerated.
 *
 * PHP version: >=5.5
 *
 * @category    Microsoft
 * @author      Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright   2016 Microsoft Corporation
 * @license     http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link        https://github.com/Azure/azure-sdk-for-php
 * @version     Release: 0.10.0_2016-07, API Version: 2015-07-01
 */

namespace MicrosoftAzure\StorageResourceProvider;

use MicrosoftAzure\Common\Internal\Authentication\OAuthScheme;
use MicrosoftAzure\Common\Internal\Filters\OAuthFilter;
use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\OAuthRestProxy;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Serialization\JsonSerializer;
use MicrosoftAzure\Common\Internal\ServiceRestProxy;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * ProviderOperationsMetadataOperations
 */
class ProviderOperationsMetadataOperations {

    private $_client;

    /**
    * Creates a new instance for ProviderOperationsMetadataOperations.
    *
    * @param AuthorizationManagementClient, Service client for ProviderOperationsMetadataOperations
    *
    */
    public function __construct($client) {

        $this->_client = $client;
    }

    /*
     * Gets provider operations metadata
     *
     * @param string $resourceProviderNamespace Namespace of the resource provider.
     * @param string $apiVersion
     * @param string $expand
     * @param array $customHeaders [String => String] A hash of custom headers
     * that will be added to the HTTP request.
     *
     * @return array, deserialized Jason array of the response body for
     * ProviderOperationsMetadata operation results
     */
    public function get($resourceProviderNamespace, $apiVersion, $expand = 'resourceTypes', array $customHeaders = []) {

        $response = $this->getAsync($resourceProviderNamespace, $apiVersion, $expand, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->unserialize($contents);
            }
        }

        return [];
    }

    /*
     * Gets provider operations metadata
     *
     * @param string $resourceProviderNamespace Namespace of the resource provider.
     * @param string $apiVersion
     * @param string $expand
     * @param array $customHeaders [String => String] A hash of custom headers
     * that will be added to the HTTP request.
     *
     * @return Response, Response object from the http call
     */
    public function getAsync($resourceProviderNamespace, $apiVersion, $expand = 'resourceTypes', array $customHeaders = []) {

        if ($resourceProviderNamespace == null)
        {
            Validate::notNullOrEmpty($resourceProviderNamespace, '$resourceProviderNamespace');
        }
        if ($apiVersion == null)
        {
            Validate::notNullOrEmpty($apiVersion, '$apiVersion');
        }

        $path = '/providers/Microsoft.Authorization/providerOperations/{resourceProviderNamespace}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceProviderNamespace}' => $resourceProviderNamespace]);
        $queryParams = ['api-version' => $apiVersion,'$expand' => $expand];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null)
        {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId())
        {
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
     * Gets provider operations metadata list
     *
     * @param string $apiVersion
     * @param string $expand
     * @param array $customHeaders [String => String] A hash of custom headers
     * that will be added to the HTTP request.
     *
     * @return array, deserialized Jason array of the response body for
     * ProviderOperationsMetadataListResult operation results
     */
    public function listOperation($apiVersion, $expand = 'resourceTypes', array $customHeaders = []) {

        $response = $this->listOperationAsync($apiVersion, $expand, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->unserialize($contents);
            }
        }

        return [];
    }

    /*
     * Gets provider operations metadata list
     *
     * @param string $apiVersion
     * @param string $expand
     * @param array $customHeaders [String => String] A hash of custom headers
     * that will be added to the HTTP request.
     *
     * @return Response, Response object from the http call
     */
    public function listOperationAsync($apiVersion, $expand = 'resourceTypes', array $customHeaders = []) {

        if ($apiVersion == null)
        {
            Validate::notNullOrEmpty($apiVersion, '$apiVersion');
        }

        $path = '/providers/Microsoft.Authorization/providerOperations';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, []);
        $queryParams = ['api-version' => $apiVersion,'$expand' => $expand];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null)
        {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId())
        {
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
     * Gets provider operations metadata list
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders [String => String] A hash of custom headers
     * that will be added to the HTTP request.
     *
     * @return array, deserialized Jason array of the response body for
     * ProviderOperationsMetadataListResult operation results
     */
    public function listNext($nextPageLink, array $customHeaders = []) {

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
     * Gets provider operations metadata list
     *
     * @param string $nextPageLink The NextLink from the previous successful call
     * to List operation.
     * @param array $customHeaders [String => String] A hash of custom headers
     * that will be added to the HTTP request.
     *
     * @return Response, Response object from the http call
     */
    public function listNextAsync($nextPageLink, array $customHeaders = []) {

        if ($nextPageLink == null)
        {
            Validate::notNullOrEmpty($nextPageLink, '$nextPageLink');
        }

        $path = '{nextLink}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, []);
        $queryParams = [];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null)
        {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId())
        {
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