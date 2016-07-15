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
 * @version     Release: 0.10.0_2016, API Version: 2016-03-30
 */

namespace MicrosoftAzure\Arm\Compute;

use MicrosoftAzure\Common\Internal\Http\HttpClient as PhpHttpClient;
use MicrosoftAzure\Common\Internal\Resources as PhpResources;
use MicrosoftAzure\Common\Internal\Utilities as PhpUtilities;
use MicrosoftAzure\Common\Internal\Validate as PhpValidate;

/**
 * VirtualMachineExtensions for The Compute Management Client.
 */
class VirtualMachineExtensions
{
    /**
     * The service client object for the operations.
     *
     * @var ComputeManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for VirtualMachineExtensions.
     *
     * @param ComputeManagementClient, Service client for VirtualMachineExtensions
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * The operation to create or update the extension.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $vmName The name of the virtual machine where the extension
     * should be create or updated.
     * @param string $vmExtensionName The name of the virtual machine extension.
     * @param array $extensionParameters Parameters supplied to the Create Virtual Machine Extension
     *  operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'forceUpdateTag' => '',
     *       'publisher' => '',
     *       'type' => '',
     *       'typeHandlerVersion' => '',
     *       'autoUpgradeMinorVersion' => 'false',
     *       'settings' => '',
     *       'protectedSettings' => '',
     *       'provisioningState' => '',
     *       'instanceView' => [
     *          'name' => '',
     *          'type' => '',
     *          'typeHandlerVersion' => '',
     *          'substatuses' => '',
     *          'statuses' => ''
     *       ]
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'forceUpdateTag' => '',
     *       'publisher' => '',
     *       'type' => '',
     *       'typeHandlerVersion' => '',
     *       'autoUpgradeMinorVersion' => 'false',
     *       'settings' => '',
     *       'protectedSettings' => '',
     *       'provisioningState' => '',
     *       'instanceView' => [
     *          'name' => '',
     *          'type' => '',
     *          'typeHandlerVersion' => '',
     *          'substatuses' => '',
     *          'statuses' => ''
     *       ]
     *    ]
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'forceUpdateTag' => '',
     *       'publisher' => '',
     *       'type' => '',
     *       'typeHandlerVersion' => '',
     *       'autoUpgradeMinorVersion' => 'false',
     *       'settings' => '',
     *       'protectedSettings' => '',
     *       'provisioningState' => '',
     *       'instanceView' => [
     *          'name' => '',
     *          'type' => '',
     *          'typeHandlerVersion' => '',
     *          'substatuses' => '',
     *          'statuses' => ''
     *       ]
     *    ]
     * ];
     * </pre>
     */
    public function createOrUpdate($resourceGroupName, $vmName, $vmExtensionName, array $extensionParameters, array $customHeaders = [])
    {
        $response = $this->begincreateOrUpdateAsync($resourceGroupName, $vmName, $vmExtensionName, $extensionParameters, $customHeaders);

        if ($response->getStatusCode() !== PhpResources::STATUS_OK) {
            $this->_client->awaitAsync($response);
        }

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The operation to create or update the extension.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $vmName The name of the virtual machine where the extension
     * should be create or updated.
     * @param string $vmExtensionName The name of the virtual machine extension.
     * @param array $extensionParameters Parameters supplied to the Create Virtual Machine Extension
     *  operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'forceUpdateTag' => '',
     *       'publisher' => '',
     *       'type' => '',
     *       'typeHandlerVersion' => '',
     *       'autoUpgradeMinorVersion' => 'false',
     *       'settings' => '',
     *       'protectedSettings' => '',
     *       'provisioningState' => '',
     *       'instanceView' => [
     *          'name' => '',
     *          'type' => '',
     *          'typeHandlerVersion' => '',
     *          'substatuses' => '',
     *          'statuses' => ''
     *       ]
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'forceUpdateTag' => '',
     *       'publisher' => '',
     *       'type' => '',
     *       'typeHandlerVersion' => '',
     *       'autoUpgradeMinorVersion' => 'false',
     *       'settings' => '',
     *       'protectedSettings' => '',
     *       'provisioningState' => '',
     *       'instanceView' => [
     *          'name' => '',
     *          'type' => '',
     *          'typeHandlerVersion' => '',
     *          'substatuses' => '',
     *          'statuses' => ''
     *       ]
     *    ]
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'properties' => [
     *       'forceUpdateTag' => '',
     *       'publisher' => '',
     *       'type' => '',
     *       'typeHandlerVersion' => '',
     *       'autoUpgradeMinorVersion' => 'false',
     *       'settings' => '',
     *       'protectedSettings' => '',
     *       'provisioningState' => '',
     *       'instanceView' => [
     *          'name' => '',
     *          'type' => '',
     *          'typeHandlerVersion' => '',
     *          'substatuses' => '',
     *          'statuses' => ''
     *       ]
     *    ]
     * ];
     * </pre>
     */
    public function beginCreateOrUpdate($resourceGroupName, $vmName, $vmExtensionName, array $extensionParameters, array $customHeaders = [])
    {
        $response = $this->beginCreateOrUpdateAsync($resourceGroupName, $vmName, $vmExtensionName, $extensionParameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The operation to create or update the extension.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $vmName The name of the virtual machine where the extension
     * should be create or updated.
     * @param string $vmExtensionName The name of the virtual machine extension.
     * @param array $extensionParameters Parameters supplied to the Create Virtual Machine Extension
     *  operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'forceUpdateTag' => '',
     *       'publisher' => '',
     *       'type' => '',
     *       'typeHandlerVersion' => '',
     *       'autoUpgradeMinorVersion' => 'false',
     *       'settings' => '',
     *       'protectedSettings' => '',
     *       'provisioningState' => '',
     *       'instanceView' => [
     *          'name' => '',
     *          'type' => '',
     *          'typeHandlerVersion' => '',
     *          'substatuses' => '',
     *          'statuses' => ''
     *       ]
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginCreateOrUpdateAsync($resourceGroupName, $vmName, $vmExtensionName, array $extensionParameters, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            PhpValidate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($vmName == null) {
            PhpValidate::notNullOrEmpty($vmName, '$vmName');
        }
        if ($vmExtensionName == null) {
            PhpValidate::notNullOrEmpty($vmExtensionName, '$vmExtensionName');
        }
        if ($extensionParameters == null) {
            PhpValidate::notNullOrEmpty($extensionParameters, '$extensionParameters');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}/extensions/{vmExtensionName}';
        $statusCodes = [200, 201];
        $method = 'PUT';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{vmName}' => $vmName, '{vmExtensionName}' => $vmExtensionName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[PhpResources::X_MS_REQUEST_ID] = PhpUtilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($extensionParameters);

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

    /**
     * The operation to delete the extension.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $vmName The name of the virtual machine where the extension
     * should be deleted.
     * @param string $vmExtensionName The name of the virtual machine extension.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function delete($resourceGroupName, $vmName, $vmExtensionName, array $customHeaders = [])
    {
        $response = $this->begindeleteAsync($resourceGroupName, $vmName, $vmExtensionName, $customHeaders);

        if ($response->getStatusCode() !== PhpResources::STATUS_OK) {
            $this->_client->awaitAsync($response);
        }

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The operation to delete the extension.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $vmName The name of the virtual machine where the extension
     * should be deleted.
     * @param string $vmExtensionName The name of the virtual machine extension.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function beginDelete($resourceGroupName, $vmName, $vmExtensionName, array $customHeaders = [])
    {
        $response = $this->beginDeleteAsync($resourceGroupName, $vmName, $vmExtensionName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The operation to delete the extension.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $vmName The name of the virtual machine where the extension
     * should be deleted.
     * @param string $vmExtensionName The name of the virtual machine extension.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginDeleteAsync($resourceGroupName, $vmName, $vmExtensionName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            PhpValidate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($vmName == null) {
            PhpValidate::notNullOrEmpty($vmName, '$vmName');
        }
        if ($vmExtensionName == null) {
            PhpValidate::notNullOrEmpty($vmExtensionName, '$vmExtensionName');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}/extensions/{vmExtensionName}';
        $statusCodes = [202, 204];
        $method = 'DELETE';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{vmName}' => $vmName, '{vmExtensionName}' => $vmExtensionName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
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

    /**
     * The operation to get the extension.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $vmName The name of the virtual machine containing the
     * extension.
     * @param string $vmExtensionName The name of the virtual machine extension.
     * @param string $expand The expand expression to apply on the operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'forceUpdateTag' => '',
     *       'publisher' => '',
     *       'type' => '',
     *       'typeHandlerVersion' => '',
     *       'autoUpgradeMinorVersion' => 'false',
     *       'settings' => '',
     *       'protectedSettings' => '',
     *       'provisioningState' => '',
     *       'instanceView' => [
     *          'name' => '',
     *          'type' => '',
     *          'typeHandlerVersion' => '',
     *          'substatuses' => '',
     *          'statuses' => ''
     *       ]
     *    ]
     * ];
     * </pre>
     */
    public function get($resourceGroupName, $vmName, $vmExtensionName, $expand = null, array $customHeaders = [])
    {
        $response = $this->getAsync($resourceGroupName, $vmName, $vmExtensionName, $expand, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * The operation to get the extension.
     *
     * @param string $resourceGroupName The name of the resource group.
     * @param string $vmName The name of the virtual machine containing the
     * extension.
     * @param string $vmExtensionName The name of the virtual machine extension.
     * @param string $expand The expand expression to apply on the operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($resourceGroupName, $vmName, $vmExtensionName, $expand = null, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            PhpValidate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($vmName == null) {
            PhpValidate::notNullOrEmpty($vmName, '$vmName');
        }
        if ($vmExtensionName == null) {
            PhpValidate::notNullOrEmpty($vmExtensionName, '$vmExtensionName');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}/extensions/{vmExtensionName}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{vmName}' => $vmName, '{vmExtensionName}' => $vmExtensionName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['$expand' => $expand, 'api-version' => $this->_client->getApiVersion()];
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
