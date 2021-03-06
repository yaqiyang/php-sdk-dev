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
 * @version     Release: 0.10.0_2016, API Version: 2015-02-28
 */

namespace MicrosoftAzure\Arm\Search;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * AdminKeys for Client that can be used to manage Azure Search services and
 * API keys.
 */
class AdminKeys
{
    /**
     * The service client object for the operations.
     *
     * @var SearchManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for AdminKeys.
     *
     * @param SearchManagementClient, Service client for AdminKeys
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Returns the primary and secondary API keys for the given Azure Search
     * service.
     *
     * @param string $resourceGroupName The name of the resource group within the
     * current subscription.
     * @param string $serviceName The name of the Search service for which to list
     * admin keys.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'primaryKey' => '',
     *    'secondaryKey' => ''
     * ];
     * </pre>
     */
    public function listOperation($resourceGroupName, $serviceName, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($resourceGroupName, $serviceName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Returns the primary and secondary API keys for the given Azure Search
     * service.
     *
     * @param string $resourceGroupName The name of the resource group within the
     * current subscription.
     * @param string $serviceName The name of the Search service for which to list
     * admin keys.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync($resourceGroupName, $serviceName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($serviceName == null) {
            Validate::notNullOrEmpty($serviceName, '$serviceName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Search/searchServices/{serviceName}/listAdminKeys';
        $statusCodes = [200];
        $method = 'POST';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{serviceName}' => $serviceName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
