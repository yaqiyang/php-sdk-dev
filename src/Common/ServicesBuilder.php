<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common;

use MicrosoftAzure\Blob\BlobRestProxy;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\Filters\DateFilter;
use MicrosoftAzure\Common\Internal\Filters\HeadersFilter;
use MicrosoftAzure\Common\Internal\Filters\AuthenticationFilter;
use MicrosoftAzure\Common\Internal\Serialization\XmlSerializer;
use MicrosoftAzure\Common\Internal\Authentication\SharedKeyAuthScheme;
use MicrosoftAzure\Common\Internal\Authentication\TableSharedKeyLiteAuthScheme;
use MicrosoftAzure\Common\Internal\StorageServiceSettings;
use MicrosoftAzure\Queue\QueueRestProxy;
use MicrosoftAzure\Table\TableRestProxy;
use MicrosoftAzure\Table\Internal\AtomReaderWriter;
use MicrosoftAzure\Table\Internal\MimeReaderWriter;

/**
 * Builds azure service objects.
 *
 * @category  Microsoft
 *
 * @author    Azure Storage PHP SDK <dmsh@microsoft.com>
 * @copyright 2016 Microsoft Corporation
 * @license   https://github.com/azure/azure-storage-php/LICENSE
 *
 * @version   Release: 0.10.0
 *
 * @link      https://github.com/azure/azure-storage-php
 */
class ServicesBuilder
{
    /**
     * @var ServicesBuilder
     */
    private static $_instance = null;

    /**
     * Gets the serializer used in the REST services construction.
     *
     * @return MicrosoftAzure\Common\Internal\Serialization\ISerializer
     */
    protected function serializer()
    {
        return new XmlSerializer();
    }

    /**
     * Gets the MIME serializer used in the REST services construction.
     *
     * @return \MicrosoftAzure\Table\Internal\IMimeReaderWriter
     */
    protected function mimeSerializer()
    {
        return new MimeReaderWriter();
    }

    /**
     * Gets the Atom serializer used in the REST services construction.
     *
     * @return \MicrosoftAzure\Table\Internal\IAtomReaderWriter
     */
    protected function atomSerializer()
    {
        return new AtomReaderWriter();
    }

    /**
     * Gets the Queue authentication scheme.
     *
     * @param string $accountName The account name.
     * @param string $accountKey  The account key.
     *
     * @return \MicrosoftAzure\Common\Internal\Authentication\StorageAuthScheme
     */
    protected function queueAuthenticationScheme($accountName, $accountKey)
    {
        return new SharedKeyAuthScheme($accountName, $accountKey);
    }

    /**
     * Gets the Blob authentication scheme.
     *
     * @param string $accountName The account name.
     * @param string $accountKey  The account key.
     *
     * @return \MicrosoftAzure\Common\Internal\Authentication\StorageAuthScheme
     */
    protected function blobAuthenticationScheme($accountName, $accountKey)
    {
        return new SharedKeyAuthScheme($accountName, $accountKey);
    }

    /**
     * Gets the Table authentication scheme.
     *
     * @param string $accountName The account name.
     * @param string $accountKey  The account key.
     *
     * @return TableSharedKeyLiteAuthScheme
     */
    protected function tableAuthenticationScheme($accountName, $accountKey)
    {
        return new TableSharedKeyLiteAuthScheme($accountName, $accountKey);
    }

    /**
     * Builds a queue object.
     *
     * @param string $connectionString The configuration connection string.
     *
     * @return MicrosoftAzure\Queue\Internal\IQueue
     */
    public function createQueueService($connectionString)
    {
        $settings = StorageServiceSettings::createFromConnectionString(
            $connectionString
        );

        $serializer = $this->serializer();
        $uri = Utilities::tryAddUrlScheme(
            $settings->getQueueEndpointUri()
        );

        $queueWrapper = new QueueRestProxy(
            $uri,
            $settings->getName(),
            $serializer
        );

        // Adding headers filter
        $headers = array(
            Resources::USER_AGENT => self::getUserAgent(),
        );

        $headers[Resources::X_MS_VERSION] = Resources::STORAGE_API_LATEST_VERSION;

        $headersFilter = new HeadersFilter($headers);
        $queueWrapper = $queueWrapper->withFilter($headersFilter);

        // Adding date filter
        $dateFilter = new DateFilter();
        $queueWrapper = $queueWrapper->withFilter($dateFilter);

        // Adding authentication filter
        $authFilter = new AuthenticationFilter(
            $this->queueAuthenticationScheme(
                $settings->getName(),
                $settings->getKey()
            )
        );

        $queueWrapper = $queueWrapper->withFilter($authFilter);

        return $queueWrapper;
    }

    /**
     * Builds a blob object.
     *
     * @param string $connectionString The configuration connection string.
     *
     * @return MicrosoftAzure\Blob\Internal\IBlob
     */
    public function createBlobService($connectionString)
    {
        $settings = StorageServiceSettings::createFromConnectionString(
            $connectionString
        );

        $serializer = $this->serializer();
        $uri = Utilities::tryAddUrlScheme(
            $settings->getBlobEndpointUri()
        );

        $blobWrapper = new BlobRestProxy(
            $uri,
            $settings->getName(),
            $serializer
        );

        // Adding headers filter
        $headers = array(
            Resources::USER_AGENT => self::getUserAgent(),
        );

        $headers[Resources::X_MS_VERSION] = Resources::STORAGE_API_LATEST_VERSION;

        $headersFilter = new HeadersFilter($headers);
        $blobWrapper = $blobWrapper->withFilter($headersFilter);

        // Adding date filter
        $dateFilter = new DateFilter();
        $blobWrapper = $blobWrapper->withFilter($dateFilter);

        $authFilter = new AuthenticationFilter(
            $this->blobAuthenticationScheme(
                $settings->getName(),
                $settings->getKey()
            )
        );

        $blobWrapper = $blobWrapper->withFilter($authFilter);

        return $blobWrapper;
    }

    /**
     * Builds a table object.
     *
     * @param string $connectionString The configuration connection string.
     *
     * @return MicrosoftAzure\Table\Internal\ITable
     */
    public function createTableService($connectionString)
    {
        $settings = StorageServiceSettings::createFromConnectionString(
            $connectionString
        );

        $atomSerializer = $this->atomSerializer();
        $mimeSerializer = $this->mimeSerializer();
        $serializer = $this->serializer();
        $uri = Utilities::tryAddUrlScheme(
            $settings->getTableEndpointUri()
        );

        $tableWrapper = new TableRestProxy(
            $uri,
            $atomSerializer,
            $mimeSerializer,
            $serializer
        );

        // Adding headers filter
        $headers = array();
        $latestServicesVersion = Resources::STORAGE_API_LATEST_VERSION;
        $currentVersion = Resources::DATA_SERVICE_VERSION_VALUE;
        $maxVersion = Resources::MAX_DATA_SERVICE_VERSION_VALUE;
        $accept = Resources::ACCEPT_HEADER_VALUE;
        $acceptCharset = Resources::ACCEPT_CHARSET_VALUE;
        $userAgent = self::getUserAgent();

        $headers[Resources::X_MS_VERSION] = $latestServicesVersion;
        $headers[Resources::DATA_SERVICE_VERSION] = $currentVersion;
        $headers[Resources::MAX_DATA_SERVICE_VERSION] = $maxVersion;
        $headers[Resources::MAX_DATA_SERVICE_VERSION] = $maxVersion;
        $headers[Resources::ACCEPT_HEADER] = $accept;
        $headers[Resources::ACCEPT_CHARSET] = $acceptCharset;
        $headers[Resources::USER_AGENT] = $userAgent;

        $headersFilter = new HeadersFilter($headers);
        $tableWrapper = $tableWrapper->withFilter($headersFilter);

        // Adding date filter
        $dateFilter = new DateFilter();
        $tableWrapper = $tableWrapper->withFilter($dateFilter);

        // Adding authentication filter
        $authFilter = new AuthenticationFilter(
            $this->tableAuthenticationScheme(
                $settings->getName(),
                $settings->getKey()
            )
        );

        $tableWrapper = $tableWrapper->withFilter($authFilter);

        return $tableWrapper;
    }

    /**
     * Gets the user agent string used in request header.
     *
     * @return string
     */
    private static function getUserAgent()
    {
        // e.g. User-Agent: Azure-Storage/0.10.0 (PHP 5.5.32)
        return 'Azure-Storage/'.Resources::SDK_VERSION.' (PHP '.PHP_VERSION.')';
    }

    /**
     * Gets the static instance of this class.
     *
     * @return ServicesBuilder
     */
    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
}
