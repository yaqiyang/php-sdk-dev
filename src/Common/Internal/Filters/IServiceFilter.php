<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal\Filters;

/**
 * ServceFilter is called when the sending the request and after receiving the response.
 *
 * @category  Microsoft: to add details
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
