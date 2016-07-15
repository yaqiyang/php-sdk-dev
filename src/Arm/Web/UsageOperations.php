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
 * @version     Release: 0.10.0_2016, API Version: 2015-08-01
 */

namespace MicrosoftAzure\Arm\Web;

use MicrosoftAzure\Common\Internal\Http\HttpClient as PhpHttpClient;
use MicrosoftAzure\Common\Internal\Resources as PhpResources;
use MicrosoftAzure\Common\Internal\Utilities as PhpUtilities;
use MicrosoftAzure\Common\Internal\Validate as PhpValidate;

/**
 * UsageOperations for Use these APIs to manage Azure Websites resources
 * through the Azure Resource Manager. All task operations conform to the
 * HTTP/1.1 protocol specification and each operation returns an
 * x-ms-request-id header that can be used to obtain information about the
 * request. You must make sure that requests made to these resources are
 * secure. For more information, see <a
 * href="https://msdn.microsoft.com/en-us/library/azure/dn790557.aspx">Authenticating
 * Azure Resource Manager requests.</a>
 */
class UsageOperations
{
    /**
     * The service client object for the operations.
     *
     * @var WebSiteManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for UsageOperations.
     *
     * @param WebSiteManagementClient, Service client for UsageOperations
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Returns usage records for specified subscription and resource groups
     *
     * @param string $resourceGroupName Name of resource group
     * @param string $environmentName Environment name
     * @param string $lastId Last marker that was returned from the batch
     * @param int $batchSize size of the batch to be returned.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), object
     */
    public function getUsage($resourceGroupName, $environmentName, $lastId, $batchSize, array $customHeaders = [])
    {
        $response = $this->getUsageAsync($resourceGroupName, $environmentName, $lastId, $batchSize, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Returns usage records for specified subscription and resource groups
     *
     * @param string $resourceGroupName Name of resource group
     * @param string $environmentName Environment name
     * @param string $lastId Last marker that was returned from the batch
     * @param int $batchSize size of the batch to be returned.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getUsageAsync($resourceGroupName, $environmentName, $lastId, $batchSize, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            PhpValidate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($environmentName == null) {
            PhpValidate::notNullOrEmpty($environmentName, '$environmentName');
        }
        if ($lastId == null) {
            PhpValidate::notNullOrEmpty($lastId, '$lastId');
        }
        if ($batchSize == null) {
            PhpValidate::notNullOrEmpty($batchSize, '$batchSize');
        }
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web.Admin/environments/{environmentName}/usage';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{environmentName}' => $environmentName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['lastId' => $lastId, 'batchSize' => $batchSize, 'api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[PhpResources::X_MS_REQUEST_ID] = PhpUtilities::getGuid();
        }

        $body = '';

        $response = PhpHttpClient::send(
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
