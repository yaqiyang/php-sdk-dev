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
 * @version     Release: 0.10.0_2016, API Version: 1.6
 */

namespace MicrosoftAzure\Arm\Graph;

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * Groups for The Graph RBAC Management Client
 */
class Groups
{
    /**
     * The service client object for the operations.
     *
     * @var GraphRbacManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for Groups.
     *
     * @param GraphRbacManagementClient, Service client for Groups
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Checks whether the specified user, group, contact, or service principal is
     * a direct or a transitive member of the specified group.
     *
     * @param array $parameters Check group membership parameters. 
     * <pre>
     * [
     *    'groupId' => 'requiredGroupId',
     *    'memberId' => 'requiredMemberId'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => 'false'
     * ];
     * </pre>
     */
    public function isMemberOf(array $parameters, array $customHeaders = [])
    {
        $response = $this->isMemberOfAsync($parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Checks whether the specified user, group, contact, or service principal is
     * a direct or a transitive member of the specified group.
     *
     * @param array $parameters Check group membership parameters. 
     * <pre>
     * [
     *    'groupId' => 'requiredGroupId',
     *    'memberId' => 'requiredMemberId'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function isMemberOfAsync(array $parameters, array $customHeaders = [])
    {
        if ($parameters == null) {
            Validate::notNullOrEmpty($parameters, '$parameters');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/isMemberOf';
        $statusCodes = [200];
        $method = 'POST';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($parameters);

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
     * Remove a memeber from a group. Reference:
     * https://msdn.microsoft.com/en-us/library/azure/ad/graph/api/groups-operations#DeleteGroupMember
     *
     * @param string $groupObjectId Group object id
     * @param string $memberObjectId Member Object id
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status NoContent(204).<br>
     */
    public function removeMember($groupObjectId, $memberObjectId, array $customHeaders = [])
    {
        $response = $this->removeMemberAsync($groupObjectId, $memberObjectId, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Remove a memeber from a group. Reference:
     * https://msdn.microsoft.com/en-us/library/azure/ad/graph/api/groups-operations#DeleteGroupMember
     *
     * @param string $groupObjectId Group object id
     * @param string $memberObjectId Member Object id
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function removeMemberAsync($groupObjectId, $memberObjectId, array $customHeaders = [])
    {
        if ($groupObjectId == null) {
            Validate::notNullOrEmpty($groupObjectId, '$groupObjectId');
        }
        if ($memberObjectId == null) {
            Validate::notNullOrEmpty($memberObjectId, '$memberObjectId');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/groups/{groupObjectId}/$links/members/{memberObjectId}';
        $statusCodes = [204];
        $method = 'DELETE';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
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
     * Add a memeber to a group. Reference:
     * https://msdn.microsoft.com/en-us/library/azure/ad/graph/api/groups-operations#AddGroupMembers
     *
     * @param string $groupObjectId Group object id
     * @param array $parameters Member Object Url as
     *  https://graph.windows.net/0b1f9851-1bf0-433f-aec3-cb9272f093dc/directoryObjects/f260bbc4-c254-447b-94cf-293b5ec434dd 
     * <pre>
     * [
     *    'url' => 'requiredUrl'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status NoContent(204).<br>
     */
    public function addMember($groupObjectId, array $parameters, array $customHeaders = [])
    {
        $response = $this->addMemberAsync($groupObjectId, $parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Add a memeber to a group. Reference:
     * https://msdn.microsoft.com/en-us/library/azure/ad/graph/api/groups-operations#AddGroupMembers
     *
     * @param string $groupObjectId Group object id
     * @param array $parameters Member Object Url as
     *  https://graph.windows.net/0b1f9851-1bf0-433f-aec3-cb9272f093dc/directoryObjects/f260bbc4-c254-447b-94cf-293b5ec434dd 
     * <pre>
     * [
     *    'url' => 'requiredUrl'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function addMemberAsync($groupObjectId, array $parameters, array $customHeaders = [])
    {
        if ($groupObjectId == null) {
            Validate::notNullOrEmpty($groupObjectId, '$groupObjectId');
        }
        if ($parameters == null) {
            Validate::notNullOrEmpty($parameters, '$parameters');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/groups/{groupObjectId}/$links/members';
        $statusCodes = [204];
        $method = 'POST';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($parameters);

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
     * Delete a group in the directory. Reference:
     * http://msdn.microsoft.com/en-us/library/azure/dn151676.aspx
     *
     * @param string $groupObjectId Object id
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * Empty array with resposne status NoContent(204).<br>
     */
    public function delete($groupObjectId, array $customHeaders = [])
    {
        $response = $this->deleteAsync($groupObjectId, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Delete a group in the directory. Reference:
     * http://msdn.microsoft.com/en-us/library/azure/dn151676.aspx
     *
     * @param string $groupObjectId Object id
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function deleteAsync($groupObjectId, array $customHeaders = [])
    {
        if ($groupObjectId == null) {
            Validate::notNullOrEmpty($groupObjectId, '$groupObjectId');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/groups/{groupObjectId}';
        $statusCodes = [204];
        $method = 'DELETE';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
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
     * Create a group in the directory. Reference:
     * http://msdn.microsoft.com/en-us/library/azure/dn151676.aspx
     *
     * @param array $parameters Parameters to create a group 
     * <pre>
     * [
     *    'displayName' => 'requiredDisplayName',
     *    'mailEnabled' => 'false',
     *    'mailNickname' => 'requiredMailNickname',
     *    'securityEnabled' => 'false'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is Created(201), 
     * <pre>
     * [
     *    'objectId' => '',
     *    'objectType' => '',
     *    'displayName' => '',
     *    'securityEnabled' => 'false',
     *    'mail' => ''
     * ];
     * </pre>
     */
    public function create(array $parameters, array $customHeaders = [])
    {
        $response = $this->createAsync($parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Create a group in the directory. Reference:
     * http://msdn.microsoft.com/en-us/library/azure/dn151676.aspx
     *
     * @param array $parameters Parameters to create a group 
     * <pre>
     * [
     *    'displayName' => 'requiredDisplayName',
     *    'mailEnabled' => 'false',
     *    'mailNickname' => 'requiredMailNickname',
     *    'securityEnabled' => 'false'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function createAsync(array $parameters, array $customHeaders = [])
    {
        if ($parameters == null) {
            Validate::notNullOrEmpty($parameters, '$parameters');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/groups';
        $statusCodes = [201];
        $method = 'POST';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($parameters);

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
     * Gets list of groups for the current tenant.
     *
     * @param array $filter The filter to apply on the operation. 
     * <pre>
     * [
     *    'objectId' => '',
     *    'objectType' => '',
     *    'displayName' => '',
     *    'securityEnabled' => 'false',
     *    'mail' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => '',
     *    'odata.nextLink' => ''
     * ];
     * </pre>
     */
    public function listOperation(array $filter, array $customHeaders = [])
    {
        $response = $this->listOperationAsync($filter, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets list of groups for the current tenant.
     *
     * @param array $filter The filter to apply on the operation. 
     * <pre>
     * [
     *    'objectId' => '',
     *    'objectType' => '',
     *    'displayName' => '',
     *    'securityEnabled' => 'false',
     *    'mail' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listOperationAsync(array $filter, array $customHeaders = [])
    {
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/groups';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
        $queryParams = ['$filter' => $filter, 'api-version' => $this->_client->getApiVersion()];
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
     * Gets the members of a group.
     *
     * @param string $objectId Group object Id who's members should be retrieved.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => '',
     *    'odata.nextLink' => ''
     * ];
     * </pre>
     */
    public function getGroupMembers($objectId, array $customHeaders = [])
    {
        $response = $this->getGroupMembersAsync($objectId, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets the members of a group.
     *
     * @param string $objectId Group object Id who's members should be retrieved.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getGroupMembersAsync($objectId, array $customHeaders = [])
    {
        if ($objectId == null) {
            Validate::notNullOrEmpty($objectId, '$objectId');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/groups/{objectId}/members';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
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
     * Gets group information from the directory.
     *
     * @param string $objectId User objectId to get group information.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'objectId' => '',
     *    'objectType' => '',
     *    'displayName' => '',
     *    'securityEnabled' => 'false',
     *    'mail' => ''
     * ];
     * </pre>
     */
    public function get($objectId, array $customHeaders = [])
    {
        $response = $this->getAsync($objectId, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets group information from the directory.
     *
     * @param string $objectId User objectId to get group information.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAsync($objectId, array $customHeaders = [])
    {
        if ($objectId == null) {
            Validate::notNullOrEmpty($objectId, '$objectId');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/groups/{objectId}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
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
     * Gets a collection that contains the Object IDs of the groups of which the
     * group is a member.
     *
     * @param string $objectId Group filtering parameters.
     * @param array $parameters Group filtering parameters. 
     * <pre>
     * [
     *    'securityEnabledOnly' => 'false'
     * ];
     * </pre>
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
    public function getMemberGroups($objectId, array $parameters, array $customHeaders = [])
    {
        $response = $this->getMemberGroupsAsync($objectId, $parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets a collection that contains the Object IDs of the groups of which the
     * group is a member.
     *
     * @param string $objectId Group filtering parameters.
     * @param array $parameters Group filtering parameters. 
     * <pre>
     * [
     *    'securityEnabledOnly' => 'false'
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getMemberGroupsAsync($objectId, array $parameters, array $customHeaders = [])
    {
        if ($objectId == null) {
            Validate::notNullOrEmpty($objectId, '$objectId');
        }
        if ($parameters == null) {
            Validate::notNullOrEmpty($parameters, '$parameters');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/groups/{objectId}/getMemberGroups';
        $statusCodes = [200];
        $method = 'POST';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($parameters);

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
     * Gets list of groups for the current tenant.
     *
     * @param string $nextLink Next link for list operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => '',
     *    'odata.nextLink' => ''
     * ];
     * </pre>
     */
    public function listNext($nextLink, array $customHeaders = [])
    {
        $response = $this->listNextAsync($nextLink, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets list of groups for the current tenant.
     *
     * @param string $nextLink Next link for list operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listNextAsync($nextLink, array $customHeaders = [])
    {
        if ($nextLink == null) {
            Validate::notNullOrEmpty($nextLink, '$nextLink');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/{nextLink}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
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
     * Gets the members of a group.
     *
     * @param string $nextLink Next link for list operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'value' => '',
     *    'odata.nextLink' => ''
     * ];
     * </pre>
     */
    public function getGroupMembersNext($nextLink, array $customHeaders = [])
    {
        $response = $this->getGroupMembersNextAsync($nextLink, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Gets the members of a group.
     *
     * @param string $nextLink Next link for list operation.
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getGroupMembersNextAsync($nextLink, array $customHeaders = [])
    {
        if ($nextLink == null) {
            Validate::notNullOrEmpty($nextLink, '$nextLink');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }
        if ($this->_client->getTenantID() == null) {
            Validate::notNullOrEmpty($this->_client->getTenantID(), '$this->_client->getTenantID()');
        }

        $path = '/{tenantID}/{nextLink}';
        $statusCodes = [200];
        $method = 'GET';

        $path = strtr($path, ['{tenantID}' => $this->_client->getTenantID()]);
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
