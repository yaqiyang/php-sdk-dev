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
 * @version     Release: 0.10.0_2016-07, API Version: 2016-01-01
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
 * UsageOperations for The Storage Management Client.
 */
class UsageOperations {

    private $_client;

    /**
    * Creates a new instance for UsageOperations.
    *
    * @param StorageManagementClient, Service client for UsageOperations
    *
    */
    public function __construct($client) {

        $this->_client = $client;
    }

    /*
     * Gets the current usage count and the limit for the resources under the
     * subscription.
     *
     * @param array $customHeaders [String => String] A hash of custom headers
     * that will be added to the HTTP request.
     *
     * @return array, deserialized Jason array of the response body for
     * UsageListResult operation results
     */
    public function listOperation(array $customHeaders = []) {

        $response = $this->listOperationAsync($customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->unserialize($contents);
            }
        }

        return [];
    }

    /*
     * Gets the current usage count and the limit for the resources under the
     * subscription.
     *
     * @param array $customHeaders [String => String] A hash of custom headers
     * that will be added to the HTTP request.
     *
     * @return Response, Response object from the http call
     */
    public function listOperationAsync(array $customHeaders = []) {

        if ($this->_client->getApiVersion() == null)
        {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null)
        {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.Storage/usages';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
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