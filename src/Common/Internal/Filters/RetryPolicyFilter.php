<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal\Filters;

use MicrosoftAzure\Common\Internal\IServiceFilter;
use GuzzleHttp\Client;

/**
 * Short description.
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
class RetryPolicyFilter implements IServiceFilter
{
    /**
     * @var RetryPolicy
     */
    private $_retryPolicy;

    /**
     * @var \GuzzleHttp\Client
     */
    private $_client;

    /**
     * Initializes new object from RetryPolicyFilter.
     *
     * @param \GuzzleHttp\Client $client      The http client to send request.
     * @param RetryPolicy        $retryPolicy The retry policy object.
     */
    public function __construct($client, $retryPolicy)
    {
        $this->_client = $client;
        $this->_retryPolicy = $retryPolicy;
    }

    /**
     * Handles the request before sending.
     *
     * @param \GuzzleHttp\Psr7\Request $request The HTTP request.
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function handleRequest($request)
    {
        return $request;
    }

    /**
     * Handles the response after sending.
     *
     * @param \GuzzleHttp\Psr7\Request  $request  The HTTP request.
     * @param \GuzzleHttp\Psr7\Response $response The HTTP response.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function handleResponse($request, $response)
    {
        for ($retryCount = 0;; ++$retryCount) {
            $shouldRetry = $this->_retryPolicy->shouldRetry(
                $retryCount,
                $response
            );

            if (!$shouldRetry) {
                return $response;
            }

            // Backoff for some time according to retry policy
            $backoffTime = $this->_retryPolicy->calculateBackoff(
                $retryCount,
                $response
            );
            sleep($backoffTime * 0.001);
            $response = $this->_client->send($request);
        }
    }
}
