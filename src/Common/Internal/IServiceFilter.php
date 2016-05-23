<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal;

/**
 * ServceFilter is called when the sending the request and after receiving the
 * response.
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
interface IServiceFilter
{
    /**
     * Processes HTTP request before send.
     *
     * @param mix $request HTTP request object.
     *
     * @return mix processed HTTP request object.
     */
    public function handleRequest($request);

    /**
     * Processes HTTP response after send.
     *
     * @param mix $request  HTTP request object.
     * @param mix $response HTTP response object.
     *
     * @return mix processed HTTP response object.
     */
    public function handleResponse($request, $response);
}
