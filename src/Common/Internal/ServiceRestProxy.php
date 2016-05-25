<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal;

use MicrosoftAzure\Common\ServiceException;

/**
 * Base class for all services rest proxies.
 *
 * @category  Microsoft: to add details
 */
class ServiceRestProxy extends RestProxy
{
    /**
     * @var string
     */
    private $_accountName;

    /**
     * Initializes new ServiceRestProxy object.
     *
     * @param string      $uri            The storage account uri.
     * @param string      $accountName    The name of the account.
     * @param ISerializer $dataSerializer The data serializer.
     */
    public function __construct($uri, $accountName, $dataSerializer)
    {
        if ($uri[strlen($uri) - 1] != '/') {
            $uri = $uri.'/';
        }

        parent::__construct($dataSerializer, $uri);

        $this->_accountName = $accountName;
    }

    /**
     * Gets the account name.
     *
     * @return string
     */
    public function getAccountName()
    {
        return $this->_accountName;
    }

    /**
     * Throws ServiceException if the recieved status code is not expected.
     *
     * @param string $actual   The received status code.
     * @param string $reason   The reason phrase.
     * @param string $message  The detailed message (if any).
     * @param string $expected The expected status codes.
     *
     * @return none
     *
     * @static
     *
     * @throws ServiceException
     */
    public static function throwIfError($actual, $reason, $message, $expected)
    {
        $expectedStatusCodes = is_array($expected) ? $expected : array($expected);

        if (!in_array($actual, $expectedStatusCodes)) {
            throw new ServiceException($actual, $reason, $message);
        }
    }

    /**
     * Adds optional header to headers if set.
     *
     * @param array           $headers         The array of request headers.
     * @param AccessCondition $accessCondition The access condition object.
     *
     * @return array
     */
    public function addOptionalAccessConditionHeader($headers, $accessCondition)
    {
        if (!is_null($accessCondition)) {
            $header = $accessCondition->getHeader();

            if ($header != Resources::EMPTY_STRING) {
                $value = $accessCondition->getValue();
                if ($value instanceof \DateTime) {
                    $value = gmdate(
                        Resources::AZURE_DATE_FORMAT,
                        $value->getTimestamp()
                    );
                }
                $headers[$header] = $value;
            }
        }

        return $headers;
    }

    /**
     * Adds optional header to headers if set.
     *
     * @param array           $headers         The array of request headers.
     * @param AccessCondition $accessCondition The access condition object.
     *
     * @return array
     */
    public function addOptionalSourceAccessConditionHeader(
        $headers,
        $accessCondition
    ) {
        if (!is_null($accessCondition)) {
            $header = $accessCondition->getHeader();
            $headerName = null;
            if (!empty($header)) {
                switch ($header) {
                case Resources::IF_MATCH:
                    $headerName = Resources::X_MS_SOURCE_IF_MATCH;
                    break;

                case Resources::IF_UNMODIFIED_SINCE:
                    $headerName = Resources::X_MS_SOURCE_IF_UNMODIFIED_SINCE;
                    break;

                case Resources::IF_MODIFIED_SINCE:
                    $headerName = Resources::X_MS_SOURCE_IF_MODIFIED_SINCE;
                    break;

                case Resources::IF_NONE_MATCH:
                    $headerName = Resources::X_MS_SOURCE_IF_NONE_MATCH;
                    break;

                default:
                    throw new \Exception(Resources::INVALID_ACH_MSG);
                    break;
                }
            }
            $value = $accessCondition->getValue();
            if ($value instanceof \DateTime) {
                $value = gmdate(
                    Resources::AZURE_DATE_FORMAT,
                    $value->getTimestamp()
                );
            }

            $this->addOptionalHeader($headers, $headerName, $value);
        }

        return $headers;
    }

    /**
     * Adds HTTP POST parameter to the specified.
     *
     * @param array  $postParameters An array of HTTP POST parameters.
     * @param string $key            The key of a HTTP POST parameter.
     * @param string $value          the value of a HTTP POST parameter.
     *
     * @return array
     */
    public function addPostParameter(
        $postParameters,
        $key,
        $value
    ) {
        Validate::isArray($postParameters, 'postParameters');
        $postParameters[$key] = $value;

        return $postParameters;
    }

    /**
     * Groups set of values into one value separated with Resources::SEPARATOR.
     *
     * @param array $values array of values to be grouped.
     *
     * @return string
     */
    public function groupQueryValues($values)
    {
        Validate::isArray($values, 'values');
        $joined = Resources::EMPTY_STRING;

        foreach ($values as $value) {
            if (!is_null($value) && !empty($value)) {
                $joined .= $value.Resources::SEPARATOR;
            }
        }

        return trim($joined, Resources::SEPARATOR);
    }

    /**
     * Adds metadata elements to headers array.
     *
     * @param array $headers  HTTP request headers
     * @param array $metadata user specified metadata
     *
     * @return array
     */
    protected function addMetadataHeaders($headers, $metadata)
    {
        $this->validateMetadata($metadata);

        $metadata = $this->generateMetadataHeaders($metadata);
        $headers = array_merge($headers, $metadata);

        return $headers;
    }

    /**
     * Generates metadata headers by prefixing each element with 'x-ms-meta'.
     *
     * @param array $metadata user defined metadata.
     *
     * @return array.
     */
    public function generateMetadataHeaders($metadata)
    {
        $metadataHeaders = array();

        if (is_array($metadata) && !is_null($metadata)) {
            foreach ($metadata as $key => $value) {
                $headerName = Resources::X_MS_META_HEADER_PREFIX;
                if (strpos($value, "\r") !== false
                    || strpos($value, "\n") !== false
                ) {
                    throw new \InvalidArgumentException(Resources::INVALID_META_MSG);
                }

                // Metadata name is case-presrved and case insensitive
                $headerName                     .= $key;
                $metadataHeaders[$headerName] = $value;
            }
        }

        return $metadataHeaders;
    }

    /**
     * Gets metadata array by parsing them from given headers.
     *
     * @param array $headers HTTP headers containing metadata elements.
     *
     * @return array.
     */
    public function getMetadataArray($headers)
    {
        $metadata = array();
        foreach ($headers as $key => $value) {
            $isMetadataHeader = Utilities::startsWith(
                strtolower($key),
                Resources::X_MS_META_HEADER_PREFIX
            );

            if ($isMetadataHeader) {
                // Metadata name is case-presrved and case insensitive
                $MetadataName = str_ireplace(
                    Resources::X_MS_META_HEADER_PREFIX,
                    Resources::EMPTY_STRING,
                    $key
                );
                $metadata[$MetadataName] = $value;
            }
        }

        return $metadata;
    }

    /**
     * Validates the provided metadata array.
     *
     * @param mix $metadata The metadata array.
     *
     * @return none
     */
    public function validateMetadata($metadata)
    {
        if (!is_null($metadata)) {
            Validate::isArray($metadata, 'metadata');
        } else {
            $metadata = array();
        }

        foreach ($metadata as $key => $value) {
            Validate::isString($key, 'metadata key');
            Validate::isString($value, 'metadata value');
        }
    }
}
