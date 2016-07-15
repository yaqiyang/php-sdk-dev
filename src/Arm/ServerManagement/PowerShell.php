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
 * @version     Release: 0.10.0_2016, API Version: 2015-07-01-preview
 */

namespace MicrosoftAzure\Arm\ServerManagement;

use MicrosoftAzure\Common\Internal\Http\HttpClient as PhpHttpClient;
use MicrosoftAzure\Common\Internal\Resources as PhpResources;
use MicrosoftAzure\Common\Internal\Utilities as PhpUtilities;
use MicrosoftAzure\Common\Internal\Validate as PhpValidate;

/**
 * PowerShell for REST API for Azure Server Management Service
 */
class PowerShell
{
    /**
     * The service client object for the operations.
     *
     * @var ServerManagement
     */
    private $_client;

    /**
     * Creates a new instance for PowerShell.
     *
     * @param ServerManagement, Service client for PowerShell
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Gets a list of the active sessions.
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
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
    public function listSession($resourceGroupName, $nodeName, $session, array $customHeaders = [])
    {
        $response = $this->listSessionAsync($resourceGroupName, $nodeName, $session, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets a list of the active sessions.
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listSessionAsync($resourceGroupName, $nodeName, $session, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($resourceGroupName == null) {
            PhpValidate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($nodeName == null) {
            PhpValidate::notNullOrEmpty($nodeName, '$nodeName');
        }
        if ($session == null) {
            PhpValidate::notNullOrEmpty($session, '$session');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}/features/powerShellConsole/pssessions';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{nodeName}' => $nodeName, '{session}' => $session]);
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
     * Creates a PowerShell session
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'sessionId' => '',
     *       'state' => '',
     *       'runspaceAvailability' => '',
     *       'disconnectedOn' => '',
     *       'expiresOn' => '',
     *       'version' => [
     *          'major' => '',
     *          'minor' => '',
     *          'build' => '',
     *          'revision' => '',
     *          'majorRevision' => '',
     *          'minorRevision' => ''
     *       ],
     *       'name' => ''
     *    ]
     * ];
     * </pre>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function createSession($resourceGroupName, $nodeName, $session, $pssession, array $customHeaders = [])
    {
        $response = $this->begincreateSessionAsync($resourceGroupName, $nodeName, $session, $pssession, $customHeaders);

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
     * Creates a PowerShell session
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'sessionId' => '',
     *       'state' => '',
     *       'runspaceAvailability' => '',
     *       'disconnectedOn' => '',
     *       'expiresOn' => '',
     *       'version' => [
     *          'major' => '',
     *          'minor' => '',
     *          'build' => '',
     *          'revision' => '',
     *          'majorRevision' => '',
     *          'minorRevision' => ''
     *       ],
     *       'name' => ''
     *    ]
     * ];
     * </pre>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function beginCreateSession($resourceGroupName, $nodeName, $session, $pssession, array $customHeaders = [])
    {
        $response = $this->beginCreateSessionAsync($resourceGroupName, $nodeName, $session, $pssession, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Creates a PowerShell session
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginCreateSessionAsync($resourceGroupName, $nodeName, $session, $pssession, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($resourceGroupName == null) {
            PhpValidate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($nodeName == null) {
            PhpValidate::notNullOrEmpty($nodeName, '$nodeName');
        }
        if ($session == null) {
            PhpValidate::notNullOrEmpty($session, '$session');
        }
        if ($pssession == null) {
            PhpValidate::notNullOrEmpty($pssession, '$pssession');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}/features/powerShellConsole/pssessions/{pssession}';
        $statusCodes = [200, 202];
        $method = 'PUT';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{nodeName}' => $nodeName, '{session}' => $session, '{pssession}' => $pssession]);
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
     * Gets the status of a command.
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param PowerShellExpandOption $expand Gets current output from an ongoing
     * call. Possible values include: 'output'
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'properties' => [
     *       'results' => '',
     *       'pssession' => '',
     *       'command' => '',
     *       'completed' => 'false'
     *    ]
     * ];
     * </pre>
     */
    public function getCommandStatus($resourceGroupName, $nodeName, $session, $pssession, array $expand, array $customHeaders = [])
    {
        $response = $this->getCommandStatusAsync($resourceGroupName, $nodeName, $session, $pssession, $expand, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets the status of a command.
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param PowerShellExpandOption $expand Gets current output from an ongoing
     * call. Possible values include: 'output'
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getCommandStatusAsync($resourceGroupName, $nodeName, $session, $pssession, array $expand, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($resourceGroupName == null) {
            PhpValidate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($nodeName == null) {
            PhpValidate::notNullOrEmpty($nodeName, '$nodeName');
        }
        if ($session == null) {
            PhpValidate::notNullOrEmpty($session, '$session');
        }
        if ($pssession == null) {
            PhpValidate::notNullOrEmpty($pssession, '$pssession');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}/features/powerShellConsole/pssessions/{pssession}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{nodeName}' => $nodeName, '{session}' => $session, '{pssession}' => $pssession]);
        $queryParams = ['api-version' => $this->_client->getApiVersion(), '$expand' => $expand];
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
     * updates a running PowerShell command with more data.
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'results' => '',
     *    'pssession' => '',
     *    'command' => '',
     *    'completed' => 'false'
     * ];
     * </pre>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function updateCommand($resourceGroupName, $nodeName, $session, $pssession, array $customHeaders = [])
    {
        $response = $this->beginupdateCommandAsync($resourceGroupName, $nodeName, $session, $pssession, $customHeaders);

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
     * updates a running PowerShell command with more data.
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'results' => '',
     *    'pssession' => '',
     *    'command' => '',
     *    'completed' => 'false'
     * ];
     * </pre>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function beginUpdateCommand($resourceGroupName, $nodeName, $session, $pssession, array $customHeaders = [])
    {
        $response = $this->beginUpdateCommandAsync($resourceGroupName, $nodeName, $session, $pssession, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * updates a running PowerShell command with more data.
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginUpdateCommandAsync($resourceGroupName, $nodeName, $session, $pssession, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($resourceGroupName == null) {
            PhpValidate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($nodeName == null) {
            PhpValidate::notNullOrEmpty($nodeName, '$nodeName');
        }
        if ($session == null) {
            PhpValidate::notNullOrEmpty($session, '$session');
        }
        if ($pssession == null) {
            PhpValidate::notNullOrEmpty($pssession, '$pssession');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}/features/powerShellConsole/pssessions/{pssession}';
        $statusCodes = [200, 202];
        $method = 'PATCH';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{nodeName}' => $nodeName, '{session}' => $session, '{pssession}' => $pssession]);
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
     * Creates a PowerShell script and invokes it.
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param array $powerShellCommandParameters Parameters supplied to the Invoke PowerShell Command
     *  operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'command' => ''
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
     *    'results' => '',
     *    'pssession' => '',
     *    'command' => '',
     *    'completed' => 'false'
     * ];
     * </pre>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function invokeCommand($resourceGroupName, $nodeName, $session, $pssession, array $powerShellCommandParameters, array $customHeaders = [])
    {
        $response = $this->begininvokeCommandAsync($resourceGroupName, $nodeName, $session, $pssession, $powerShellCommandParameters, $customHeaders);

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
     * Creates a PowerShell script and invokes it.
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param array $powerShellCommandParameters Parameters supplied to the Invoke PowerShell Command
     *  operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'command' => ''
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
     *    'results' => '',
     *    'pssession' => '',
     *    'command' => '',
     *    'completed' => 'false'
     * ];
     * </pre>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function beginInvokeCommand($resourceGroupName, $nodeName, $session, $pssession, array $powerShellCommandParameters, array $customHeaders = [])
    {
        $response = $this->beginInvokeCommandAsync($resourceGroupName, $nodeName, $session, $pssession, $powerShellCommandParameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Creates a PowerShell script and invokes it.
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param array $powerShellCommandParameters Parameters supplied to the Invoke PowerShell Command
     *  operation. 
     * <pre>
     * [
     *    'properties' => [
     *       'command' => ''
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginInvokeCommandAsync($resourceGroupName, $nodeName, $session, $pssession, array $powerShellCommandParameters, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($resourceGroupName == null) {
            PhpValidate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($nodeName == null) {
            PhpValidate::notNullOrEmpty($nodeName, '$nodeName');
        }
        if ($session == null) {
            PhpValidate::notNullOrEmpty($session, '$session');
        }
        if ($pssession == null) {
            PhpValidate::notNullOrEmpty($pssession, '$pssession');
        }
        if ($powerShellCommandParameters == null) {
            PhpValidate::notNullOrEmpty($powerShellCommandParameters, '$powerShellCommandParameters');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}/features/powerShellConsole/pssessions/{pssession}/invokeCommand';
        $statusCodes = [200, 202];
        $method = 'POST';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{nodeName}' => $nodeName, '{session}' => $session, '{pssession}' => $pssession]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[PhpResources::X_MS_REQUEST_ID] = PhpUtilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($powerShellCommandParameters);

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
     * Cancels a PowerShell command.
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'results' => '',
     *    'pssession' => '',
     *    'command' => '',
     *    'completed' => 'false'
     * ];
     * </pre>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function cancelCommand($resourceGroupName, $nodeName, $session, $pssession, array $customHeaders = [])
    {
        $response = $this->begincancelCommandAsync($resourceGroupName, $nodeName, $session, $pssession, $customHeaders);

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
     * Cancels a PowerShell command.
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'results' => '',
     *    'pssession' => '',
     *    'command' => '',
     *    'completed' => 'false'
     * ];
     * </pre>
     * Empty array with resposne status Accepted(202).<br>
     */
    public function beginCancelCommand($resourceGroupName, $nodeName, $session, $pssession, array $customHeaders = [])
    {
        $response = $this->beginCancelCommandAsync($resourceGroupName, $nodeName, $session, $pssession, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Cancels a PowerShell command.
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function beginCancelCommandAsync($resourceGroupName, $nodeName, $session, $pssession, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($resourceGroupName == null) {
            PhpValidate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($nodeName == null) {
            PhpValidate::notNullOrEmpty($nodeName, '$nodeName');
        }
        if ($session == null) {
            PhpValidate::notNullOrEmpty($session, '$session');
        }
        if ($pssession == null) {
            PhpValidate::notNullOrEmpty($pssession, '$pssession');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}/features/powerShellConsole/pssessions/{pssession}/cancel';
        $statusCodes = [200, 202];
        $method = 'POST';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{nodeName}' => $nodeName, '{session}' => $session, '{pssession}' => $pssession]);
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
     * gets tab completion values for a command.
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param array $powerShellTabCompletionParamters Parameters supplied to the tab completion call. 
     * <pre>
     * [
     *    'command' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'results' => ''
     * ];
     * </pre>
     */
    public function tabCompletion($resourceGroupName, $nodeName, $session, $pssession, array $powerShellTabCompletionParamters, array $customHeaders = [])
    {
        $response = $this->tabCompletionAsync($resourceGroupName, $nodeName, $session, $pssession, $powerShellTabCompletionParamters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * gets tab completion values for a command.
     *
     * @param string $resourceGroupName The resource group name uniquely
     * identifies the resource group within the user subscriptionId.
     * @param string $nodeName The node name (256 characters maximum).
     * @param string $session The sessionId from the user
     * @param string $pssession The PowerShell sessionId from the user
     * @param array $powerShellTabCompletionParamters Parameters supplied to the tab completion call. 
     * <pre>
     * [
     *    'command' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function tabCompletionAsync($resourceGroupName, $nodeName, $session, $pssession, array $powerShellTabCompletionParamters, array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            PhpValidate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($resourceGroupName == null) {
            PhpValidate::notNullOrEmpty($resourceGroupName, '$resourceGroupName');
        }
        if ($nodeName == null) {
            PhpValidate::notNullOrEmpty($nodeName, '$nodeName');
        }
        if ($session == null) {
            PhpValidate::notNullOrEmpty($session, '$session');
        }
        if ($pssession == null) {
            PhpValidate::notNullOrEmpty($pssession, '$pssession');
        }
        if ($powerShellTabCompletionParamters == null) {
            PhpValidate::notNullOrEmpty($powerShellTabCompletionParamters, '$powerShellTabCompletionParamters');
        }

        $path = '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}/features/powerShellConsole/pssessions/{pssession}/tab';
        $statusCodes = [200];
        $method = 'POST';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId(), '{resourceGroupName}' => $resourceGroupName, '{nodeName}' => $nodeName, '{session}' => $session, '{pssession}' => $pssession]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[PhpResources::X_MS_REQUEST_ID] = PhpUtilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($powerShellTabCompletionParamters);

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
