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
