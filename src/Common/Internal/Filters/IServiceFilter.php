<?php

/**
 * @category    Microsoft
 *
 * @author      Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright   2016 Microsoft Corporation
 * @license     https://github.com/yaqiyang/php-sdk-dev/blob/master/LICENSE
 *
 * @link        https://github.com/Azure/azure-sdk-for-php
 *
 * @version     Release: 0.10.0_2016
 */

namespace MicrosoftAzure\Common\Internal\Filters;

/**
 * ServiceFilter is used when sending requests and after receiving responses.
 */
interface IServiceFilter
{
    /**
     * Adds header to the request headers.
     *
     * @param $request HTTP channel object.
     *
     * @return $request HTTP channel object.
     */
    public function handleRequest($request);

    /**
     * Processes HTTP response after send.
     *
     * @param $request  HTTP channel object.
     * @param $response HTTP response object.
     *
     * @return $response HTTP channel object.
     */
    public function handleResponse($request, $response);
}
