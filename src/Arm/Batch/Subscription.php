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
 * @version     Release: 0.10.0_2016, API Version: 2015-12-01
 */

namespace MicrosoftAzure\Arm\Batch;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * Subscription.
 */
class Subscription
{
    /**
     * The service client object for the operations.
     *
     * @var BatchManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for Subscription.
     *
     * @param BatchManagementClient, Service client for Subscription
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Gets the Batch service quotas for the specified suscription.
     *
     * @param string $locationName The desired region for the quotas.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'accountQuota' => ''
     * ];
     * </pre>
     */
    public function getSubscriptionQuotas($locationName, array $customHeaders = [])
    {
        $response = $this->getSubscriptionQuotasAsync($locationName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets the Batch service quotas for the specified suscription.
     *
     * @param string $locationName The desired region for the quotas.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getSubscriptionQuotasAsync($locationName, array $customHeaders = [])
    {
        if ($locationName == null) {
            Validate::notNullOrEmpty($locationName, '$locationName');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.Batch/locations/{locationName}/quotas';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{locationName}' => $locationName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
