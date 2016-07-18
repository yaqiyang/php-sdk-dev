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
 * GlobalCertificateOrder for Use these APIs to manage Azure Websites
 * resources through the Azure Resource Manager. All task operations conform
 * to the HTTP/1.1 protocol specification and each operation returns an
 * x-ms-request-id header that can be used to obtain information about the
 * request. You must make sure that requests made to these resources are
 * secure. For more information, see <a
 * href="https://msdn.microsoft.com/en-us/library/azure/dn790557.aspx">Authenticating
 * Azure Resource Manager requests.</a>
 */
class GlobalCertificateOrder
{
    /**
     * The service client object for the operations.
     *
     * @var WebSiteManagementClient
     */
    private $_client;

    /**
     * Creates a new instance for GlobalCertificateOrder.
     *
     * @param WebSiteManagementClient, Service client for GlobalCertificateOrder
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
    public function getAllCertificateOrders(array $customHeaders = [])
    {
        $response = $this->getAllCertificateOrdersAsync($customHeaders);

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
    public function getAllCertificateOrdersAsync(array $customHeaders = [])
    {
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.CertificateRegistration/certificateOrders';
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
     * Validate certificate purchase information
     *
     * @param array $certificateOrder Certificate order 
     * <pre>
     * [
     *    'properties' => [
     *       'certificates' => '',
     *       'distinguishedName' => '',
     *       'domainVerificationToken' => '',
     *       'validityInYears' => '',
     *       'keySize' => '',
     *       'productType' => 'StandardDomainValidatedSsl|StandardDomainValidatedWildCardSsl',
     *       'autoRenew' => 'false',
     *       'provisioningState' => 'Succeeded|Failed|Canceled|InProgress|Deleting',
     *       'status' =>
     *  'Pendingissuance|Issued|Revoked|Canceled|Denied|Pendingrevocation|PendingRekey|Unused|Expired|NotSubmitted',
     *       'signedCertificate' => [
     *          'properties' => [
     *             'version' => '',
     *             'serialNumber' => '',
     *             'thumbprint' => '',
     *             'subject' => '',
     *             'notBefore' => '',
     *             'notAfter' => '',
     *             'signatureAlgorithm' => '',
     *             'issuer' => '',
     *             'rawData' => ''
     *          ]
     *       ],
     *       'csr' => '',
     *       'intermediate' => [
     *          'properties' => [
     *             'version' => '',
     *             'serialNumber' => '',
     *             'thumbprint' => '',
     *             'subject' => '',
     *             'notBefore' => '',
     *             'notAfter' => '',
     *             'signatureAlgorithm' => '',
     *             'issuer' => '',
     *             'rawData' => ''
     *          ]
     *       ],
     *       'root' => [
     *          'properties' => [
     *             'version' => '',
     *             'serialNumber' => '',
     *             'thumbprint' => '',
     *             'subject' => '',
     *             'notBefore' => '',
     *             'notAfter' => '',
     *             'signatureAlgorithm' => '',
     *             'issuer' => '',
     *             'rawData' => ''
     *          ]
     *       ],
     *       'serialNumber' => '',
     *       'lastCertificateIssuanceTime' => '',
     *       'expirationTime' => ''
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value'] that will be added to
     *  the HTTP request.
     *
     * @return array
     * When the resposne status is OK(200), object
     */
    public function validateCertificatePurchaseInformation(array $certificateOrder, array $customHeaders = [])
    {
        $response = $this->validateCertificatePurchaseInformationAsync($certificateOrder, $customHeaders);

        if ($response->getBody()) {
            $contents = $response->getBody()->getContents();
            if ($contents) {
                return $this->_client->getDataSerializer()->deserialize($contents);
            }
        }

        return [];
    }

    /**
     * Validate certificate purchase information
     *
     * @param array $certificateOrder Certificate order 
     * <pre>
     * [
     *    'properties' => [
     *       'certificates' => '',
     *       'distinguishedName' => '',
     *       'domainVerificationToken' => '',
     *       'validityInYears' => '',
     *       'keySize' => '',
     *       'productType' => 'StandardDomainValidatedSsl|StandardDomainValidatedWildCardSsl',
     *       'autoRenew' => 'false',
     *       'provisioningState' => 'Succeeded|Failed|Canceled|InProgress|Deleting',
     *       'status' =>
     *  'Pendingissuance|Issued|Revoked|Canceled|Denied|Pendingrevocation|PendingRekey|Unused|Expired|NotSubmitted',
     *       'signedCertificate' => [
     *          'properties' => [
     *             'version' => '',
     *             'serialNumber' => '',
     *             'thumbprint' => '',
     *             'subject' => '',
     *             'notBefore' => '',
     *             'notAfter' => '',
     *             'signatureAlgorithm' => '',
     *             'issuer' => '',
     *             'rawData' => ''
     *          ]
     *       ],
     *       'csr' => '',
     *       'intermediate' => [
     *          'properties' => [
     *             'version' => '',
     *             'serialNumber' => '',
     *             'thumbprint' => '',
     *             'subject' => '',
     *             'notBefore' => '',
     *             'notAfter' => '',
     *             'signatureAlgorithm' => '',
     *             'issuer' => '',
     *             'rawData' => ''
     *          ]
     *       ],
     *       'root' => [
     *          'properties' => [
     *             'version' => '',
     *             'serialNumber' => '',
     *             'thumbprint' => '',
     *             'subject' => '',
     *             'notBefore' => '',
     *             'notAfter' => '',
     *             'signatureAlgorithm' => '',
     *             'issuer' => '',
     *             'rawData' => ''
     *          ]
     *       ],
     *       'serialNumber' => '',
     *       'lastCertificateIssuanceTime' => '',
     *       'expirationTime' => ''
     *    ]
     * ];
     * </pre>
     * @param array $customHeaders An array of custom headers ['key' => 'value']
     * that will be added to the HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function validateCertificatePurchaseInformationAsync(array $certificateOrder, array $customHeaders = [])
    {
        if ($certificateOrder == null) {
            Validate::notNullOrEmpty($certificateOrder, '$certificateOrder');
        }
        if ($this->_client->getSubscriptionId() == null) {
            Validate::notNullOrEmpty($this->_client->getSubscriptionId(), '$this->_client->getSubscriptionId()');
        }
        if ($this->_client->getApiVersion() == null) {
            Validate::notNullOrEmpty($this->_client->getApiVersion(), '$this->_client->getApiVersion()');
        }

        $path = '/subscriptions/{subscriptionId}/providers/Microsoft.CertificateRegistration/validateCertificateRegistrationInformation';
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
        $body = $this->_client->getDataSerializer()->serialize($certificateOrder);

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
