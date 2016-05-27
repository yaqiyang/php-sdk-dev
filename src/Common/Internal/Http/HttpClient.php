<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal\Http;

use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\ServiceException;
use Http\Discovery\HttpAsyncClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Discovery\UriFactoryDiscovery;

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
        $httpAsyncClient = HttpAsyncClientDiscovery::find();
        $messageFactory = MessageFactoryDiscovery::find();
        $uriFactory =  UriFactoryDiscovery::find();

        $uri = $uriFactory->createUri($path);

        if ($queryParams != null) {
            $queryString = self::build_query($queryParams);
            $uri = $uri->withQuery($queryString);
        }

        $actualBody = null;
        if (empty($body)) {
            if (empty($headers['content-type'])) {
                $headers['content-type'] = 'application/x-www-form-urlencoded';
                $actualBody = self::build_query($postParameters);
            }
        } else {
            $actualBody = $body;
        }

        $request = $messageFactory->createRequest(
                $method,
                $uri,
                $headers,
                $actualBody);

        /* cannot create a generic HttpClient with custom config setting yet. needs more work here
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
        */

        $bodySize = $request->getBody()->getSize();
        if ($bodySize > 0) {
            $request = $request->withHeader('content-length', $bodySize);
        }

        foreach ($filters as $filter) {
            $request = $filter->handleRequest($request);
        }

        $promise = $httpAsyncClient->sendAsyncRequest($request);
        $promise->then(function (\Psr\Http\Message\ResponseInterface $response) {
            //echo 'The response is available';
            return $response;

        }, function (\Http\Client\Exception\HttpException $e) {
            echo 'An error happens';
            throw $e;
        });

        $promise->wait();

        if (\Http\Promise\Promise::FULFILLED === $promise->getState()) {
            return $promise->wait();
        } else {
            throw new \Http\Client\Exception\HttpException('Response not available');
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

    // this function is from Guzzle
    private static function build_query(array $params, $encoding = PHP_QUERY_RFC3986)
    {
        if (!$params) {
            return '';
        }

        if ($encoding === false) {
            $encoder = function ($str) { return $str; };
        } elseif ($encoding == PHP_QUERY_RFC3986) {
            $encoder = 'rawurlencode';
        } elseif ($encoding == PHP_QUERY_RFC1738) {
            $encoder = 'urlencode';
        } else {
            throw new \InvalidArgumentException('Invalid type');
        }

        $qs = '';
        foreach ($params as $k => $v) {
            $k = $encoder($k);
            if (!is_array($v)) {
                $qs .= $k;
                if ($v !== null) {
                    $qs .= '=' . $encoder($v);
                }
                $qs .= '&';
            } else {
                foreach ($v as $vv) {
                    $qs .= $k;
                    if ($vv !== null) {
                        $qs .= '=' . $encoder($vv);
                    }
                    $qs .= '&';
                }
            }
        }

        return $qs ? (string) substr($qs, 0, -1) : '';
    }
}
