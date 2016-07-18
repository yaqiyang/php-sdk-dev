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

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * Profiles for Use these APIs to manage Azure CDN resources through the Azure
 * Resource Manager. You must make sure that requests made to these resources
 * are secure. For more information, see <a
 * href="https://msdn.microsoft.com/en-us/library/azure/dn790557.aspx">Authenticating
 * Azure Resource Manager requests.</a>
 */
class Profiles
{
    /**
     * The service client object for the operations.
     *
     * @var CdnManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for Profiles.
     *
     * @param CdnManagementClient, Service client for Profiles
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Lists the CDN profiles within an Azure subscitption.
     *
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
    public function listBySubscriptionId(array $customHeaders = [])
    {
        $response = $this->listBySubscriptionIdAsync($customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Lists the CDN profiles within an Azure subscitption.
     *
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listBySubscriptionIdAsync(array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.Cdn/profiles';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * Lists the CDN profiles within a resource group.
     *
     * @param string $resourceGroupName Name of the resource group within the
     * Azure subscription.
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
    public function listByResourceGroup($resourceGroupName, array $customHeaders = [])
    {
        $response = $this->listByResourceGroupAsync($resourceGroupName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Lists the CDN profiles within a resource group.
     *
     * @param string $resourceGroupName Name of the resource group within the
     * Azure subscription.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listByResourceGroupAsync($resourceGroupName, array $customHeaders = [])
    {
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{resourceGroupName}' => $resourceGroupName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * Gets a CDN profile with the specified parameters.
     *
     * @param string $profileName Name of the CDN profile within the resource
     * group.
     * @param string $resourceGroupName Name of the resource group within the
     * Azure subscription.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'sku' => [
     *       'name' => 'Standard_Verizon|Premium_Verizon|Custom_Verizon|Standard_Akamai'
     *    ],
     *    'properties' => [
     *       'resourceState' => 'Creating|Active|Deleting|Disabled',
     *       'provisioningState' => 'Creating|Succeeded|Failed'
     *    ]
     * ];
     * </pre>
     */
    public function get($profileName, $resourceGroupName, array $customHeaders = [])
    {
        $response = $this->getAsync($profileName, $resourceGroupName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets a CDN profile with the specified parameters.
     *
     * @param string $profileName Name of the CDN profile within the resource
     * group.
     * @param string $resourceGroupName Name of the resource group within the
     * Azure subscription.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($profileName, $resourceGroupName, array $customHeaders = [])
    {
        if ($profileName == null) {
            Validate::notNullOrEmpty($profileName, '$profileName');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{profileName}' => $profileName, '{resourceGroupName}' => $resourceGroupName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * Creates a new CDN profile with the specified parameters.
     *
     * @param string $profileName Name of the CDN profile within the resource
     * group.
     * @param array $profileProperties Profile properties needed for creation. 
     * <pre>
     * [
     *    'location' => 'requiredLocation',
     *    'tags' => '',
     *    'sku' => [
     *       'name' => 'Standard_Verizon|Premium_Verizon|Custom_Verizon|Standard_Akamai'
     *    ]
     * ];
     * </pre>
     * @param string $resourceGroupName Name of the resource group within the
     * Azure subscription.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'sku' => [
     *       'name' => 'Standard_Verizon|Premium_Verizon|Custom_Verizon|Standard_Akamai'
     *    ],
     *    'properties' => [
     *       'resourceState' => 'Creating|Active|Deleting|Disabled',
     *       'provisioningState' => 'Creating|Succeeded|Failed'
     *    ]
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'sku' => [
     *       'name' => 'Standard_Verizon|Premium_Verizon|Custom_Verizon|Standard_Akamai'
     *    ],
     *    'properties' => [
     *       'resourceState' => 'Creating|Active|Deleting|Disabled',
     *       'provisioningState' => 'Creating|Succeeded|Failed'
     *    ]
     * ];
     * </pre>
     * When the resposne status is Accepted(202), 
     * <pre>
     * [
     *    'sku' => [
     *       'name' => 'Standard_Verizon|Premium_Verizon|Custom_Verizon|Standard_Akamai'
     *    ],
     *    'properties' => [
     *       'resourceState' => 'Creating|Active|Deleting|Disabled',
     *       'provisioningState' => 'Creating|Succeeded|Failed'
     *    ]
     * ];
     * </pre>
     */
    public function create($profileName, array $profileProperties, $resourceGroupName, array $customHeaders = [])
    {
        $response = $this->begincreateAsync($profileName, $profileProperties, $resourceGroupName, $customHeaders);

        if ($response->getStatusCode() !== Resources::STATUS_OK) {
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
     * Creates a new CDN profile with the specified parameters.
     *
     * @param string $profileName Name of the CDN profile within the resource
     * group.
     * @param array $profileProperties Profile properties needed for creation. 
     * <pre>
     * [
     *    'location' => 'requiredLocation',
     *    'tags' => '',
     *    'sku' => [
     *       'name' => 'Standard_Verizon|Premium_Verizon|Custom_Verizon|Standard_Akamai'
     *    ]
     * ];
     * </pre>
     * @param string $resourceGroupName Name of the resource group within the
     * Azure subscription.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'sku' => [
     *       'name' => 'Standard_Verizon|Premium_Verizon|Custom_Verizon|Standard_Akamai'
     *    ],
     *    'properties' => [
     *       'resourceState' => 'Creating|Active|Deleting|Disabled',
     *       'provisioningState' => 'Creating|Succeeded|Failed'
     *    ]
     * ];
     * </pre>
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'sku' => [
     *       'name' => 'Standard_Verizon|Premium_Verizon|Custom_Verizon|Standard_Akamai'
     *    ],
     *    'properties' => [
     *       'resourceState' => 'Creating|Active|Deleting|Disabled',
     *       'provisioningState' => 'Creating|Succeeded|Failed'
     *    ]
     * ];
     * </pre>
     * When the resposne status is Accepted(202), 
     * <pre>
     * [
     *    'sku' => [
     *       'name' => 'Standard_Verizon|Premium_Verizon|Custom_Verizon|Standard_Akamai'
     *    ],
     *    'properties' => [
     *       'resourceState' => 'Creating|Active|Deleting|Disabled',
     *       'provisioningState' => 'Creating|Succeeded|Failed'
     *    ]
     * ];
     * </pre>
     */
    public function beginCreate($profileName, array $profileProperties, $resourceGroupName, array $customHeaders = [])
    {
        $response = $this->beginCreateAsync($profileName, $profileProperties, $resourceGroupName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Creates a new CDN profile with the specified parameters.
     *
     * @param string $profileName Name of the CDN profile within the resource
     * group.
     * @param array $profileProperties Profile properties needed for creation. 
     * <pre>
     * [
     *    'location' => 'requiredLocation',
     *    'tags' => '',
     *    'sku' => [
     *       'name' => 'Standard_Verizon|Premium_Verizon|Custom_Verizon|Standard_Akamai'
     *    ]
     * ];
     * </pre>
     * @param string $resourceGroupName Name of the resource group within the
     * Azure subscription.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginCreateAsync($profileName, array $profileProperties, $resourceGroupName, array $customHeaders = [])
    {
        if ($profileName == null) {
            Validate::notNullOrEmpty($profileName, '$profileName');
        }
        if ($profileProperties == null) {
            Validate::notNullOrEmpty($profileProperties, '$profileProperties');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}';
        $statusCodes = [200, 201, 202];
        $method = 'PUT';

        $path = strtr($path, ['{profileName}' => $profileName, '{resourceGroupName}' => $resourceGroupName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($profileProperties);

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
     * Updates an existing CDN profile with the specified parameters.
     *
     * @param string $profileName Name of the CDN profile within the resource
     * group.
     * @param array $profileProperties Profile properties needed for update. 
     * <pre>
     * [
     *    'tags' => ''
     * ];
     * </pre>
     * @param string $resourceGroupName Name of the resource group within the
     * Azure subscription.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'sku' => [
     *       'name' => 'Standard_Verizon|Premium_Verizon|Custom_Verizon|Standard_Akamai'
     *    ],
     *    'properties' => [
     *       'resourceState' => 'Creating|Active|Deleting|Disabled',
     *       'provisioningState' => 'Creating|Succeeded|Failed'
     *    ]
     * ];
     * </pre>
     * When the resposne status is Accepted(202), 
     * <pre>
     * [
     *    'sku' => [
     *       'name' => 'Standard_Verizon|Premium_Verizon|Custom_Verizon|Standard_Akamai'
     *    ],
     *    'properties' => [
     *       'resourceState' => 'Creating|Active|Deleting|Disabled',
     *       'provisioningState' => 'Creating|Succeeded|Failed'
     *    ]
     * ];
     * </pre>
     */
    public function update($profileName, array $profileProperties, $resourceGroupName, array $customHeaders = [])
    {
        $response = $this->beginupdateAsync($profileName, $profileProperties, $resourceGroupName, $customHeaders);

        if ($response->getStatusCode() !== Resources::STATUS_OK) {
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
     * Updates an existing CDN profile with the specified parameters.
     *
     * @param string $profileName Name of the CDN profile within the resource
     * group.
     * @param array $profileProperties Profile properties needed for update. 
     * <pre>
     * [
     *    'tags' => ''
     * ];
     * </pre>
     * @param string $resourceGroupName Name of the resource group within the
     * Azure subscription.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'sku' => [
     *       'name' => 'Standard_Verizon|Premium_Verizon|Custom_Verizon|Standard_Akamai'
     *    ],
     *    'properties' => [
     *       'resourceState' => 'Creating|Active|Deleting|Disabled',
     *       'provisioningState' => 'Creating|Succeeded|Failed'
     *    ]
     * ];
     * </pre>
     * When the resposne status is Accepted(202), 
     * <pre>
     * [
     *    'sku' => [
     *       'name' => 'Standard_Verizon|Premium_Verizon|Custom_Verizon|Standard_Akamai'
     *    ],
     *    'properties' => [
     *       'resourceState' => 'Creating|Active|Deleting|Disabled',
     *       'provisioningState' => 'Creating|Succeeded|Failed'
     *    ]
     * ];
     * </pre>
     */
    public function beginUpdate($profileName, array $profileProperties, $resourceGroupName, array $customHeaders = [])
    {
        $response = $this->beginUpdateAsync($profileName, $profileProperties, $resourceGroupName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Updates an existing CDN profile with the specified parameters.
     *
     * @param string $profileName Name of the CDN profile within the resource
     * group.
     * @param array $profileProperties Profile properties needed for update. 
     * <pre>
     * [
     *    'tags' => ''
     * ];
     * </pre>
     * @param string $resourceGroupName Name of the resource group within the
     * Azure subscription.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginUpdateAsync($profileName, array $profileProperties, $resourceGroupName, array $customHeaders = [])
    {
        if ($profileName == null) {
            Validate::notNullOrEmpty($profileName, '$profileName');
        }
        if ($profileProperties == null) {
            Validate::notNullOrEmpty($profileProperties, '$profileProperties');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}';
        $statusCodes = [200, 202];
        $method = 'PATCH';

        $path = strtr($path, ['{profileName}' => $profileName, '{resourceGroupName}' => $resourceGroupName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($profileProperties);

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
     * Deletes an existing CDN profile with the specified parameters. Deleting a
     * profile will result in the deletion of all subresources including
     * endpoints, origins and custom domains.
     *
     * @param string $profileName Name of the CDN profile within the resource
     * group.
     * @param string $resourceGroupName Name of the resource group within the
     * Azure subscription.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function deleteIfExists($profileName, $resourceGroupName, array $customHeaders = [])
    {
        $response = $this->begindeleteIfExistsAsync($profileName, $resourceGroupName, $customHeaders);

        if ($response->getStatusCode() !== Resources::STATUS_OK) {
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
     * Deletes an existing CDN profile with the specified parameters. Deleting a
     * profile will result in the deletion of all subresources including
     * endpoints, origins and custom domains.
     *
     * @param string $profileName Name of the CDN profile within the resource
     * group.
     * @param string $resourceGroupName Name of the resource group within the
     * Azure subscription.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status Accepted(202).<br>
     * Empty array with resposne status NoContent(204).<br>
     */
    public function beginDeleteIfExists($profileName, $resourceGroupName, array $customHeaders = [])
    {
        $response = $this->beginDeleteIfExistsAsync($profileName, $resourceGroupName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Deletes an existing CDN profile with the specified parameters. Deleting a
     * profile will result in the deletion of all subresources including
     * endpoints, origins and custom domains.
     *
     * @param string $profileName Name of the CDN profile within the resource
     * group.
     * @param string $resourceGroupName Name of the resource group within the
     * Azure subscription.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginDeleteIfExistsAsync($profileName, $resourceGroupName, array $customHeaders = [])
    {
        if ($profileName == null) {
            Validate::notNullOrEmpty($profileName, '$profileName');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}';
        $statusCodes = [202, 204];
        $method = 'DELETE';

        $path = strtr($path, ['{profileName}' => $profileName, '{resourceGroupName}' => $resourceGroupName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
     * Generates a dynamic SSO URI used to sign in to the CDN Supplemental Portal
     * used for advanced management tasks, such as Country Filtering, Advanced
     * HTTP Reports, and Real-time Stats and Alerts. The SSO URI changes
     * approximately every 10 minutes.
     *
     * @param string $profileName Name of the CDN profile within the resource
     * group.
     * @param string $resourceGroupName Name of the resource group within the
     * Azure subscription.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'ssoUriValue' => ''
     * ];
     * </pre>
     */
    public function generateSsoUri($profileName, $resourceGroupName, array $customHeaders = [])
    {
        $response = $this->generateSsoUriAsync($profileName, $resourceGroupName, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Generates a dynamic SSO URI used to sign in to the CDN Supplemental Portal
     * used for advanced management tasks, such as Country Filtering, Advanced
     * HTTP Reports, and Real-time Stats and Alerts. The SSO URI changes
     * approximately every 10 minutes.
     *
     * @param string $profileName Name of the CDN profile within the resource
     * group.
     * @param string $resourceGroupName Name of the resource group within the
     * Azure subscription.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function generateSsoUriAsync($profileName, $resourceGroupName, array $customHeaders = [])
    {
        if ($profileName == null) {
            Validate::notNullOrEmpty($profileName, '$profileName');
        }
        if ($resourceGroupName == null) {
            Validate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/generateSsoUri';
        $statusCodes = [200];
        $method = 'POST';

        $path = strtr($path, ['{profileName}' => $profileName, '{resourceGroupName}' => $resourceGroupName, '{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
