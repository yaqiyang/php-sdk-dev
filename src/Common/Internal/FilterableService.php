<?php

/**
 * LICENSE: To add details.
 */

namespace MicrosoftAzure\Common\Internal;

/**
 * Interface for service with filers.
 *
 * @category  Microsoft: to add details
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
