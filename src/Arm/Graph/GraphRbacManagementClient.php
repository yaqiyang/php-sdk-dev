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

use MicrosoftAzure\Common\Internal\Authentication\OAuthScheme as PhpOAuthScheme;
use MicrosoftAzure\Common\Internal\Filters\OAuthFilter as PhpOAuthFilter;
use MicrosoftAzure\Common\Internal\Http\HttpClient as PhpHttpClient;
use MicrosoftAzure\Common\Internal\Resources as PhpResources;
use MicrosoftAzure\Common\Internal\Serialization\JsonSerializer as PhpJsonSerializer;
use MicrosoftAzure\Common\OAuthServiceClient as PhpOAuthServiceClient;
use MicrosoftAzure\Common\RestServiceClient as PhpRestServiceClient;

/**
 * The Graph RBAC Management Client
 */
class GraphRbacManagementClient extends PhpRestServiceClient
{
    /**
     * Credentials needed for the client to connect to Azure.
     *
     * @var OAuthSettings
     */
    private $_credentials;
    /**
     * Client Api Version.
     *
     * @var string
     */
    private $_apiVersion;
    /**
     * Gets or sets the tenant Id.
     *
     * @var string
     */
    private $_tenantID;
    /**
     * Gets or sets the preferred language for the response.
     *
     * @var string
     */
    private $_acceptLanguage;
    /**
     * Gets or sets the retry timeout in seconds for Long Running Operations.
     * Default value is 30.
     *
     * @var int
     */
    private $_longRunningOperationRetryTimeout;
    /**
     * When set to true a unique x-ms-client-request-id value is generated and
     * included in each request. Default is true.
     *
     * @var bool
     */
    private $_generateClientRequestId;

    /**
     * Method group: Applications.
     *
     * @var Applications
     */
    private $_applications;

    /**
     * Method group: Groups.
     *
     * @var Groups
     */
    private $_groups;

    /**
     * Method group: ServicePrincipals.
     *
     * @var ServicePrincipals
     */
    private $_servicePrincipals;

    /**
     * Method group: Users.
     *
     * @var Users
     */
    private $_users;

    /**
     * Base Url for the API.
     *
     * @var string
     */
    private $_baseUrl = 'https://graph.windows.net';

    /**
     * Header filters for http calls.
     *
     * @var array
     */
    private $_filters;

    /**
     * Retry intervals in number of seconds.
     *
     * @var int
     */
    private $_retryInterval;

    /**
     * Constructor for the service client.
     *
     * @param OAuthSettings $oauthSettings OAuth settings for to access the APIs
     */
    public function __construct($oauthSettings)
    {
        $this->_credentials = $oauthSettings;
        parent::__construct(
            $this->_credentials->getOAuthEndpointUri(),
            new PhpJsonSerializer()
        );
        $oauthService = new PhpOAuthServiceClient($this->_credentials);
        $authentification = new PhpOAuthScheme($oauthService);
        $this->_filters = [new PhpOAuthFilter($authentification)];

        $this->_applications = new Applications($this);
        $this->_groups = new Groups($this);
        $this->_servicePrincipals = new ServicePrincipals($this);
        $this->_users = new Users($this);

        $this->setApiVersion('1.6');
        $this->setAcceptLanguage('en-US');
        $this->setLongRunningOperationRetryTimeout(30);
        $this->setGenerateClientRequestId(true);
        $this->setRetryInterval(5);
    }

    /**
     * Gets credentials, Credentials needed for the client to connect to Azure.
     *
     * @return OAuthSettings
     */
    public function getCredentials()
    {
        return $this->_credentials;
    }

    /**
     * Sets credentials, Credentials needed for the client to connect to Azure.
     *
     * @param OAuthSettings $credentials
     *
     * @return none
     */
    private function setCredentials($credentials)
    {
        $this->_credentials = $credentials;
    }

    /**
     * Gets apiVersion, Client Api Version.
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->_apiVersion;
    }

    /**
     * Sets apiVersion, Client Api Version.
     *
     * @param string $apiVersion
     *
     * @return none
     */
    private function setApiVersion($apiVersion)
    {
        $this->_apiVersion = $apiVersion;
    }

    /**
     * Gets tenantID, the tenant Id.
     *
     * @return string
     */
    public function getTenantID()
    {
        return $this->_tenantID;
    }

    /**
     * Sets tenantID, the tenant Id.
     *
     * @param string $tenantID
     *
     * @return none
     */
    public function setTenantID($tenantID)
    {
        $this->_tenantID = $tenantID;
    }

    /**
     * Gets acceptLanguage, the preferred language for the response.
     *
     * @return string
     */
    public function getAcceptLanguage()
    {
        return $this->_acceptLanguage;
    }

    /**
     * Sets acceptLanguage, the preferred language for the response.
     *
     * @param string $acceptLanguage
     *
     * @return none
     */
    public function setAcceptLanguage($acceptLanguage)
    {
        $this->_acceptLanguage = $acceptLanguage;
    }

    /**
     * Gets longRunningOperationRetryTimeout, the retry timeout in seconds for
     * Long Running Operations. Default value is 30.
     *
     * @return int
     */
    public function getLongRunningOperationRetryTimeout()
    {
        return $this->_longRunningOperationRetryTimeout;
    }

    /**
     * Sets longRunningOperationRetryTimeout, the retry timeout in seconds for
     * Long Running Operations. Default value is 30.
     *
     * @param int $longRunningOperationRetryTimeout
     *
     * @return none
     */
    public function setLongRunningOperationRetryTimeout($longRunningOperationRetryTimeout)
    {
        $this->_longRunningOperationRetryTimeout = $longRunningOperationRetryTimeout;
        set_time_limit($longRunningOperationRetryTimeout);
    }

    /**
     * Gets generateClientRequestId, When set to true a unique
     * x-ms-client-request-id value is generated and included in each
     * request. Default is true.
     *
     * @return bool
     */
    public function getGenerateClientRequestId()
    {
        return $this->_generateClientRequestId;
    }

    /**
     * Sets generateClientRequestId, When set to true a unique
     * x-ms-client-request-id value is generated and included in each
     * request. Default is true.
     *
     * @param bool $generateClientRequestId
     *
     * @return none
     */
    public function setGenerateClientRequestId($generateClientRequestId)
    {
        $this->_generateClientRequestId = $generateClientRequestId;
    }

    /**
     * Gets method group Applications.
     *
     * @return Applications
     */
    public function getApplications()
    {
        return $this->_applications;
    }

    /**
     * Gets method group Groups.
     *
     * @return Groups
     */
    public function getGroups()
    {
        return $this->_groups;
    }

    /**
     * Gets method group ServicePrincipals.
     *
     * @return ServicePrincipals
     */
    public function getServicePrincipals()
    {
        return $this->_servicePrincipals;
    }

    /**
     * Gets method group Users.
     *
     * @return Users
     */
    public function getUsers()
    {
        return $this->_users;
    }

    /**
     * Gets filter for http requests.
     *
     * @return array, OAuth filters
     */
    public function getFilters()
    {
        return $this->_filters;
    }

    /**
     * Gets the data serializer.
     *
     * @return JsonSerializer, the data serializer
     */
    public function getDataSerializer()
    {
        return $this->dataSerializer;
    }

    /**
     * Gets host full Url for a relative path.
     *
     * @param string $path
     *
     * @return string, full Url
     */
    public function getUrl($path)
    {
        return $this->_baseUrl.$path;
    }

    /**
     * Gets retry intervals in number of seconds.
     *
     * @return int, number of seconds
     */
    public function getRetryInterval()
    {
        return $this->_retryInterval;
    }

    /**
     * Sets retry intervals in number of seconds.
     *
     * @param int $retryInterval
     *
     * @return none
     */
    public function setRetryInterval($retryInterval)
    {
        $this->_retryInterval = $retryInterval;
    }

    /**
     * Poll for the async status of a request.
     *
     * @param string $path
     * @param string $requestId from x-ms-request-id in the header
     *
     * @return string, status code, 200 or 202
     */
    public function pollAsyncOperation($path, $requestId)
    {
        $queryParams = [PhpResources::API_VERSION => '1.6', 'monitor' => 'true'];
        $method = PhpResources::HTTP_GET;
        $statusCodes = [PhpResources::STATUS_OK, Resources::STATUS_ACCEPTED];

        $headers = [PhpResources::X_MS_REQUEST_ID => $requestId];
        $body = '';

        $response = PhpHttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $path,
            $statusCodes,
            $body,
            $this->getFilters()
        );

        return $response->getStatusCode();
    }

    /**
     * Wait for the async request to finish.
     *
     * @param Response $response
     *
     * @return string, status code
     */
    public function awaitAsync($response)
    {
        $status = $response->getStatusCode();
        $headers = $response->getHeaders();

        if (array_key_exists(PhpResources::XTAG_LOCATION, $headers) && array_key_exists(PhpResources::X_MS_REQUEST_ID, $headers)) {
            $locations = $headers[PhpResources::XTAG_LOCATION];
            $requestIds = $headers[PhpResources::X_MS_REQUEST_ID];

            while ($status == PhpResources::STATUS_ACCEPTED) {
                sleep($this->getRetryInterval());
                $status = $this->pollAsyncOperation($locations[0], $requestIds[0]);
                echo '.';
            }
        }

        return $status;
    }
}
