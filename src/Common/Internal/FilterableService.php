<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal;

/**
 * Interface for service with filers.
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
interface FilterableService
{
    /**
     * Adds new filter to proxy object and returns new BlobRestProxy with
     * that filter.
     *
     * @param MicrosoftAzure\Common\Internal\IServiceFilter $filter Filter to add for
     *                                                              the pipeline.
     *
     * @return mix.
     */
    public function withFilter($filter);
}
