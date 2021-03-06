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

use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Validate;

/**
 * GlobalDomainRegistration for Use these APIs to manage Azure Websites
 * resources through the Azure Resource Manager. All task operations conform
 * to the HTTP/1.1 protocol specification and each operation returns an
 * x-ms-request-id header that can be used to obtain information about the
 * request. You must make sure that requests made to these resources are
 * secure. For more information, see <a
 * href="https://msdn.microsoft.com/en-us/library/azure/dn790557.aspx">Authenticating
 * Azure Resource Manager requests.</a>
 */
class GlobalDomainRegistration
{
    /**
     * The service client object for the operations.
     *
     * @var WebSiteManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for GlobalDomainRegistration.
     *
     * @param WebSiteManagementClient, Service client for GlobalDomainRegistration
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Lists all domains in a subscription
     *
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
    public function getAllDomains(array $customHeaders = [])
    {
        $response = $this->getAllDomainsAsync($customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Lists all domains in a subscription
     *
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getAllDomainsAsync(array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.DomainRegistration/domains';
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
     * Generates a single sign on request for domain management portal
     *
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'url' => '',
     *    'postParameterKey' => '',
     *    'postParameterValue' => ''
     * ];
     * </pre>
     */
    public function getDomainControlCenterSsoRequest(array $customHeaders = [])
    {
        $response = $this->getDomainControlCenterSsoRequestAsync($customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Generates a single sign on request for domain management portal
     *
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getDomainControlCenterSsoRequestAsync(array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.DomainRegistration/generateSsoRequest';
        $statusCodes = [200];
        $method = 'POST';

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
     * Validates domain registration information
     *
     * @param array $domainRegistrationInput Domain registration information 
     * <pre>
     * [
     *    'properties' => [
     *       'name' => '',
     *       'contactAdmin' => [
     *          'addressMailing' => [
     *             'address1' => '',
     *             'address2' => '',
     *             'city' => '',
     *             'country' => '',
     *             'postalCode' => '',
     *             'state' => ''
     *          ],
     *          'email' => '',
     *          'fax' => '',
     *          'jobTitle' => '',
     *          'nameFirst' => '',
     *          'nameLast' => '',
     *          'nameMiddle' => '',
     *          'organization' => '',
     *          'phone' => ''
     *       ],
     *       'contactBilling' => [
     *          'addressMailing' => [
     *             'address1' => '',
     *             'address2' => '',
     *             'city' => '',
     *             'country' => '',
     *             'postalCode' => '',
     *             'state' => ''
     *          ],
     *          'email' => '',
     *          'fax' => '',
     *          'jobTitle' => '',
     *          'nameFirst' => '',
     *          'nameLast' => '',
     *          'nameMiddle' => '',
     *          'organization' => '',
     *          'phone' => ''
     *       ],
     *       'contactRegistrant' => [
     *          'addressMailing' => [
     *             'address1' => '',
     *             'address2' => '',
     *             'city' => '',
     *             'country' => '',
     *             'postalCode' => '',
     *             'state' => ''
     *          ],
     *          'email' => '',
     *          'fax' => '',
     *          'jobTitle' => '',
     *          'nameFirst' => '',
     *          'nameLast' => '',
     *          'nameMiddle' => '',
     *          'organization' => '',
     *          'phone' => ''
     *       ],
     *       'contactTech' => [
     *          'addressMailing' => [
     *             'address1' => '',
     *             'address2' => '',
     *             'city' => '',
     *             'country' => '',
     *             'postalCode' => '',
     *             'state' => ''
     *          ],
     *          'email' => '',
     *          'fax' => '',
     *          'jobTitle' => '',
     *          'nameFirst' => '',
     *          'nameLast' => '',
     *          'nameMiddle' => '',
     *          'organization' => '',
     *          'phone' => ''
     *       ],
     *       'registrationStatus' =>
     *  'Active|Awaiting|Cancelled|Confiscated|Disabled|Excluded|Expired|Failed|Held|Locked|Parked|Pending|Reserved|Reverted|Suspended|Transferred|Unknown|Unlocked|Unparked|Updated|JsonConverterFailed',
     *       'provisioningState' => 'Succeeded|Failed|Canceled|InProgress|Deleting',
     *       'nameServers' => '',
     *       'privacy' => 'false',
     *       'createdTime' => '',
     *       'expirationTime' => '',
     *       'lastRenewedTime' => '',
     *       'autoRenew' => 'false',
     *       'readyForDnsRecordManagement' => 'false',
     *       'managedHostNames' => '',
     *       'consent' => [
     *          'agreementKeys' => '',
     *          'agreedBy' => '',
     *          'agreedAt' => ''
     *       ],
     *       'domainNotRenewableReasons' => ''
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), object
     */
    public function validateDomainPurchaseInformation(array $domainRegistrationInput, array $customHeaders = [])
    {
        $response = $this->validateDomainPurchaseInformationAsync($domainRegistrationInput, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Validates domain registration information
     *
     * @param array $domainRegistrationInput Domain registration information 
     * <pre>
     * [
     *    'properties' => [
     *       'name' => '',
     *       'contactAdmin' => [
     *          'addressMailing' => [
     *             'address1' => '',
     *             'address2' => '',
     *             'city' => '',
     *             'country' => '',
     *             'postalCode' => '',
     *             'state' => ''
     *          ],
     *          'email' => '',
     *          'fax' => '',
     *          'jobTitle' => '',
     *          'nameFirst' => '',
     *          'nameLast' => '',
     *          'nameMiddle' => '',
     *          'organization' => '',
     *          'phone' => ''
     *       ],
     *       'contactBilling' => [
     *          'addressMailing' => [
     *             'address1' => '',
     *             'address2' => '',
     *             'city' => '',
     *             'country' => '',
     *             'postalCode' => '',
     *             'state' => ''
     *          ],
     *          'email' => '',
     *          'fax' => '',
     *          'jobTitle' => '',
     *          'nameFirst' => '',
     *          'nameLast' => '',
     *          'nameMiddle' => '',
     *          'organization' => '',
     *          'phone' => ''
     *       ],
     *       'contactRegistrant' => [
     *          'addressMailing' => [
     *             'address1' => '',
     *             'address2' => '',
     *             'city' => '',
     *             'country' => '',
     *             'postalCode' => '',
     *             'state' => ''
     *          ],
     *          'email' => '',
     *          'fax' => '',
     *          'jobTitle' => '',
     *          'nameFirst' => '',
     *          'nameLast' => '',
     *          'nameMiddle' => '',
     *          'organization' => '',
     *          'phone' => ''
     *       ],
     *       'contactTech' => [
     *          'addressMailing' => [
     *             'address1' => '',
     *             'address2' => '',
     *             'city' => '',
     *             'country' => '',
     *             'postalCode' => '',
     *             'state' => ''
     *          ],
     *          'email' => '',
     *          'fax' => '',
     *          'jobTitle' => '',
     *          'nameFirst' => '',
     *          'nameLast' => '',
     *          'nameMiddle' => '',
     *          'organization' => '',
     *          'phone' => ''
     *       ],
     *       'registrationStatus' =>
     *  'Active|Awaiting|Cancelled|Confiscated|Disabled|Excluded|Expired|Failed|Held|Locked|Parked|Pending|Reserved|Reverted|Suspended|Transferred|Unknown|Unlocked|Unparked|Updated|JsonConverterFailed',
     *       'provisioningState' => 'Succeeded|Failed|Canceled|InProgress|Deleting',
     *       'nameServers' => '',
     *       'privacy' => 'false',
     *       'createdTime' => '',
     *       'expirationTime' => '',
     *       'lastRenewedTime' => '',
     *       'autoRenew' => 'false',
     *       'readyForDnsRecordManagement' => 'false',
     *       'managedHostNames' => '',
     *       'consent' => [
     *          'agreementKeys' => '',
     *          'agreedBy' => '',
     *          'agreedAt' => ''
     *       ],
     *       'domainNotRenewableReasons' => ''
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function validateDomainPurchaseInformationAsync(array $domainRegistrationInput, array $customHeaders = [])
    {
        if ($domainRegistrationInput == null) {
            Validate::notNullOrEmpty($domainRegistrationInput, '$domainRegistrationInput');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.DomainRegistration/validateDomainRegistrationInformation';
        $statusCodes = [200];
        $method = 'POST';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($domainRegistrationInput);

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
     * Checks if a domain is available for registration
     *
     * @param array $identifier Name of the domain 
     * <pre>
     * [
     *    'name' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), 
     * <pre>
     * [
     *    'name' => '',
     *    'available' => 'false',
     *    'domainType' => 'Regular|SoftDeleted'
     * ];
     * </pre>
     */
    public function checkDomainAvailability(array $identifier, array $customHeaders = [])
    {
        $response = $this->checkDomainAvailabilityAsync($identifier, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Checks if a domain is available for registration
     *
     * @param array $identifier Name of the domain 
     * <pre>
     * [
     *    'name' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function checkDomainAvailabilityAsync(array $identifier, array $customHeaders = [])
    {
        if ($identifier == null) {
            Validate::notNullOrEmpty($identifier, '$identifier');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.DomainRegistration/checkDomainAvailability';
        $statusCodes = [200];
        $method = 'POST';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId()]);
        $queryParams = ['api-version' => $this->_client->getApiVersion()];
        $headers = $customHeaders;
        if ($this->_client->getAcceptLanguage() != null) {
            $headers['accept-language'] = $this->_client->getAcceptLanguage();
        }
        if ($this->_client->getGenerateClientRequestId()) {
            $headers[Resources::X_MS_REQUEST_ID] = Utilities::getGuid();
        }

        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $body = $this->_client->getDataSerializer()->serialize($identifier);

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
     * Lists domain recommendations based on keywords
     *
     * @param array $parameters Domain recommendation search parameters 
     * <pre>
     * [
     *    'keywords' => '',
     *    'maxDomainRecommendations' => ''
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
     *    'nextLink' => ''
     * ];
     * </pre>
     */
    public function listDomainRecommendations(array $parameters, array $customHeaders = [])
    {
        $response = $this->listDomainRecommendationsAsync($parameters, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Lists domain recommendations based on keywords
     *
     * @param array $parameters Domain recommendation search parameters 
     * <pre>
     * [
     *    'keywords' => '',
     *    'maxDomainRecommendations' => ''
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function listDomainRecommendationsAsync(array $parameters, array $customHeaders = [])
    {
        if ($parameters == null) {
            Validate::notNullOrEmpty($parameters, '$parameters');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.DomainRegistration/listDomainRecommendations';
        $statusCodes = [200];
        $method = 'POST';

        $path = strtr($path, ['{subscriptionId}' => $this->_client->getSubscriptionId()]);
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
}
