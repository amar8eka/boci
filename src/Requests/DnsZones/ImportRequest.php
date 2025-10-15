<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\DnsZones;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Import DNS Zone Request
 */
final class ImportRequest extends Request
{
    /**
     * Create a new import DNS zone request instance.
     *
     * @param  array<string, mixed>  $parameters
     */
    public function __construct(array $parameters)
    {
        parent::__construct($parameters);
    }

    /**
     * Get the HTTP method for this request.
     */
    public function method(): string
    {
        return 'POST';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return '/v1/zones/import';
    }
}
