<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal\Http;

use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\ServiceException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;

/**
 * Holds basic elements for making HTTP calls. This is a wrapper for Guzzle. To change to a new external Http
 * client in the future, change this file should be sufficient.
 * TODO: need to wrap Request and Response also.
 *
 * @category  Microsoft: to add details
 */
class HttpClient
{
    public static function send(
        $method,
        $headers,
        $queryParams,
        $postParameters,
        $path,
        $statusCodes,
        $body = Resources::EMPTY_STRING,
        array $filters = []
    ) {
        $uri = new \GuzzleHttp\Psr7\Uri($path);

        if ($queryParams != null) {
            $queryString = Psr7\build_query($queryParams);
            $uri = $uri->withQuery($queryString);
        }

        $actualBody = null;
        if (empty($body)) {
            if (empty($headers['content-type'])) {
                $headers['content-type'] = 'application/x-www-form-urlencoded';
                $actualBody = Psr7\build_query($postParameters);
            }
        } else {
            $actualBody = $body;
        }

        $request = new Request(
                $method,
                $uri,
                $headers,
                $actualBody);

        $client = new \GuzzleHttp\Client(
            array(
                'defaults' => array(
                        'allow_redirects' => true, 'exceptions' => true,
                        'decode_content' => true,
                ),
                'cookies' => true,
                'verify' => false,
                // For testing with Fiddler
                // 'proxy' => "localhost:8888",
        ));

        $bodySize = $request->getBody()->getSize();
        if ($bodySize > 0) {
            $request = $request->withHeader('content-length', $bodySize);
        }

        foreach ($filters as $filter) {
            $request = $filter->handleRequest($request);
        }

        try {
            $response = $client->send($request);
            self::throwIfError(
                    $response->getStatusCode(),
                    $response->getReasonPhrase(),
                    $response->getBody(),
                    $statusCodes);

            return $response;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                self::throwIfError(
                        $response->getStatusCode(),
                        $response->getReasonPhrase(),
                        $response->getBody(),
                        $statusCodes);

                return $response;
            } else {
                throw $e;
            }
        }
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
     * Convert a http headers array into an uniformed format for further process.
     *
     * @param array $headers headers for format
     *
     * @return array
     */
    public static function formatHeaders($headers)
    {
        $result = array();
        foreach ($headers as $key => $value) {
            if (is_array($value) && count($value) == 1) {
                $result[strtolower($key)] = $value[0];
            } else {
                $result[strtolower($key)] = $value;
            }
        }

        return $result;
    }
}