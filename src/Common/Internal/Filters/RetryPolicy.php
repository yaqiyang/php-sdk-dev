<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal\Filters;

/**
 * The retry policy abstract class.
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
abstract class RetryPolicy
{
    const DEFAULT_CLIENT_BACKOFF = 30000;
    const DEFAULT_CLIENT_RETRY_COUNT = 3;
    const DEFAULT_MAX_BACKOFF = 90000;
    const DEFAULT_MIN_BACKOFF = 300;

    /**
     * Indicates if there should be a retry or not.
     *
     * @param int                       $retryCount The retry count.
     * @param \GuzzleHttp\Psr7\Response $response   The HTTP response object.
     *
     * @return bool
     */
    abstract public function shouldRetry($retryCount, $response);

    /**
     * Calculates the backoff for the retry policy.
     *
     * @param int                       $retryCount The retry count.
     * @param \GuzzleHttp\Psr7\Response $response   The HTTP response object.
     *
     * @return int
     */
    abstract public function calculateBackoff($retryCount, $response);
}
