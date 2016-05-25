<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common;

use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Utilities;
use MicrosoftAzure\Common\Internal\OAuthSettings;
use MicrosoftAzure\Common\Internal\Serialization\JsonSerializer;
use MicrosoftAzure\Common\Internal\Serialization\XmlSerializer;
use MicrosoftAzure\StorageResourceProvider\StorageResourceProviderProxy;

/**
 * Builds azure service objects.
 *
 * @category  Microsoft: to add details
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
    protected function xmlSerializer()
    {
        return new XmlSerializer();
    }

    /**
     * Gets the serializer used in the REST services construction.
     *
     * @return MicrosoftAzure\Common\Internal\Serialization\ISerializer
     */
    protected function jsonSerializer()
    {
        return new JsonSerializer();
    }

    /**
     * Gets the StorageResourceProviderProxy
     *
     * @return MicrosoftAzure\StorageResourceProvider\StorageResourceProviderProxy
     */
    public function createStorageResourceProviderService($tenant_id,  $client_id, $client_secret)
    {
        $oauthSettings = new OAuthSettings($tenant_id,  $client_id, $client_secret);

        return new StorageResourceProviderProxy($oauthSettings);
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
