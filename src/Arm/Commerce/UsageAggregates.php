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
 * @version     Release: 0.10.0_2016, API Version: 2015-06-01-preview
 */

namespace MicrosoftAzure\Arm\Commerce;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * UsageAggregates.
 */
class UsageAggregates
{
    /**
     * The service client object for the operations.
     *
     * @var UsageManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for UsageAggregates.
     *
     * @param UsageManagementClient, Service client for UsageAggregates
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Query aggregated Azure subscription consumption data for a date range.
     *
     * @param \DateTime $reportedstartTime The start of the time range to retrieve
     * data for.
     * @param \DateTime $reportedEndTime The end of the time range to retrieve
     * data for.
     * @param bool $showDetails When set to true (default), the aggregates are
     * broken down into the instance metadata which is more granular.
     * @param AggregationGranularity $aggregationGranularity Value is either daily
     * (default) or hourly to tell the API how to return the results grouped by
     * day or hour. Possible values include: 'Daily', 'Hourly'
     * @param string $continuationToken Retrieved from previous calls, this is the
     * bookmark used for progress when the responses are paged.
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
    public function listOperation($reportedstartTime, $reportedEndTime, $showDetails = null, array $aggregationGranularity, $continuationToken = null, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($reportedstartTime, $reportedEndTime, $showDetails, $aggregationGranularity, $continuationToken, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Query aggregated Azure subscription consumption data for a date range.
     *
     * @param \DateTime $reportedstartTime The start of the time range to retrieve
     * data for.
     * @param \DateTime $reportedEndTime The end of the time range to retrieve
     * data for.
     * @param bool $showDetails When set to true (default), the aggregates are
     * broken down into the instance metadata which is more granular.
     * @param AggregationGranularity $aggregationGranularity Value is either daily
     * (default) or hourly to tell the API how to return the results grouped by
     * day or hour. Possible values include: 'Daily', 'Hourly'
     * @param string $continuationToken Retrieved from previous calls, this is the
     * bookmark used for progress when the responses are paged.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync($reportedstartTime, $reportedEndTime, $showDetails = null, array $aggregationGranularity, $continuationToken = null, array $customHeaders = [])
    {
        if ($reportedstartTime == null) {
            Validate::notNullOrEmpty($reportedstartTime, '$reportedstartTime');
        }
        if ($reportedEndTime == null) {
            Validate::notNullOrEmpty($reportedEndTime, '$reportedEndTime');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.Commerce/UsageAggregates';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['reportedstartTime' => $reportedstartTime, 'reportedEndTime' => $reportedEndTime, 'showDetails' => $showDetails, 'aggregationGranularity' => $aggregationGranularity, 'continuationToken' => $continuationToken, 'api-version' => $this->_client->getApiVersion()];
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
     * Query aggregated Azure subscription consumption data for a date range.
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
     * Query aggregated Azure subscription consumption data for a date range.
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
