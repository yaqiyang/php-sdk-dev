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
 * @version     Release: 0.10.0_2016, API Version: 2016-04-02
 */

namespace MicrosoftAzure\Arm\Cdn;

use MicrosoftAzure\Common\Internal\Http\HttpClient as PhpHttpClient;
use MicrosoftAzure\Common\Internal\Resources as PhpResources;
use MicrosoftAzure\Common\Internal\Utilities as PhpUtilities;
use MicrosoftAzure\Common\Internal\Validate as PhpValidate;

/**
 * NameAvailability for Use these APIs to manage Azure CDN resources through
 * the Azure Resource Manager. You must make sure that requests made to these
 * resources are secure. For more information, see <a
 * href="https://msdn.microsoft.com/en-us/library/azure/dn790557.aspx">Authenticating
 * Azure Resource Manager requests.</a>
 */
class NameAvailability
{
    /**
     * The service client object for the operations.
     *
     * @var CdnManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for NameAvailability.
     *
     * @param CdnManagementClient, Service client for NameAvailability
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Check the availability of a resource name without creating the resource.
     * This is needed for resources where name is globally unique, such as a CDN
     * endpoint.
     *
     * @param array $checkNameAvailabilityInput Input to check. 
     * <pre>
     * [
     *    'name' => 'requiredName',
     *    'type' => 'Microsoft.Cdn/Profiles/Endpoints'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'NameAvailable' => 'false',
     *    'Reason' => '',
     *    'Message' => ''
     * ];
     * </pre>
     */
    public function checkNameAvailability(array $checkNameAvailabilityInput, array $customHeaders = [])
    {
        $response = $this->checkNameAvailabilityAsync($checkNameAvailabilityInput, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Check the availability of a resource name without creating the resource.
     * This is needed for resources where name is globally unique, such as a CDN
     * endpoint.
     *
     * @param array $checkNameAvailabilityInput Input to check. 
     * <pre>
     * [
     *    'name' => 'requiredName',
     *    'type' => 'Microsoft.Cdn/Profiles/Endpoints'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function checkNameAvailabilityAsync(array $checkNameAvailabilityInput, array $customHeaders = [])
    {
        if ($checkNameAvailabilityInput == null) {
            PhpValidate::notNullOrEmpty($checkNameAvailabilityInput, '$checkNameAvailabilityInput');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/providers/Microsoft.Cdn/checkNameAvailability';
        $statusCodes = [200];
        $method = 'POST';

        $path = strtr($path, []);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[PhpResources::X_MS_REQUEST_ID] = PhpUtilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($checkNameAvailabilityInput);

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
